<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Students;
use App\Classes;
use App\CourseSchedule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Auth;
use File;
use Image;
use Log;

class StudentController extends Controller
{
    /*
|--------------------------------------------------------------------------
| Register Controller
|--------------------------------------------------------------------------
|
| This controller handles the registration of new users as well as their
| validation and creation. By default this controller uses a trait to
| provide this functionality without requiring any additional code.
|
*/
    public $filename='default.jpg';
    public $name="";
    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = 'admin/students';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('check-permission:admin');
    }

    public function dashboard()
    {
        return view('students.dashboard');
    }


    public function index()
    {
        $students = User::where('role', '=','student')
            //->where('command', '=', '1')   //i am only getting command 1 values
            //->orderby('id', 'ASC', 'command', 'ASC')
            ->orderby('id', 'DESC')
            ->paginate(20);
        return view('students.index',['students'=>$students]);
    }

    public function add()
    {   $classes=Classes::get();
        return view('students.add',['classes'=>$classes]);
    }

    public function postAdd(Request $request)
    {
        UserController::validationForUserCreation($request);
        //Create new student object
        $student = new Students();
        $student->username=$request['username'];
        $student->about= $request['about'];
        $student->classes_id= $request['classes'];
        $student->sections_id= $request['sections'];

        $avatar="default.jpg";
        //Upload avatar if attached
        if ($request->hasFile('avatar')) {
            $avatar=UserController::createAvatar($request);
        }
        $this->name=$request['name'];
        $userid=UserController::createUser($request,$avatar,"student");
        $student->userid=$userid;
        $student->save();
        return redirect('admin/students')->with('message', 'Student \''.$request['name'].'\' added successfully!');
    }

    public function edit($id){
        $user=User::where('id',$id)->first();
        $student=Students::where('username',$user->username)->first();
        $classes=Classes::get();
        return view('students.edit',['user'=>$user,'student'=>$student,'classes'=>$classes]);
    }

    public function postUpdate(Request $request)
    {   UserController::validationForUserUpdate($request);
        UserController::validateEmailOrPasswordChange($request);

        $user = User::where('id',$request['id'])->first();
        $student=Students::where('username',$user->username)->first();
        $student->about= $request['about'];
        $student->classes_id= $request['classes'];
        $student->sections_id= $request['sections'];

        if ($request->hasFile('avatar')) {
            $user->avatar=UserController::updateAvatar($request);
        }

        $student->save();
        $user->name=$request['name'];
        $user->email=$request['email'];
        if($request->has('password'))
            $user->password=bcrypt($request['password']);
        $user->save();

        return redirect('admin/students')->with('message', 'Student \''.$request['name'].'\' has been sucessfully updated!!');
    }

    public function view($id){
        $user=User::where('id',$id)->first();
        $username=$user->username;
        $userdata=Students::where('username',$username)->first();
        return view('students.view',['user'=>$user,'userdata'=>$userdata]);
    }

    public function profile(){
        $userdata=Students::where('userid',Auth::user()->id)->first();
        return view('students.view',['user'=>Auth::user(),'userdata'=>$userdata]);
    }

    public function globalProfile($id){
        $userdata=User::where('id',$id)->first();
        return view('students.globalProfile',['userdata'=>$userdata]);
    }


    protected function delete($id){
        $user=User::where('id',$id)->first();
        if(Auth::user()->id==$user->id) {
            return redirect()->back()->with('error-message','You can\'t delete your own account.');
        }
        $name=$user->name;
        $student=Students::where('username',$user->username)->first();
        UserController::removeAvatar($user);
        $user->delete();
        $student->delete();
        return redirect()->back()->with('message','Student \''.$name.'\' is removed successfully!');
    }

}
