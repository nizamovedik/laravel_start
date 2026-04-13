<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $news = News::all()->find(10)->get();
        foreach ($news as $one) {
            echo 'Название : ' . $one->title . '<br>';
            echo 'Контент : ' . $one->content . '<br>';
            echo 'Автор : ' . $one->author['name'] . ' ' . $one->author['surname'] . '<br>';
            echo 'Теги : ';

            foreach ($one->sections as $section) {
                echo $section->title . ',';
            }
            echo '<hr>';
        }
    }
}
