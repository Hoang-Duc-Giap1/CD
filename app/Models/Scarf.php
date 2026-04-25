<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Scarf extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'color',
        'material',
        'pattern',
        'image',
    ];

    public function toArray()
    {
        return parent::toArray();
    }
}
