<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function addServiceInfo(){
        return view('admin.service.add-service');
    }

    public function saveServiceInfo(Request $request){
        $this->validate($request,[
            'service_title'=>'required|regex:/^[\pL\s\-]+$/u',
            'service_text'=>'required',
            'service_link'=>'required',
            'publication_status'=>'required'
        ]);
        $service = new Service();
        $service->service_title = $request->service_title;
        $service->service_text = $request->service_text;
        $service->service_link = $request->service_link;
        $service->publication_status = $request->publication_status;
        $service->save();

        return redirect('add-service')->with('message','Service Information Save Successfully');
    }

    public function manageServiceInfo(){
        $services = Service::all();
        return view('admin.service.manage-service', ['services'=>$services]);
    }

    public function unpublishedServiceInfo($id){
        $serviceById = Service::find($id);
        $serviceById->publication_status = 0;
        $serviceById->save();
        return redirect('manage-service')->with('message', 'Service Information Updated Successfully');
    }
    public function publishedServiceInfo($id){
        $serviceById = Service::find($id);
        $serviceById->publication_status = 1;
        $serviceById->save();
        return redirect('manage-service')->with('message', 'Service Information Updated Successfully');
    }

    public function editServiceInfo($id){
        $serviceById = Service::find($id);
        return view('admin.service.edit-service', ['serviceById'=>$serviceById]);
    }

    public function updateServiceInfo(Request $request){
        $serviceById = Service::find($request->service_id);
        $serviceById->service_title = $request->service_title;
        $serviceById->service_text = $request->service_text;
        $serviceById->service_link = $request->service_link;
        $serviceById->publication_status = $request->publication_status;
        $serviceById->save();
        return redirect('manage-service')->with('message', 'Service Information Updated Successfully');
    }

    public function deleteServiceInfo($id){
        $serviceById = Service::find($id);
        $serviceById->delete();
        return redirect('manage-service')->with('message', 'Service Information Deleted Successfully');
    }






}
