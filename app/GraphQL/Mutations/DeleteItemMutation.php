<?php
namespace App\graphql\Mutations;

use App\Models\Item;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;

class DeleteItemMutation extends Mutation{
    protected $attributes = [
        'name' => 'deleteItem',
        'description' => 'Delete a Item'
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
                'rules' => ['required','exists:items,id']
            ]
        ];
    }

    public function resolve($root, $args){
        $brand = Item::query()->findOrFail($args['id']);

        return $brand->delete() ? true : false ;
    }
}
