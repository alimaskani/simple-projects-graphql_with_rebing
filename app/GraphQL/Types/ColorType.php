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
                'description' => 'coming soon'
            ],
            'name' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'coming soon'
            ],
            'hexcode' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'coming soon'
            ],
            'is_default' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'coming soon'
            ],
        ];
    }
}
