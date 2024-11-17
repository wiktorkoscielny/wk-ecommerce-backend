<?php

namespace App\GraphQL\Types;

use Rebing\GraphQL\Support\Type as GraphQLType;
use GraphQL\Type\Definition\Type;

class ProductType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Product',
        'description' => 'Details of a product',
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'ID of the product',
            ],
            'name' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Name of the product',
            ],
            'price' => [
                'type' => Type::float(),
                'description' => 'Price of the product',
            ],
            'category_id' => [
                'type' => Type::int(),
                'description' => 'Category ID of the product',
            ],
        ];
    }
}
