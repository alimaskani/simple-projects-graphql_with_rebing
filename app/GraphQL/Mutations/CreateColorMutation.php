<?php

namespace App\GraphQL\Mutations;

use App\Http\Controllers\ColorController;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;

class CreateColorMutation extends Mutation
{
    protected $attributes = [
        'name' => 'createColor',
        'description' => ''
    ];

    public function type(): Type
    {
        return GraphQL::type('Color');
    }

    public function args(): array
    {
        return [
            'input' => [
                'name' => 'input',
                'type' => GraphQL::type('ColorInput')
            ]
        ];
    }

    public function resolve($root, $args)
    {

        return (new ColorController())->store($args['input']);
    }


}
