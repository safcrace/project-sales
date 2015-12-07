<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\FlyerRequest;
use App\Http\Controllers\Controller;
use App\Flyer;
use App\Photo;

class FlyersController extends Controller
{
    public function __construct () {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('flyers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(FlyerRequest $request)
    {
        Flyer::create($request->all());

        //flash('Success', 'Your Flyers has been created.');
        flash()->success('Success!', 'Your Flyers has been created.');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */


    public function show($zip, $street)
    {
        $flyer = Flyer::locatedAt($zip,$street);
        //dd($flyer->photos);
        return view('flyers.show', compact('flyer'));
    }


    /**
     * Apply a photo to the referenced flyer.
     * @method addPhoto
     * @param  [type]   $zip     [description]
     * @param  [type]   $street  [description]
     * @param  Request  $request [description]
     */
    public function addPhoto ($zip, $street, Request $request)
    {
        $this->validate($request, [
            'photo' => 'required|mimes:jpg,jpeg,png,bmp'
        ]);

        $photo = Photo::fromForm($request->file('photo'));
        Flyer::locatedAt($zip,$street)->addPhoto($photo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
