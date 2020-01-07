<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['cat_name'];
    public function format(){
        return [
            'cat_name' => $this->name,
            'created_at' => $this->created_at->diffForHumans()
        ];
    }
    public function posts(){
        return $this->hasMany(Post::class);
    }
}
