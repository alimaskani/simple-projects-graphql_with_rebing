<?php

namespace App\GraphQL\Mutations;

use App\Http\Controllers\BrandController;
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
            'name' => [
                'name' => 'name',
                'description' => '',
                'type' => Type::string(),
            ],

        ];
    }

    public function resolve($root, $args)
    {
        return (new BrandController())->store($args);
    }


}
