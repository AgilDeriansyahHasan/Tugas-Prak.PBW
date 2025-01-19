<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Http\Requests\StoreRequest;
use Illuminate\Http\Request;
use App\Enums\StoreStatus;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller 
{
    public function list()
    {
        $stores=store::query()
        ->latest()
        ->paginate(8);

        return view('stores.list',[
            'stores'=>$stores,
        ]);
    }

    public function approve(Store $store)
    {
        $store->status = StoreStatus::ACTIVE;
        $store->save();

        return back();
    }

    public function mine(Request $request)
    {
        $stores=store::query()
        ->where('user_id', $request->user()->id)
        ->latest()
        ->paginate(8);

        return view('stores.mine',[
            'stores'=>$stores,
        ]);            
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stores = Store::query()
        ->where('status', StoreStatus::ACTIVE)
        ->latest()
        ->get();
        return view('stores.index' ,[
            'stores'=>$stores,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('stores.form',[
            'store'=>new Store(),
            'page_meta'=>[
                'title'=>'Create Store',
                'description'=>'Create new store.',
                'method'=>'post',
                'url'=>route('stores.store'),
            ]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $file = $request->file('logo');

        $request->user()->stores()->create([
            ...$request->validated(),
            ...['logo'=>$file->store('image/stores')],
        ]);

        return to_route('stores.index');
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
    public function edit(Request $request, Store $store)
    {

        Gate::authorize('update',$store);
        abort_if($request->user()->isNot($store->user),401);
        return view('stores.form',[
            'store'=>$store,
            'page_meta'=>[
                'title'=>'Edit Store',
                'description'=>'Edit Store :' . $store->name,
                'method'=>'put',
                'url'=>route('stores.update', $store),
            ]

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Store $store)
    {
        if($request->hasFile('logo')){
            Storage::delete($store->logo);
            $file = $request->file('logo')->store('image/stores');
        }else{
            $file = $store->logo;
        }

        $store->update([
            'name'=>$request->name,
            'description'=>$request->description,
            'logo'=>$file,
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
