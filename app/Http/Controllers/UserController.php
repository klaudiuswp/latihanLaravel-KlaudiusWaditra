<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function searchUser(Request $request) {
        $user = $request->query('name');
        $email = $request->query('email');

        $response = response()->json([
            "nama" => $user,
            "email" => $email,
            "datalain" => [
                "halo" => "jalan",
                "halo" => "jalan"
            ]
        ]);
        
        return $response;
    }
    public function findUser($id) {
        $response = "$id masuk";
        
        return $response;
    }
}
