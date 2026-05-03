<?php

namespace Modules\Base\Country\Models;

use Modules\Base\State\Models\State;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Country extends Model
{
    use HasFactory;

    protected $connection = 'central';
    protected $table = 'countries';

    protected $fillable = [
        'name',
        'phone_code',
        'iso_code',

    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
    protected static function boot()
    {
        parent::boot();

        static::created(function ($country) {
            \Cache::forget('countries_all');
            \Cache::forget("country_{$country->id}");
        });

        static::updated(function ($country) {
            \Cache::forget('countries_all');
            \Cache::forget("country_{$country->id}");
        });

        static::deleted(function ($country) {
            \Cache::forget('countries_all');
            \Cache::forget("country_{$country->id}");
        });
    }
    public function states(): HasMany
    {
        return $this->hasMany(State::class);
    }
}
