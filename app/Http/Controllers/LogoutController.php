<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function index()
    {
        session()->flush();
        session()->put("successLogout", true);
        return redirect("/");
    }
}
