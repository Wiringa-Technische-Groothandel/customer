<?php

namespace WTG\Customer\Controllers;

use Illuminate\Support\Facades\Auth;
use WTG\Checkout\Interfaces\OrderInterface;
use WTG\Customer\Interfaces\CompanyInterface;

/**
 * Dashboard controller
 *
 * @package     WTG\Customer
 * @subpackage  Controllers
 * @author      Thomas Wiringa <thomas.wiringa@gmail.com>
 */
class DashboardController extends Controller
{
    /**
     * The account dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function view()
    {
        $customer = Auth::user();
        $company = app()->make(CompanyInterface::class)->find($customer->getCompanyId());
        $orderCount = app()->make(OrderInterface::class)->customer($customer->getId())->count();

        return view('customer::dashboard.index', compact('customer', 'company', 'orderCount'));
    }
}