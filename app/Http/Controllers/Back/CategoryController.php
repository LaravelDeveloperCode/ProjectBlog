<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Articles;
use Illuminate\Support\Str;



class CategoryController extends Controller
{
    public function index()
    {
        $Categories = Categories::all();

        return view('back.categories.index', compact('Categories'));
    }



    public function  create(Request $post)
    {
        $isExist = Categories::whereSlug(str::slug($post->category))->first();

        if($isExist== null)
        {
            $CatData = new Categories;

            $CatData->name = $post->category;
            $CatData->slug = str::slug($post->category);

            $CatData->save();

            return redirect()->route('categoryIndex')->with('message1', 'Kategoriya uğurla yaradıldı!');
        }
       
        return redirect()->route('categoryIndex')->with('message2', $post->category.' kategoriyası bazada var!');
    }



    public function passive(string $id)
    {
        $CategoriesData = Categories::find($id);

        $CategoriesData->status = 0;

        $CategoriesData->save();

        return redirect()->route('categoryIndex');
    }



    public function active(string $id)
    {
        $CategoriesData = Categories::find($id);

        $CategoriesData->status = 1;

        $CategoriesData->save();

        return redirect()->route('categoryIndex');
    }



    public function delete($id)
    {
        $Categories = Categories::all();

        $CatDeleteId = $id;

        return view('back.categories.index', compact('Categories','CatDeleteId'));
    }



    public function delete2($id)
    {
        $isExist = Articles::where('category_id','=',$id)->count();

        if($isExist==0)
        {
            Categories::find($id)->delete();
          return redirect()->route('categoryIndex')->with('message1', 'Kategoriya uğurla bazadan silindi!');
        }

       return redirect()->route('categoryIndex')->with('message2', 'Bu kategoriya məqalələrdə aktiv qiymətə malik olduğu üçün silinmədi!');
    }



    public function edit($id)
    {
        $Categories = Categories::all();
        $CatEditData = Categories::find($id);

        return view('back.categories.index', compact('CatEditData','Categories'));
    }

    

    public function update(Request $post)
    {
        // Mevcut kategori ID'sine görə kategori məlumatını tap
        $CatData = Categories::find($post->id);

        // Əgər kategori tapılmazsa, uyğun bir mesaj ilə geri dön
        if (!$CatData) {
            return redirect()->route('categoryIndex')->with('message2', 'Kategori tapılmadı!');
        }

        // Eyni adı olan başqa bir kategori olub olmadığını yoxla
        $isNameExist = Categories::where('name', $post->name)
                                ->where('id', '!=', $post->id)
                                ->exists();

        if ($isNameExist) {
            return redirect()->route('categoryIndex')->with('message2', 'Eyni adla başqa bir kategori mövcuddur!');
        }

        // Kategoriyanı yenilə
        $CatData->name = $post->name;
        $CatData->slug = str::slug($post->category);
        $CatData->save();

        return redirect()->route('categoryIndex')->with('message1', 'Kategori uğurla yeniləndi!');
    }

       
}
