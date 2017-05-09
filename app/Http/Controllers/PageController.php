<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

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
        $this->validate($request, [
            'stripeToken' => 'required',
            'stripeEmail' => 'required',
            'stripeShippingName' => 'required',
            'stripeShippingAddressLine1' => 'required',
            'stripeShippingAddressCity' => 'required',
            'stripeShippingAddressState' => 'required',
            'stripeShippingAddressZip' => 'required',

            'quantity' => 'required',
            'extra' => 'required'
        ]);
    }
}