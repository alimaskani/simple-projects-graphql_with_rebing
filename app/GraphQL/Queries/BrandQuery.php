<?php

namespace App\GraphQL\Queries;

use App\Models\Brand;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

class BrandQuery extends Query
{
    protected $attributes = [
        'name' => 'brand'
    ];

    public function type(): Type
    {
        // TODO: Implement type() method.
        return GraphQL::type('Brand');
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
        return Brand::query()->findOrFail($args['id']);
    }


}
