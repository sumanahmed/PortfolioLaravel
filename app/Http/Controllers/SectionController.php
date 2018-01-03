<?php

namespace App\Http\Controllers;

use App\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function addSectionInfo(){
        $sections = Section::all();
        return view('admin.section.edit-section',['sections'=>$sections]);
    }
    public function updateSectionInfo(Request $request){
        $sectionById = Section::find($request->section_id);
        $sectionById->about_title = $request->about_title;
        $sectionById->about_description = $request->about_description;
        $sectionById->skill_title = $request->skill_title;
        $sectionById->skill_description = $request->skill_description;
        $sectionById->portfolio_title = $request->portfolio_title;
        $sectionById->portfolio_description = $request->portfolio_description;
        $sectionById->service_title = $request->service_title;
        $sectionById->service_description = $request->service_description;
        $sectionById->blog_title = $request->blog_title;
        $sectionById->blog_description = $request->blog_description;
        $sectionById->contact_title = $request->contact_title;
        $sectionById->contact_description = $request->contact_description;
        $sectionById->save();
        return redirect('add-section')->with('message','Section Information Updated Successfully');
    }
}
