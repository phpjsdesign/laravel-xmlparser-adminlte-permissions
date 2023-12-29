<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'referenced_id',
        'parent_id',
        'name',
    ];

    public function offer(): HasMany
    {
        return $this->hasMany(Offer::class);
    }
}
