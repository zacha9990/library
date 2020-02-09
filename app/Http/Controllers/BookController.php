<?php

namespace App\Http\Controllers;

use App\Book;
use Auth;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('books.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(),[
            'kode_buku'    => 'required',
            'judul_buku'   => 'required',
            'tahun_terbit' => 'required',
            'penulis'      => 'required',
            'stok'         => 'required',
         ]);

        $book = new Book;

        $book->kode_buku    = $request->kode_buku;
        $book->judul_buku   = $request->judul_buku;
        $book->tahun_terbit = $request->tahun_terbit;
        $book->penulis      = $request->penulis;
        $book->stok         = $request->stok;

        $book->save();

        return redirect()->route('books.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        echo "show";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        $data['book']        = $book;

        return view('books.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        
        $this->validate(request(),[
            'kode_buku'    => 'required',
            'judul_buku'   => 'required',
            'tahun_terbit' => 'required',
            'penulis'      => 'required',
            'stok'         => 'required',
         ]);


        $book->kode_buku    = $request->kode_buku;
        $book->judul_buku   = $request->judul_buku;
        $book->tahun_terbit = $request->tahun_terbit;
        $book->penulis      = $request->penulis;
        $book->stok         = $request->stok;

        $book->save();

        return redirect()->route('books.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        echo "haha";
    }

    public function deleteBook(Book $book)
    {
        Book::whereId($book->id)->delete();

        return redirect()->route('books.index');
    }

    public function anyData()
    {
        $books = Book::select(['id','kode_buku','judul_buku','tahun_terbit','penulis']);

        if (Auth::guard('admin')->check()):
            return Datatables::of(Book::query())
            ->addColumn('action', function ($user) {
                return '<a href="books/'.$user->id.'/edit" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a> <a href="'.route('bookss.delete', $user->id).'" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
            })
            ->make(true);
        else:
            return Datatables::of(Book::query())
            ->addColumn('action', function ($user) {
                return '<a href="#" class="btn btn-xs btn-default"><i class="glyphicon glyphicon-default"></i>Pinjam</a>';
            })
            ->make(true);
        endif;

        
    }
}
