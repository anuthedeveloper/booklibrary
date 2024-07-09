<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Book;

class Author extends Model
{
    use HasFactory;

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'biography',
        'date_of_birth',
    ];

    /**
     * authors's books
     *
     * @return void
     */
    public function books()
    {
        return $this->hasMany(Book::class);
    }
}