<?php

namespace App\Http\Controllers;
use Cart;
use App\Borrow;
use App\Borrow_detail;
use App\Book;
use Auth;
use Illuminate\Http\Request;

class BorrowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addToCart(Book $book){
        $id        = time();
        $name      = $book->judul_buku;
        $price     = 0;
        $qty       = 1;
        $attribute = array(
            'kode_buku'    => $book->kode_buku,
            'judul_buku'   => $book->judul_buku,
            'book_id'      => $book->id,
            'tahun_terbit' => $book->tahun_terbit,
            'penulis'      => $book->penulis,
        );

        Cart::add($id, $name, $price, $qty, $attribute);

        return back();
    }

    public function clearCart($segment){
        Cart::clear();
        if ($segment == 'checkout'){
            return redirect()->route('books.index');
        }else{
            return back();
        }
    }

    public function clearCartItem($id){
        $count = Cart::getContent()->count();
        Cart::remove($id);

        if ($count > 1){
            return redirect()->route('checkout.page');
        }else{
            return redirect()->route('books.index');
        }

        
    }

    public function showCheckOut(){
        $cart = Cart::getContent();

        // dd($cart);

        $data['carts']       = $cart;
        $data['carts_count'] = $cart->count();

        return view('borrows.checkout', $data);
    }

    public function index()
    {
        if(Auth::guard('admin')->check()){
            $borrows = Borrow::all();
        }else{
            $user_id = Auth::guard('member')->user()->id;
            $borrows = Borrow::whereUser_id($user_id)->get();
        }

        $data['borrows'] = $borrows;

        return view('borrows.index', $data);
    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $carts = Cart::getContent();


        $borrow = new Borrow(); 


        $borrow->user_id     = $request->id;
        $borrow->tgl_pinjam  = $request->start_date;
        $borrow->tgl_kembali = $request->end_date;
        $borrow->status      = 'pengajuan pinjaman';

        $borrow->save();

        $inserted_id = $borrow->id;

        foreach ($carts as $cart) {
            $detail = new Borrow_detail();

            $detail->borrow_id = $inserted_id;
            $detail->book_id   = $cart->attributes->book_id;

            $detail->save();
        }

        Cart::clear();

        return redirect()->route('books.index');
        // return redirect()->route('borrows.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Borrow  $borrow
     * @return \Illuminate\Http\Response
     */
    public function show(Borrow $borrow)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Borrow  $borrow
     * @return \Illuminate\Http\Response
     */
    public function edit(Borrow $borrow)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Borrow  $borrow
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Borrow $borrow)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Borrow  $borrow
     * @return \Illuminate\Http\Response
     */
    public function destroy(Borrow $borrow)
    {
        //
    }
}
