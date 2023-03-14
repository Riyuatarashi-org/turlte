<?php

declare(strict_types = 1);

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\View as FacadeView;
use Illuminate\View\Component;

final class AppLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        return FacadeView::make('layouts.app');
    }
}
