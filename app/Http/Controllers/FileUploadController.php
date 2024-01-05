<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class FileUploadController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function index()
    {
        return view('files.index');
    }

    //Store file in google drive
    public function store()
    {

    }

    //Delete File from google drive
    public function destroy()
    {

    }

    //Create Directory in google drive
    public function createDirectory()
    {

    }

    //Delete Directory from google drive
    public function destroyDirectory()
    {

    }
}
