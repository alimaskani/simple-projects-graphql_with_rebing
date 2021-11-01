<?php

namespace App\GraphQL\Types;

use App\Models\Brand;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;


class BrandType extends GraphQLType
{

    protected $attributes = [
        'name' => 'Brand',
        'description' => 'Collection of brands',
        'model' => Brand::class
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'Id of a particular brand'
            ],
            'name' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'name of  the brand'
            ],
        ];
    }
}
