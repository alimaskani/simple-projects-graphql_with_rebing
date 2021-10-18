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
            'name' => [
                'name' => 'name',
                'type' => Type::string(),
                'rules' => ['required']
            ],
            'hexcode' => [
                'name' => 'hexcode',
                'type' => Type::string(),
                'rules' => ['required']
            ],
            [
                'is_default' => [
                    'name' => 'is_default',
                    'type' => Type::boolean(),
                ]
            ],
            'item_id' => [
                'name' => 'brand_id',
                'type' => Type::int(),
                'rules' => ['required', 'exists:items,id']
            ],
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
