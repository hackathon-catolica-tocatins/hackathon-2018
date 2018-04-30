<?
session_start();
ini_set('default_charset','UTF-8');
$conexao=mysqli_connect('localhost', 'u185260270_proj', 'alomarilene321', 'u185260270_hackt');
mysqli_query($conexao, "SET NAMES 'utf8'");
mysqli_query($conexao, 'SET NAMES character_set_connection=utf8');
mysqli_query($conexao, 'SET NAMES character_set_client=utf8');
mysqli_query($conexao, 'SET NAMES character_set_results=utf8');

php?>