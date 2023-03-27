<?php

namespace App\Ship\Providers;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{

    protected $namespace = 'App\Http\Controllers';
    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
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
        $routeProviderListFunction = function () {
            $uiRouteProviderList = [];
            $filesystem = new Filesystem();

            foreach ($filesystem->directories(app_path('src/Containers')) as $directory) {
                
                $apiRouteProvider = $directory . '/UI/API/Routes/RouteProvider.php';
                if (file_exists($apiRouteProvider)) {
                    $apiProviderClass = $apiRouteProvider;
                    $uiRouteProviderList[$directory . '\UI\API\Controllers'] = $apiProviderClass;
                }
            }

            return $uiRouteProviderList;
        };

        
        $uiRouteProviderList = $routeProviderListFunction();

        foreach ($uiRouteProviderList as $key => $route) {
            Route::prefix('api')
                 ->middleware('api')
                 ->namespace('')
                 ->group($route);

        }
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

        $routeProviderListFunction = function () {
            $uiRouteProviderList = [];
            $filesystem = new Filesystem();

            foreach ($filesystem->directories(app_path('src/Containers')) as $directory) {
                
                $webRouteProvider = $directory . '/UI/WEB/Routes/RouteProvider.php';
                if (file_exists($webRouteProvider)) {
                    $webProviderClass = $webRouteProvider;
                    $uiRouteProviderList[$directory . '\UI\API\Controllers'] = $webProviderClass;
                }
            }

            return $uiRouteProviderList;
        };

        
        $uiRouteProviderList = $routeProviderListFunction();
        

        // return $uiRouteProviderList;

        Route::middleware('web')
             ->namespace($this->namespace)
             ->group($uiRouteProviderList);
    }


}
