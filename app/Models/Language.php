<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Language extends Model
{
    //
    use HasFactory, SoftDeletes;
    protected $hidden = [
        'updated_at',
        'deleted_at'
    ];
    protected $fillable = [
        'lang'
    ];

    function books()
    {
        return $this->hasMany(Book::class);
    }
}
