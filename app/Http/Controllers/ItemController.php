<?php

namespace App\Http\Controllers;

use App\Models\ColorItem;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Response;


class ItemController extends Controller
{
    public function store($args)
    {

        $rules = [
            'name' => ['required'],
            'sub_name' => ['required'],
            'brand_id' => ['required','exists:brands,id'],
        ];
        $name = $args['name'];
        $brand = $args['brand_id'];
        $validate_duplicate_item = Item::query()->where([
            ['name', '=', $name],
            ['brand_id', '=', $brand]
        ])->get();
        if ($validate_duplicate_item->count() > 0) {
            exit("item has exists , try again");
        }
        $this->general_validation($args, $rules);
        $item = Item::query()->create([
            'name' => $args['name'],
            'sub_name' => $args['sub_name'],
            'brand_id' => $args['brand_id'],
        ]);


        /*** insert color_item ***/
        $colors = $args['colors'];
        $find_id = Item::query()->where([
            ['name', '=', $name],
            ['brand_id', '=', $brand]
        ])->get();
        /** for duplicate color_item table */
        if ($find_id->count() < 0){
            exit();
        }
        foreach ($colors as $key=>$value){
            foreach ($value as $items){
                $item_id = $find_id[0]['id'];
                $price =  $value['price'];
                $color_id =  $value['color_id'];
                $is_default = $value['is_default'];

                ColorItem::query()->create([
                    'item_id' => $item_id,
                    'color_id' => $color_id,
                    'price' => $price,
                    'is_default' => $is_default,
                ]);
            }
        }

        return $item;
    }

    public function delete($args)
    {
        $rules = [
            'id' => ['required', 'exists:items,id']
        ];
        $this->general_validation($args, $rules);
        $item = Item::query()->findOrFail($args['id']);
        return $item->delete() ? true : false;
    }

    public function update($args)
    {
        $rules = [
            'id' => ['required', 'exists:items,id'],
            'name' => ['required'],
            'sub_name' => ['required'],
            'brand_id' => ['required','exists:brands,id'],
        ];

        $name = $args['name'];
        $brand = $args['brand_id'];
        $validate_duplicate_item = Item::query()->where([
            ['name', '=', $name],
            ['brand_id', '=', $brand]
        ])->get();
        if ($validate_duplicate_item->count() > 0  && $validate_duplicate_item[0]['id'] != $args['id']) {
            exit("item has exists , try again");
        }

        $this->general_validation($args, $rules);
        $item = Item::query()->findOrFail($args['id']);
        $item->fill($args);
        $item->save();
        return $item;

    }
}
