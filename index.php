<?php
    require('models/user.class.php');

    function renderBody()
    {
        //require("views/{$GLOBALS['viewName']}.php");

        if (isset($GLOBALS['viewName'])) {
            $filename = "views/{$GLOBALS['viewName']}.php";
            if (file_exists($filename)) {
                require($filename);
            } else {
                require('views/notFound.php');
            }
        } else {
            require('views/notFound.php');
        }
    }

    $pdo = new PDO('sqlite:stores.db');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER);

    if (isset($_GET['action']))
    {
        $action = $_GET['action'];
        switch($action)
        {
            case 'products':
                $viewName = 'products';
                require('layout.php');
                exit();
                break;
            // ...
            case 'users':
                $result = $pdo->query("SELECT * FROM User")->fetchAll(PDO::FETCH_CLASS, 'User');
                $viewName = 'users';
                require('layout.php');
                exit();
                break;
            case 'userdetails':
                // GUID-Parameter auslesen
                if (isset($_GET['guid']))
                {
                    header("Content-Type: application/json");
                    $guid = $_GET['guid'];
                    $data = $pdo->query("SELECT * FROM User WHERE Guid = '$guid'")->fetch();
                    echo(json_encode($data));
                }
                else
                {
                    require('views/notFound.php');
                }
                exit();
                break;
            default:
                require('views/notFound.php');
                exit();
                break;
        }
    }
    else
    {
        //...
    }
?>
