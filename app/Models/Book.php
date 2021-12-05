<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'author',
        'title',
        'copies',
        'points',
        'category_id',
    ];
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function users()
    {
        return $this->HasMany(User::class, 'user_id');
    }

    public function demande()
    {
        return $this->belongTo(Demande::class, 'demande_id');
    }
}
