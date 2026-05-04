<?php

namespace App\View\Composers;

use App\Http\Resources\Section\SectionResource;
use App\Models\Author;
use App\Models\News;
use App\Models\Section;
use Illuminate\View\View;

class AdminComposer
{

    public function compose(View $view)
    {
        $newsCount = News::all()->count();
        $authorsCount = Author::all()->count();
        $sectionsCount = Section::all()->count();
        $latestSections = SectionResource::collection(Section::latest()->take(2)->get());
        $view->with('newsCount', $newsCount)
            ->with('authorsCount', $authorsCount)
            ->with('sectionsCount', $sectionsCount)
            ->with('latestSections', $latestSections);
    }

}
