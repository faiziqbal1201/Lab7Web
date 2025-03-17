<?php
namespace App\Controllers;

use App\Models\ArtikelModel;

class Home extends BaseController
{
    public function index()
    {
        $artikelModel = new ArtikelModel();
        $data = [
            'title' => 'Halaman Home',
            'content' => 'Ini adalah halaman home yang menjelaskan tentang isi halaman ini.',
            'artikel' => $artikelModel->findAll() // Menyediakan data artikel ke view
        ];
        return view('home', $data);
    }
}