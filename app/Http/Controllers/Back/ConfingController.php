<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Confings;
use Illuminate\Support\Str;


class ConfingController extends Controller
{
    public function index()
    {   
        $Confing = Confings::find(1);

        return view('back.confing.index',compact('Confing'));
    }



    public function update(Request $request)
    {   
        $Confing = Confings::find(1);

        $Confing->title = $request->title;
        $Confing->active = $request->active;
        $Confing->facebook = $request->facebook;
        $Confing->twitter = $request->twitter;
        $Confing->linkedin = $request->linkedin;
        $Confing->youtube = $request->youtube;
        $Confing->github = $request->github;
        $Confing->instagram = $request->instagram;

        if ($request->hasFile('logo')) {
            $logo = Str::slug($request->title) . '-logo.' . $request->logo->getClientOriginalExtension();
            $request->logo->move(public_path('uploads'), $logo);
            $Confing->logo = 'uploads/' . $logo;
        }


        if ($request->hasFile('favicon')) {
            $favicon = Str::slug($request->title) . '-favicon.' . $request->favicon->getClientOriginalExtension();
            $request->favicon->move(public_path('uploads'), $favicon);
            $Confing->favicon = 'uploads/' . $favicon;
        }

        $Confing->save();

        return redirect()->route('confingIndex')->with('message', 'Ayarlar uğurla yeniləndi!');
    }
}
