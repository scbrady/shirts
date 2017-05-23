<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Page;
use Exception;
use Illuminate\Http\Request;
use Stripe\Charge as StripeCharge;

class PageController extends Controller
{
    public function show(Request $request, $slug)
    {
        $page = Page::where('slug', '=', $slug)->first();
        $page->load('products', 'pictures');
        return view('pages.show', ['page' => $page]);
    }

    public function buy(Request $request, $slug)
    {
        $page = Page::where('slug', '=', $slug)->first();
        $page->load('products');

        $this->validate($request, [
            'stripeToken' => 'required',
            'stripeEmail' => 'required',
            'stripeShippingName' => 'required',
            'stripeShippingAddressLine1' => 'required',
            'stripeShippingAddressCity' => 'required',
            'stripeShippingAddressState' => 'required',
            'stripeShippingAddressZip' => 'required',
            'stripeShippingAddressCountryCode' => 'required',

            'extra' => 'required'
        ], ['stripeShippingAddressState.required' => 'Please enter a valid zip code.']);
        return $this->processPrintAura($request, $page);
    }

    private function processPrintAura(Request $request, Page $page)
    {
        $extra = [];
        $clientExtra = $request->get('extra');

        try {
            foreach ($clientExtra as $p => $options) {
                $product = $page->products->find($p);
                $product_id = $product->provider_id;

                foreach ($options as $key => $value) {
                    $size = $product->extra[$key][$value];
                    $parts = explode('|', $size[0]);

                    if ($product_id) {
                        $extra[$p]['product_id'] = $product_id;
                        $extra[$p]['color_id'] = $parts[0];
                        $extra[$p]['size_id'] = $parts[1];
                    } else {
                        $extra[$p]['product_id'] = $parts[0];
                        $extra[$p]['color_id'] = $parts[1];
                        $extra[$p]['size_id'] = $parts[2];
                    }
                }
            }
        } catch (Exception $e) {
            \Log::notice("Possible tampering: " . var_export($request->all(), true));
            return redirect('/'.$page->slug)
                ->withErrors(['There was an error processing your request. Please try again later.'])
                ->withInput();
        }

        try {
            // Create the charge
            $options = [
                'source' => $request->stripeToken,
                'currency' => 'usd',
                'amount' => $page->amount * $request->quantity,
            ];
            $charge = StripeCharge::create($options, ['api_key' => env('STRIPE_SECRET')]);
        } catch (Exception $e) {
            \Log::notice("Error charging card: " . var_export($request->all(), true));
            return redirect('/'.$page->slug)
                ->withErrors(['There was an error charging your card.'])
                ->withInput();
        }


        $order = Order::create([
            'page_id' => $page->id,
            'name' => $request->stripeShippingName,
            'email' => $request->stripeEmail,
            'address1' => $request->stripeShippingAddressLine1,
            'city' => $request->stripeShippingAddressCity,
            'state' => $request->stripeShippingAddressState,
            'zip' => $request->stripeShippingAddressZip,
            'extra' => $extra,
            'quantity' => 1,
            'amount' => $page->amount,
            'stripe_id' => $charge->id,
        ]);

        return redirect('/confirmation/'.$order->id);
    }
}