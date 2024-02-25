<?php
namespace App\crm\project\service;

use App\crm\project\event\projectCreation;
use App\crm\project\models\Project;

use App\crm\project\request\createProjectRequest ;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class projectService{
    public function index($id)  {
        return Project::where('customer_id',$id)->get();
    }
    public function view($customerId,$id)  {
        $Project=Project::find($id);
        $customerId=(int) $customerId;
         if($Project->customer_id != $customerId){
             return response()->json(['status'=>'invalid data '],Response::HTTP_BAD_REQUEST);//data ,status
         }
        return $Project;
    }

    public function create(createProjectRequest $request,$customerId)  {
        $newProject=new Project();
        $newProject->project_name=$request->get('project_name');
        $newProject->status=$request->get('status');
        $newProject->customer_id=$customerId;
        $newProject->project_cost=$request->get('project_cost');
        $newProject->save();
        // event(new projectCreation($newProject));
        return $newProject;
     }
     public function update(Request $request,$customerId,$id)  {
        $newProject=Project::find($id);
        $customerId=(int) $customerId;
         if($newProject->customer_id != $customerId){
             return response()->json(['status'=>'invalid data '],Response::HTTP_BAD_REQUEST);//data ,status
         }
         $newProject->project_name=$request->get('project_name');
         $newProject->status=$request->get('status');
         $newProject->project_cost=$request->get('project_cost');
        $newProject->save();
        return $newProject;
     }
     public function delete(Request $request,$customerId,$id)  {
        $newProject=Project::find($id);
        $customerId=(int) $customerId;
         if($newProject->customer_id != $customerId){
             return response()->json(['status'=>'invalid data '],Response::HTTP_BAD_REQUEST);//data ,status
         }
        $newProject->delete();
     }
}
