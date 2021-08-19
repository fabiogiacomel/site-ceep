<?php
use Westsoft\Acl\Controllers\AclController;

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
Auth::routes(['register' => false]);


Route::get('conselho-graph-report', 'ConselhoRegistroController@showGraphReport')->name('conselho.graph.report.create');
Route::post('conselho-graph-report', 'ConselhoRegistroController@graphReport')->name('conselho.graph.report');

/**
 * Rotas livres
 */
Route::get('/', 'IndexController@index')->name('index');
Route::get('home', 'HomeController@index')->name('home');
Route::get('face', 'facebookController@index')->name('facebook');
Route::get('noticias', 'IndexController@noticias')->name('noticias');
Route::get('informes_secretaria', 'IndexController@secretarias')->name('informes_secretaria');
//Route::post('contato', 'IndexController@enviar_email')->name('enviar_email');

Route::group(['middleware' => 'cors'], function () {
    Route::post('aluno/cadastro', 'Usuarios_internetController@cadastro');
});

Route::resource('conselho-disciplina', 'ConselhoDisciplinaController');
/**
 * Rotas com restrição de login e ACL
 *
 */
Route::group(['middleware' => ['auth']], function () {
    Route::resource('planejamento', 'PlanejamentoController');
    Route::resource('conselho-categoria', 'ConselhoCategoriaController');
    Route::resource('conselho-informacao', 'ConselhoInformacaoController');
    Route::resource('conselho-disciplina-curso', 'DisciplinaCursoController');
    
    Route::resource('conselho-registro', 'ConselhoRegistroController');
    Route::get('conselho-report', 'ConselhoRegistroController@showReport')->name('conselho.report.create');
    Route::post('conselho-report', 'ConselhoRegistroController@report')->name('conselho.report');
    Route::post('conselho-report', 'ConselhoRegistroController@report')->name('conselho.report');
    Route::any('conselho-create-simplificado', 'ConselhoDisciplinaController@createSimplificado')->name('conselho.simplificado');
    Route::any('conselho-create-completo', 'ConselhoDisciplinaController@createCompleto')->name('conselho.completo');

    Route::resource('/expoceep-projeto', 'ExpoceepController');
});

Route::group(['middleware' => ['auth', 'check.permissions']], function () {
    Route::get('planejamentos', 'PlanejamentoController@all')->name('planejamento.all');
    Route::resource('users', 'UsuarioController');

    //Route::resource('banner', 'BannerController');
    //Route::resource('curso', 'CursoController');
    //Route::resource('livro_registro', 'Livro_registroController');
    //Route::resource('noticia', 'NoticiaController');
    Route::resource('secretaria', 'SecretariaController');
    //Route::resource('usuario_google', 'Usuario_googleController');
    //Route::resource('usuarios_internet', 'Usuarios_internetController');
    Route::get('/laravel-filemanager', '\UniSharp\LaravelFilemanager\Controllers\LfmController@show');
    Route::post('/laravel-filemanager/upload', '\UniSharp\LaravelFilemanager\Controllers\UploadController@upload');
    //Route::get('logout', 'Auth\LoginController@logout')->name('logout');
    /*  Route::get('/load_usuarios', 'UsuarioController@create'); */
    Route::get('/load_profiles', 'UsuarioController@load_profiles');


    Route::get('usuario_novo', 'HomeController@showRegistrationForm')->name('usuario_novo');
    Route::post('usuario_novo', 'HomeController@create')->name('criar_usuario');
    Route::get('/admin-conselho', function () {
        return view('conselho.index');
    })->name('conselho.admin');
});

/**
 * Hack para remover rota de registro
 */
 Route::match(['get', 'post'], 'register', function(){
    return redirect('/');
});
Route::resource('/expoceep-projeto', 'ExpoceepController');
Route::resource('/biblioteca', 'BibliotecaController');





