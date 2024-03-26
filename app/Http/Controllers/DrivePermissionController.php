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
    public function store(Request $request)
    {
        // Replace with your folder ID and user email address
//        $folderId = '1CNtuMPBK-X8A3gVyMICmzdZkJNOrQQOn';
        $folderId = '125K-aB1keDcVTNXfTFHwaHLgB3bqM2Ek';
        $userEmail = 'abul@gmail.com';

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
        $permission->setRole('commenter'); // Adjust role as needed (e.g., 'reader' 'commenter', 'writer','fileOrganizer','organizer','owner')

        // Insert permission
        try {
            $res = $service->permissions->create($folderId, $permission,);
            dd($res);
            echo 'Permission granted successfully.';
        } catch (\Exception $e) {
            echo 'An error occurred: ' . $e->getMessage();
        }

    }

    public function destroy()
    {
        $folderId = '125K-aB1keDcVTNXfTFHwaHLgB3bqM2Ek';
        $userEmail = 'example@gmail.com';
        $permission_id = '10254638694410646758i';
        //10254638694410646758i

        // Set up Google Client
        $client = new Client();
        $client->setClientId(config('filesystems.disks.google.clientId'));
        $client->setClientSecret(config('filesystems.disks.google.clientSecret'));
        $client->refreshToken(config('filesystems.disks.google.refreshToken'));

        // Create Drive service
        $service = new Google_Service_Drive($client);

        $permissions = $service->permissions->listPermissions($folderId);

        foreach ($permissions->getPermissions() as $permission) {
            if ($permission->getId() == $permission_id) {
//                $service->permissions->delete($folderId, $permission->getId());
                return 'Permission deleted successfully'. $permission->getId();
            }else{
                return 'This Permission ID does not found: ' . $permission->getId();
            }
        }


    }
}
