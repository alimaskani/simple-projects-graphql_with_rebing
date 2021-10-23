<?php

namespace App\GraphQL\InputObject;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\InputType;

class ColorInput extends InputType
{
    protected $attributes = [
        'name' => 'ColorInput',
        'description' => '.........'
    ];

    public function fields(): array
    {
        return [
            'name' => [
                'name' => 'name',
                'type' => Type::string(),
                'rules' => ['required']
            ],
            'hex_code' => [
                'name' => 'hex_code',
                'type' => Type::string(),
                'rules' => ['required', 'unique:colors']
            ],
            'is_default' => [
                'name' => 'is_default',
                'type' => Type::int(),
                'rules' => ['required']
            ]
        ];
    }
}
