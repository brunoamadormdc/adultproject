<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'apiController@getHome');
Route::get('/testeuselink', 'apiController@getUseLink');
Route::get('/sitemap', 'apiController@sitemap');
Route::get('/detalhes/{slug}/{id}', 'apiController@getDetalhes');
Route::get('/detalhes-modelo/{slug}/{id_modelo}', 'apiController@getDetalhesmodelo');
Route::get('/categorias/{nomecategoria}', 'apiController@getPorcategoria');
Route::get('/busca',[
    'uses' => 'apiController@getBusca', 
    'as' => 'busca.route'
]);
Route::get('/pagamento','PaymentController@pagamento');

Route::group(['prefix' => 'admin','middleware' => 'checkloginacompanhante'], function () {
    Route::get('/', 'adminController@getAdmin')->name('admin');
    Route::get('/dadoscadastrais', 'adminController@dadoscadastrais')->name('dadoscadastrais');
    Route::post('/salvardados', 'adminController@salvardados')->name('salvardados');
    Route::post('/salvarfotoperfil', 'adminController@salvarfotoperfil')->name('salvarfotoperfil');
    Route::post('/salvarfotocapa', 'adminController@salvarfotocapa')->name('salvarfotocapa');
    Route::post('/salvarinfospessoais', 'adminController@salvarinfospessoais')->name('salvarinfospessoais');
    Route::post('/salvarfotogaleria', 'adminController@salvarfotogaleria')->name('salvarfotogaleria');
    Route::post('/excluirfoto', 'adminController@excluirfoto')->name('excluirfoto');
    Route::post('/salvarvideo', 'adminController@salvarvideo')->name('salvarvideo');
    Route::post('/excluirvideo', 'adminController@excluirvideo')->name('excluirvideo');
    Route::get('/infospessoais', 'adminController@infospessoais')->name('infospessoais');
    Route::get('/aparencia', 'adminController@aparencia')->name('aparencia');
    Route::get('/fotos', 'adminController@fotos')->name('fotos');
    Route::get('/videos', 'adminController@videos')->name('videos');
    Route::get('/audios', 'adminController@audios')->name('audios');
    Route::get('/logout', 'adminController@logout')->name('logout');
});
Route::group(['prefix' => 'adminrestrict','middleware' => 'checkrestrict'], function () {
    Route::get('/', 'admController@getAdmin')->name('adminrestrict');
    Route::get('/dadoscadastraisusuario', 'admController@dadoscadastrais')->name('dadoscadastraisrestrict');
    Route::post('/editarvideo', 'admController@editarVideo')->name('editarvideorestrict');
    Route::post('/excluirvideo', 'admController@excluirVideo')->name('excluirvideorestrict');
    Route::get('/videos', 'admController@getVideos')->name('videosrestrict');
    Route::get('/novovideo', 'admController@getNovovideo')->name('novovideoadmin');
    Route::post('/salvardados', 'admController@salvardados')->name('salvardadosrestrict');
    Route::post('/salvarvideo', 'admController@salvarVideo')->name('salvarnovovideo');
    
        
});
Route::group(['prefix' => 'usuario','middleware' => 'checkloginusuario'], function () {
    Route::get('/', 'usuarioController@getAdmin')->name('adminusuario');
    Route::get('/dadoscadastraisusuario', 'usuarioController@dadoscadastrais')->name('dadoscadastraisusuario');
    Route::get('/checkoutcreditos', 'usuarioController@checkoutcreditos')->name('checkoutcreditos');
    Route::get('/sucessopagamento', 'usuarioController@checkoutcreditos')->name('sucessopagamento');
    Route::get('/cancelapagamento', 'usuarioController@checkoutcreditos')->name('cancelapagamento');
    Route::post('/salvardados', 'usuarioController@salvardados')->name('salvardadosusuario');
});

Route::group(['prefix' => 'sign',], function () {
    Route::get('/', 'adminController@loginPage')->name('login');
    Route::post('/fazerlogin','adminController@fazerlogin')->name('fazerlogin');
    Route::get('/register', 'adminController@registerPage')->name('register');
    Route::get('/validatoken', 'adminController@validatoken')->name('validatoken');
    Route::post('/saveregister','adminController@saveregister')->name('saveregister');
    Route::post('/validartokenregistro','adminController@validartokenregistro')->name('validartokenregistro');
});
Route::group(['prefix' => 'usersign',], function () {
    Route::get('/', 'usuarioController@loginPage')->name('loginuser');
    Route::post('/fazerlogin','usuarioController@fazerlogin')->name('fazerloginusuario');
    Route::get('/register', 'usuarioController@registerPage')->name('registerusuario');
    Route::get('/validatoken', 'usuarioController@validatoken')->name('validatokenusuario');
    Route::post('/saveregister','usuarioController@saveregister')->name('saveregisterusuario');
    Route::post('/validartokenregistro','usuarioController@validartokenregistro')->name('validartokenregistrousuario');
});
Route::group(['prefix' => 'restrictsign',], function () {
    Route::get('/', 'admController@loginPage')->name('loginrestrict');
    Route::post('/fazerlogin','admController@fazerlogin')->name('fazerloginrestrict');
    Route::get('/register', 'admController@registerPage')->name('registerrestrict');
    Route::get('/validatoken', 'admController@validatoken')->name('validatokenrestrict');
    Route::post('/saveregister','admController@saveregister')->name('saveregisterrestrict');
    Route::post('/validartokenregistro','admController@validartokenregistro')->name('validartokenrestrict');
});

Route::get('/laradulto','apiController@getCsv');

