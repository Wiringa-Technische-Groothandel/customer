<?php

namespace WTG\Customer\Controllers\Account;

use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use WTG\Customer\Controllers\Controller;

/**
 * Class FavoritesController
 *
 * @author  Thomas Wiringa <thomas.wiringa@gmail.com>
 */
class FavoritesController extends Controller
{
    /**
     * List of favorites
     *
     * @return \Illuminate\View\View
     */
    public function view()
    {
        $favorites = [];

        Auth::user()
            ->favorites()
            ->with('product')
            ->get()
            ->each(function ($favorite) use (&$favorites) {
                $favorites[$favorite->product->series][] = $favorite->product;
            });

        $favorites = collect($favorites);

        return view('account.favorites.index', compact('favorites'));
    }

    /**
     * Check if a product is in the users favorites
     *
     * @param  Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function check(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'product' => 'required|exists:products,number'
        ]);

        if ($validator->passes()) {
            $number = $request->input('product');

            return response()->json([
                'payload' => [
                    'exists' => (bool) Auth::user()->favorites()->where('product_number', $number)->first()
                ]
            ]);
        }

        return $this->jsonMessage($validator->errors(), 400);
    }

    /**
     * Add a product to the favorites
     *
     * @param  Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function add(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'product' => 'required|exists:products,number'
        ]);

        if ($validator->passes()) {
            $number = $request->input('product');
            $favorite = Auth::user()->favorites()->where('product_number', $number)->first();

            if ($favorite !== null) {
                return $this->jsonMessage([
                    __("Het product is reeds toegevoegd aan uw favorieten.")
                ]);
            } else {
                $favorite = new Favorite;
                $favorite->user_id = Auth::id();
                $favorite->product_number = $number;

                if ($favorite->save()) {
                    \Log::info(
                        "Customer (login: '".
                        Auth::user()->login.
                        "' company: '".
                        Auth::user()->company_id.
                        "') added a product to their favorites."
                    );

                    return $this->jsonMessage([
                        __("Het product is toegevoegd aan uw favorieten.")
                    ]);
                } else {
                    \Log::error(
                        "Customer (login: '".
                        Auth::user()->login.
                        "' company: '".
                        Auth::user()->company_id.
                        "') tried to add a product to their favorites but an error occurred."
                    );

                    return $this->jsonMessage([
                        __("Er is een fout opgetreden.")
                    ], 500);
                }
            }
        }

        \Log::info(
            "Customer (login: '".
            Auth::user()->login.
            "' company: '".
            Auth::user()->company_id.
            "') tried to add a product to their favorites but the validation failed."
        );

        return $this->jsonMessage($validator->errors(), 400);
    }

    /**
     * Remove a product from the users favorites
     *
     * @param  Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'product' => 'required|exists:products,number'
        ]);

        if ($validator->passes()) {
            $number = $request->input('product');
            $favorite = Auth::user()->favorites()->where('product_number', $number)->first();

            if ($favorite === null) {
                return $this->jsonMessage([
                    __("Het opgegeven product staat niet in uw favorieten.")
                ]);
            } else {
                if ($favorite->delete()) {
                    \Log::info(
                        "Customer (login: '".
                        Auth::user()->login.
                        "' company: '".
                        Auth::user()->company_id.
                        "') removed a product from their favorites."
                    );

                    return $this->jsonMessage([
                        __("Het product is verwijderd van uw favorieten.")
                    ]);
                } else {
                    \Log::error(
                        "Customer (login: '".
                        Auth::user()->login.
                        "' company: '".
                        Auth::user()->company_id.
                        "') tried to remove a product from their favorites but an error occurred."
                    );

                    return $this->jsonMessage([
                        __("Er is een fout opgetreden.")
                    ], 500);
                }
            }
        }

        \Log::info(
            "Customer (login: '".
            Auth::user()->login.
            "' company: '".
            Auth::user()->company_id.
            "') tried to remove a product from their favorites but the validation failed."
        );

        return $this->jsonMessage($validator->errors(), 400);
    }
}