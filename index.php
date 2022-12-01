<?php
    require('models/user.class.php');
    require('models/product.class.php');
    require('models/offer.class.php');
    require('models/priceTrend.class.php');

    function renderBody()
    {
        $filename = "views/{$GLOBALS['viewName']}.php";
        if (file_exists($filename)) {
            require($filename);
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
                $result = $pdo->query("SELECT * FROM Product")->fetchAll(PDO::FETCH_CLASS, 'Product');
                $viewName = 'products';
                require('layout.php');
                //exit();
                break;
            case 'offers':
                $result = $pdo->query("SELECT * FROM Offer")->fetchAll(PDO::FETCH_CLASS, 'Offer');
                $viewName = 'offers';
                require('layout.php');
                //exit();
                break;
            case 'trends':
                if (isset($_GET['offerid']))
                {
                    header("Content-Type: application/json");
                    $offerid = $_GET['offerid'];
                    $data = $pdo->query("SELECT * FROM PriceTrend WHERE OfferId = '$offerid'")->fetchAll(PDO::FETCH_CLASS, 'PriceTrend');
                    echo(json_encode($data));
                }
                else
                {
                    require('views/notFound.php');
                }
                //exit();
                break;
            case 'users':
                $result = $pdo->query("SELECT * FROM User")->fetchAll(PDO::FETCH_CLASS, 'User');
                $viewName = 'users';
                require('layout.php');
                //exit();
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
                //exit();
                break;
            case 'create':
                header("Access-Control-Allow-Origin: *");
                header("Access-Control-Allow-Methods: GET, POST");
                header("Content-Type: application/json; charset=UTF-8");
                // read raw json data from client
                $content = trim(file_get_contents("php://input"));
                // decode json
                $decoded = json_decode($content, true);
                // access field
                $response = $decoded['productName'];
                http_response_code(201);
                echo json_encode(
                    array("message" => "Created", "value" => $decoded)
                );
                //exit();
                break;
            case 'new':
                $viewName = 'createProduct';
                require('layout.php');
                break;
            default:
                require('views/notFound.php');
                //exit();
                break;
        }
        exit();
    }
    else
    {
        //...
    }
?>
