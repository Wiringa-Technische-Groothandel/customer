<?php

namespace WTG\Customer\Controllers;

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