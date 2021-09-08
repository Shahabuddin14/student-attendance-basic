<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return view('user.home');
    }

    //Image page
    public function imagePage()
    {
        return view('user.change-image');
    }
    //Update image
    public function updateImage(Request $request)
    {
        $old_image = $request->old_image;
        if (User::findOrFail(Auth::id())->image == 'frontend/media/avatar.png')
        {
            $image = $request->file('image');
            $imageName = uniqid().'.'.$image->extension();
            $directory = 'frontend/media/';
            $image->move($directory, $imageName);
            $imageUrl = $directory.$imageName;

            User::findOrFail(Auth::id())->Update([
                'image' => $imageUrl
            ]);
            return Redirect()->back()->with('message','Profile image has been updated successfully');

        } else
        {
            unlink($old_image);
            $image = $request->file('image');
            $imageName = uniqid().'.'.$image->extension();
            $directory = 'frontend/media/';
            $image->move($directory, $imageName);
            $imageUrl = $directory.$imageName;
            User::findOrFail(Auth::id())->Update([
                'image' => $imageUrl
            ]);

            return Redirect()->back()->with('message','Profile image has been updated successfully');
        }
    }
    //Update profile
    public function profile()
    {
        return view('user.profile');
    }
    public function updateData(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'lab' => 'required',
        ],[
            'name.required' => 'input your name',
        ]);

        User::findOrFail(Auth::id())->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'lab' => $request->lab,
            'district' => $request->district,
            'updated_at' => Carbon::now(),
        ]);
        return Redirect()->back()->with('message','Profile has been updated successfully');
    }

    //update password
    public function updatePassPage()
    {
        return view('user.password');
    }

    //store password
    public function storePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:8',
            'password_confirmation' => 'required|min:8',
        ]);

        $db_pass = Auth::user()->password;
        $current_password = $request->old_password;
        $newpass = $request->new_password;
        $confirmpass = $request->password_confirmation;

        if (Hash::check($current_password,$db_pass))
        {
            if ($newpass === $confirmpass)
            {
                User::findOrFail(Auth::id())->update([
                    'password' => Hash::make($newpass)
                ]);
                Auth::logout();
                return Redirect()->route('login')->with('message','Password has been updated successfully');
            }
            else
            {
                return Redirect()->back()->with('message','New password and confirm password not matched');
            }
        }else
        {
            return Redirect()->back()->with('message','Old password not matched');
        }
    }

    //Attendance
    public function attendance()
    {
        $attendances = Attendance::where('user_id',Auth::user()->id)->orderBy('id','DESC')->get();
        $today = date('Y-m-d');
        if (Auth::check()){

            if ( Attendance::where('user_id',Auth::user()->id)->where('date', $today)->exists())
            {
                return view('user.attendance-today', compact('attendances'));
            }
            elseif (Attendance::where('user_id',Auth::user()->id)->exists())
            {
                return view('user.attendance', compact('attendances'));
            }
            else
            {
                return view('user.attendance', compact('attendances'));
            }
        }
    }

    public function addAttendance(Request $request)
    {
        $request->validate([
            'date' => 'required',
        ]);
        Attendance::insert([
            'user_id' => Auth::id(),
            'date' => $request->date,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        return Redirect()->back()->with('message','Your attendance has been store successfully');
    }


}
