<?php

namespace App\GraphQL\InputObject;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\InputType;

class ItemInput extends InputType
{
    protected $attributes = [
        'name' => 'ItemInput',
        'description' => '.........'
    ];

    public function fields(): array
    {
        return [
            'name' => [
                'name' => 'name',
                'type' => Type::string(),
                'rules' => ['required', 'unique:brands']
            ],
            'subname' => [
                'name' => 'subname',
                'type' => Type::string(),
                'rules' => ['required']
            ],
            'price' => [
                'name' => 'price',
                'type' => Type::string(),
                'rules' => ['required']
            ],
            'brand_id' => [
                'name' => 'brand_id',
                'type' => Type::int(),
                'rules' => ['required', 'exist:brands,id']
            ]
        ];
    }
}
