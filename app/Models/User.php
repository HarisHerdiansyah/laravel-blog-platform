<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Account;
use Illuminate\Support\Str;

class User extends Model
{
    protected $fillable = [
        'account_id',
        'username',
        'fullname'
    ];

    protected $primaryKey = 'user_id';
    protected $keyType = 'string';
    public $incrementing = false;

    public function account () {
        return $this->belongsTo(Account::class, 'account_id', 'account_id');
    }

    protected static function boot() {
        parent::boot();

        static::creating(function($model) {
            if (empty($model->user_id)) {
                $model->user_id = (string) Str::uuid();
            }
        });
    }
}
