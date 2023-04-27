<?php

namespace DAO;

class Database
{private $productTable;
    private $categoryTable;
    private $accessoryTable;
    private $tables = array();

    public function __construct() {
    
        $this->tables['productTable'] = [];
        $this->tables['category'] = [];
        $this->tables['accessory'] = []; 
      
    }
    public function getProductTable() {
        return $this->productTable;
      }
    
    
      public function getName() {
        return $this->categoryTable;
      }
    
     public function getCategoryId() {
        return $this->accessoryTable;
      }

      public function insertTable($name, $row) {
        if (!isset($this->tables[$name])) {
            $this->tables[$name] = array();
        }
        array_push($this->tables[$name], $row);
    }

    public function selectTable($name, $where = null) {
        if (!isset($this->tables[$name])) {
            return array();
        }
        $rows = $this->tables[$name];
        if ($where !== null) {
            $rows = array_filter($rows, $where);
        }
        return $rows;
    }

    public function updateTable($name, $row) {
        if (!isset($this->tables[$name])) {
            return false;
        }
        foreach ($this->tables[$name] as $i => $r) {
            if ($r['id'] == $row['id']) {
                $this->tables[$name][$i] = $row;
                return true;
            }
        }
        return false;
    }

    public function deleteTable($name, $row) {
        if (!isset($this->tables[$name])) {
            return false;
        }
        foreach ($this->tables[$name] as $i => $r) {
            if ($r['id'] == $row['id']) {
                array_splice($this->tables[$name], $i, 1);
                return true;
            }
        }
        return false;
    }

    public function truncateTable($name) {
        $this->tables[$name] = array();
    }
}
