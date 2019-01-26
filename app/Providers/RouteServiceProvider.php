<?php

namespace App\Providers;

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
    protected $namespace = 'App\Http\Controllers';

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
             ->middleware('destinations')
             ->namespace($this->namespace)
             ->group(base_path('routes/destinations.php'));

        Route::prefix('activity-types')
             ->middleware('activityTypes')
             ->namespace($this->namespace)
             ->group(base_path('routes/activityTypes.php'));

        Route::prefix('addresses')
             ->middleware('addresses')
             ->namespace($this->namespace)
             ->group(base_path('routes/addresses.php'));

        Route::prefix('boxes')
             ->middleware('boxes')
             ->namespace($this->namespace)
             ->group(base_path('routes/boxes.php'));

        Route::prefix('categories')
             ->middleware('categories')
             ->namespace($this->namespace)
             ->group(base_path('routes/categories.php'));

        Route::prefix('category-events')
             ->middleware('categoryEvents')
             ->namespace($this->namespace)
             ->group(base_path('routes/categoryEvents.php'));

        Route::prefix('contents')
             ->middleware('contents')
             ->namespace($this->namespace)
             ->group(base_path('routes/contents.php'));

        Route::prefix('events')
             ->middleware('events')
             ->namespace($this->namespace)
             ->group(base_path('routes/events.php'));

        Route::prefix('event-types')
             ->middleware('eventTypes')
             ->namespace($this->namespace)
             ->group(base_path('routes/eventTypes.php'));

        Route::prefix('favorites')
             ->middleware('favorites')
             ->namespace($this->namespace)
             ->group(base_path('routes/favorites.php'));

        Route::prefix('genders')
             ->middleware('genders')
             ->namespace($this->namespace)
             ->group(base_path('routes/genders.php'));

        Route::prefix('items')
             ->middleware('items')
             ->namespace($this->namespace)
             ->group(base_path('routes/items.php'));

        Route::prefix('marks')
             ->middleware('marks')
             ->namespace($this->namespace)
             ->group(base_path('routes/marks.php'));

        Route::prefix('my-boxes')
             ->middleware('myBoxes')
             ->namespace($this->namespace)
             ->group(base_path('routes/myBoxes.php'));

        Route::prefix('notifications')
             ->middleware('notifications')
             ->namespace($this->namespace)
             ->group(base_path('routes/notifications.php'));

        Route::prefix('photo-events')
             ->middleware('photoEvents')
             ->namespace($this->namespace)
             ->group(base_path('routes/photoEvents.php'));

        Route::prefix('photos')
             ->middleware('photos')
             ->namespace($this->namespace)
             ->group(base_path('routes/photos.php'));

        Route::prefix('users')
             ->middleware('users')
             ->namespace($this->namespace)
             ->group(base_path('routes/users.php'));
    }
}
