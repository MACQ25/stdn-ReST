<?php

    require 'php/login.php';
    require 'php/register.php';
    require 'php/DB.php';

    session_start();

    $reqMethod = $_SERVER['REQUEST_METHOD'];
    $path = $_SERVER['REQUEST_URI'];


    $prefix = "/my_api/REST/";

    $request = substr($path, strlen("$prefix"));

    $dbh = dbAccess();

    $data = filter_var_array(json_decode(file_get_contents('php://input'), true), FILTER_SANITIZE_SPECIAL_CHARS);

    if(!isset($_SESSION["user"])){
        if($reqMethod == "POST"){
            echo json_encode(register($data, $dbh));
        } elseif ($reqMethod == "GET"){

        }
    } else switch($reqMethod){
        case "POST":

            break;
        default:
            echo "I am sorry Dave, I am afraid I can't let you do that";
            break;
    }

    echo json_encode([0 => $reqMethod, 1 => "$reqMethod request received at '$path' .\n\n", 2 => "The request was '$request'.\n\n", 3 => $data]);

?>