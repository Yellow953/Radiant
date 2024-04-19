<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PoliciesController extends Controller
{
    public function return_policy()
    {
        return view('policies.return_policy');
    }

    public function privacy_policy()
    {
        return view('policies.privacy_policy');
    }

    public function shipping_policy()
    {
        return view('policies.shipping_policy');
    }

    public function terms_of_service()
    {
        return view('policies.terms_of_service');
    }
}
