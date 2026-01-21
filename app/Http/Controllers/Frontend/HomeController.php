<?php

namespace App\Http\Controllers\Frontend;

use App\Domains\Auth\Services\UserService;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Image;

/**
 * Class HomeController.
 */
class HomeController
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    protected function createUser(array $data)
    {
        return $this->userService->registerUser($data);
    }

    public function saveSign(Request $request)
    {
        $file = base64_encode($request->input('jsonbucket'));

        return base64_decode($file);
    }

    public function index()
    {
        return view('frontend.pages.index');
    }

    public function about()
    {
        return view('frontend.pages.about');
    }

    public function solution()
    {
        return view('frontend.pages.solution');
    }

    public function resources()
    {
        return view('frontend.pages.resources');
    }

    public function contact()
    {
        return view('frontend.pages.contact');
    }

    public function singlePage($slug)
    {
        $page = Page::where(['slug' => $slug, 'is_active' => 1])->first();
        if ($page) {
            return view('frontend.pages.singlePage', compact('page'));
        } else {
            return abort(404);
        }
    }

    public function uploadEditorMedia(Request $request)
    {
        $uploads_folder = public_path() . '/uploads';
        $uploads_url = asset('uploads');
        if (! File::exists($uploads_folder)) {
            File::makeDirectory($uploads_folder, 0755, true);
        }
        $fileName = $request->file('file')->getClientOriginalName();
        $media_file = Image::make($request->file('file')->path());
        if ($media_file->width() > 1024) {
            $width = 1024;
            $height = 1024;
            $media_file->height() > $media_file->width() ? $width = null : $height = null;
            $media_file->resize($width, $height, function ($constraint) {
                $constraint->aspectRatio();
            })->save($uploads_folder . '/' . $fileName);
        } else {
            $media_file->save($uploads_folder . '/' . $fileName);
        }

        return response()->json(['location' => "/uploads/$fileName"]);
    }
}
