<?php
namespace App\graphql\Mutations;

use App\Models\Item;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;

class CreateItemMutation extends Mutation{
    protected $attributes = [
        'name' =>'createItem'
    ];

    public function type(): Type
    {
        return GraphQL::type('Item');
    }

    public function args(): array
    {
        return [
            'name' => [
                'name' => 'name',
                'type' => Type::string(),
                'rules' => ['required','unique:brands']
            ],
            'subname' => [
                'name' => 'subname',
                'type' => Type::string(),
                'rules' => ['required']
            ],
            'price' => [
                'name' => 'price',
                'type' => Type::string(),
                'rules' => ['required']
            ],
            'brand_id' => [
                'name' => 'brand_id',
                'type' => Type::int(),
                'rules' => ['required','exist:brands,id']
            ]
        ];
    }

    public function resolve($root,$args){
        $item = Item::query()->create([
            'name' => $args['name'],
            'subtitle' => $args['subtitle'],
            'subname' => $args['subname'],
            'price' => $args['price'],
            'brand_id' => $args['brand_id'],
        ]);
        return $item;
    }


}
