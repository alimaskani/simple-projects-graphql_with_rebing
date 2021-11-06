<?php

namespace App\GraphQL\Queries;

use App\Models\Item;
use App\Models\ViewItem;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

class ItemQuery extends Query
{
    protected $attributes = [
        'name' => 'item'
    ];

    public function type(): Type
    {
        return GraphQL::type('Item');
    }

    public function args(): array
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::int(),
                'rule' => ['required']
            ],
        ];
    }

    public function resolve($root, $args)
    {
        return Item::query()->findOrFail($args['id']);
    }
}
