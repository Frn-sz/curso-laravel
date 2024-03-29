<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    use HasFactory;

    protected $fillable = ['name','cover'];

    protected static function booted()
    {
        self::addGlobalScope('ordered', function (Builder $q_builder) {
            $q_builder->orderBy('name');
        });
    }

    public function seasons()
    {
        return $this->hasMany(Season::class, 'series_id');
    }
}
