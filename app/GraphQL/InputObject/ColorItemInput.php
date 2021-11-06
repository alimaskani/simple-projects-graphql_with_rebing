<?php

namespace App\GraphQL\InputObject;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\InputType;

class ColorItemInput extends InputType
{
    protected $attributes = [
        'name' => 'ColorItemInput',
        'description' => ''
    ];

    public function fields(): array
    {
        return [
            'item_id' => [
                'name' => 'name',
                'type' => Type::int(),
            ],
            'color_id' => [
                'name' => 'color_id',
                'type' => Type::int(),
            ],
            'price' => [
                'name' => 'price',
                'type' => Type::int(),
            ],
            'is_default' => [
                'name' => 'is_default',
                'type' => Type::int(),
            ]
        ];
    }
}
