<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Carbon;
use Image;

class HomeController extends Controller
{
    //



    public function HomeSlider(){
        
        $sliders = Slider::latest()->get();


        return view('admin.slider.index', compact('sliders'));
    }

    public function AddSlider(){

        return view('admin.slider.create');

    }

    public function StoreSlider(Request $request){


        $request->validate([
            'title' => 'required',
            'image' => 'required'
        ],
        
        );


        $slider_image = $request->file('image');

        // $unique_name = hexdec(uniqid());

        // $image_extention = strtolower($brand_image->getClientOriginalExtension());

        // $image_name = $unique_name.'.'.$image_extention;

        // $location = 'image/brand/';

        // $image = $location.$image_name;

        // $brand_image->move($location, $image_name);
        $unique_name = hexdec(uniqid()).'.'.$slider_image->getClientOriginalExtension();
        Image::make($slider_image)->resize(1920,1088)->save('image/slider/'.$unique_name);
        $image = 'image/slider/'.$unique_name;

        Slider::insert([
            'title' => $request->title,
            'image' => $image,
            'description' => $request->description,
            'created_at' => Carbon::now(),
        ]);

        return Redirect()->route('home.slider')->with('success','New sldier inserted successfully');


    }
    

    public function Edit($id){
        $slider = Slider::find($id);

        return view('admin.slider.edit', compact('slider'));

    }


    public function Update(Request $request, $id){
        $request->validate([
            'title' => 'required',
            'description' => 'required'

        ],
        [
            'title.required' => 'You must enter title',
            'description.required' => 'You must enter description'
        ]

        );
        


        $slider_image = $request->file('image');

        if($slider_image){

            // $unique_name = hexdec(uniqid());

            // $image_extention = strtolower($brand_image->getClientOriginalExtension());

            // $image_name = $unique_name.'.'.$image_extention;

            // $location = 'image/brand/';

            // $image = $location.$image_name;

            // $brand_image->move($location, $image_name);
            $unique_name = hexdec(uniqid()).'.'.$slider_image->getClientOriginalExtension();
            Image::make($slider_image)->resize(1920,1088)->save('image/slider/'.$unique_name);
            $image = 'image/slider/'.$unique_name;
            
            if(file_exists(Slider::find($id)->image)){
                unlink(Slider::find($id)->image);
            }

            Slider::find($id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'image' => $image,
                'created_at' => Carbon::now(),
            ]);

            return Redirect()->route('home.slider')->with('success','Slider updated successfully');
        }
        else{

            Slider::find($id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'created_at' => Carbon::now(),
            ]);

            return Redirect()->route('home.slider')->with('success','Slider updated successfully');

        }


    }

    public function Delete($id){


        unlink(Slider::find($id)->image);

        Slider::find($id)->delete();

        return Redirect()->route('home.slider')->with('success','Slider deleted successfully');
    }
}


