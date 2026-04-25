<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bag extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'color',
        'material',
        'image',
    ];

    public function toArray()
    {
        return parent::toArray();
    }
}
