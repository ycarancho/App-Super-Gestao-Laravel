<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware;
use App\Http\Middleware\LogAcessoMiddleware;

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

Route::get('/', 'PrincipalController@principal')->name('site.index');

Route::get('/sobre-nos', 'SobrenosController@sobrenos')->name('site.sobrenos');

Route::get('/contato', 'ContatoController@contato')->name('site.contato');
Route::post('/contato', 'ContatoController@Salvar_contato')->name('site.contato');
Route::get('/login/{erro?}', 'LoginController@index')->name('site.login');
Route::post('/login', 'LoginController@auth')->name('site.login');

/* Agrupa rotas com um prefixo */
Route::middleware('autenticacao')->prefix('/app')->group(function () {
    Route::get('/fornecedor', 'FornecedoresController@index')->name('app.fornecedor');
    Route::post('/fornecedor/listarFornecedores', 'FornecedoresController@listarFornecedores')->name('app.fornecedor.listarFornecedores');
    Route::get('/fornecedor/listarFornecedores', 'FornecedoresController@listarFornecedores')->name('app.fornecedor.listarFornecedores');
    Route::get('/fornecedor/adicionar', 'FornecedoresController@adicionar')->name('app.fornecedor.adicionar');
    Route::post('/fornecedor/adicionar', 'FornecedoresController@adicionarFornecedor')->name('app.fornecedor.adicionarFornecedor');
    Route::get('/fornecedor/editar/{id}/{msg?}', 'FornecedoresController@editar')->name('app.fornecedor.editar');
    Route::get('/fornecedor/excluir/{id}', 'FornecedoresController@excluir')->name('app.fornecedor.excluir');

    Route::get('/home', 'HomeController@index')->name('app.home');
    Route::get('/cliente', 'ClienteController@index')->name('app.cliente');

    //resource controller Produto
    Route::resource('produto', 'ProdutoController');
    //resource controller ProdutoDetalhe
    Route::resource('produto-detalhe', 'ProdutoDetalheController');

    Route::get('/sair','LoginController@sair')->name('app.sair');
});

/* Redirecionamento entre rotas */
Route::get('/teste/{p1}/{p2}', 'TesteController@teste')->name('site.teste');
// Route::get('/route2', function(){
//     return redirect()->route('site.rota1');
// })->name('site.rota2');
// Route::redirect('route2','route1');

//Rota de fallback
Route::fallback(function(){
    echo 'A rota acessada n??o existe, <a href="'.route('site.index').'"> clique aqui</a> para retornar a pagina inicial.';
});

// Route::get('/contato/{name}/{lastname}/{message}', function(string $name, string $lastname, string $message){
// echo "Hello there - $name What's your last name ? 
//         -My last name is $lastname
//         -Alright $message";
// });
/*para ecaminhar parametros opcionais, basta adicionar uma ? na frente do parametro e colocar uma mensagem default no parametro
EX: {message?} function(string $message = 'Mensagem Padr??o')*/
// Route::get(
//     '/contato/{name}/{CategoryId}',
//     function (string $name, string $CategoryId) {
//         echo "Hello there, $name, What's your category? 
//               My category is $CategoryId";
//     }
// )->where('name', '[A-Za-z]+')->where('CategoryId', '[0-9]+');
