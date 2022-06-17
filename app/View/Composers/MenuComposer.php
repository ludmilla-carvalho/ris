<?php

namespace App\View\Composers;

use App\Models\Page;
use Illuminate\View\View;

class MenuComposer
{
    /**
     * The page model implementation.
     *
     * @var App\Models\Page;
     */
    protected $pages;

    /**
     * Create a new profile composer.
     *
     * @param  \App\Models\Page  $pages
     * @return void
     */
    public function __construct(Page $pages)
    {
        // Dependencies are automatically resolved by the service container...
        $this->pages = $pages;
    }

    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('pages_menu', $this->pages->orderBy('order', 'asc')->get());
    }
}