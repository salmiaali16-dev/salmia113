<?php

namespace App\Http\Controllers;

use App\Models\BookLoan;
use App\Http\Requests\StoreBookLoanRequest;
use App\Services\BookLoanService;
use Illuminate\Http\Request;

class BookLoanController extends Controller
{
    protected $service;

    // Menghubungkan Controller dengan Service (Refactor Service)
    public function __construct(BookLoanService $service)
    {
        $this->service = $service;
    }

    // 1. Fungsi Tampilkan Semua Data
    public function index()
    {
        return response()->json(BookLoan::all());
    }

    // 2. Fungsi Tambah Data (Gunakan Validasi & Service Layer)
    public function store(StoreBookLoanRequest $request)
    {
        $result = $this->service->store($request->validated());
        return response()->json(['status' => true, 'data' => $result]);
    }

    // 3. Fungsi Ubah Data
    public function update(Request $request, $id)
    {
        $loan = BookLoan::findOrFail($id);
        $loan->update($request->all());
        return response()->json(['status' => true]);
    }

    // 4. Fungsi Hapus Data
    public function destroy($id)
    {
        BookLoan::destroy($id);
        return response()->json(['status' => true]);
    }
}