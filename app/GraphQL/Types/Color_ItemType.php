<?php

namespace App\GraphQL\Types;

use App\Models\Color;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;


class Color_ItemType extends GraphQLType
{

    protected $attributes = [
        'name' => 'Color_Item',
        'description' => 'Collection of color and item',
        'model' => Color::class
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => ''
            ],
            'item_id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => ''
            ],
            'color_id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => ''
            ],
            'price' => [
                'type' => Type::nonNull(Type::int()),
                'description' => ''
            ],
            'is_default' => [
                'type' => Type::nonNull(Type::int()),
                'description' => ''
            ],

        ];
    }
}
