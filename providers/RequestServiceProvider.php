<?php

namespace Hyhy\Providers;

use Hyhy\Http\Request;
use Illuminate\Contracts\Validation\ValidatesWhenResolved;
use Illuminate\Support\ServiceProvider;

class RequestServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->resolveMyRequest();
    }

    protected function resolveMyRequest()
    {
        $this->app->resolving(Request::class, function ($request, $app) {
            $request = Request::createFrom($app['request'], $request);

            $request->setContainer($app);
        });

        $this->app->afterResolving(ValidatesWhenResolved::class, function ($resolved) {
            $resolved->validateResolved();
        });
    }

}