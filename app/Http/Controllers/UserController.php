<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\User;
use DB;
use File;
use Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function myProfile()
    {
        return view('back-end.users.user-profile');
    }

    public function changePassword()
    {
        return view('back-end.users.change-password');
    }

    public function updatePassword(Request $request)
    {

        $this->validate($request, [
            'old_password' => 'required',
            'password' => ['required',
                'min:6',

                'confirmed'],
            'password_confirmation' => 'required_with:password|same:password',

        ]);

        $current_password = Auth::User()->password;
        if (Hash::check($request->old_password, $current_password)) {
            $user_id = Auth::User()->id;
            $obj_user = User::find($user_id);
            $obj_user->password = Hash::make($request->password);;
            $obj_user->save();
            return redirect('admin/my-profile')->with('message', 'Your password successfully change.');
        } else {
            return redirect()->back()->with('message', 'Please enter correct current password.');
        }

    }

    public function userList()
    {
        $userAdmins = User::whereHas('roles', function ($query) {
            $query->where('name', '=', 'Admin');
        })->orderBy('created_at', 'desc')->take(3)->get();

        $userManagers = User::whereHas('roles', function ($query) {
            $query->where('name', '=', 'Manager');
        })->orderBy('created_at', 'desc')->take(3)->get();

        $userSellsMan = User::whereHas('roles', function ($query) {
            $query->where('name', '=', 'Sells Man');
        })->orderBy('created_at', 'desc')->take(3)->get();


        $roles = Role::all();

        return view('back-end.users.user-list', [
            'userAdmins' => $userAdmins,
            'userEditors' => $userManagers,
            'userSellsMan' => $userSellsMan,
    
            'roles' => $roles,
        ]);
    }

    public function addNewUser(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|max:30|min:2',
            'email' => 'email|unique:users,email|required',
            'password' => ['required',
                'min:6',
                'confirmed'],
            'password_confirmation' => 'required_with:password|same:password',

        ]);

        $users_name = $request->name;
        $users_email = $request->email;
//        return $request;
        if ($request->user_role == 'Super Admin') {
            return redirect('admin/user-list')->with('message', 'You cannot add user as super admin');

        } elseif ($request->user_role == 'Admin') {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            // Mail::send('admin.users.welcomeMsg', array(
            //     'role' => 'Admin',
            //     'name' => $users_name), function ($message) use ($users_name, $users_email) {
            //     $message->from('mail@gmail.com', 'nnnnnnnnaaaame');
            //     $message->to($users_email, $users_name)->subject('Welcome To PMS Infotech');
            // });

            $user->save();
            $user->attachRole(Role::where('name', 'Admin')->first());

        } elseif ($request->user_role == 'Manager') {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
      

            $user->save();
            $user->attachRole(Role::where('name', 'Manager')->first());

    
        } elseif ($request->user_role == 'Sells Man') {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();
            $user->attachRole(Role::where('name', 'Sells Man')->first());

        } 

        return redirect()->back()->with('message', 'User Added successfully');
    }

    public function viewUserListByRole($role)
    {
        // return $role;
        if ($role == 'Admin') {
            $userList = User::whereHas('roles', function ($query) {
                $query->where('name', '=', 'Admin');
            })->orderBy('created_at', 'desc')->paginate(10);
        } elseif ($role == 'Super Admin') {
            return redirect('admin/user-list')->with('message', 'Sorry you cannot view super admin info...');
        } elseif ($role == 'Manager') {
            $userList = User::whereHas('roles', function ($query) {
                $query->where('name', '=', 'Manager');
            })->orderBy('created_at', 'desc')->paginate(10);
        } elseif ($role == 'Salls Man') {
            
            $userList = User::whereHas('roles', function ($query) {
                $query->where('name', '=', 'Sells Man');
            })->orderBy('created_at', 'desc')->paginate(10);
        } 
        // return $userList;
        $roles = Role::all();
        return view('back-end.users.view-all-user-by-role', [
            'userList' => $userList,
            'roleRequested' => $role,
            'roles' => $roles,
        ]);
    }

    public function deleteUserBySuperAdmin($id)
    {
        DB::table('role_user')->where('user_id', $id)->delete();;

        $user = User::find($id);
        if (File::exists($user->image)) {
            unlink($user->image);
        }
        $user->delete();
        return redirect()->back()->with('message', 'User Deleted successfully');

    }

    public function changeUserRole(Request $request)
    {
//        return $request;
        $id = $request->id;
        $user = User::find($id);

        $user->deferAndAttachNewRole(Role::where('name', $request->userRole)->first());
        return redirect('admin/user-list')->with('message', 'User Role Change successfully');
    }

    public function resetPassword(Request $request)
    {
        $this->validate($request, [
            'password' => ['required',
                'min:6',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{5,}$/',
                'confirmed'],
            'password_confirmation' => 'required_with:password|same:password',

        ]);
        $password = $request->password;

        $user = User::where('email', $request->email)->first();
        if (!$user) return redirect()->to('login'); //or wherever you want

        $user->password = Hash::make($password);
        $user->update(); //or $user->save();

        //do we log the user directly or let them login and try their password for the first time ? if yes
        Auth::login($user);

        // If the user shouldn't reuse the token later, delete the token
        DB::table('password_resets')->where('email', $user->email)->delete();

        if ($user->hasRole('Admin')) {
            return redirect('/admin/dashboard');
        } else if ($user->hasRole('Super Admin')) {

            return redirect('/admin/dashboard');
        } else if ($user->hasRole('Manager')) {
            return redirect('/admin/dashboard');
      
        } else {
            $request->session()->invalidate();
            return redirect('/');
        }
    }

    public function changeUserPasswordBySadmin(Request $request)
    {

        $this->validate($request, [
            'password' => ['required',
                'min:6',
                'confirmed'],
            'password_confirmation' => 'required_with:password|same:password',

        ]);

        $user = User::find($request->user_id);
//        return $user;

        $user->password = Hash::make($request->password);;
        $user->save();
        return redirect()->back()->with('message', 'Password successfully change.');
    }

    public function myProfileEdit()
    {
        return view('back-end.users.edit-my-profile');
    }

    public function updateAdminProfile(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:30|min:2',
            'email' => 'email|email|required',
        ]);

        $user_id = Auth::User()->id;
        $obj_user = User::find($user_id);

        $obj_user->name = $request->name;
        $obj_user->email = $request->email;
        $obj_user->phone_no = $request->phone_no;
        $obj_user->address = $request->address;
        if ($request->file('image')) {
            $this->validate($request, [
                'image' => 'required|mimes:jpg,JPG,JPEG,jpeg,png|max:2058',
            ]);

            $userImage = $request->file('image');
            $fileType = $userImage->getClientOriginalExtension();
            $imageName = date('YmdHis') . "ProfilePic" . rand(5, 10) . '.' . $fileType;
            $directory = 'images/';
            $imageUrl = $directory . $imageName;
            Image::make($userImage)->fit(800, 800)->save($imageUrl);
            
            if (File::exists($obj_user->image)) {
                unlink($obj_user->image);
            }
            $obj_user->image = $imageUrl;
        }

        $obj_user->save();
//    if (Auth::User()->hasRole('Super Admin')){
        return redirect('admin/my-profile')->with('message', 'Your Profile Successfully Updated');
//}
    }
}
