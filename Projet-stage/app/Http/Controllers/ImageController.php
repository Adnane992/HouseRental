<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Maison;
use App\Models\Proprietaire;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('EspaceProprietaire.Ajouter');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'image_path' => 'required',
            'image_path.*' => 'mimes:jpeg,jpg,png,gif',
    ]);

    $user=auth()->user()->id;
    $prop=Proprietaire::where('id_user',$user)->first();
     $maison=Maison::create([
         'ville'=>$request->ville,
         'surface'=>$request->surface,
         'prix'=>$request->prix,
         'id_prop'=>$prop->id_prop,
     ]);
     //dd($maison);

    $images = [];
    if($request->hasfile('image_path'))
     {
        foreach($request->file('image_path') as $file)
        {
            $newImageName=time().'.'.$file->extension();
            $file->move(public_path('imageUpload'),$newImageName);
            Image::create([
                'id_maison'=>$maison->id_maison,
                'image_path'=>$newImageName,
            ]);
        }
     }

    return back()->with('success', 'Data Your files has been successfully added');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
