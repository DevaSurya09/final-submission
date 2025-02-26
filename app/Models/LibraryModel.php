<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LibraryModel extends Model
{
    protected $table = 'library';

    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'author'
    ];

    protected $guarded = [
        'created_at',
        'updated_at'
    ];
}
