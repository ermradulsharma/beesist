<?php

namespace App\Providers;

use Exception;
use Illuminate\Support\ServiceProvider;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;

/**
 * Class HelperServiceProvider.
 */
class HelperServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     */
    public function boot()
    {
        try {
            $helpersDirectory = app_path('Helpers' . DIRECTORY_SEPARATOR . 'Global');
            $rdi = new RecursiveDirectoryIterator($helpersDirectory, RecursiveDirectoryIterator::SKIP_DOTS);
            $it = new RecursiveIteratorIterator($rdi);

            foreach ($it as $file) {
                if ($file->isFile() && $file->isReadable() && $file->getExtension() === 'php' && strpos($file->getFilename(), 'Helper') !== false) {
                    require_once $file->getPathname();
                }
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
