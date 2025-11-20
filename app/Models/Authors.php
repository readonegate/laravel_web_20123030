<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Authors extends Model
{
    use HasFactory;

    protected static function newFactory()
    {
        return \Database\Factories\AuthorFactory::new();
    }

    protected $table = "authors";
    protected $fillable = [
        'name',
    ];
}
