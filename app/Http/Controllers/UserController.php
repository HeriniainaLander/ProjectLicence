<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        return response()->json($user );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User();

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->type = $request->input('type');

        if ($request->hasFile('avatar')) {
            $image_file = $request->file('avatar'); // get image file from input client
            $extension = $image_file->getClientOriginalExtension(); // getting image extension
            $image = time(). '.' . $extension; // Rename image file using time
            $image_file->move('uploads/utlilisateur/', $image); // copy image file to 'uploads/personnal/img.extension'
            $user->user_image = $image; // save image to database
        } else {
            return $request;
            $user->user_image = '';
        }

        $user->save();
        return response()->json($user);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('pages.offre.create');
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
        $user = User::findOrFail($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->type = $request->input('type');

        if ($request->hasFile('avatar')) {
            $image_file = $request->file('avatar'); // get image file from input client
            $extension = $image_file->getClientOriginalExtension(); // getting image extension
            $image = time(). '.' . $extension; // Rename image file using time
            $image_file->move('uploads/utilisateur/', $image); // copy image file to 'uploads/personnal/img.extension'
            $user->user_image = $image; // save image to database
        } else {
            return $request;
            $user->user_image = '';
        }
        $user->update();
        return response()->json($user); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
    }
}
