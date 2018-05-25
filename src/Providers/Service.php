<?php namespace GeneaLabs\LaravelCollectionMacros\Providers;

use GeneaLabs\LaravelCollectionMacros\ImplodeRecursive;
use GeneaLabs\LaravelCollectionMacros\Paginate;
use Illuminate\Support\ServiceProvider;

class Service extends ServiceProvider
{
    protected $defer = false;

    public function boot()
    {
        //
    }

    public function register()
    {
        new ImplodeRecursive;
        new Paginate;
    }

    public function provides()
    {
        return [];
    }
}
