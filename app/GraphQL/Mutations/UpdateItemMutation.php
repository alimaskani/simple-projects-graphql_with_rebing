<?php

namespace App\graphql\Mutations;

use App\Models\Item;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;

class UpdateItemMutation extends Mutation{
    protected $attributes = [
        'name' => 'updateItem'
    ];

    public function type(): Type
    {
        // TODO: Implement type() method.
        return GraphQL::type('Item');
    }

    public function args(): array
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::nonNull(Type::int()),
                'rules' => ['required']
            ],
            'input' => [
                'type' => GraphQL::type('ItemInput')
            ]
        ];
    }

    public function resolve($root,$args){
        $brand = Item::query()->findOrFail($args['id']);
        $brand->fill($args);
        $brand->save();

        return $brand;
    }


}
