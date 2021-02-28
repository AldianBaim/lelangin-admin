<?php

namespace App\Http\Controllers;

use App\Models\Officer;
use Illuminate\Http\Request;
use Alert;
use App\Http\Requests\OfficerRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class OfficerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $officers = Officer::where('role_id', 2)->paginate(5);
        return view('officer.index', compact('officers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('officer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OfficerRequest $request)
    {
        Officer::create([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => 2,
            'remember_token' => Str::random(10),
        ]);
        Alert::success('Sukses', 'Petugas berhasil ditambahkan');
        return redirect('/officer');
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
        $officer = Officer::find($id);
        return view('officer.edit', compact('officer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Officer $officer, Request $request)
    {
        Officer::where('id', $officer->id)->update([
            'name' => $request->name,
            'phone_number' => $request->phone_number
        ]);

        Alert::success('Sukses', 'Data petugas berhasil diupdate');
        return redirect('/officer');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Officer::where('id', $id)->delete();
        Alert::success('Sukses', 'Petugas berhasil dihapus');
        return back();
    }
}
