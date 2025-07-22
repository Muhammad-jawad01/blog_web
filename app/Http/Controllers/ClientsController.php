<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */ 
    public function index()
    {
    //  dd("hello");
        $clients= Client::all();
        return view('admin.client.index',compact('clients'));

    }
  
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
          return view('admin.client.create' ,compact('clients'));
    } 
    

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //       return view('admin.client.store');
    // } 
    

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        return view('admin.client.show',compact('clients'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        return view('admin.client.edit',compact('clients'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        //
    }
}
