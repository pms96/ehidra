<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;

class StorageFileController extends Controller
{
    public function getPubliclyStorgeFile($filename)

    {
        $path = storage_path('app/public/image/'. $filename);

        if (!File::exists($path)) {
            abort(404);
        }

        $file = File::get($path);
        $type = File::mimeType($path);

        $response = Response::make($file, 200);

        $response->header("Content-Type", $type);

        return $response;

    }
}
