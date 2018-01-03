<?php

namespace App\Http\Controllers;

use App\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function addAboutInfo(){
        $abouts = About::all();
        return view('admin.about.edit-about', ['abouts'=>$abouts]);
    }
    public function updateAboutInfo(Request $request){
        $aboutImage = $request->file('about_image');
        if($aboutImage){
            $aboutById = About::find($request->about_id);
            unlink($aboutById->about_image);

            $aboutImage = $request->file('about_image');
            $imageName = $aboutImage->getClientOriginalName();
            $directory = "about-images/";
            $aboutImage->move($directory, $imageName);
            $imgUrl = $directory.$imageName;

            $aboutById->name = $request->name;
            $aboutById->email = $request->email;
            $aboutById->present_address = $request->present_address;
            $aboutById->permanent_address = $request->permanent_address;
            $aboutById->phone = $request->phone;
            $aboutById->nationality = $request->nationality;
            $aboutById->about_image = $imgUrl;
            $aboutById->save();
            return redirect('edit-about')->with('message', 'About Information Updated Successfully');
        }else{
            $aboutById = About::find($request->about_id);

            $aboutById->name = $request->name;
            $aboutById->email = $request->email;
            $aboutById->present_address = $request->present_address;
            $aboutById->permanent_address = $request->permanent_address;
            $aboutById->phone = $request->phone;
            $aboutById->nationality = $request->nationality;
            $aboutById->save();
            return redirect('add-about')->with('message', 'About Information Updated Successfully');

        }
    }
}
