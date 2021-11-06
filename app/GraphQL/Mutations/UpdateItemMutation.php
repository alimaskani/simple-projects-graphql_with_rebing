<?php

namespace App\GraphQL\Mutations;

use App\Http\Controllers\ItemController;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;

class UpdateItemMutation extends Mutation
{
    protected $attributes = [
        'name' => 'updateItem',
        'description' => ''
    ];

    public function type(): Type
    {
        return GraphQL::type('Item');
    }

    public function args(): array
    {
        return [
            'input' => [
                'name' => 'input',
                'type' => GraphQL::type('ItemInput')
            ],

        ];
    }

    public function resolve($root, $args)
    {
        return (new ItemController())->update($args['input']);
    }


}
