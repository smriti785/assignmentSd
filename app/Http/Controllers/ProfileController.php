<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pro= Profile::all();
        return view('profile.index',compact('pro'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profile.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $val =$request->validate([
            'title' => 'required|unique:profiles|max:255',
            'description' => 'required',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'email' => 'required|email|unique:profiles',
            'phone' => 'required|digits_between:10,10|numeric'
        ]);
        // dd($request);
         if($val == true)
        {
            if($request->hasfile('images')) {
                foreach($request->file('images') as $file) {
                    $filename = time() . '_' . $file->getClientOriginalName();
                    $file->storeAs('public/profile_images', $filename);
                    $path[] = $filename;
                }
            }
            $pro = new Profile();
            $pro->title= $request->title;
            $pro->description = $request->description;
            $pro->images = json_encode($path);
            $pro->email = $request->email;
            $pro->phone = $request->phone;
            $pro->save();
            return redirect()->route('profile.index')->with('success', 'Profile added successfully');
        }


    }
}
