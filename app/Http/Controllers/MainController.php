<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class MainController extends Controller
{
    public function jadwalkelas()
    {
        return view('website.jadwalkelas', [
            'nama' => 'Rifqi Aditya Rachman',
            'alamat' => 'Jl. Palapa Indah IV',
            'umur' => 17
        ]);
    }

    public function ajukanizin()
    {
        return view('website.ajukanizin');
    }

    public function kehadiran()
    {   
        return view('website.kehadiran');
    }
}
