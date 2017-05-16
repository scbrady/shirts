<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConfirmationController extends Controller
{
    public function show(Request $request, $id)
    {
        return view('pages.confirmation', ['id' => $id]);
    }
}