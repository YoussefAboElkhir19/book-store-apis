<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    //
    use HasFactory, SoftDeletes;

    protected $hidden = [
        'deleted_at',
        'updated_at'
    ];
    protected $fillable = [
        'title',
        'price',
        'user_id',
        'author_id',
        'topic_id',
        'language_id'

    ];

    // Realation
    // User
    function user()
    {
        return $this->belongsTo(User::class);
    }
    // Author
    function author()
    {
        return $this->belongsTo(Author::class);
    }
    // Language
    function language()
    {
        return $this->belongsTo(Language::class);
    }
    // Topices
    function topic()
    {
        return $this->belongsTo(Topic::class);
    }
}
