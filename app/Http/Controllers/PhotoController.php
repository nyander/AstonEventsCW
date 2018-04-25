<?php

namespace App\Http\Controllers;

use Image;
use App\Event;
use App\Photo;
use Illuminate\Http\Request;

class PhotoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Event $event)
    {
        // |image|mimes:jpeg,png,jpg,gif,svg
        $this->validate($request, [

            'photos' => 'required'
        ]);

        foreach($request->photos as $image) {

            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('./publc/photos/' . $filename);
            // width - height
            Image::make($image)->resize(640, 480)->save($location);

            $event->photos()->create([
                'path' => $filename,
            ]);

        }

        return back();

    }


    public function update(Request $request, Photo $photo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function deletes(Photo $image)
    {
        $photo->delete();

        return back()->with('flash', 'removed!');
    }
}
