<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Notifications\Messages\MailMessage;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //modificando el email para confirmar cuenta
        VerifyEmail::toMailUsing( function($notifiable,$url){
                                                               return (new MailMessage)
                                                               ->subject('Verificar Cuenta')
                                                               ->line('Tu cuenta ya casi esta lista solo debes precionar el enlace')
                                                               ->action('Confirmar cuenta',$url)
                                                               ->line('Si no es tu cuenta puedes ignonar este mensaje');
                                                            });
    }
}
