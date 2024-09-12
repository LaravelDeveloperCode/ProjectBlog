<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Articles;  
use App\Models\Categories;
use Illuminate\Support\Str;



class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Articles = Articles::orderBy('created_at','ASC')->get();

        return view('back.articles.index',compact('Articles')); //compact('Articles') icindeki deyerler (Articles) yuxaridaki deyisehn($Articles) eyni olmalidi
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $Categories = Categories::all();
        return view('back.articles.create', compact('Categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'min:3',
            'image'=>'required|image|mimes:jpg,png,jpeg,gif,svg|max:4096|dimensions:min_width=100,min_height=100,max_width=2000,max_height=2000',
        ]);


        $ArticlesData = new Articles;

        $ArticlesData->title = $request->title;
        $ArticlesData->category_id = $request->category;
        $ArticlesData->content = $request->content;
        $ArticlesData->slug = str::slug($request->title);


        if ($request->hasFile('image')) {
            // slug fonksiyonunun doğru kullanımını sağlayın
            $imageName = Str::slug($request->title) . '.' . $request->image->getClientOriginalExtension();
        
            // Dosyayı yükleme işlemini gerçekleştirin
            $request->image->move(public_path('uploads'), $imageName);
        
            // Veritabanına dosya yolunu kaydedin
            $ArticlesData->image = 'uploads/' . $imageName;
        }

        $ArticlesData->save();

        return redirect()->route('meqaleler.index')->with('message', 'Post uğurla yaradıldı!');
    }

    /**
     * Display the specified resource.
     */

    public function passive(string $id)
    {
        $ArticlesData = Articles::find($id);

        $ArticlesData->status = 0;

        $ArticlesData->save();

        return redirect()->route('meqaleler.index');
    }



    public function active(string $id)
    {
        $ArticlesData = Articles::find($id);

        $ArticlesData->status = 1;

        $ArticlesData->save();

        return redirect()->route('meqaleler.index');
    }



    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {   
        $Articles = Articles::findOrFail($id); //FindOrFail gelen id varsa tapsin,yoxdursa "404" gostersin

        $Categories = Categories::all();
        return view('back.articles.update', compact('Categories','Articles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title'=>'min:3',
            'image'=>'image|mimes:jpg,png,jpeg,gif,svg|max:4096|dimensions:min_width=100,min_height=100,max_width=2000,max_height=2000',
        ]);


        $ArticlesData = Articles::find($id);

        $ArticlesData->title = $request->title;
        $ArticlesData->category_id = $request->category;
        $ArticlesData->content = $request->content;
        $ArticlesData->slug = str::slug($request->title);


        if ($request->hasFile('image')) {
            $imageName = Str::slug($request->title) . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads'), $imageName);
            $ArticlesData->image = 'uploads/' . $imageName;
        }

        $ArticlesData->save();

        return redirect()->route('meqaleler.index')->with('message', 'Post uğurla yeniləndi!');
    
    }

    /**
     * Remove the specified resource from storage.
     */

    public function delete(string $id)
    {
        Articles::find($id)->delete();

        return redirect()->route('meqaleler.index')->with('message', 'Post uğurla silinlərə daşındı!');
    }


    public function trashed()
    {
        $Articles = Articles::onlyTrashed()->orderBy('deleted_at', 'desc')->get();  //onlyTrahsed 'SoftDeletes trait'i ile birlikte kullanılır. Bu metodun amacı, sadece "silinmiş" (veya "trashed") kayıtları almak için kullanılır.
        
        return view('back.articles.trashed', compact('Articles'));
    }


    public function recover(string $id)
    {
        Articles::onlyTrashed()->find($id)->restore(); //restore silmekten qaytarmaq,qutarmaq ucundur
        
        return redirect()->route('meqaleler.index')->with('message', 'Post uğurla geri qaytarıldı!');
    }


    public function harddelete(string $id)
    {
        Articles::onlyTrashed()->find($id)->forceDelete();

        return redirect()->route('meqaleler.index')->with('message', 'Post uğurla silindi!');
    }
}
