<?php

use DAO\Database;
use demo\ProductDemo;
require_once 'ProductDemo.php';
require_once 'DatabaseDemo.php';
$productDemo = new ProductDemo();
$product = $productDemo->createProductTest();
$productDemo->printProduct($product);

$demo = new DatabaseDemo();

// Khởi tạo dữ liệu cho các bảng
$demo->initDatabase();

// Thêm dữ liệu vào bảng
$demo->insertTableTest();

// Lấy dữ liệu từ bảng và in ra màn hình
$demo->selectTableTest();

// Cập nhật dữ liệu trong bảng
$demo->updateTableTest();

// Xóa dữ liệu trong bảng
$demo->deleteTableTest();

// Xóa toàn bộ dữ liệu trong bảng
$demo->truncateTableTest();

// $productDemo = new ProductDemo();
// $product = $productDemo->createProductTest();
// $productDemo->printProduct($product);