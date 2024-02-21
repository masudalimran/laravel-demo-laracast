<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

if (!function_exists('uploadToLocal')) {
    function uploadToLocal(string $path, mixed $file)
    {
        return Storage::disk('local')->putFileAs('local/' . $path, $file, generateFileName($file->getClientOriginalName()));
    }
}

if (!function_exists('uploadToPublic')) {
    function uploadToPublic(string $path, $file)
    {
        return $file->storeAs($path, generateFileName($file->getClientOriginalName()));
    }
}


if (!function_exists('generateFileName')) {
    function generateFileName(string $originalName)
    {
        $fileNameArr = explode('.', $originalName);
        $ext = array_pop($fileNameArr);
        $fileName = array_shift($fileNameArr);
        $dateSuffix = Carbon::now()->toDateTimeString();
        $invalidCharRegex = '/[\\\\?%*:|"<>\s&]/';
        $generatedFileName = strtolower(preg_replace($invalidCharRegex, '_', $fileName . '-' . $dateSuffix) . '.' . $ext);
        return $generatedFileName;
    }
}



