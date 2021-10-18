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
            'name' => [
                'name' => 'name',
                'type' => Type::string(),
                'rules' => ['required']
            ],
            'hexcode' => [
                'name' => 'subtitle',
                'type' => Type::string(),
                'rules' => ['required','unique:colors']
            ],
            'is_default' => [
                'name' => 'subname',
                'type' => Type::int(),
                'rules' => ['required']
            ],
            'item_id' => [
                'name' => 'item_id',
                'type' => Type::int(),
                'rules' => ['required','exists:items,id']
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
