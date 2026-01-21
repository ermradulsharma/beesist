<?php

if (!function_exists('includeFilesInFolder')) {
    /**
     * Loops through a folder and requires all PHP files
     * Searches sub-directories as well.
     *
     * @param string $folder The folder path to search for PHP files.
     */
    function includeFilesInFolder($folder)
    {
        try {
            $rdi = new RecursiveDirectoryIterator($folder, RecursiveDirectoryIterator::SKIP_DOTS);
            $it = new RecursiveIteratorIterator($rdi);

            foreach ($it as $file) {
                if ($file->isFile() && $file->isReadable() && $file->getExtension() === 'php') {
                    require_once $file->getPathname();
                }
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}

if (!function_exists('includeRouteFiles')) {
    function includeRouteFiles($folder)
    {
        if (function_exists('includeFilesInFolder')) {
            includeFilesInFolder($folder);
        } else {
            echo "Function 'includeFilesInFolder' does not exist.";
        }
    }
}
