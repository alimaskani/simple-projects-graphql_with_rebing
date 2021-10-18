<?php
namespace App\graphql\Mutations;

use App\Models\Color;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;

class DeleteColorMutation extends Mutation{
    protected $attributes = [
        'name' => 'deleteColor',
        'description' => 'Delete a Color'
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
                'rules' => ['required','exists:colors,id']
            ]
        ];
    }

    public function resolve($root, $args){
        $brand = Color::query()->findOrFail($args['id']);

        return $brand->delete() ? true : false ;
    }
}
