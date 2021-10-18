<?php
namespace App\graphql\Queries;

use App\Models\Color;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

class ColorsQuery extends  Query{

    protected $attributes = [
        'name' => 'colors'
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQL::type('Color'));
    }

    public function resolve($root,$args){
        return Color::all();
    }
}
