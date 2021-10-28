<?php

namespace App\GraphQL\Mutations;

use App\Http\Controllers\ItemController;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;

class DeleteItemMutation extends Mutation
{
    protected $attributes = [
        'name' => 'deleteItem',
        'description' => ''
    ];

    public function type(): Type
    {
        return Type::boolean();
    }

    public function args(): array
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::int(),
            ]
        ];
    }

    public function resolve($root, $args)
    {
        return (new ItemController())->delete($args);
    }
}
