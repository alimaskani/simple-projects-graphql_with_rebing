<?php
namespace App\GraphQL\Queries;

use App\Models\Item;
use App\Models\ViewItem;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

class ItemsQuery extends  Query{

    protected $attributes = [
        'name' => 'Items'
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQL::type('ViewItem'));
    }

    public function resolve($root,$args){
        return ViewItem::all();
    }
}
