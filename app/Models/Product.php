<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    protected $guarded = ['id'];
    use HasFactory;

    public function orders(): BelongsToMany {
        return $this->belongsToMany(Order::class);
    }
}
