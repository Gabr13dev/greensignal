<?php
//ob_start();
session_start();
header("Content-Type: text/html; charset=utf8");
date_default_timezone_set('America/Sao_Paulo');
setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');

const SSL = false;

const PROTOCOL = SSL ? "https://" : "http://";
const FOLDER = "greensignal";
const URL = PROTOCOL."localhost/".FOLDER;
const SERVIDOR = "mysql:host=localhost;dbname=greensignal_engenharia;charset=utf8";
const USUARIO = "root";
const SENHA = "";

const BASE_TITLE = "GreenSignal Engenharia";

include('lib/Core.class.php');

$core = new Core();


