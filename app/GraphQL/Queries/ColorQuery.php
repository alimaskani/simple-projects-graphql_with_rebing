<?php

namespace App\GraphQL\Queries;

use App\Models\Color;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

class ColorQuery extends Query
{
    protected $attributes = [
        'name' => 'color'
    ];

    public function type(): Type
    {
        // TODO: Implement type() method.
        return GraphQL::type('Color');
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
        return Color::query()->findOrFail($args['id']);
    }


}
