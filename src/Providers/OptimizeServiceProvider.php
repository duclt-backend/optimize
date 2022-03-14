<?php

namespace Workable\Optimize\Providers;
use Illuminate\Support\ServiceProvider;
use Workable\Base\Traits\LoadAndPublishDataTrait;

use Workable\Optimize\Http\Middleware\CollapseWhitespace;
use Workable\Optimize\Http\Middleware\ElideAttributes;
use Workable\Optimize\Http\Middleware\InlineCss;
use Workable\Optimize\Http\Middleware\InsertDNSPrefetch;
use Workable\Optimize\Http\Middleware\RemoveComments;
use Workable\Optimize\Http\Middleware\RemoveQuotes;
use Workable\Optimize\Http\Middleware\TrimUrls;

class OptimizeServiceProvider extends ServiceProvider
{
    use LoadAndPublishDataTrait;

    public function boot(\Illuminate\Routing\Router $router)
    {
        $this->setNamespace('packages/optimize')
            ->loadAndPublishConfigurations(['general']);

        $this->app->register(HookServiceProvider::class);

        $router->middlewareGroup('optimize',[
            ElideAttributes::class,
            InsertDNSPrefetch::class,
            CollapseWhitespace::class,
            RemoveComments::class,
            InlineCss::class,
            RemoveQuotes::class,
            TrimUrls::class
        ]);
    }
}
