    <?php


    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\Admin\DashboardController;
    use App\Http\Controllers\Admin\AuthController;
    use App\Http\Controllers\Admin\ProductController;
    use App\Http\Controllers\Admin\CustomerController;
    use App\Http\Controllers\Admin\CategoryController;

    Route::get('/', function () {
        return view('welcome');
    });

    Route::prefix('admin')->group(function () {
        Route::get('/login', [AuthController::class, 'showLoginForm'])->name('admin.login');
        Route::post('/login', [AuthController::class, 'login'])->name('admin.login.submit');
        Route::post('/logout', [AuthController::class, 'logout'])->name('admin.logout');

        Route::middleware(['auth:admin'])->group(function () {
            Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

            // Bulk delete route
            Route::delete('/products/bulk-delete', [ProductController::class, 'bulkDelete'])->name('admin.products.bulkDelete');
            Route::delete('/customers/bulk-delete', [CustomerController::class, 'bulkDelete'])->name('admin.customers.bulkDelete');

            // Use resource with all CRUD routes
            Route::resource('/customers', CustomerController::class, ['as' => 'admin'])->except(['show']);
            Route::resource('/products', ProductController::class, ['as' => 'admin'])->except(['show']);
            Route::resource('/categories', CategoryController::class, ['as' => 'admin'])->except(['show']);
        });
    });
