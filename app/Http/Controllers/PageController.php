<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    function page($name, $address)
    {
        /* return view('page/home', [
            'name' => $name,
            'address' => $address
        ]); */
        return view('page.home', compact( 'name', 'address' ));
    }
}
