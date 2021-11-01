<?php

namespace App\GraphQL\Types;

use App\Models\Color;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;


class ColorType extends GraphQLType
{

    protected $attributes = [
        'name' => 'Color',
        'description' => 'Collection of colors',
        'model' => Color::class
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => ''
            ],
            'name' => [
                'type' => Type::nonNull(Type::string()),
                'description' => ''
            ],
            'hex_code' => [
                'type' => Type::nonNull(Type::string()),
                'description' => ''
            ],

        ];
    }
}
