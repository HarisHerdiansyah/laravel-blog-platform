<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $primaryKey = 'category_id';
    protected $keyType = 'string';
    public $incrementing = false;

    public function posts() {
        return $this->hasMany(Post::class, 'category_id', 'category_id');
    }
}
