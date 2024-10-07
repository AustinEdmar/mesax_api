<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sub_Category extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'category_id'];

    public function categoria()
    {
        return $this->belongsTo(Category::class);
    }

    public function produtos()
    {
        return $this->hasMany(Product::class);
    }
}
