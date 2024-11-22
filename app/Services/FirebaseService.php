<?php

namespace App\Services;

use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

class FirebaseService
{
    protected $firestore;

    public function __construct()
    {

        $firebase = (new Factory)
        ->withServiceAccount(storage_path(config('firebase.credentials')))
        ->withDatabaseUri(config('firebase.databaseUri')); // Substitua pela URL do seu projeto Firebase

        $this->firestore = $firebase->createFirestore();
        //$this->firestore = $firebase->createFirestore()->database();
    }

    public function getCollection($collection)
    {
        return $this->firestore->collection($collection);
    }

    // Aqui você pode adicionar outros métodos para trabalhar com documentos
}
