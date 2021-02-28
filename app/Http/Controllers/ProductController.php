<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->paginate(5);
        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        if ($request->hasFile('image')) {
            $img = $request->file('image')->getClientOriginalName();
            $request->image->storeAs('public/images', $img);
            Product::create([
                'name' => $request->name,
                'description' => $request->description,
                'qty' => $request->qty,
                'first_price' => $request->first_price,
                'status' => 'closed',
                'image' => $img,
            ]);
            Alert::success('Sukses', 'Barang berhasil ditambahkan');
            return redirect('/product');
        } else {
            Alert::warning('Info', 'Harap tambahkan gambar barang!');
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        $product = Product::find($id);
        if ($request->hasFile('image')) {

            // Delete current image
            $productImage = str_replace('/storage', '', $product->image);
            Storage::delete('/public/images/' . $productImage);

            // Add new image to storage
            $img = $request->file('image')->getClientOriginalName();
            $request->image->storeAs('public/images', $img);
        } else {
            $img = $product->image;
        }
        Product::where('id', $id)->update([
            'name' => $request->name,
            'description' => $request->description,
            'qty' => $request->qty,
            'first_price' => $request->first_price,
            'image' => $img,
        ]);
        Alert::success('Sukses', 'Data barang ' . $product->name . ' berhasil diperbaharui');
        return redirect('/product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        Product::destroy($id);
        Alert::success('Sukses', 'Barang : ' . $product->name . ' berhasil dihapus');
        return back();
    }

    public function bidding($id)
    {
        Product::where('id', $id)->update(['status' => 'open']);
        Alert::success('Sukses', 'Barang berhasil ditawarkan!');
        return back();
    }
}
