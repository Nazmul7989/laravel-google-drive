<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $path = storage_path('app/public/google/client_secret_797725516027-ej9hkcm113k73rc2ktgbpcg4mtkhe2mo.apps.googleusercontent.com.json');

        dd($path);

    }
}
