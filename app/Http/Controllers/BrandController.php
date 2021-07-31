<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Support\Carbon;
use Image;


class BrandController extends Controller
{
    //

    public function AllBrand(){

        $brands = Brand::latest()->paginate(5);


        return view("admin.brand.index", compact('brands'));
    }


    public function StoreBrand(Request $request){

        $request->validate([
            'brand_name' => 'required|unique:brands|min:3',
            'brand_image' => 'required|mimes:jpg,png,jpeg'
        ],
        [
            'brand_name.required' => 'Brand name is required',
            'brand_name.min' => 'Brand name must have more than 4 characters'

        ]
        );


        $brand_image = $request->file('brand_image');

        // $unique_name = hexdec(uniqid());

        // $image_extention = strtolower($brand_image->getClientOriginalExtension());

        // $image_name = $unique_name.'.'.$image_extention;

        // $location = 'image/brand/';

        // $image = $location.$image_name;

        // $brand_image->move($location, $image_name);
        $unique_name = hexdec(uniqid()).'.'.$brand_image->getClientOriginalExtension();
        Image::make($brand_image)->resize(300,200)->save('image/brand/'.$unique_name);
        $image = 'image/brand/'.$unique_name;

        Brand::insert([
            'brand_name' => $request->brand_name,
            'brand_image' => $image,
            'created_at' => Carbon::now(),
        ]);

        return Redirect()->back()->with('success','New brand inserted successfully');


    }

    public function Edit($id){

        $brand = Brand::find($id);

        return view('admin.brand.edit', compact('brand'));
    }

    public function Update(Request $request, $id){
        $request->validate([
            'brand_name' => 'required|min:3'
        ],
        [
            'brand_name.required' => 'Brand name is required',
            'brand_name.min' => 'Brand name must have more than 4 characters'

        ]
        );
        


        $brand_image = $request->file('brand_image');

        if($brand_image){

            $unique_name = hexdec(uniqid());

            $image_extention = strtolower($brand_image->getClientOriginalExtension());

            $image_name = $unique_name.'.'.$image_extention;

            $location = 'image/brand/';

            $image = $location.$image_name;

            $brand_image->move($location, $image_name);

            unlink(Brand::find($id)->brand_image);
            Brand::find($id)->update([
                'brand_name' => $request->brand_name,
                'brand_image' => $image,
                'created_at' => Carbon::now(),
            ]);

            return Redirect()->route('all.brand')->with('success','Brand Updated successfully');
        }
        else{

            Brand::find($id)->update([
                'brand_name' => $request->brand_name,
                'created_at' => Carbon::now(),
            ]);

            return Redirect()->route('all.brand')->with('success','Brand Updated successfully');

        }


    }

    public function Delete($id){

        unlink(Brand::find($id)->brand_image);

        Brand::find($id)->delete();

        return Redirect()->route('all.brand')->with('success','Brand Deleted successfully');

    }

    
}
