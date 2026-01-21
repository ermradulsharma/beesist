<?php

namespace Modules\Cms\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use Modules\Cms\Entities\Page;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            return view('cms::pages.index');
        } catch (\Exception $e) {
            Log::error("Error occurred: " . $e->getMessage() . " at line: " . $e->getLine());
            abort(500); // Change status code to 500 for server error
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cms::pages.create')->withPage(new Page());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Page::create($request->all());

        return redirect()->route('admin.cms.page.index')->withFlashSuccess(__('The page was successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        return view('cms::pages.create')->withPage($page);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page)
    {
        $page->update($request->all());

        return redirect()->route('admin.cms.page.index')->withFlashSuccess(__('The page was successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        //
    }

    public function singlePage($slug)
    {
        $page = Page::where(['slug' => $slug, 'is_active' => 1])->first();
        $shortcodes = [
            'form_builder' => function ($data) {
                $content = '';
                //Calculate the age
                if (isset($data['id'])) {
                    $content = \Modules\FormBuilder\Entities\Helper::formShortcode($data['id']);
                }

                return $content;
            },
        ];
        $page->content = handleShortcodes($page->content, $shortcodes);
        if ($page) {
            return view('cms::pages.singlePage', compact('page'));
        } else {
            return abort(404);
        }
    }
}
