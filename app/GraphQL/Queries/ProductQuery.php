<?php

namespace App\GraphQL\Queries;

use App\Models\Product;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;

class ProductQuery extends Query
{
    protected $attributes = [
        'name' => 'Products',
    ];

    public function type(): Type
    {
        return Type::listOf(\GraphQL::type('Product'));
    }

    public function resolve($root, $args)
    {
        return Product::all();
    }
}
