<?php

namespace App\GraphQL\Types;

use App\Models\Item;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;


class ItemType extends GraphQLType
{

    protected $attributes = [
        'name' => 'Item',
        'description' => 'Collection of brands',
        'model' => Item::class
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'Id of a particular item'
            ],
            'name' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'coming soon'
            ],
            'subtitle' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'coming soon'
            ],
            'subname' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'coming soon'
            ],
            'price' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'coming soon'
            ],
            'brand_id' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'coming soon'
            ]
        ];
    }
}
