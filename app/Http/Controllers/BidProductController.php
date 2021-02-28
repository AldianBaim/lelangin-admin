<?php

namespace App\Http\Controllers;

use App\Http\Requests\BidRequest;
use App\Models\BidMaster;
use App\Models\Product;
use Illuminate\Http\Request;
use Alert;

class BidProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bids = BidMaster::latest()->paginate(5);
        return view('bid-product.index', compact('bids'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::latest()->get();
        return view('bid-product.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BidRequest $request)
    {
        BidMaster::create([
            'product_id' => $request->product_id,
            'title' => $request->title,
            'city' => $request->city,
            'date_start' => $request->date_start,
            'date_end' => $request->date_end,
            'status' => 'open',
        ]);

        Alert::success('Sukses', 'Barang berhasil dilelang');
        return redirect('/bidProduct');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bid = BidMaster::find($id);
        return view('bid-product.show', compact('bid'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bid = BidMaster::find($id);
        $products = Product::latest()->get();
        return view('bid-product.edit', compact('bid', 'products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BidRequest $request, $id)
    {
        BidMaster::where('id', $id)->update([
            'product_id' => $request->product_id,
            'title' => $request->title,
            'city' => $request->city,
            'date_start' => $request->date_start,
            'date_end' => $request->date_end,
            'status' => 'open',
        ]);

        Alert::success('Sukses', 'Lelang berhasil di update');
        return redirect('/bidProduct');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
