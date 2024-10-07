<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function subCategorias()
    {
        return $this->hasMany(Sub_Category::class);
    }

    public function produtos()
    {
        return $this->hasManyThrough(Product::class, Sub_Category::class);
    }
}
