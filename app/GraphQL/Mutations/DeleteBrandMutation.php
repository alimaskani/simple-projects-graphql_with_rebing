<?php
namespace App\graphql\Mutations;

use App\Models\Brand;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;

class DeleteBrandMutation extends Mutation{
    protected $attributes = [
        'name' => 'deleteBrand',
        'description' => 'Delete a Brand'
    ];

    public function type(): Type
    {
        // TODO: Implement type() method.
        return Type::boolean();
    }

    public function args(): array
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::int(),
                'rules' => ['required','exists:brands,id']
            ]
        ];
    }

    public function resolve($root, $args){
        $brand = Brand::query()->findOrFail($args['id']);
        return $brand->delete() ? true : false ;
    }
}
