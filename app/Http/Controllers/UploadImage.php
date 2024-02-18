<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Traits\UploadTrait;
use Illuminate\Http\Request;

class UploadImage extends Controller
{
    use UploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('upload');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        /* $image= $request->file('photo')->getClientOriginalName();
        $path= $request->file('photo')->storeAs('users',$image,'mohammad');
        return $image; */
        $path= $this->uploadImage($request,'Admins');
        Image::create([
            'path'=>$path,
        ]);
        return 'image uploaded successfully';
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $images= Image::all();
        return view('show',compact('images'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
