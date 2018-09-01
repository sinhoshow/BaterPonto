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

$this->group(['middleware' => ['auth'], 'namespace' => 'Admin', 'prefix' => 'painel'], function(){
    $this->get('/', 'AdminController@index')->name('painel');
    
    $this->post('register', 'RegisterController@register')->name('register.employed');
    $this->get('register', 'RegisterController@index')->name('register');
    
    $this->any('pontos-filtro', 'PontosController@filtro')->name('pontos.filtro');
    $this->get('pontos', 'PontosController@index')->name('pontos');
    
});

$this->get('/', 'Site\SiteController@index')->name('home');
$this->post('/', 'Site\SiteController@batePonto')->name('register.point');

Auth::routes();


