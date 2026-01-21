<?php

namespace App\Http\Controllers\Backend;

use App\Models\PmaForm;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;
use Image;

/**
 * Class DashboardController.
 */
class DashboardController
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('backend.dashboard');
    }

    public function pmaForms()
    {
        return view('backend.pma.index');
    }

    public function properties()
    {
        return view('backend.properties.index');
    }

    public function uploadEditorMedia(Request $request)
    {
        $uploads_folder = public_path().'/uploads';
        $uploads_url = asset('uploads');
        if (! File::exists($uploads_folder)) {
            File::makeDirectory($uploads_folder, 0755, true);
        }
        $fileName = time().'-'.$request->file('file')->getClientOriginalName();
        $media_file = Image::make($request->file('file')->path());
        $width = 1024;
        $height = 1024;
        $media_file->height() > $media_file->width() ? $width = null : $height = null;
        $media_file->resize($width, $height, function ($constraint) {
            $constraint->aspectRatio();
        })->save($uploads_folder.'/'.$fileName);

        return response()->json(['location' => $uploads_url."/$fileName"]);
    }
}
