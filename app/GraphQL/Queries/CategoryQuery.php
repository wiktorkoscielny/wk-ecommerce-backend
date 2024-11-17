<?php

namespace App\GraphQL\Queries;

use App\Models\Category;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;

class CategoryQuery extends Query
{
    protected $attributes = [
        'name' => 'Categories',
    ];

    public function type(): Type
    {
        return Type::listOf(\GraphQL::type('Category'));
    }

    public function resolve($root, $args)
    {
        return Category::all();
    }
}
