<?php

namespace App\Services;

require '../vendor/autoload.php';

use Kreait\Firebase\Database;
use Kreait\Firebase\Factory;

class FirebaseService
{
    public $firebase;

    public $db;

    public $messaging;

    public function __construct()
    {
        $this->firebase = (new Factory)
            ->withServiceAccount('../key/solproyectar-6f96d-firebase-adminsdk-n64ov-99c49e1e43.json');

        

        $this->messaging = $this->firebase->createMessaging();
    }

    public function getData($ref)
    {
        $this->firebase->withDatabaseUri(config('services.tugps24.db.solproe-solproyectar'));

        $this->db = $this->firebase->createDatabase();

        $ref = $this->db->getReference('requests');

        $ref->on('value', function(){
            dd('hello bitches!!');
        });

        $data = $ref->getSnapshot();

        dd($data);

        return $data;

    }
}
