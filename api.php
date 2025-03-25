<?php
require "db_controller.php";
header("Content-type: application/json, charset:utf-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PATCH, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

$db = new DBController();
$methods = $_SERVER["REQUEST_METHOD"];

switch ($methods) {
    case 'GET':
        $products = $db->executeSelectQuery("SELECT * FROM products");
        echo json_encode($products,JSON_UNESCAPED_UNICODE);
        break;
    case 'POST':
        $data=json_encode(file_get_contents("php://input"),true);
        $query="INSERT INTO products (name, price, desc) VALUES (?,?,?)";
        $db->executeSelectQuery($query,[$data['name'],$data['price'],$data['desc']]);
        echo json_encode(["message"=>"Product created"]);
        break;
    case 'PATCH':
        $data=json_encode(file_get_contents("php://input"),true);
        $query="UPDATE products SET name=?, price=?,desc=? WHERE id=?";
        $db->executeSelectQuery($query,[$data['name'],$data['price'],$data['desc'],$data['id']]);
        echo json_encode(["message"=>"Product updated"]);
        break;
    case 'DELETE':
        $data=json_encode(file_get_contents("php://input"),true);
        $query="DELETE from products WHERE id=?";
        $db->executeSelectQuery($query,[$data['id']]);
        echo json_encode(["message"=>"Product deleted"]);
        break;
    default:
        echo json_encode(["message"=>"Method nem létezik"]);
        break;
}