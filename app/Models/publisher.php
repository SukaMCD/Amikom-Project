<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class publisher extends Model
{
    protected $fillable = ['name'];

    public function books()
    {
        return $this->hasMany(book::class, 'publisher_id');
    }
}
