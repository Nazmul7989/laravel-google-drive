<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Google\Client as GoogleClient;

class FileUploadController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $credential = storage_path('app/public/google/client_secret_797725516027-ej9hkcm113k73rc2ktgbpcg4mtkhe2mo.apps.googleusercontent.com.json');
        $client = new GoogleClient();
        $client->setAuthConfig($credential); // Path to your downloaded credentials
//        $client->setAccessType('offline');
        $client->setAccessToken('1//04D1JEBOETZFeCgYIARAAGAQSNwF-L9IroT7Y2jQCSFzD-XGtCyjl0Z7Dygi_zvf-6sD-KdBOLW65N-ESkb5ktuDGwkLj8cU6i60'); // You'll need to obtain this token


        // Create Google Drive service
        $service = new \Google_Service_Drive($client);

        $fileId = '1wY1CNTJPAuIpLBDHcwtmqWegMzxowJSEBxRvi-weopY';

        // Download image
        $response = $service->files->get($fileId, ['alt' => 'media']);

        // Save the image locally
        $imagePath = storage_path("app/public/images/{$fileId}.jpg");
        file_put_contents($imagePath, $response->getBody()->getContents());

        return $imagePath;

    }
}
