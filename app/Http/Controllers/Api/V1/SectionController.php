<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSectionRequest;
use App\Http\Requests\UpdateSectionRequest;
use App\Http\Resources\Section\SectionResource;
use App\Models\Section;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return SectionResource::collection(Section::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSectionRequest $request)
    {
        $data = $request->validated();
        $image = $data['image'];
        unset($data['image']);
        if ($image) {
            $fileName = md5(Carbon::now()->timestamp . '_' . $image->getClientOriginalName()) . '.' . $image->getClientOriginalExtension();
            $data['image'] = Storage::url(Storage::disk('public')->putFileAs('/sections', $image, $fileName));
        }
        return Section::firstOrCreate(['title' => $data['title']], $data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Section $section)
    {
        return new SectionResource($section);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSectionRequest $request, Section $section)
    {
        $data = $request->validated();
        $image = $data['image'];
        unset($data['image']);
        if ($image) {
            Storage::disk('public')->delete(str_replace('/storage', '', $section->image));
            $fileName = md5(Carbon::now()->timestamp . '_' . $image->getClientOriginalName()) . '.' . $image->getClientOriginalExtension();
            $data['image'] = Storage::url(Storage::disk('public')->putFileAs('/sections', $image, $fileName));
        }
        return $section->update($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Section $section)
    {
        $section->delete();
        return null;
    }
}
