<?php

namespace App\GraphQL\Mutations;

use App\Http\Controllers\BrandController;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;

class DeleteBrandMutation extends Mutation
{
    protected $attributes = [
        'name' => 'deleteBrand',
        'description' => 'Delete a Brand'
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
        return (new BrandController())->delete($args);
    }
}
