<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class book extends Model
{
    protected $fillable = [
        "title",
        "author_id",
        "date_of_publish",
        "total_page",
        "description",
    ];

    public function author()
    {
        return $this->belongsTo(author::class, 'author_id');
    }
}

