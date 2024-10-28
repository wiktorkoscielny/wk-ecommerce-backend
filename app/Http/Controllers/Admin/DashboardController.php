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
        return view('admin.dashboard');
    }
}
