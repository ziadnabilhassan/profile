<?php

namespace App\Providers;

use App\Models\Page;
use App\Models\Contact;
use App\Models\Setting;
use App\Models\Information;
use App\Models\CategoryType;
use App\Models\gender;
use App\Models\Solution;
use App\Models\Gallery;
use App\Models\Category;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFour();

        View::composer('*', function ($view) {
            $data = [
                'Contact' => Contact::first(),
                'About' => Page::first(),
                'Setting' => Setting::first(),
                'Pages' => Page::where('id', '!=', 1)->where('id', '!=', 11)->get(),
                'CategoryTypes' => Category::get(['id', 'title']),
                'categories' => Category::get(['id', 'title', 'image','icon']),
                'solutions' => Solution::get(),
                'Genders' => gender::with(['categories'])->get(),
                 'galleries' => Gallery::get(),

            ];
            $view->with($data);
        });
    }
}
