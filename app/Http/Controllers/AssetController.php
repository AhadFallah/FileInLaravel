<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;


class AssetController extends Controller
{
    public function __invoke($file){
        // if user  has a right role
        abort_if(auth()->guest(),Response::HTTP_FORBIDDEN);
        //  grap the file from storage
        $path="secret/$file";
        //return 404 if not exists
        abort_unless(Storage::exists($path), Response::HTTP_NOT_FOUND);
        //  return file
        return  response()->file(
            Storage::path($path)
        );
}
}
