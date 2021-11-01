<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function store($args)
    {
        $rules = [
            'name' => ['required','unique:brands,name']
        ];
        $this->general_validation($args,$rules);
        $brand = Brand::query()->create([
            'name' => $args['name']
        ]);
        return $brand;
    }

    public function delete($args)
    {
        $rules = [
            'id' => ['required','exists:brands,id']
        ];
        $this->general_validation($args , $rules);
        $brand = Brand::query()->findOrFail($args['id']);
        return $brand->delete() ? true : false ;
    }

    public function update($args)
    {
        $rules = [
            'id' => ['required','exists:brands,id'],
            'name' => ['required','unique:brands,name']
        ];
        $this->general_validation($args,$rules);
        $brand = Brand::query()->findOrFail($args['id']);
        $brand->fill($args);
        $brand->save();
        return $brand;
    }
}
