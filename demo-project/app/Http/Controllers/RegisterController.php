<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index(){
        //Método que carga la página principal
        return view('register');
    }

    public function create(){
        //crear registros
        return "aqui se crearia el registro"; 
    }
}
