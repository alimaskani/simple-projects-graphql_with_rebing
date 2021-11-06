<?php

namespace App\GraphQL\InputObject;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\InputType;

class ColorInput extends InputType
{
    protected $attributes = [
        'name' => 'ColorInput',
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::int(),
            ],
            'name' => [
                'name' => 'name',
                'type' => Type::string(),
            ],
            'hex_code' => [
                'name' => 'hex_code',
                'type' => Type::string(),
            ],
        ];
    }
}
