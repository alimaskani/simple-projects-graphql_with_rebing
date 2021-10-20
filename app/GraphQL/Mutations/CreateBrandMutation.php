<?php

namespace App\graphql\Mutations;

use App\Models\Brand;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;

class CreateBrandMutation extends Mutation
{
    protected $attributes = [
        'name' => 'createBrand'
    ];

    public function type(): Type
    {
        return GraphQL::type('Brand');
    }


    public function args(): array
    {
        return [
            'input' => [
                'type' => GraphQL::type('BrandInput')
            ]
        ];
    }


    public function validationErrorMessages(array $args = []): array
    {
        return [
            'name.unique' => '**** is unique',
            'name.required' => ' ****** is required',

        ];
    }


    public function resolve($root, $args)
    {
        $parent_id = 0;
        if ($args['parent_id'] != 0) {
            $parent_id = $args['parent_id'];
        }

        $brand = Brand::query()->create([
            'name' => $args['name'],
            'parent_id' => $parent_id
        ]);
        return $brand;
    }


}
