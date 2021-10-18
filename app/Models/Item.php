<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use HasFactory , SoftDeletes;

    protected $fillable = [
        'name','subtitle',
        'subname','price','brand_id',
    ];

    public function brand(){
        return $this->belongsTo(Brand::class);
    }

    public function colors(){
        return $this->belongsToMany(Color::class);
    }
}
