<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KatalogController extends Controller
{
    public function index()
    {
        // Data produk untuk katalog
        $produk = [
            [
                'id' => 1, 
                'nama' => 'Kopi Ende', 
                'katalog' => 'Minuman', 
                'harga' => 15000, 
                'stok' => 12
            ],
            [
                'id' => 2, 
                'nama' => 'Roti Coklat',
                'katalog' => 'Makanan', 
                'harga' => 8000, 
                'stok' => 0 
            ],
        ];

        // Mengirim data ke view katalog.index
        return view('katalog.index', compact('produk'));
    }
}