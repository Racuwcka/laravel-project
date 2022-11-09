<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __invoke()
    {
        $this->authorize('view', auth()->user());
        return view('admin.index');
    }
}
