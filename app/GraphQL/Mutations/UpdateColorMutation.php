<?php

namespace App\graphql\Mutations;

use App\Models\Item;
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
        // TODO: Implement type() method.
        return GraphQL::type('Colors');
    }

    public function args(): array
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::int(),
                'rules' => ['required']
            ],
            'input' => [
                'type' => GraphQL::type('ColorInput')
            ]
        ];
    }

    public function resolve($root, $args)
    {
        $brand = Item::query()->findOrFail($args['id']);
        $brand->fill($args);
        $brand->save();

        return $brand;
    }


}
