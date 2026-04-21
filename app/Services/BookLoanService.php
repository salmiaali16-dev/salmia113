<?php

namespace App\Services;

use App\Models\BookLoan;

class BookLoanService
{
    /**
     * Fungsi untuk menyimpan data peminjaman buku
     * Menggunakan Try-Catch untuk Error Handling
     */
    public function store($data)
    {
        try {
            // Menggunakan Eloquent ORM untuk menyimpan data
            return BookLoan::create($data);
        } catch (\Exception $e) {
            // Menangkap error jika terjadi kesalahan pada database
            throw $e;
        }
    }
}