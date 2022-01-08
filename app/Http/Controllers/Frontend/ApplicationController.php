<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

class ApplicationController extends FrontendController
{

    public function index()
    {

        return view($this->pagePath . 'home');
    }

    public function productList()
    {

        return view($this->pagePath . 'product-list');
    }

    public function cart()
    {

        return view($this->pagePath . 'cart');
    }

    public function myAccount()
    {

        return view($this->pagePath . 'my-account');
    }

    public function contact()
    {

        return view($this->pagePath . 'contact');
    }

    public function login()
    {

        return view($this->pagePath . 'login');
    }
}
