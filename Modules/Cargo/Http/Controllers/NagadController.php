<?php

namespace Modules\Cargo\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class NagadController extends Controller
{
    public function verify()
    {
        return view('cargo::index');
    }
}
