<?php

namespace App\Services;

use App\Http\Middleware\data;
use Kreait\Firebase\Database\Snapshot as DatabaseSnapshot;
use Kreait\Firebase\Factory;

require '../vendor/autoload.php';


class FirebaseRealTimeDatabase
{
    public $firebase;

    public $database;

    public $reference;

    public $data;

    public function __construct(Factory $firebase, $databaseName)
    {
        $this->firebase = $firebase->withDatabaseUri($databaseName);

        $this->database = $this->firebase->createDatabase();
    }

    public function getRequest($ref): DatabaseSnapshot
    {
        $this->reference = $this->database->getReference($ref);

        $this->data = $this->reference->getSnapshot();

        return $this->data;
    }

    public function saveRequest($ref, $data)
    {
        $this->reference = $this->database->getReference($ref);
        $this->reference->getChild($data['plate'])->set($data);
    }
}
