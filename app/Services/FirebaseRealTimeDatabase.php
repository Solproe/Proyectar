<?php

namespace App\Services;

use Kreait\Firebase\Factory;
use SebastianBergmann\GlobalState\Snapshot;

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

    public function getRequest($ref)
    {
        $this->reference = $this->database->getReference($ref);

        $this->data = $this->reference->getSnapshot();

        return $this->data;
    }
}