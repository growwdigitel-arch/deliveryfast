<?php

namespace Modules\Cargo\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class BkashController extends Controller
{
    public function index()
    {
        return view('cargo::index');
    }
}
