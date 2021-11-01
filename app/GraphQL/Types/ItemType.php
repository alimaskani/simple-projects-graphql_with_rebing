<?php

namespace App\GraphQL\Types;

use App\Models\Item;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;


class ItemType extends GraphQLType
{

    protected $attributes = [
        'name' => 'Item',
        'description' => 'Collection of items',
        'model' => Item::class
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::int(),
                'description' => 'Id of a particular item'
            ],
            'name' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'sub_name' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'brand_id' => [
                'type' => Type::string(),
                'description' => ''
            ]
        ];
    }
}
