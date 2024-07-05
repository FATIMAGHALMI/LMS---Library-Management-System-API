<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = ['name', 'email', 'join_date', 'status'];

    public function loans()
    {
        return $this->hasMany(Loan::class);
    }
}
