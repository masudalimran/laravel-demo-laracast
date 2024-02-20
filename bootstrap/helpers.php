<?php

if (!function_exists('uploadToLocal')) {
    function uploadToLocal(string $path, $content)
    {
        return Storage::disk('local')->put('local/' . $path, $content);
    }
}
