<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    // Table name (optional kalau sama dengan plural model)
    protected $table = 'recipes';

    // Kolom yang boleh diisi mass-assignment
    protected $fillable = [
        'title',
        'category',
        'image',
        'desc',
        'time',
        'serving',
        'rating',
        'price',
    ];

    public function buyers()
    {
        return $this->belongsToMany(User::class, 'recipe_user');
    }

    public function steps()
    {
        return $this->hasMany(RecipeStep::class)->orderBy('step_number');
    }

    public function tips()
    {
        return $this->hasMany(RecipeTip::class);
    }


}
