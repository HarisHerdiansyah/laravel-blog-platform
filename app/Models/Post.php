<?php

namespace App\Models;

use App\Enum\StatusEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    protected $fillable = [
        'category_id',
        'user_id',
        'title',
        'slug',
        'summary',
        'content',
        'status'
    ];

    protected $primaryKey = 'post_id';
    protected $keyType = 'string';
    public $incrementing = false;

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function category() {
        return $this->belongsTo(Categories::class, 'category_id', 'category_id');
    }

    protected static function boot() {
        parent::boot();

        static::creating(function($model) {
            if (empty($model->post_id)) {
                $model->post_id = (string) Str::uuid();
            }
        });
    }
}
