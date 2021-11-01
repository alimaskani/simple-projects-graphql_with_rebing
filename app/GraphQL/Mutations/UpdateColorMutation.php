<?php

namespace App\GraphQL\Mutations;

use App\Http\Controllers\ColorController;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;


class UpdateColorMutation extends Mutation
{
    protected $attributes = [
        'name' => 'updateColor'
    ];

    public function type(): Type
    {
        return GraphQL::type('Color');
    }

    public function args(): array
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::int(),
            ],
            'input' => [
                'name' => 'input',
                'type' => GraphQL::type('ColorInput')
            ]
        ];
    }

    public function resolve($root, $args)
    {
        return (new ColorController())->update($args);
    }


}
