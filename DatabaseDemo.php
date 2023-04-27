<?php 

require_once 'Database.php';
use DAO\Database;
class DatabaseDemo {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function insertTableTest() {
        $this->db->insertTable('users', array('id' => 1, 'name' => 'Alice'));
        $this->db->insertTable('users', array('id' => 2, 'name' => 'Bob'));
        $this->db->insertTable('products', array('id' => 1, 'name' => 'Product A', 'price' => 10));
        $this->db->insertTable('products', array('id' => 2, 'name' => 'Product B', 'price' => 20));
    }

    public function selectTableTest() {
        $users = $this->db->selectTable('users');
        $products = $this->db->selectTable('products');
        $cheap_products = $this->db->selectTable('products', function($row) {
            return $row['price'] < 15;
        });
        $this->printTableTest('Select Table Test', array($users, $products, $cheap_products));
    }

    public function updateTableTest() {
        $this->db->updateTable('products', array('id' => 2, 'name' => 'Product C', 'price' => 30));
        $products = $this->db->selectTable('products');
        $this->printTableTest('Update Table Test', array($products));
    }

    public function deleteTableTest() {
        $this->db->deleteTable('products', array('id' => 1));
        $products = $this->db->selectTable('products');
        $this->printTableTest('Delete Table Test', array($products));
    }

    public function truncateTableTest() {
        $this->db->truncateTable('products');
        $products = $this->db->selectTable('products');
        $this->printTableTest('Truncate Table Test', array($products));
    }

    public function initDatabase() {
        for ($i = 1; $i <= 10; $i++) {
            $this->db->insertTable('users', array('id' => $i, 'name' => 'User ' . $i));
            $this->db->insertTable('products', array('id' => $i, 'name' => 'Product ' . $i, 'price' => $i * 10));
        }
    }

    public function printTableTest($title, $tables) {
        echo "<h2>$title</h2>";
        foreach ($tables as $table) {
            echo "<table><thead><tr>";
            foreach (array_keys($table[0]) as $key) {
                echo "<th>$key</th>";
            }
            echo "</tr></thead><tbody>";
            foreach ($table as $row) {
                echo "<tr>";
                foreach ($row as $value) {
                    echo "<td>$value</td>";
                }
                echo "</tr>";
            }
            echo "</tbody></table>";
        }
    }
}


