<?php

namespace App\Modules\Document\Document\Models;


use App\Modules\Base\User\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Document extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'documents';

    protected $fillable = [
        'parent_id',
        'is_root',
        'name',
        'user_id',
        'document_type',
        'path',
        'mime_type',
        'size',
        'original_name',
        'caption',
        'description',
        'extension',
        'privacy_level',
        'tags',
        'storage_type',
        'link',
        'meta',
    ];
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'is_root' => 'boolean',
        'meta' => 'array',
    ];
    // protected $with = ['parent'];
    // protected $appends = ['parents', 'full_path'];


    /*
    |--------------------------------------------------------------------------
    | Core Relations
    |--------------------------------------------------------------------------
    */

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /*
    |--------------------------------------------------------------------------
    | Tree Structure (ONLY)
    |--------------------------------------------------------------------------
    */

    // Parent folder
    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }
    public function getParentsAttribute(): array
    {
        $rows = DB::select("
        WITH RECURSIVE ancestors AS (
            -- start from current node
            SELECT id, parent_id, name, original_name, 0 AS depth
            FROM documents
            WHERE id = ?

            UNION ALL

            -- move upward
            SELECT d.id, d.parent_id, d.name, d.original_name, a.depth + 1 AS depth
            FROM documents d
            INNER JOIN ancestors a ON d.id = a.parent_id
        )
        SELECT id, parent_id, name, original_name, depth
        FROM ancestors
        WHERE id != ? -- exclude self
        ORDER BY depth ASC
    ", [$this->id, $this->id]);

        // map to clean array [{id, name}, ...]
        return array_map(fn($row) => [
            'id' => $row->id,
            'parent_id' => $row->parent_id,
            'original_name' => $row->original_name,
            'name' => $row->name,
            'depth' => $row->depth,
        ], $rows);
    }
    public function getFullPathAttribute(): string
    {
        $parents = $this->parents; // getParentsAttribute
        $pathParts = array_map(fn($p) => $p['original_name'], $parents);
        $pathParts[] = $this->original_name; // current original name
        return implode('/', $pathParts);
    }

    // Children (files + folders)
    public function children()
    {
        return $this->hasMany(self::class, 'parent_id');
    }

    // Only folders
    public function childFolders()
    {
        return $this->children()->where('document_type', 'folder');
    }

    // Only files
    public function childFiles()
    {
        return $this->children()->where('document_type', 'file');
    }

    /*
    |--------------------------------------------------------------------------
    | Helpers
    |--------------------------------------------------------------------------
    */

    public function isFolder(): bool
    {
        return $this->document_type === 'folder';
    }

    public function isFile(): bool
    {
        return $this->document_type === 'file';
    }

    // Recursive loading
    public function childrenRecursive()
    {
        return $this->children()->with('childrenRecursive');
    }

    // Get full path (computed)
    // public function getFullPathAttribute(): string
    // {
    //     return $this->parent
    //         ? $this->parent->full_path . '/' . $this->name
    //         : $this->name;
    // }
}
