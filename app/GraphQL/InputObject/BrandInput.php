<?php
namespace App\GraphQL\InputObject;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\InputType;

class BrandInput extends InputType
{
    protected $attributes = [
        'name' => 'BrandInput',
        'description' => '.........'
    ];

    public function fields(): array
    {
        return [
            'name' => [
                'name' => 'name',
                'description' => '*******',
                'type' => Type::string(),
                'rules' => ['required','unique:brands']

            ],
            'parent_id' => [
                'name' => 'parent_id',
                'description' => '*******',
                'type' => Type::int(),
            ]
        ];
    }
}
