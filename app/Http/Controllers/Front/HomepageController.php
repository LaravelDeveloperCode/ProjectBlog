<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//Models
use App\Models\Articles;
use App\Models\Categories;
use App\Models\Pages;
use App\Models\Contact;
use App\Models\Confings;
use Illuminate\Support\Facades\View;

use Validator;


class HomepageController extends Controller
{
    public function __construct()
    {           
        if (Confings::find(1)->active == 0) 
        {
            abort(403, 'Sayt yenilənmədədir'); 
        }
            //Haqqımızda, Karyera, Vizyonumuz, Misyamız ucundur
        View::share('Pages', Pages::where('status',1)->orderBy('order','ASC')->get());  //Pages::orderBy('order','ASC')->get... bu kod her publicde var,kod tekrarini azaltmaq ucun bundan istifade edilir
    }


    public function index() //Bu public ana ekran ucundur
    {
        $ArtData['KeyArticlies']=Articles::with('getCategory')->where('status',1)->whereHas('getCategory',function($query){
            $query->where('status',1);
        })->orderBy('created_at','DESC')->paginate(10);  //paginate seyfelendirme demekdir,bunu etmekde meqsed ekraba nece dene xeberin cixmasini vermek istemeyimizdi,paginate(2) yani 2 xeberden bir deyishsin.
                //['keycategory'] yani acar(key)
        $CatData['KeyCategory']=Categories::where('status',1)->inRandomOrder()->get();  //$CatData['category']: $CatData adında bir dizi (array) varsa, ['category'] dizinin bir anahtarıdır. Bu anahtar altında Categories::get() metodu ile elde edilen koleksiyon atanır.
        return view('front.homepage', $CatData,$ArtData);
    }



    public function single($category ,$slug) //Bu public ana ekrandaki postlara daxil olmaq ucundur
    {
        $Category=Categories::whereSlug($category)->first() ?? abort(403, 'Belə bir qeyd tapılmadı!'); //Bu yuxarida axtarish bolmesinde cixan kategori yoxdusa,bele xeberdarliq gelir
        $Article=Articles::where('slug',$slug)->whereCategoryId($Category->id)->first() ?? abort(403, 'Belə bir qeyd tapılmadı!'); 
                                    //whereCategoryId...Eyer bu kategoriyaya aid bir deyer varsa ekrana cixsin eks halda "yoxdu" xeberdarligi gelsin
        $Article->increment('hit');  //increment artirmaq demekdir.

        $ArticleErrors['Article']=$Article;
        $CatData['KeyCategory']=Categories::where('status',1)->inRandomOrder()->get();
        return view('front.single', $CatData,$ArticleErrors); 
    }



    public function category($slug)
    {
        // Kategori nesnesini getir
        $Category = Categories::whereSlug($slug)->first() ?? abort(403, 'Belə bir qeyd tapılmadı!');

        // Makaleleri sayfalı olarak getir
        $Article = Articles::where('category_id', $Category->id)
                        ->where('status',1)
                        ->orderBy('created_at', 'DESC')
                        ->get();

        // Rastgele kategorileri getir
        $KeyCategory = Categories::where('status',1)->inRandomOrder()->get();

        // Verileri tek bir dizi olarak view'a gönder
        return view('front.category', [
            'Category' => $Category,
            'Article' => $Article,
            'KeyCategory' => $KeyCategory
        ]);
    }



    public function page($slug) // Haqqımızda, Karyera, Vizyonumuz, Misyamız ucundur
    {
        $Pages = Pages::whereSlug($slug)->first() ?? abort(403, 'Belə bir qeyd tapılmadı!');

        $PagesData['PagesList']=$Pages; //Haqqımızda, Karyera, Vizyonumuz, Misyamız icine girmekucundur

        return view('front.page', $PagesData);
    }



    public function contact()
    {
        return view('front.contact');
    }



    public function contactPost(Request $request)
    {
        $rules = [
            'name' => 'required|min:5',
            'email' => 'required|email',
            'topic' => 'required',
            'message' => 'required|min:10',
        ];

        // Form verilerini almak için $request->all() kullanıyoruz
        $validate = Validator::make($request->all(), $rules);

        // Eğer doğrulama hatası varsa, hataları ve eski verileri geri gönder
        if ($validate->fails()) {
            return redirect()->route('contaCctt')->withErrors($validate)->withInput();
        }

        $contactModel = new Contact;
        $contactModel->name = $request->input('name');
        $contactModel->email = $request->input('email');
        $contactModel->topic = $request->input('topic');
        $contactModel->message = $request->input('message');

        $contactModel->save();

        return redirect()->route('contaCctt')->with('message', 'Qeydləriniz daxil oldu!');
    }


}
