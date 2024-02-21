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

if (!function_exists('handlePostImgPath')) {
    function handlePostImgPath(string $imgPath)
    {
        if (str_contains($imgPath, 'blog-img')) {
            return asset('storage/' . $imgPath);
        } else {
            return $imgPath;
        }
    }
}

if (!function_exists('customUnlinkFile')) {
    function customUnlinkFile($filePath)
    {
        $relativePath = 'storage/' . $filePath;
        if (file_exists($relativePath)) {
            unlink($relativePath);
        }
    }
}



