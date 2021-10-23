<?php
namespace App\graphql\Mutations;

use App\Models\Color;
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
            'input' => [
                'type' => GraphQL::type('ItemInput')
            ],
        ];
    }

    public function resolve($root,$args){
        $item = Item::query()->create([
            'name' => $args['name'],
            'subtitle' => $args['subtitle'],
            'sub_name' => $args['sub_name'],
            'price' => $args['price'],
            'brand_id' => $args['brand_id'],
        ]);


        return $item;
    }


}
