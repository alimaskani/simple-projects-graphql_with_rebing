<?php

namespace App\GraphQL\Types;

use App\Models\Item;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;


class ViewItemType extends GraphQLType
{

    protected $attributes = [
        'name' => 'ViewItem',
        'description' => 'Collection of viewitems',
        'model' => Item::class
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'Id of a particular item'
            ],
            'brand_name' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'coming soon'
            ],
            'item_name' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'coming soon'
            ],
            'item_sub_name' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'coming soon'
            ],
            'price' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'coming soon'
            ],
            'color_name' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'coming soon'
            ],
            'default_color' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'coming soon'
            ]
        ];
    }
}
