<?php

namespace App\GraphQL\InputObject;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\InputType;

class ItemInput extends InputType
{
    protected $attributes = [
        'name' => 'ItemInput',
        'description' => ''
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::int(),
            ],
            'name' => [
                'name' => 'name',
                'type' => Type::string(),
            ],
            'sub_name' => [
                'name' => 'sub_name',
                'type' => Type::string(),
            ],
            'brand_id' => [
                'name' => 'brand_id',
                'type' => Type::int(),
            ],
            'colors' =>[
                'name' => 'colors',
                'type' => Type::listOf(GraphQL::type('ColorItemInput'))
            ]
        ];
    }
}
