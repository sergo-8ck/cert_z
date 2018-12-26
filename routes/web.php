<?php

use \Illuminate\Support\Facades\Input;
use App\Article;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('blog.home');
//});

Route::get('/', 'HomeController@index');

//Route::post('/comments',function (){
//    print_r($_POST);
//});

//Route::match(['get','post'],'/comments',function (){
//    print_r($_POST);
//});

//Route::get('blog/category/{slug?}', 'BlogController@category')->name('category');
Route::get('cert/{slug?}', 'BlogController@article')->name('article');

Route::group(['prefix'=>'admin', 'namespace'=>'Admin', 'middleware'=>'role:superuser'], function(){

    Route::get('/', 'DashboardController@dashboard', [
        'as' => 'admin.index',
        'middleware' => 'role:superuser',
    ])->name('admin.index');
    Route::resource('/category', 'CategoryController', ['as'=>'admin']);
    Route::resource('/article', 'ArticleController', ['as'=>'admin']);
    Route::get('/article/cat/{id?}', 'ArticleController@index');



    Route::group([
        'prefix' => 'user_managment',
        'namespace' => 'UserManagment'
    ], function (){
        Route::resource('/user', 'UserController', [
            'as' => 'admin.user_managment'
        ]);
    });

    Route::resource('role', 'RoleController');

//    Route::get('/admin',[
//        'as'=>'admin.index',
//        'uses'=> function() {
//            return view('admin.index');
//        }
//    ]);
});

Route::any('/comments',function (){
    print_r($_POST);
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/home', function (){
    $s = Input::get('s');
    $d = Input::get('d');
    if($s != ' '){
        $artic = Article::where('doc_number', 'like', '%' .$s. '%')
                            ->where('date_fin', 'like', '%' .$d. '%')
                            ->get();
        if(count($artic) > 0)
            return view('blog.home')->withDetails($artic)->withQuery($s, $d);
    }
    return view('blog.home')->withMessage("Данные отсутствуют");
});

