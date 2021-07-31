<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    public function index() {
        return ([
            'NIS'=> '3103119046',
            'Nama' => 'Charlie Armando Nainggolan',
            'Gender' => 'Pria',
            'Phone' => '085225401218',
            'Class' => 'XII RPL 2'
        ]);
 }
}
