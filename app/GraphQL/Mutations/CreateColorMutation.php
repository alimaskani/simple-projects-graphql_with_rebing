<?php
namespace App\graphql\Mutations;

use App\Models\Color;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;

class CreateColorMutation extends Mutation{
    protected $attributes = [
        'name' =>'createColor'
    ];

    public function type(): Type
    {
        return GraphQL::type('Color');
    }

    public function args(): array
    {
        return [

            'input' => [
                'type' => GraphQL::type('ColorInput')
            ]
        ];
    }



    public function resolve($root,$args){
        $item = Color::query()->create([
            'name' => $args['name'],
            'hexcode' => $args['hexcode'],
            'is_default' => $args['is_default'],
            'item_id' => $args['item_id']
        ]);
        return $item;
    }


}
