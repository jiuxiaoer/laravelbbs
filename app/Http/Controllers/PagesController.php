<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * 自定义页面逻辑
 */
class PagesController extends Controller
{
    public function root()
    {
        return view('pages.root');
    }
}
