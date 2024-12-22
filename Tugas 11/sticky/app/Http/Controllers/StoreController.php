<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequest;
use Illuminate\Http\Request;
use App\Models\Store;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    // Mengambil data stores terbaru
    $stores = Store::latest()->get();

    // Mengirimkan data ke view
    return view('stores.index', compact('stores'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('stores.form',[
            'store'=> new store(),
            'page_meta'=>[
                'title'=>'Create store',
                'description'=>'Create Store:',
                'method'=>'post',
                'url'=>route('stores.create' ),
            ]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
{
    // Validasi data dari form
    $validatedData = $request->validated();

    // Simpan file logo dan dapatkan path
    $file = $request->file('logo');
    $logoPath = $file->store('image/stores');

    // Gabungkan data validasi dengan path logo
    $data = array_merge($validatedData, ['logo' => $logoPath]);

    // Buat store baru terkait dengan user yang sedang login
    $request->user()->stores()->create($data);

    // Redirect ke halaman index dengan pesan sukses
    return to_route('stores.index')->with('success', 'Store berhasil dibuat!');
}


    /**
     * Display the specified resource.
     */
    public function show(Store $store)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Store $store)
    {
        abort_if($request->user()->isNot($store->user),401);
        
        return view('stores.form',[
            'store'=>$store,
            'page_meta'=>[
                'title'=>'Edit store',
                'description'=>'Edit Store:'.$store->name,
                'method'=>'put',
                'url'=>route('stores.update', $store),
            ]
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreRequest $request, Store $store)
    {
        $store->update([
            'name'=>$request->name,
            'description'=>$request->description,

        ]);
        return to_route('stores.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Store $store)
    {
        //
    }
}
