<?php

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
Auth::routes();
Route::get('/','HomeController@index')->name('home');


Route::get('/login','AuthController@login')->name('login');
Route::post('/login','AuthController@postLogin')->name('postLogin');
Route::get('/logout','AuthController@logout')->name('logout')->middleware('auth');
Route::group(['prefix'=>'berita'],function(){
  Route::get('/{slug}','PostController@showPostUser')->name('showPostUser');
  Route::get('/','PostController@getPostsUser')->name('getPostsUser');
  Route::get('/kategori/{kategori}','PostController@getPostsKategori')->name('getPostsKategori');

});

Route::get('/penataan&infrastruktur','GreenCampusController@getPenataanUser')->name('getPenataanUser');
Route::get('/energi&perubahaniklim','GreenCampusController@getEnergiUser')->name('getEnergiUser');
Route::get('/limbah','GreenCampusController@getLimbahUser')->name('getLimbahUser');
Route::get('/air','GreenCampusController@getAirUser')->name('getAirUser');
Route::get('/transportasi','GreenCampusController@getTransportasiUser')->name('getTransportasiUser');
Route::get('/pendidikan','GreenCampusController@getPendidikanUser')->name('getPendidikanUser');

Route::get('/event','EventController@getEventUser')->name('getEventUser');

Route::get('selayang-pandang','TentangController@getSelayangPandangUser')->name('getSelayangPandangUser');
Route::get('/tim','TimController@getTimUser')->name('getTimUser');
Route::get('/kerja-sama','TentangController@getMitraUser')->name('getMitraUser');
Route::get('/makna-logo','MaknaLogoController@getMaknaLogoUser')->name('getMaknaLogoUser');

Route::get('/photo','GaleriController@getFotoUser')->name('getFotoUser');
Route::get('/poster','GaleriController@getPosterUser')->name('getPosterUser');

Route::get('/kontak','KontakController@kontakUser')->name('kontakUser');
Route::post('/pesan','PesanController@storePesan')->name('storePesan');

Route::get('lang/{language}', 'LocalizationController@switch')->name('localization.switch');


Route::group(['middleware' => ['auth','checkRole:superadmin,admin'],'prefix' => 'dashboard'], function(){
  Route::get('/','UserController@index')->name('index_admin');
  Route::get('/myprofile','TimController@profile')->name('profile');
  Route::post('/myprofile','TimController@updateProfil')->name('updateProfil');
  Route::post('/ubahpassword','TimController@ubahPassword')->name('ubahPassword');
  Route::group(['prefix'=>'berita'],function(){
    Route::get('/','PostController@getPosts')->name('getPosts');
    Route::get('/create','PostController@createPost')->name('createPost');
    Route::post('/','PostController@storePost')->name('storePost');
    Route::get('/edit/{id}','PostController@editPost')->name('editPost');
    Route::patch('/','PostController@updatePost')->name('updatePost');
    Route::get('/delete/{id}','PostController@deletePost')->name('deletePost');

  });

  Route::group(['prefix'=>'foto'],function(){
    Route::get('/','GaleriController@getFoto')->name('getFoto');
    Route::post('/','GaleriController@storeFoto')->name('storeFoto');
    Route::get('/delete/{id}','GaleriController@deleteFoto')->name('deleteFoto');
  });

  Route::group(['prefix'=>'poster'],function(){
    Route::get('/','GaleriController@getPoster')->name('getPoster');
    Route::post('/','GaleriController@storePoster')->name('storePoster');
    Route::get('/delete/{id}','GaleriController@deletePoster')->name('deletePoster');
  });

  Route::group(['prefix'=>'banner'],function(){
    Route::get('/','BannerController@getBanner')->name('getBanner');
    Route::post('/','BannerController@storeBanner')->name('storeBanner');
    Route::get('/delete/{id}','BannerController@deleteBanner')->name('deleteBanner');
  });

  Route::group(['prefix'=>'video-banner'],function(){
    Route::get('/','BannerController@getVideoBanner')->name('getVideoBanner');
    Route::post('/','BannerController@storeVideoBanner')->name('storeVideoBanner');
  });

  Route::group(['prefix'=>'kategori'],function(){
    Route::get('/','KategoriController@getKategori')->name('getKategori');
    Route::post('/','KategoriController@storeKategori')->name('storeKategori');
  });

  Route::group(['prefix'=>'kontak'],function(){
    Route::get('/','KontakController@getKontak')->name('getKontak');
    Route::post('/','KontakController@storeKontak')->name('storeKontak');
  });

  Route::group(['prefix'=>'tentang'],function(){
    Route::group(['prefix'=>'selayang-pandang'],function(){
      Route::get('/','TentangController@getSelayangPandang')->name('getSelayangPandang');
      Route::post('/','TentangController@storeSelayangPandang')->name('storeSelayangPandang');
    });

    Route::group(['prefix'=>'kerjasama'],function(){
      Route::get('/','TentangController@getMitra')->name('getMitra');
      Route::post('/','TentangController@storeMitra')->name('storeMitra');
      Route::get('/delete/{id}','TentangController@deleteMitra')->name('deleteMitra');
    });

    Route::group(['prefix'=>'logo'],function(){
      Route::get('/','MaknaLogoController@getMaknaLogo')->name('getMaknaLogo');
      Route::post('/','MaknaLogoController@storeMaknaLogo')->name('storeMaknaLogo');
    });
  });

  Route::group(['prefix'=>'green-campus'],function(){
    Route::group(['prefix'=>'penataan&infrastruktur'],function(){
      Route::get('/','GreenCampusController@getPenataan')->name('getPenataan');
      Route::post('/','GreenCampusController@storePenataan')->name('storePenataan');
      Route::get('/delete/{id}','GreenCampusController@deletePenataan')->name('deletePenataan');
    });

    Route::group(['prefix'=>'energi&perubahaniklim'],function(){
      Route::get('/','GreenCampusController@getEnergi')->name('getEnergi');
      Route::post('/','GreenCampusController@storeEnergi')->name('storeEnergi');
      Route::get('/delete/{id}','GreenCampusController@deleteEnergi')->name('deleteEnergi');
    });

    Route::group(['prefix'=>'limbah'],function(){
      Route::get('/','GreenCampusController@getLimbah')->name('getLimbah');
      Route::post('/','GreenCampusController@storeLimbah')->name('storeLimbah');
      Route::get('/delete/{id}','GreenCampusController@deleteLimbah')->name('deleteLimbah');
    });

    Route::group(['prefix'=>'air'],function(){
      Route::get('/','GreenCampusController@getAir')->name('getAir');
      Route::post('/','GreenCampusController@storeAir')->name('storeAir');
      Route::get('/delete/{id}','GreenCampusController@deleteAir')->name('deleteAir');
    });

    Route::group(['prefix'=>'transportasi'],function(){
      Route::get('/','GreenCampusController@getTransportasi')->name('getTransportasi');
      Route::post('/','GreenCampusController@storeTransportasi')->name('storeTransportasi');
      Route::get('/delete/{id}','GreenCampusController@deleteTransportasi')->name('deleteTransportasi');
    });

    Route::group(['prefix'=>'pendidikan'],function(){
      Route::get('/','GreenCampusController@getPendidikan')->name('getPendidikan');
      Route::post('/','GreenCampusController@storePendidikan')->name('storePendidikan');
      Route::get('/delete/{id}','GreenCampusController@deletePendidikan')->name('deletePendidikan');
    });
  });

  Route::group(['prefix'=>'event'],function(){
    Route::get('/','EventController@getEvent')->name('getEvent');
    Route::post('/','EventController@storeEvent')->name('storeEvent');
    Route::get('/delete/{id}','EventController@deleteEvent')->name('deleteEvent');
  });

  Route::group(['prefix'=>'pesan'],function(){
    Route::get('/','PesanController@getPesan')->name('getPesan');

    Route::get('/{id}','PesanController@showPesan')->name('showPesan');
    Route::get('/delete/{id}','PesanController@deletePesan')->name('deletePesan');

  });



});

Route::group(['middleware' => ['auth','checkRole:superadmin'],'prefix' => 'dashboard'],function(){
  Route::get('/tim','TimController@getTim')->name('getTim');
  Route::post('/tim','TimController@storeTim')->name('storeTim');
  Route::get('/tim/{id}/{user_id}','TimController@deleteTim')->name('deleteTim');
  Route::post('/tim/update','TimController@updateTim')->name('updateTim');
});


Route::get('/home', 'HomeController@index')->name('home');
