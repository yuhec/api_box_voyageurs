<?php

namespace api\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'api\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));

        Route::prefix('destinations')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/destinations.php'));

        Route::prefix('activity-types')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/activityTypes.php'));

        Route::prefix('addresses')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/addresses.php'));

        Route::prefix('boxes')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/boxes.php'));

        Route::prefix('categories')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/categories.php'));

        Route::prefix('category-events')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/categoryEvents.php'));

        Route::prefix('contents')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/contents.php'));

        Route::prefix('events')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/events.php'));

        Route::prefix('event-types')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/eventTypes.php'));

        Route::prefix('favorites')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/favorites.php'));

        Route::prefix('genders')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/genders.php'));

        Route::prefix('items')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/items.php'));

        Route::prefix('marks')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/marks.php'));

        Route::prefix('my-boxes')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/myBoxes.php'));

        Route::prefix('notifications')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/notifications.php'));

        Route::prefix('photo-events')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/photoEvents.php'));

        Route::prefix('photos')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/photos.php'));

        Route::prefix('users')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/users.php'));
    }
}
