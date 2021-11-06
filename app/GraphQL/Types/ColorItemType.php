<?php

namespace App\GraphQL\Types;

use App\Models\Color;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;


class ColorItemType extends GraphQLType
{

    protected $attributes = [
        'name' => 'ColorItem',
        'description' => 'Collection of color and item',
        'model' => Color::class
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::int(),
                'description' => ''
            ],
            'item_id' => [
                'type' => Type::int(),
                'description' => ''
            ],
            'color_id' => [
                'type' => Type::int(),
                'description' => ''
            ],
            'price' => [
                'type' => Type::int(),
                'description' => ''
            ],
            'is_default' => [
                'type' => Type::int(),
                'description' => ''
            ],


        ];
    }
}
