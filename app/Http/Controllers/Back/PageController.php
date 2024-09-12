<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pages;
use Illuminate\Support\Str;

class PageController extends Controller
{
    public function index()
    {
        $Pages = Pages::all();
        return view('back.page.index',compact('Pages'));
    }



    public function create()
    {
        return view('back.page.create');
    }



    public function post(Request $post)
    {
        $post->validate([
            'title'=>'min:3',
            'image'=>'required|image|mimes:jpg,png,jpeg,gif,svg|max:4096|dimensions:min_width=100,min_height=100,max_width=2000,max_height=2000',
        ]);

        $lastPage = Pages::orderBy('order','desc')->first();
        $lastOrder = $lastPage ? $lastPage->order : 0; // Eğer son sayfa varsa order'ını al, yoksa 0 kullan

        $PagesData = new Pages;
        $PagesData->title = $post->title;
        $PagesData->content = $post->content;
        $PagesData->order = $lastOrder + 1; // Artık lastOrder + 1 işlemi doğru
        $PagesData->slug = str::slug($post->title);


        if ($post->hasFile('image')) {
            // slug fonksiyonunun doğru kullanımını sağlayın
            $imageName = Str::slug($post->title) . '.' . $post->image->getClientOriginalExtension();
        
            // Dosyayı yükleme işlemini gerçekleştirin
            $post->image->move(public_path('uploads'), $imageName);
        
            // Veritabanına dosya yolunu kaydedin
            $PagesData->image = 'uploads/' . $imageName;
        }

        $PagesData->save();

        return redirect()->route('pageIndex')->with('message', 'Səhifə uğurla yaradıldı!');
    }



    public function passive(string $id)
    {
        $PagesData = Pages::find($id);

        $PagesData->status = 0;

        $PagesData->save();

        return redirect()->route('pageIndex');
    }



    public function active(string $id)
    {
        $PagesData = Pages::find($id);

        $PagesData->status = 1;

        $PagesData->save();

        return redirect()->route('pageIndex');
    }



    public function delete($id)
    {
        $Pages = Pages::all();
        $PagesDel_id = $id;

        return view('back.page.index',compact('Pages','PagesDel_id'));
    }



    public function delete2($id)
    {
        Pages::find($id)->delete();

        return redirect()->route('pageIndex')->with('message', 'Səhifə uğurla bazadan silindi!');
    }



    public function edit($id)
    {
        $Pages = Pages::all();
        $PagesEdit_id = Pages::find($id);

        return view('back.page.index',compact('Pages','PagesEdit_id'));
    }
        


    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|min:3',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:4096|dimensions:min_width=100,min_height=100,max_width=2000,max_height=2000',
        ]);

        $page = Pages::find($request->id);

        if (!$page) {
            return redirect()->route('pageIndex')->with('error', 'Sayfa bulunamadı!');
        }

        $page->title = $request->title;
        $page->slug = Str::slug($request->title);

        if ($request->hasFile('image')) {
            $imageName = Str::slug($request->title) . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads'), $imageName);
            $page->image = 'uploads/' . $imageName;
        }

        $page->save();

        return redirect()->route('pageIndex')->with('message', 'Səhifə uğurla yeniləndi!');
    }

}
