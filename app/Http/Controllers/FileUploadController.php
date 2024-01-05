<?php

namespace App\Http\Controllers;

use App\Http\Resources\FileResource;
use App\Models\FileUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yaza\LaravelGoogleDriveStorage\Gdrive;


class FileUploadController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function index()
    {
        $files = FileUpload::all();

        return view('files.index',[
            'files' => FileResource::collection($files)
        ]);
    }

    //Store file in google drive
    public function store(Request $request)
    {
        $location = 'abc/'.$request->file('image')->getClientOriginalName();
        Gdrive::put($location, $request->file('image'));
        return redirect()->route('file-uploads.index');
    }

    //Delete File from google drive
    public function destroy(Request $request)
    {
//        Gdrive::delete('path/filename.png');
        Gdrive::delete($request->path);
        return redirect()->route('file-uploads.index');
    }

  //Get File from google drive
    public function getAllFile(Request $request)
    {
        $files = Gdrive::all($request->directory);

        foreach ($files as $file){
            $data = Storage::disk('google')->get($file['extraMetadata']['display_path']);
            $filename = $file['extraMetadata']['filename'].'.'.$file['extraMetadata']['extension'];
            $filepath = "uploads/{$filename}";

            //Save image to storage
            Storage::disk('public')->put($filepath, $data);

            //Save Image path to Database
            FileUpload::create([
                'path' => $filepath
            ]);
        }

        return redirect()->route('file-uploads.index');
    }

    //Create Directory in google drive
    public function createDirectory(Request $request)
    {
        Gdrive::makeDir($request->directory);
        return redirect()->route('file-uploads.index');
    }

    //Create Directory in google drive
    public function renameDirectory(Request $request)
    {
//        Gdrive::renameDir('oldfolderpath', 'newfolder');
        Gdrive::renameDir('/', $request->directory );
        return redirect()->route('file-uploads.index');
    }

    //Delete Directory from google drive
    public function destroyDirectory(Request $request)
    {
        Gdrive::deleteDir($request->directory);
        return redirect()->route('file-uploads.index');
    }
}
