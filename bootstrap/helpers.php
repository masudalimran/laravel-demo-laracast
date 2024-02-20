<?php

// if (!function_exists('uploadToLocal')) {
function uploadToLocal(string $path, string $content)
{
    return Storage::disk('local')->put($path, $content);
}
// }
