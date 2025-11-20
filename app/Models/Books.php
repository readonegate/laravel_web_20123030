<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    use HasFactory;

    protected static function newFactory()
    {
        return \Database\Factories\BookFactory::new();
    }

    protected $table = "books";
    protected $fillable = [
        'title',
        'author_id',
        'isbn',
        'published_year',
    ];

    public function author()
    {
        return $this->belongsTo(Authors::class);
    }
}
