<?php

namespace WTG\Customer\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

/**
 * Check manager middleware.
 *
 * @package     WTG\Customer
 * @subpackage  Middleware
 * @author      Thomas Wiringa  <thomas.wiringa@gmail.com>
 */
class CheckManager
{
    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new filter instance.
     *
     * @param Guard $auth
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($this->auth->user()->getManager()) {
            return $next($request);
        }

        return back()
            ->withErrors(trans('customer::auth.not_a_manager'));
    }
}
