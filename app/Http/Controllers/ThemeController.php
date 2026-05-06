<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ThemeController extends Controller
{
    public function toggle(Request $request): \Illuminate\Http\RedirectResponse
    {
        $newTheme = $request->cookie('theme') === 'dark' ? 'light' : 'dark';
        return back()->withCookie(cookie('theme', $newTheme, 525600));
    }
}
