<?php

namespace App\GraphQL\Types;

use App\Models\Item;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;


class ViewItemType extends GraphQLType
{

    protected $attributes = [
        'name' => 'ViewItem',
        'description' => 'Collection of view_items',
        'model' => Item::class
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::int(),
                'description' => 'Id of a particular item'
            ],
            'brand_name' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'item_name' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'item_sub_name' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'price' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'color_name' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'default_color' => [
                'type' => Type::string(),
                'description' => ''
            ]
        ];
    }
}
