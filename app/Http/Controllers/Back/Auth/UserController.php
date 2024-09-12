<?php

namespace App\Http\Controllers\back\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\Support\Facades\Hash;  //<----Laravelde parollara şifrələməni tətbiq etmək üçün istifade edilir!
use Illuminate\Support\Facades\Auth;  //<----Istifadıçinin login/parolunu yoxlayır!


class UserController extends Controller
{
    public function loginsert(Request $post)
    {
      if(!Auth::attempt(['email'=>$post->email, 'password'=>$post->password]))
       {
        return redirect()->back()->with('message', 'Daxil etdiyiniz login və ya parol yanlışdır!');
       }
      return redirect()->route('adminDashboard');
    }


    public function logout()
    {
      auth()->logout();
      return redirect()->route('loginn');
    }


    public function reginsert(Request $post)
    {
        $modelUser = new User();

        $yoxla = $modelUser->where('email','=',$post->email)->count();
        
        if($yoxla==0)
          {
            $modelUser->name = $post->name;
            $modelUser->email = $post->email;
            $modelUser->password = Hash::make($post->password);

            $modelUser->save();

            return redirect()->route('registrr')->with('message1', 'Qeydiyyat uğurla daxil oldu!');
          }

      return redirect()->route('registrr')->with('message2', 'Bu email artıq əlavə olunub!!');
    }
}
