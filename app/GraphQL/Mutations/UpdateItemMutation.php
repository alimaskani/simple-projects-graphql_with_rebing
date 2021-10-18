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
            'name' => [
                'name' => 'name',
                'type' => Type::nonNull(Type::string()),
                'rules' => ['required']
            ],
            'subtitle' => [
                'name' => 'subtitle',
                'type' => Type::nonNull(Type::string()),
                'rules' => ['']
            ],
            'subname' => [
                'name' => 'subname',
                'type' => Type::nonNull(Type::string()),
                'rules' => ['']
            ],
            'price' => [
                'name' => 'price',
                'type' => Type::nonNull(Type::string()),
                'rules' => ['required']
            ],
            'brand_id' => [
                'name' => 'brand_id',
                'type' => Type::nonNull(Type::int()),
                'rules' => ['required','exists:brands,id']
            ],
        ];
    }

    public function resolve($root,$args){
        $brand = Item::query()->findOrFail($args['id']);
        $brand->fill($args);
        $brand->save();

        return $brand;
    }


}
