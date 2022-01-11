<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public $frontendPath = 'frontend.';
    public $pagePath = '';

    public function __construct()
    {
        $this->date('categoryData', Category::where('parent_id', '=', 0)->get());
        $this->pagePath = $this->frontendPath . 'pages.';
    }
}
