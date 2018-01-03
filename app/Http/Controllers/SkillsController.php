<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\skill;

class SkillsController extends Controller
{
    public function addSkillInfo(){
        return view('admin.skill.add-skill');
    }

    public function saveSkillInfo(Request $request){
        $this->validate($request,[
            'skill_name'=>'required|regex:/^[\pL\s\-]+$/u',
            'skill_percent'=>'required|max:3|min:2',
            'skill_color'=>'required',
            'publication_status' => 'required'
        ]);
        $skill = new skill();
        $skill->skill_name = $request->skill_name;
        $skill->skill_percent = $request->skill_percent;
        $skill->skill_color = $request->skill_color;
        $skill->publication_status = $request->publication_status;
        $skill->save();
        return redirect('add-skill')->with('message','Skill Information Save Successfully');
    }

    public function manageSkillInfo(){
        $skills = skill::all();
        return view('admin.skill.manage-skill',['skills'=>$skills]);
    }

    public function unpublishedSkillInfo($id){
        $skillById = skill::find($id);
        $skillById->publication_status = 0;
        $skillById->save();
        return redirect('manage-skill')->with('message','Skill information unpublished successfully');
    }

    public function publishedSkillInfo($id){
        $skillById = skill::find($id);
        $skillById->publication_status = 1;
        $skillById->save();
        return redirect('manage-skill')->with('message','Skill information published successfully');
    }

    public function editSkillInfo($id){
        $skillById = skill::find($id);
        return view('admin.skill.edit-skill',['skillById'=>$skillById]);
    }

    public function updateSkillInfo(Request $request){
        $skillById = skill::find($request->skill_id);
        $skillById->skill_name = $request->skill_name;
        $skillById->skill_percent = $request->skill_percent;
        $skillById->skill_color = $request->skill_color;
        $skillById->publication_status = $request->publication_status;
        $skillById->save();

        return redirect('manage-skill')->with('message','Skill Information Updated Successfully');
    }

    public function deleteSkillInfo($id){
        $skillById = skill::find($id);
        $skillById->delete();
        return redirect('manage-skill')->with('message','Skill Information Deleted Successfully');
    }




}
