<?php

namespace WTG\Customer\Seeders;

use Webpatser\Uuid\Uuid;
use Illuminate\Database\Seeder;
use WTG\Customer\Models\Company;

/**
 * Companies table seeder
 *
 * @package     WTG\Customer
 * @subpackage  Seeders
 * @author      Thomas Wiringa <thomas.wiringa@gmail.com>
 */
class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the seeder
     *
     * @return void
     */
    public function run()
    {
        $company = new Company;
        $company->setId(Uuid::generate(4));
        $company->setCustomerNumber("12345");
        $company->setName("Test company");
        $company->setActive(true);
        $company->setIsAdmin(true);
        $company->save();
    }
}