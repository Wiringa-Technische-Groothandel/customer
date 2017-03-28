<?php

namespace WTG\Customer\Controllers\Auth;

use WTG\Customer\Models\Company;
use WTG\Customer\Requests\LoginRequest;
use WTG\Customer\Controllers\Controller;

/**
 * Login controller
 *
 * @package     WTG\Customer
 * @subpackage  Controllers
 * @author      Thomas Wiringa <thomas.wiringa@gmail.com>
 */
class LoginController extends Controller
{
    /**
     * LoginController constructor.
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Attempt to login
     *
     * @param  LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(LoginRequest $request)
    {
        $company = Company::where('customer_number', $request->input('company'))->first();

        if ($company === null) {
            return $this->failedAuthentication();
        }

        $loggedIn = \Auth::attempt([
            'company_id' => $company->getId(),
            'username' => $request->input('username'),
            'password' => $request->input('password')
        ], $request->input('remember'));

        if (!$loggedIn) {
            return $this->failedAuthentication();
        }

        return $this->successAuthentication($company);
    }

    /**
     * Login failed handler
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function failedAuthentication()
    {
        \Log::info("[Login] Customer '".request('company')."' - '".request('username')."' failed to login");

        return back()
            ->withErrors(__("customer::auth.login_failed"));
    }

    /**
     * Login success handler
     *
     * @param  Company  $company
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function successAuthentication(Company $company)
    {
        \Log::info("[Login] Customer '".request('company')."' - '".request('username')."' has logged in");

        return redirect()
            ->intended()
            ->with('status', __('customer::auth.login_success', ['company' => $company->getName()]));
    }
}