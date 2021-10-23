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

            'id' => [
                'name' => 'id',
                'type' => Type::int(),
                'rules' => ['required']
            ],
            'name' => [
                'name' => 'name',
                'type' => Type::string(),
                'rules' => ['required']
            ],
            'hexcode' => [
                'name' => 'hexcode',
                'type' => Type::string(),
                'rules' => ['required', 'unique:colors']
            ],
            'is_default' => [
                'name' => 'is_default',
                'type' => Type::int(),
                'rules' => ['required']
            ]
        ];
    }



    public function resolve($root,$args){
        $item = Color::query()->create([
            'name' => $args['name'],
            'hex_code' => $args['hex_code'],
            'is_default' => $args['is_default'],
        ]);

        $ColorId =$args['id'];
        $ItemID = 1;

        $ColorId->items()->attach($ItemID);

        return $item;
    }


}
