<?php

namespace WTG\Customer\Providers;

use WTG\Customer\Models\Company;
use WTG\Customer\Models\Customer;
use Illuminate\Support\ServiceProvider;
use WTG\Customer\Interfaces\CompanyInterface;
use WTG\Customer\Interfaces\CustomerInterface;

/**
 * Customer service provider
 *
 * @package     WTG\Customer
 * @subpackage  Providers
 * @author      Thomas Wiringa  <thomas.wiringa@gmail.com>
 */
class CustomerServiceProvider extends ServiceProvider
{
    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/../routes.php');

        $this->loadMigrationsFrom(__DIR__.'/../Migrations');

        $this->loadTranslationsFrom(__DIR__.'/../Resources/lang', 'customer');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CustomerInterface::class, Customer::class);
        $this->app->bind(CompanyInterface::class, Company::class);
    }
}
