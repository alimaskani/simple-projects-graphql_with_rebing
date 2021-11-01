<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function store($args)
    {
        $rules = [
            'name' => ['required'],
            'hex_code' => ['required', 'unique:colors,hex_code']
        ];
        $this->general_validation($args, $rules);

        $color = Color::query()->create([
            'name' => $args['name'],
            'hex_code' => $args['hex_code'],
        ]);

        return $color;
    }

    public function delete($args)
    {
        $rules = [
            'id' => ['required', 'exists:colors,id']
        ];

        $this->general_validation($args, $rules);
        $color = Color::query()->findOrFail($args['id']);
        return $color->delete() ? true : false;
    }

    public function update($args)
    {
        $rules = [
            'id' => ['required', 'exists:colors,id'],
            'name' => ['required'],
            'hex_code' => ['required', 'unique:colors,hex_code']
        ];
        $this->general_validation($args, $rules);
        $color = Color::query()->findOrFail($args['id']);
        $color->fill($args);
        $color->save();
        return $color;
    }
}
