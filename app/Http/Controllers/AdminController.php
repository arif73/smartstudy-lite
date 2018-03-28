<?php

namespace App\Http\Controllers;
use App\User;
use App\Admins;
use Illuminate\Http\Request;
use Auth;
use File;
use Image;

class AdminController extends Controller
{
    /*
|--------------------------------------------------------------------------
| Admin Controller
|--------------------------------------------------------------------------
|
| This controller handles admin related CRUD operations.
|
*/
    /**
     * @var string
     */
    public $filename='default.jpg';
    /**
     * @var string
     */
    public $name="";


 

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function login()
    {
        return view('login');
    }

    public function view($id){
        $user=User::where('id',$id)->first();
        $username=$user->username;
        $admin=Admins::where('username',$username)->first();
        return view('admins.view',['user'=>$user,'admin'=>$admin]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function profile()
    {
        return view('admins.profile',array('user'=>Auth::user(),'message'=>""));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function add()
    {
        return view('admins.addadmin');
    }

    /**
     * This method create one User and one Admins object.
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postAddAdmin(Request $request)
    {
        UserController::validationForUserCreation($request);
        //Create new admin object
        $admin = new Admins();
        $admin->username=$request['username'];
        $admin->about= $request['about'];
        //If no avatar is attached, this default avatar will be used
        $avatar="default.jpg";
        //Upload admin avatar if exists
        if ($request->hasFile('avatar')) {
            $avatar=UserController::createAvatar($request);
        }
        //Create new user object
        $userid=UserController::createUser($request,$avatar,"admin");
        $admin->userid=$userid;
        $admin->save();
        return redirect('admin/admins')->with('message', 'Admin \''.$request['name'].'\' added successfully!');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id){
        $user=User::where('id',$id)->first();
        $admin=Admins::where('username',$user->username)->first();
        return view('admins.edit',['user'=>$user,'admin'=>$admin]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postUpdateAdmin(Request $request)
    {
        UserController::validationForUserUpdate($request);
        UserController::validateEmailOrPasswordChange($request);

        $user = User::where('id',$request['id'])->first();
        $admin=Admins::where('username',$user->username)->first();
        $admin->about= $request['about'];


        //If new avatar file is attached, then remove old avatar (if exists) and update with new avatar
        if ($request->hasFile('avatar')) {
            $user->avatar=UserController::updateAvatar($request);
        }

        $admin->save();
        $user->name=$request['name'];
        $user->email=$request['email'];
        if($request->has('password'))
            $user->password=bcrypt($request['password']);
        $user->save();

        return redirect('admin/admins')->with('message', 'Admin \''.$request['name'].'\' has been sucessfully updated!!');
    }


    /**Removal function for an admin. Both admin and user reference should be removed.
     * Attached avatar should be also removed
     * @param $id (admin userid)
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function delete($id){
        $user=User::where('id',$id)->first();
        if(Auth::user()->id==$user->id){
            return redirect()->back()->with('error-message','You can\'t delete your own account.');
        }
        $name=$user->name;
        $username=$user->username;
        $admin=Admins::where('username',$username)->first();
        UserController::removeAvatar($user);
        $user->delete();
        $admin->delete();

        return redirect()->back()->with('message','Admin \''.$name.'\' is removed successfully!');
    }

    /**View for Admin Dashboard
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function dashboard()
    {
        return view('admins.dashboard');
    }

    /**
     * View to show list of all admins
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $admins = User::where('role', '=','admin')
            ->orderby('id', 'DESC')
            ->paginate(20)
        ;
        return view('admins.index',['admins'=>$admins]);;
    }

}
