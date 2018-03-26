<?php

namespace App\Http\Controllers;
// include composer autoload
;
use App\User;
use App\Admins;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;
use App\Courses;
use File;
use Image;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /*
|--------------------------------------------------------------------------
| User Controller
|--------------------------------------------------------------------------
|
| This controller contains common functions required by other controllers related to user.
|
*/

    public static function createUser(Request $request, $filename,$role)
    {
        $userid=User::create([
            'name' => $request['name'],
            'username' => $request['username'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
            'passwordhint' => $request['password'],
            'avatar'=>$filename,
            'role'=>$role,

        ])->id;

        return $userid;
    }

    public static function createAvatar(Request $request)
    {
        $avatar=$request->file('avatar');
        $filename=time().'.'.$avatar->getClientOriginalExtension();
        Image::make($avatar)->resize(300,300)->save(public_path('/uploads/avatars/'.$filename));
        return $filename;
    }

    public static function validationForUserCreation(Request $request)
    {
        //Validate the request
        Validator::make($request->all(), [
            'name' => 'required|max:255',
            'username' => 'required|max:40|unique:users|min:3',
            'about' => 'required|max:2000',
            'email' => 'email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            //other relative customizations: dimensions:min_width=100,min_height=100,max_width=500,max_height=500,ratio=1
        ]);
    }

    public static function validationForUserUpdate(Request $request)
    {
        //Validate the request
        Validator::make($request->all(), [
            'name' => 'required|max:255',
            'about' => 'max:2000',
            'email' => 'email|max:255',
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);
    }

    public static function validateEmailOrPasswordChange(Request $request)
    {
        $user = User::where('id',$request['id'])->first();
        //If email is changed, make sure that it doesn't match with another user email
        if($user->email!=$request['email'] &&!empty($request['email']))
            Validator::make($request->only(['email']), [
                'email' => 'email|max:255|unique:users',
            ]);
        if($request->has('password'))
            Validator::make($request->only(['password']), [
                'password' => 'required|min:6',
            ]);
    }

    public static function updateAvatar(Request $request){
        if($request->hasFile('avatar')){
            Validator::make($request->only('avatar'), [
                'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:512',
            ]);

            $avatar=$request->file('avatar');
            $filename=time().'.'.$avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300,300)->save(public_path('/uploads/avatars/'.$filename));
            $old_avatar_path='uploads/avatars/'.Auth::user()->avatar;
            if(File::exists($old_avatar_path)&&Auth::user()->avatar!='default.jpg')
                File::delete($old_avatar_path);
            return $filename;
        }
    }

    public static function removeAvatar($user)
    {
        $avatar_path='uploads/avatars/'.$user->avatar;
        if(File::exists($avatar_path)&&$user->avatar!='default.jpg')
            File::delete('uploads/avatars/'.$user->avatar);
    }


}
