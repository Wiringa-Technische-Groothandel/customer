<?php

namespace WTG\Customer\Controllers\Account;

use WTG\Customer\Controllers\Controller;

/**
 * Class DashboardController
 *
 * @author  Thomas Wiringa <thomas.wiringa@gmail.com>
 */
class DashboardController extends Controller
{
    /**
     * The account dashboard
     *
     * @return \Illuminate\View\View
     */
    public function view()
    {
        return view('account.dashboard.index');
    }
}