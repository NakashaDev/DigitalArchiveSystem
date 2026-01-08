<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Pagination extends Component
{
    /**
     * Item counts per page
     */
    public $perPage = 0;

    /**
     * Current page no
     */
    public $curPage = 0;

    /**
     * Available item counts per page
     */
    public $perPageItems = [];

    /**
     * Max page no
     */
    public $totalPages = 0;

    /**
     * Navigate URL
     */
    public $url = '';

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($perPage, $curPage, $totalCount, $routeName)
    {
        $this->curPage = $curPage;
        $this->perPage = $perPage;
        $this->perPageItems = config('pagination.perPageItems');
        $this->totalPages = ceil($totalCount / $perPage);
        if ($totalCount < 1)
            $this->totalPages = 1;
        $this->url = route($routeName);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.pagination');
    }
}
