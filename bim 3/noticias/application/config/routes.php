<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'UsuariosController';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['cadastraNoticia'] = '/NoticiasController/cadastrar';
$route['excluirNoticia/(:any)'] = '/NoticiasController/excluir';
$route['editarUsuario/(:any)'] = '/UsuariosController/editar';
$route['listarAutores'] = '/UsuariosController/listar';
$route['listarNoticias'] = '/NoticiasController/listar';
$route['deslogar'] = '/UsuariosController/deslogar';