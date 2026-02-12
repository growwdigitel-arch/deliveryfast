<?php

namespace Modules\Cargo\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class BusinessSettingsController extends Controller
{
    public function google_recaptcha()
    {
        return view('cargo::index');
    }
    
    public function google_map_update()
    {
        return redirect()->back();
    }

    public function smtp_settings()
    {
         return view('cargo::index');
    }

    public function env_key_update()
    {
        return redirect()->back();
    }

    public function payment_method()
    {
         return view('cargo::index');
    }

    public function payment_method_update()
    {
        return redirect()->back();
    }

    public function social_login()
    {
         return view('cargo::index');
    }

    public function sms_gateways()
    {
         return view('cargo::index');
    }
}
