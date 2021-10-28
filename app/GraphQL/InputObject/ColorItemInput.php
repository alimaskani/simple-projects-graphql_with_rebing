<?php

namespace App\GraphQL\InputObject;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\InputType;

class ColorItemInput extends InputType
{
    protected $attributes = [
        'name' => 'ItemInput',
        'description' => ''
    ];

    public function fields(): array
    {
        return [
            'item_id' => [
                'name' => 'name',
                'type' => Type::int(),
                'rules' => ['required', 'exists:items,id']
            ],
            'color_id' => [
                'name' => 'color_id',
                'type' => Type::string(),
                'rules' => ['required','exists:colors,id']
            ],
            'price' => [
                'name' => 'price',
                'type' => Type::int(),
                'rules' => ['required']
            ],
            'is_default' => [
                'name' => 'is_default',
                'type' => Type::int(),
                'rules' => ['required']
            ]
        ];
    }
}
