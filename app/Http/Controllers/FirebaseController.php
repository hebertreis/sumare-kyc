<?php

namespace App\Http\Controllers;

use App\Services\FirebaseService;
use Illuminate\Http\Request;

class FirebaseController extends Controller
{
    protected $firebase;

    public function __construct(FirebaseService $firebase)
    {
        $this->firebase = $firebase;
    }

    public function index()
    {
        $users = $this->firebase->getCollection('receivers')->documents();

        foreach ($users as $user) {
            echo '<pre>'. json_encode($user) .'</pre>';
        }
    }

    public function store(Request $request)
    {
        $this->firebase->getCollection('users')->add([
            'name' => $request->name,
            'email' => $request->email
        ]);

        return 'User added successfully';
    }
}
