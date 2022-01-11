<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

class ApplicationController extends FrontendController
{

    public function index()
    {

        return view($this->pagePath . 'home', $this->data);
    }

    public function productList()
    {

        return view($this->pagePath . 'product-list', $this->data);
    }

    public function cart()
    {

        return view($this->pagePath . 'cart', $this->data);
    }

    public function myAccount()
    {

        return view($this->pagePath . 'my-account', $this->data);
    }

    public function contact()
    {

        return view($this->pagePath . 'contact', $this->data);
    }

    public function login()
    {

        return view($this->pagePath . 'login', $this->data);
    }
}
