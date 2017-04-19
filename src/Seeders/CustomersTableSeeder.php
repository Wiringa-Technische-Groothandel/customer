<?php

namespace WTG\Customer\Seeders;

use Illuminate\Database\Seeder;
use Webpatser\Uuid\Uuid;
use WTG\Customer\Models\Company;
use WTG\Customer\Models\Customer;

/**
 * Customers table seeder
 *
 * @package     WTG\Customer
 * @subpackage  Seeders
 * @author      Thomas Wiringa <thomas.wiringa@gmail.com>
 */
class CustomersTableSeeder extends Seeder
{
    /**
     * Run the seeder
     *
     * @return void
     */
    public function run()
    {
        $customer = new Customer;
        $customer->setId(Uuid::generate(4));
        $customer->setCompanyId(Company::first()->getId());
        $customer->setUsername("username");
        $customer->setPassword(bcrypt("tester"));
        $customer->setEmail("test@test.com");
        $customer->setActive(true);
        $customer->setManager(true);
        $customer->setIsMain(true);
        $customer->save();
    }
}