<?php

namespace App\Http\Controllers\Admin\News;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke(Request $request)
    {
        $news = News::paginate(5);
        if ($request->ajax()) {
            return view('admin.news.index', compact('news'))->render();
        }
        return view('admin.news.index', compact('news'));
    }
}
