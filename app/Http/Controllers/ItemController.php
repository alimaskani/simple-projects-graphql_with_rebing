<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function store($args)
    {
        $rules = [
            'name' =>  ['required', 'unique:brands,name'],
            'sub_name' => ['required'],
            'brand_id' => ['required', 'exist:brands,id']
        ];

        $this->general_validation($args,$rules);
        $item = Item::query()->create([
            'name' => $args['name'],
            'sub_name' => $args['sub_name'],
            'brand_id' => $args['brand_id'],
        ]);
        return $item;
    }

    public function delete($args)
    {
        $rules = [
         'id' => ['required','exists:items,id']
        ];
        $this->general_validation($args,$rules);
        $item = Item::query()->findOrFail($args['id']);
        return $item->delete() ? true : false ;
    }

    public function update($args)
    {
        $rules = [
            'id' => ['required','exists:items,id'],
            'name' =>  ['required', 'unique:brands,name'],
            'sub_name' => ['required'],
            'brand_id' => ['required', 'exist:brands,id']
        ];
        $this->general_validation($args,$rules);
        $item = Item::query()->findOrFail($args['id']);
        $item->fill($args);
        $item->save();
        return $item;

    }
}
