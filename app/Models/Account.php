<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Account extends Authenticatable
{
    protected $fillable = [
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
    ];

    protected $primaryKey = 'account_id';
    protected $keyType = 'string';
    public $incrementing = false;

    public function user() {
        return $this->hasOne(User::class, 'account_id', 'account_id');
    }

    protected static function boot() {
        parent::boot();

        static::creating(function($model) {
           if (empty($model->account_id)) {
                $model->account_id = (string) Str::uuid();
           }
        });
    }
}
