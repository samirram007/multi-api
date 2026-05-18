<?php

namespace Modules\Document\SharedDocument\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Base\User\Models\User;
use Modules\Document\Document\Models\Document;

class SharedDocument extends Model
{
    use HasFactory;

    protected $table = 'shared_documents';

    protected $fillable = [
        'user_id',
        'document_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function document()
    {
        return $this->belongsTo(Document::class);
    }
}
