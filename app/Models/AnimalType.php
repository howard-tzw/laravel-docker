<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnimalType extends Model
{
    protected $fillable = [
        "name",
        "sort",
    ];

    public function animals()
    {
        return $this->hasMany(Animal::class, 'type_id', 'id');
    }
}
