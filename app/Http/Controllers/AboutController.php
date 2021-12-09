<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HomeAbout;
use Illuminate\Support\Carbon;


class AboutController extends Controller
{
    //
    public function AllAbout(){

        $abouts = HomeAbout::latest()->get();

        return view('admin.about.index', compact('abouts'));

    }

    public function AddAbout(){

        return view('admin.about.create');

    }

    public function StoreAbout(Request $request){

       
        $request->validate([

            'title' => 'required|min:4',
            'short_description' => 'required',
            'description' => 'required',
        ],
        [
            'title.min' => 'Too low character for title'
        ]);

        HomeAbout::insert(
            [
                'title' => $request->title,
                'short_description' => $request->short_description,
                'description' => $request->description,
                'created_at' => Carbon::now(),
            ]
        );

        $notification = array(
            'message' => 'About added successfully',
            'alert-type' => 'success'
        );


        return redirect()->route('home.about')->with($notification);

    }

    public function Edit($id){

        $about = HomeAbout::find($id);

        return view('admin.about.edit', compact('about'));
        
    }


    public function Update(Request $request, $id){

        $request->validate(
            [
                'title' => 'required',
                'short_description' => 'required',
                'description' => 'required',
            ]
        );


        HomeAbout::find($id)->update([
            'title' => $request->title,
            'short_description' => $request->short_description,
            'description' => $request->description,
        ]);

        $notification = array(
            'message' => 'About updated successfully',
            'alert-type' => 'success'
        );

        return Redirect()->route('home.about')->with($notification);

    }

    public function Delete($id){

        HomeAbout::find($id)->delete();
        return Redirect()->route('home.about')->with('success','About Deleted successfully');
    }
}
