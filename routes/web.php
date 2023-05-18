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

use Dompdf\Dompdf;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\ChatController;


Route::get('/pdflaporan', [\App\Http\Controllers\LaporanzakatController::class, 'generatePdf']);

Route::get('/', function () {
    return view('pages.auth.login');
});

Route::get('dashboard', function () {
    return view('dashboard');
});

Route::group(['prefix' => 'email'], function(){
    Route::get('inbox', function () { return view('pages.email.inbox'); });
    Route::get('read', function () { return view('pages.email.read'); });
    Route::get('compose', function () { return view('pages.email.compose'); });
});


Route::group(['prefix' => 'apps'], function(){
    // Route::get('chat', function () { return view('pages.apps.chat'); });
    Route::get('calendar', function () { return view('pages.apps.calendar'); });
});

Route::get('/laporanzakatwarga', 'LaporanzakatController@indexwarga');
Route::get('/ceklaporanzakat', 'LaporanzakatController@indexadmin');
Route::get('/cekzakat', 'LaporanzakatController@index');
Route::get('/users/search', 'ZakatController@search');

Route::get('/ads.txt',function(){
    return view('ads');
 });

// ChatGPT
Route::get('/writer', function () {
    $title = '';
    $content = '';
    return view('pages.apps.chat', compact('title', 'content'));
    });

    Route::post('/writer/generate', [ChatController::class, 'index']);
    
Route::post('send', [ChatController::class, 'sendChat']);

Route::resource('/wargas', \App\Http\Controllers\WargaController::class);
// AutoComplate
Route::get('/catatan-kematian/autocomplete', 'CatatanKematianController@autocomplete')->name('wargas.autocomplete');
Route::get('/iuran/autocomplete', 'IuranController@autocomplete')->name('iuran.autocomplete');

Route::resource('/changepass', \App\Http\Controllers\GantipassController::class);
Route::resource('/pengumuman', \App\Http\Controllers\PengumumanController::class);
Route::resource('/catatan-kematian', \App\Http\Controllers\CatatanKematianController::class);
Route::resource('/berita', \App\Http\Controllers\BeritaController::class);
Route::resource('/pengaduan', \App\Http\Controllers\PengaduanController::class);
Route::resource('/zakat', \App\Http\Controllers\ZakatController::class);

Route::resource('/tamu', \App\Http\Controllers\TamuController::class);
Route::resource('/wilayah', \App\Http\Controllers\StrukturController::class);
Route::get('bukutamu', function () { return view('pages.tamu.createclients'); });
Route::get('laporankeuangan', 'KasRWController@clients');
Route::resource('/mustahiq', \App\Http\Controllers\MustahiqController::class);
Route::resource('/laporanzakat', \App\Http\Controllers\LaporanzakatController::class);
Route::get('wargadashboard', function () { return view('clients.index'); });
Route::resource('/myprofile', \App\Http\Controllers\ProfileController::class);
Route::resource('/datasaya', \App\Http\Controllers\WargaUpdateController::class);

Route::put('/wargas/{id}', 'WargaController@update')->name('wargas.update');
Route::put('/datasaya/{id}', 'WargaUpdateController@updateWarga')->name('datasaya.update');
Route::put('/changepass/{id}', 'GantipassController@update')->name('pass.update');

// Iuran
Route::resource('/iuran', \App\Http\Controllers\IuranController::class);
Route::get('iuran/filter', [IuranController::class, 'filter'])->name('iuran.filter');
Route::get('/iuransaya', 'IuranController@iuranwargapage')->name('iuran.warga');

// Kematian
Route::get('/kematian-catatan', 'CatatanKematianController@wargapage')->name('kematian.warga');

// Kelahiran
Route::resource('/catatan-kelahiran', \App\Http\Controllers\KelahiranController::class);
Route::get('generatepdf/{id}', 'PdfController@generatePdf')->name('kelahiran.generate');
Route::get('/pdf/download', 'PdfController@downloadPDF')->name('pdf.download');

// Voting
Route::resource('voting', VotingController::class);
Route::post('voting/{voting}/vote', 'VotingController@vote')->name('voting.vote');
Route::get('/voting/{id}', 'VotingController@result')->name('voting.result');

// Banner
Route::resource('bannersetting', BannerController::class);

// Kas 
Route::resource('/kas', \App\Http\Controllers\KasRWController::class);
Route::resource('/kaskarta', \App\Http\Controllers\KaskartaController::class);
Route::resource('/kasdkm', \App\Http\Controllers\KasdkmController::class);
Route::resource('/kasdamar', \App\Http\Controllers\KasdamarController::class);
// End Kas

// Log
Route::get('/berita/detaillog/{id}', 'BeritaController@detaillog')->name('detaillog.show');
Route::get('/kas/detaillog/{id}', 'KasRWController@detaillog')->name('detaillog.show');
Route::get('/kasdkm/detaillog/{id}', 'KasdkmController@detaillog')->name('detaillog.show');
Route::get('/kaskarta/detaillog/{id}', 'KaskartaController@detaillog')->name('detaillog.show');
Route::get('/kasdamar/detaillog/{id}', 'KasdamarController@detaillog')->name('detaillog.show');
// End Log

// Pengaduan
Route::resource('/pengaduanwarga', \App\Http\Controllers\PengaduanwargaController::class);
Route::get('buatpengaduan', function () { return view('pages.pengaduan.createclients'); });
// Route::middleware(['auth'])->get('/pengaduanwarga', 'App\Http\Controllers\PengaduanController@indexwarga')->name('pengaduan.indexwarga');

Route::get('mynotifications', function () { return view('clients.notifikasi'); });
Route::get('termsandconditions', function () { return view('pages.general.terms'); });
Route::get('privacyandsafety', function () { return view('pages.general.privacy'); });
Route::get('chat', function () { return view('pages.apps.chat'); });
Route::get('allfeatures', function () { return view('clients.allfeatures'); });

Route::get('pengumuman/{id}/download', 'PengumumanController@download')->name('pengumuman.download');
Route::get('/berita/{id}', 'BeritaController@show')->name('berita.show');
Route::get('/pengaduan/{id}', 'PengaduanController@show')->name('pengaduan.show');


Route::group(['prefix' => 'ui-components'], function(){
    Route::get('accordion', function () { return view('pages.ui-components.accordion'); });
    Route::get('alerts', function () { return view('pages.ui-components.alerts'); });
    Route::get('badges', function () { return view('pages.ui-components.badges'); });
    Route::get('breadcrumbs', function () { return view('pages.ui-components.breadcrumbs'); });
    Route::get('buttons', function () { return view('pages.ui-components.buttons'); });
    Route::get('button-group', function () { return view('pages.ui-components.button-group'); });
    Route::get('cards', function () { return view('pages.ui-components.cards'); });
    Route::get('carousel', function () { return view('pages.ui-components.carousel'); });
    Route::get('collapse', function () { return view('pages.ui-components.collapse'); });
    Route::get('dropdowns', function () { return view('pages.ui-components.dropdowns'); });
    Route::get('list-group', function () { return view('pages.ui-components.list-group'); });
    Route::get('media-object', function () { return view('pages.ui-components.media-object'); });
    Route::get('modal', function () { return view('pages.ui-components.modal'); });
    Route::get('navs', function () { return view('pages.ui-components.navs'); });
    Route::get('navbar', function () { return view('pages.ui-components.navbar'); });
    Route::get('pagination', function () { return view('pages.ui-components.pagination'); });
    Route::get('popovers', function () { return view('pages.ui-components.popovers'); });
    Route::get('progress', function () { return view('pages.ui-components.progress'); });
    Route::get('scrollbar', function () { return view('pages.ui-components.scrollbar'); });
    Route::get('scrollspy', function () { return view('pages.ui-components.scrollspy'); });
    Route::get('spinners', function () { return view('pages.ui-components.spinners'); });
    Route::get('tabs', function () { return view('pages.ui-components.tabs'); });
    Route::get('tooltips', function () { return view('pages.ui-components.tooltips'); });
});

Route::group(['prefix' => 'advanced-ui'], function(){
    Route::get('cropper', function () { return view('pages.advanced-ui.cropper'); });
    Route::get('owl-carousel', function () { return view('pages.advanced-ui.owl-carousel'); });
    Route::get('sortablejs', function () { return view('pages.advanced-ui.sortablejs'); });
    Route::get('sweet-alert', function () { return view('pages.advanced-ui.sweet-alert'); });
});

Route::group(['prefix' => 'forms'], function(){
    Route::get('basic-elements', function () { return view('pages.forms.basic-elements'); });
    Route::get('advanced-elements', function () { return view('pages.forms.advanced-elements'); });
    Route::get('editors', function () { return view('pages.forms.editors'); });
    Route::get('wizard', function () { return view('pages.forms.wizard'); });
});

Route::group(['prefix' => 'charts'], function(){
    Route::get('apex', function () { return view('pages.charts.apex'); });
    Route::get('chartjs', function () { return view('pages.charts.chartjs'); });
    Route::get('flot', function () { return view('pages.charts.flot'); });
    Route::get('peity', function () { return view('pages.charts.peity'); });
    Route::get('sparkline', function () { return view('pages.charts.sparkline'); });
});

Route::group(['prefix' => 'tables'], function(){
    Route::get('basic-tables', function () { return view('pages.tables.basic-tables'); });
    Route::get('data-table', function () { return view('pages.tables.data-table'); });
});

Route::group(['prefix' => 'icons'], function(){
    Route::get('feather-icons', function () { return view('pages.icons.feather-icons'); });
    Route::get('mdi-icons', function () { return view('pages.icons.mdi-icons'); });
});

Route::group(['prefix' => 'general'], function(){
    Route::get('blank-page', function () { return view('pages.general.blank-page'); });
    Route::get('faq', function () { return view('pages.general.faq'); });
    Route::get('invoice', function () { return view('pages.general.invoice'); });
    Route::get('profile', function () { return view('pages.general.profile'); });
    Route::get('pricing', function () { return view('pages.general.pricing'); });
    Route::get('timeline', function () { return view('pages.general.timeline'); });
});

Route::controller(LoginController::class)->group(function(){
    Route::get('login','index')->name('login');
    Route::post('login/proses','proses');
});

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

Route::group(['middleware' => ['auth']],function(){
    Route::group(['middleware' => ['CekUserLogin:1']],function(){
        Route::resource('dashboard',Dashboard::class);
    });
    Route::group(['middleware' => ['CekUserLogin:2']],function(){
        Route::resource('wargadashboard',WargadashboardController::class);
    });
});

Route::group(['prefix' => 'auth'], function(){
    Route::get('login', function () { return view('pages.auth.login'); });
    Route::get('register', function () { return view('pages.auth.register'); });
});

Route::group(['prefix' => 'error'], function(){
    Route::get('404', function () { return view('pages.error.404'); });
    Route::get('500', function () { return view('pages.error.500'); });
});

Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});

// 404 for undefined routes
Route::any('/{page?}',function(){
    return View::make('pages.error.404');
})->where('page','.*');
