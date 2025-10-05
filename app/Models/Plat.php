<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plat extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'description',
        'recette',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function favoris()
    {
        return $this->belongsToMany(User::class, 'favoris', 'plat_id', 'user_id');
    }

    public function likes()
    {
        return $this->favoris()->count();
    }
}
