<?php

namespace App\GraphQL\Mutations;

use App\Http\Controllers\ColorController;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;

class DeleteColorMutation extends Mutation
{
    protected $attributes = [
        'name' => 'deleteColor',
        'description' => 'Delete a Color'
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
        return (new ColorController())->delete($args);
    }
}
