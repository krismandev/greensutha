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
  Route::get('/single/{slug}','PostController@showPostUser')->name('showPostUser');
  Route::get('/search','PostController@searchPostsUser')->name('searchPostsUser');
  // Route::get('/','PostController@getPostsUser')->name('getPostsUser');
  Route::get('/{kategori?}','PostController@getPostsByCategory')->name('getPostsByCategory');
  Route::get('/ktg/lingkungan','PostController@getBeritaLingkungan')->name('getBeritaLingkungan');
  Route::get('/ktg/islam','PostController@getBeritaIslam')->name('getBeritaIslam');
  Route::get('/ktg/sosial','PostController@getBeritaSosial')->name('getBeritaSosial');
  Route::get('/ktg/pendidikan','PostController@getBeritaPendidikan')->name('getBeritaPendidikan');
  Route::get('/ktg/budaya','PostController@getBeritaBudaya')->name('getBeritaBudaya');
  Route::get('/ktg/ekonomi','PostController@getBeritaEkonomi')->name('getBeritaEkonomi');
  Route::get('/ktg/sains','PostController@getBeritaSains')->name('getBeritaSains');

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
Route::get('/profil-kampus','TentangController@getProfilKampusUser')->name('getProfilKampusUser');
Route::get('/tentang-greensutha','TentangController@getTentangGreensuthaUser')->name('getTentangGreensuthaUser');
Route::get('/admisi-promosi','TentangController@getAdmisiPromosiUser')->name('getAdmisiPromosiUser');

Route::get('/photo','GaleriController@getFotoUser')->name('getFotoUser');
Route::get('/poster','GaleriController@getPosterUser')->name('getPosterUser');

Route::get('/kontak','KontakController@kontakUser')->name('kontakUser');
Route::post('/pesan','PesanController@storePesan')->name('storePesan');

Route::get('lang/{language}', 'LocalizationController@switch')->name('localization.switch');

Route::get('/environment','EventController@getEnvironmentUser')->name('getEnvironmentUser');
Route::get('/student-organization','EventController@getStudentUser')->name('getStudentUser');
Route::get('/webinar','EventController@getWebinarUser')->name('getWebinarUser');
Route::get('/seminar&conference','EventController@getSemConUser')->name('getSemConUser');
Route::get('/survey','EventController@getSurveyUser')->name('getSurveyUser');
Route::get('/lokakarya','EventController@getLokakaryaUser')->name('getLokakaryaUser');
Route::get('/greensutha-award','EventController@getAwardUser')->name('getAwardUser');

Route::get('/buku','PublikasiController@getBukuUser')->name('getBukuUser');
Route::get('/jurnal','PublikasiController@getJurnalUser')->name('getJurnalUser');
Route::get('/annual-report','PublikasiController@getReportUser')->name('getReportUser');
Route::get('/dokumen','PublikasiController@getDokumenUser')->name('getDokumenUser');

Route::get('/penelitian','PenelitianController@getPenelitianUser')->name('getPenelitianUser');
Route::get('/pengabdian','PengabdianController@getPengabdianUser')->name('getPengabdianUser');



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

    Route::group(['prefix'=>'profilkampus'],function(){
        Route::get('/','TentangController@getProfilKampus')->name('getProfilKampus');
        Route::post('/','TentangController@storeProfilKampus')->name('storeProfilKampus');
      });

    Route::group(['prefix'=>'logo'],function(){
      Route::get('/','MaknaLogoController@getMaknaLogo')->name('getMaknaLogo');
      Route::post('/','MaknaLogoController@storeMaknaLogo')->name('storeMaknaLogo');
    });

    Route::group(['prefix'=>'admisi-promosi'],function(){
        Route::get('/','TentangController@getAdmisiPromosi')->name('getAdmisiPromosi');
        Route::post('/','TentangController@storeAdmisiPromosi')->name('storeAdmisiPromosi');
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
    Route::group(['prefix'=>'environment&sustainability'],function(){
      Route::get('/','EventController@getEnvironment')->name('getEnvironment');
      Route::patch('/','EventController@updateEnvironment')->name('updateEnvironment');
      Route::post('/','EventController@storeEnvironment')->name('storeEnvironment');
      Route::get('/delete/{id}','EventController@deleteEnvironment')->name('deleteEnvironment');
    });
    Route::group(['prefix'=>'student-organization'],function(){
      Route::get('/','EventController@getStudent')->name('getStudent');
      Route::patch('/','EventController@updateStudent')->name('updateStudent');
      Route::post('/','EventController@storeStudent')->name('storeStudent');
      Route::get('/delete/{id}','EventController@deleteStudent')->name('deleteStudent');
    });

    Route::group(['prefix'=>'webinar'],function(){
        Route::get('/','EventController@getWebinar')->name('getWebinar');
        Route::patch('/','EventController@updateWebinar')->name('updateWebinar');
        Route::post('/','EventController@storeWebinar')->name('storeWebinar');
        Route::get('/delete/{id}','EventController@deleteWebinar')->name('deleteWebinar');
    });

    Route::group(['prefix'=>'survey'],function(){
        Route::get('/','EventController@getSurvey')->name('getSurvey');
        Route::patch('/','EventController@updateSurvey')->name('updateSurvey');
        Route::post('/','EventController@storeSurvey')->name('storeSurvey');
        Route::get('/delete/{id}','EventController@deleteSurvey')->name('deleteSurvey');
    });

    Route::group(['prefix'=>'lokakarya'],function(){
        Route::get('/','EventController@getLokakarya')->name('getLokakarya');
        Route::patch('/','EventController@updateLokakarya')->name('updateLokakarya');
        Route::post('/','EventController@storeLokakarya')->name('storeLokakarya');
        Route::get('/delete/{id}','EventController@deleteLokakarya')->name('deleteLokakarya');
    });

    Route::group(['prefix'=>'seminar&conference'],function(){
        Route::get('/','EventController@getSemcon')->name('getSemcon');
        Route::patch('/','EventController@updateSemcon')->name('updateSemcon');
        Route::post('/','EventController@storeSemcon')->name('storeSemcon');
        Route::get('/delete/{id}','EventController@deleteSemcon')->name('deleteSemcon');
    });

    Route::group(['prefix'=>'award'],function(){
        Route::get('/','EventController@getAward')->name('getAward');
        Route::patch('/','EventController@updateAward')->name('updateAward');
        Route::post('/','EventController@storeAward')->name('storeAward');
        Route::get('/delete/{id}','EventController@deleteAward')->name('deleteAward');
    });


  });

  Route::group(['prefix' => 'publikasi'],function(){
    Route::group(['prefix' => 'jurnal'],function(){
        Route::get('/','PublikasiController@getJurnal')->name('getJurnal');
        Route::post('/','PublikasiController@postJurnal')->name('postJurnal');
        Route::get('/{id}','PublikasiController@editJurnal')->name('editJurnal');
        Route::patch('/','PublikasiController@updateJurnal')->name('updateJurnal');
        Route::get('/delete/{id}','PublikasiController@deleteJurnal')->name('deleteJurnal');
    });

    Route::group(['prefix' => 'buku'],function(){
        Route::get('/','PublikasiController@getBuku')->name('getBuku');
        Route::post('/','PublikasiController@postBuku')->name('postBuku');
        Route::get('/{id}','PublikasiController@editBuku')->name('editBuku');
        Route::patch('/','PublikasiController@updateBuku')->name('updateBuku');
        Route::get('/delete/{id}','PublikasiController@deleteBuku')->name('deleteBuku');
    });

    Route::group(['prefix' => 'report'],function(){
        Route::get('/','PublikasiController@getReport')->name('getReport');
        Route::post('/','PublikasiController@postReport')->name('postReport');
        Route::patch('/{id}','PublikasiController@updateReport')->name('updateReport');
        Route::get('/delete/{id}','PublikasiController@deleteReport')->name('deleteReport');
    });

    Route::group(['prefix' => 'dokumen'],function(){
        Route::get('/','PublikasiController@getDokumen')->name('getDokumen');
        Route::post('/','PublikasiController@postDokumen')->name('postDokumen');
        Route::patch('/{id}','PublikasiController@updateDokumen')->name('updateDokumen');
        Route::get('/delete/{id}','PublikasiController@deleteDokumen')->name('deleteDokumen');
    });

});

Route::group(['prefix' => 'pengabdian'],function(){
    Route::get('/','PengabdianController@getPengabdian')->name('getPengabdian');
    Route::post('/','PengabdianController@postPengabdian')->name('postPengabdian');
    Route::get('/delete/{id}','PengabdianController@deletePengabdian')->name('deletePengabdian');
});

Route::group(['prefix' => 'penelitian'],function(){
    Route::get('/','PenelitianController@getPenelitian')->name('getPenelitian');
    Route::post('/','PenelitianController@postPenelitian')->name('postPenelitian');
    Route::get('/delete/{id}','PenelitianController@deletePenelitian')->name('deletePenelitian');
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
  Route::get('/tim/delete/{id}','TimController@deleteTim')->name('deleteTim');
  Route::post('/tim/update','TimController@updateTim')->name('updateTim');
});


Route::get('/home', 'HomeController@index')->name('home');
