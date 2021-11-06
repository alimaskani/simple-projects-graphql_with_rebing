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
                'type' => Type::int(),
            ],
            'name' => [
                'type' => Type::string(),
            ],
            'hex_code' => [
                'type' => Type::string(),
            ],

        ];
    }
}
