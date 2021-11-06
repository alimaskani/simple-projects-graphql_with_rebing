<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ColorItem extends Model
{
    use HasFactory;
    protected $fillable = [
      'item_id',
      'color_id',
      'price',
      'is_default'
    ];
}
