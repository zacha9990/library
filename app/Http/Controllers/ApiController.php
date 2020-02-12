<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class ApiController extends Controller
{
    public function all(){
        $books = Book::all();

        return response()->json($books);
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_buku'    => 'required',
            'judul_buku'   => 'required',
            'tahun_terbit' => 'required',
            'penulis'      => 'required',
            'stok'         => 'required',
        ]);

        $book = Book::create($request->all());

        return response()->json([
            'message' => 'Great success! New task created',
            'book' => $book
        ]);
    }

    public function show($code)
    {
        $books = Book::whereKode_buku($code)->get();

        return response()->json($books);
    }

    public function update(Request $request, $code)
    {
        
        $request->validate([
            'kode_buku'    => 'required',
            'judul_buku'   => 'required',
            'tahun_terbit' => 'required',
            'penulis'      => 'required',
            'stok'         => 'required',
        ]);

        $book = Book::whereKode_buku($code);

        $book->update($request->all());


        return response()->json([
            'message' => 'Great success! Task updated',
            'book' => $book->get()
        ]);
    }

    public function destroy($code)
    {
        $book=Book::whereKode_buku($code);

        $book->delete();

        return response()->json([
            'message' => 'Successfully deleted task!'
        ]);
    }
}
