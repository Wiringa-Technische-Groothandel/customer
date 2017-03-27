<?php

namespace WTG\Customer\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;

/**
 * Class OrderHistoryController
 *
 * @author Thomas Wiringa <thomas.wiringa@gmail.com>
 */
class OrderHistoryController extends Controller
{
    /**
     * Order history
     *
     * @return \Illuminate\View\View
     */
    public function view()
    {
        $orders = Order::with('products')
            ->where('User_id', Auth::user()->company_id)
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('account.orderhistory.index', compact('orders'));
    }

    /**
     * Add the items from a previous order to the cart again
     *
     * @param  Request  $request
     * @param  Order  $order
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addOrderToCart(Request $request, Order $order)
    {
        if ($order->User_id !== Auth::user()->company_id) {
            return redirect()->back();
        }

        $errorProducts = [];

        foreach ($order->products as $item) {
            $product = $item->product;

            if ($product === null) {
                $errorProducts[] = $item->product_number;

                continue;
            }

            $cartData = [
                'id'      => $product->number,
                'name'    => $product->name,
                'qty'     => $item['qty'],
                'price'   => $product->real_price,
                'options' => [
                    'special' => false,
                    'korting' => app('helper')->getProductDiscount(Auth::user()->login, $product->group, $product->number),
                ],
            ];

            // Add the product to the cart
            Cart::add($cartData);
        }

        if ($errorProducts) {
            return redirect('cart')
                ->withErrors('Niet alle producten zijn toegevoegd aan uw winkelmandje. De volgende producten zijn niet toegevoegd: ' . join(", ", $errorProducts));
        } else {
            return redirect('cart')
                ->with('status', 'De order producten zijn in uw winkelmandje geplaatst.');
        }
    }
}