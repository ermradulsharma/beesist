<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Modules\Property\Entities\Media;
use Illuminate\Support\Facades\File;


class UploadFileJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $file;
    protected $id;
    protected $type;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($file, $building_id, $type)
    {
        $this->file = $file;
        $this->id = $building_id;
        $this->type = $type;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $file = $this->file;
        $id = $this->id;
        $type = $this->type;

        // Your file upload logic here
        $allowedImageTypes = ['jpeg', 'png', 'jpg', 'gif', 'svg'];
        $allowedFileTypes = array_merge($allowedImageTypes, ['pdf']);
        $allowedTypes = ($type == 'building_photos') ? $allowedImageTypes : $allowedFileTypes;
        $fileExtension = strtolower($file->getClientOriginalExtension());
        if (!in_array($fileExtension, $allowedTypes)) {
            Log::warning('Unsupported file type uploaded: ' . $fileExtension);
            return;
        }

        $baseDir = public_path('uploads/buildings/' . $id . '/');
        if (!File::isDirectory($baseDir)) {
            File::makeDirectory($baseDir, 0777, true, true);
        }
        $typeDir = $baseDir . '/' . $type;
        if (!File::isDirectory($typeDir)) {
            File::makeDirectory($typeDir, 0777, true, true);
        }
        chmod($baseDir, 0777);
        $dirThumb = $typeDir . '/thumbs';
        $original = $typeDir . '/original';

        foreach ([$dirThumb, $original] as $directory) {
            if (!File::isDirectory($directory)) {
                File::makeDirectory($directory, 0777, true, true);
            }
        }

        $fileName = generateFileName($file);
        if ($fileExtension == 'pdf') {
            $fileName = generateFileName($file);
            if (!File::isDirectory($typeDir)) {
                File::makeDirectory($typeDir, 0777, true, true);
            }
            $file->move($typeDir, $fileName);
        } else {
            saveImage($file, $original, $fileName, 1600);
            saveImage($file, $baseDir, $fileName, 845);
            saveImage($file, $dirThumb, $fileName, 405, 304);
            saveImage($file, $dirThumb, generateFileName($file, true), 150, 150);
        }

        $haveFeatured = Media::where('ref_id', $id)->where('featured', '1')->first();
        $featured = $haveFeatured ? '' : '1';
        $attachArray = [
            'ref_id' => $id,
            'type' => $type,
            'url' => $fileName,
            'featured' => $featured,
        ];
        Media::create($attachArray);
    }
}
