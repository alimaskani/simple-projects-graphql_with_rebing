<?php

namespace App\graphql\Mutations;

use App\Models\Brand;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;

class UpdateBrandMutation extends Mutation{
    protected $attributes = [
        'name' => 'updateBrand'
    ];

    public function type(): Type
    {
        // TODO: Implement type() method.
        return GraphQL::type('Brand');
    }

    public function args(): array
    {
        return [
            'id' => [
                'name' => 'id',
                'type' =>Type::int(),
                'rules' => ['required']
            ],
            'name' => [
                'name' => 'name',
                'type' =>Type::string(),
                'rules' => ['required','unique:brands,name']
            ],
            'parent_id' => [
                'name' => 'parent_id',
                'type' => Type::int(),
                'rules' => ['required']
            ],
        ];
    }

    public function resolve($root,$args){
        $brand = Brand::query()->findOrFail($args['id']);
        $brand->fill($args);
        $brand->save();

        return $brand;
    }


}
