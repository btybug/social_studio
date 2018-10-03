<?php

namespace Btybug\SocialStudio\Providers;

use Illuminate\Support\ServiceProvider;

class ModuleServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the module services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadTranslationsFrom(__DIR__ . '/../Resources/Lang', 'ss');
        $this->loadViewsFrom(__DIR__ . '/../Resources/Views', 'ss');
        \Eventy::action('admin.menus', [
            "title" => "Social Studio",
            "custom-link" => "",
            "icon" => "fa fa-film",
            "is_core" => "yes",
            "children" => [
                [
                    "title" => "Editor",
                    "custom-link" => "/admin/social-studio/drive",
                    "icon" => "fa fa-trash",
                    "is_core" => "yes"
                ], [
                    "title" => "Settings",
                    "custom-link" => "/admin/social-studio/settings",
                    "icon" => "fa fa-trash",
                    "is_core" => "yes"
                ]
            ]
        ]);
         \Btybug\btybug\SocialStudio\Routes::registerPages('btybug/social_studio');
    }

    /**
     * Register the module services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
    }
}
