<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_name',
        'category_slug',
        'meta_title',
        'meta_description',
        'description',
        'image',
        'is_menu',
        'is_footer',
        'status',
        'parent_id'
    ];


    public function getChild()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }

    public function getParent()
    {
        return $this->belongsTo(Category::class, 'parent_id', 'id');
    }
}
