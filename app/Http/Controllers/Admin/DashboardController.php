<?php
/**
 * Wiktor Koscielny
 * WK Ecommerce
 */
declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Closure;
use Illuminate\Container\Container;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Product;
use Carbon\Carbon;

/**
 * Class DashboardController
 */
class DashboardController extends Controller
{
    /**
     * Load the data for admin dashboard view
     *
     * @return Closure|Container|mixed|object|null
     */
    public function index()
    {
        $customerCount = Customer::count();
        $productCount = Product::count();
        $categoryCount = Category::count();

        $counts = [
            '24h' => [
                'customers' => Customer::where('created_at', '>=', Carbon::now()->subDay())->count(),
                'products' => Product::where('created_at', '>=', Carbon::now()->subDay())->count(),
            ],
            '7days' => [
                'customers' => Customer::where('created_at', '>=', Carbon::now()->subDays(7))->count(),
                'products' => Product::where('created_at', '>=', Carbon::now()->subDays(7))->count(),
            ],
            'month' => [
                'customers' => Customer::where('created_at', '>=', Carbon::now()->subMonth())->count(),
                'products' => Product::where('created_at', '>=', Carbon::now()->subMonth())->count(),
            ],
            'year' => [
                'customers' => Customer::where('created_at', '>=', Carbon::now()->subYear())->count(),
                'products' => Product::where('created_at', '>=', Carbon::now()->subYear())->count(),
            ],
            'overall' => [
                'customers' => $customerCount,
                'products' => $productCount,
            ],
        ];

        return view('admin.dashboard', [
            'customerCount' => $customerCount,
            'productCount' => $productCount,
            'categoryCount' => $categoryCount,
            'counts' => $counts,
        ]);
    }
}
