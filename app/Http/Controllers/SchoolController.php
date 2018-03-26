<?php

namespace App\Http\Controllers;

use App\Sections;
use Illuminate\Http\Request;
use App\User;
use App\Attendence;
use App\Classes;
use Illuminate\Support\Facades\Validator;
use Response;

class SchoolController extends Controller
{
    public function dashboard(){
        $datacollection = Classes::orderby('id', 'DESC')
            ->paginate(5);

        //$data=Classes::where('id','7')->first()->classes.sections->count();
       // return $data;
        return view('management.school',['datacollection'=>$datacollection]);

}

    public function addclasses(){
        return view('classes.add');
    }

    public function processFormRequestAddClassess(Request $request)
    {   $data=$request->all();
        $this->validator($request->all())->validate();
        $this->create($request);
        return redirect(route('class.index'))->with('message', 'Class \''.$request['name'].'\' has been added sucessfully!!');
    }

    public function viewclasses(){

        $datacollection = Classes::orderby('id', 'DESC')
            ->paginate(20);

        //$data=Classes::where('id','7')->first()->classes.sections->count();
        // return $data;
        return view('classes.index',['datacollection'=>$datacollection]);

    }

    public function viewclass($id){

        $datacollection = Classes::where('id',$id)->first();
        $sections=Sections::where('classes_id',$datacollection['id'])->get();
        return view('classes.view',['data'=>$datacollection,'sections'=>$sections]);

    }

    public function editclasses($id){
        $datacollection =Classes::where('id',$id)->first();
        return view('classes.edit',['datacollection'=>$datacollection]);
    }

    public function processFormRequestEditClassess(Request $request)
    {   $data=$request->all();
        $id=$data['id'];
        $class = Classes::where('id',$id)->first();
        if($class->name!=$data['name'])
            $this->validatorForEditName($request->only(['name']))->validate();
        if($class->shortname!=$data['shortname'])
            $this->validatorForEditShortName($request->only(['shortname']))->validate();
        $this->update($request);
        return redirect(route('class.index'))->with('message', 'Class \''.$request['name'].'\' has been sucessfully updated!!');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:100|unique:classes',
            'shortname' => 'required|max:40|unique:classes',
        ]);
    }

    protected function validatorForEditName(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:100|unique:classes',
        ]);
    }

    protected function validatorForEditShortName(array $data)
    {
        return Validator::make($data, [
            'shortname' => 'required|max:40|unique:classes',
        ]);
    }

    protected function create(Request $data)
    {
        Classes::create([
            'name' => $data['name'],
            'shortname' => $data['shortname'],

        ]);
    }

    protected function update(Request $data)
    {   $id=$data['id'];
        $class = Classes::where('id',$id)->first();
        $class->name= $data['name'];
        $class->shortname= $data['shortname'];
        $class->save();
    }

    public function ajaxGetSections($class_id)
    {
        $sections = Sections::where('classes_id',$class_id)->get();
        return Response::json($sections);
    }

    protected function delete($id){
        $data=Classes::where('id',$id)->first();

        if($data->sections->count()>0)
            return redirect()->back()->with('error-message','Error:  Class '.$data->shortname.' is not removed. You have to remove '.$data->sections->count().' sections of this class first.');


        if($data->delete())
            return redirect()->back()->with('message','Class '.$data->shortname.' is removed successfully!');
        else
            return redirect()->back()->with('error-message','Error:  Class '.$data->shortname.' is not removed.');

    }

}
