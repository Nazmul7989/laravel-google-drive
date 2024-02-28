<?php

namespace App\Http\Controllers;

use Google\Client;
use Google_Service_Drive;
use Google_Service_Drive_Permission;
use Illuminate\Http\Request;


class DrivePermissionController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // Replace with your folder ID and user email address
        $folderId = '1CNtuMPBK-X8A3gVyMICmzdZkJNOrQQOn';
        $userEmail = 'test@example.com';

        // Set up Google Client
        $client = new Client();
        $client->setClientId(config('filesystems.disks.google.clientId'));
        $client->setClientSecret(config('filesystems.disks.google.clientSecret'));
        $client->refreshToken(config('filesystems.disks.google.refreshToken'));

        // Create Drive service
        $service = new Google_Service_Drive($client);

        // Create permission object
        $permission = new Google_Service_Drive_Permission();
        $permission->setType('user');
        $permission->setEmailAddress($userEmail);
        $permission->setRole('reader'); // Adjust role as needed (e.g., 'commenter', 'editor')

        // Insert permission
        try {
            $service->permissions->create($folderId, $permission);
            echo 'Permission granted successfully.';
        } catch (\Exception $e) {
            echo 'An error occurred: ' . $e->getMessage();
        }

    }
}
