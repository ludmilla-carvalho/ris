<?php

namespace App\Http\Controllers\Site;

use App\Models\Page;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $pages = Page::get();
        $page = Page::find(1);

        //var_dump($page);exit;

        return view('site.home', compact('pages', 'page'));
    }
}
