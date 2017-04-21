<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Laravel\Dusk\DuskServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
    	Schema::defaultStringLength(191);
    	
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $repositories = [
            'BaseRepositoryInterface' => 'BaseRepository',
            'Post\PostRepositoryInterface' => 'Post\PostRepository',
//             'Category\CategoryRepositoryInterface' => 'Category\CategoryRepository',
//             'User\UserRepositoryInterface' => 'User\UserRepository',
        ];
        foreach ($repositories as $repositoryInterface => $repository){
            $this->app->bind("App\\Repositories\\$repositoryInterface", "App\\Repositories\\$repository");
        }

        if ($this->app->environment('local', 'testing')) {
            $this->app->register(DuskServiceProvider::class);
        }
    }
}
