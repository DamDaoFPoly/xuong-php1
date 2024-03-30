<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'name'
    ];
    public function category()
    {
        return $this->belongsTo(Category::class); // con sang cha dùng belongto
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
}
