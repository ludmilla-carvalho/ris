<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Agenda;
use App\Models\Contact;

class PageController extends Controller
{
    public function home()
    {
        $banners = Agenda::where('destaque', 1)->get();
        $pages = Page::orderBy('order')->get();
        $page = Page::find(1);
        return view('site.home', compact('pages', 'page', 'banners'));
    }

    public function sobre()
    {
        $pages = Page::get();
        $page = Page::find(2);
        return view('site.sobre', compact('pages', 'page'));
    }

    public function lineUp()
    {
        $pages = Page::get();
        $page = Page::find(5);
        return view('site.line-up', compact('pages', 'page'));
    }

    public function programacaoAdulto()
    {
        $pages = Page::get();
        $page = Page::find(3);
        return view('site.programacao-adulto', compact('pages', 'page'));
    }

    public function programacaoInfantil()
    {
        $pages = Page::get();
        $page = Page::find(6);
        return view('site.programacao-infantil', compact('pages', 'page'));
    }

    public function contato()
    {
        $pages = Page::get();
        $page = Page::find(4);
        $contact = Contact::find(1);
        return view('site.contato', compact('pages', 'page', 'contact'));
    }
}
