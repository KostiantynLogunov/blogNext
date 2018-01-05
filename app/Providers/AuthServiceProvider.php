<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    protected $listen = [
        \SocialiteProviders\Manager\SocialiteWasCalled::class => [
            // Порписываем здесь обработку события провайдерами от SocialiteProviders
            'SocialiteProviders\VKontakte\VKontakteExtendSocialite@handle',
        ],
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
