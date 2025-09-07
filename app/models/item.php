<?php

require_once __DIR__ . '/../database.php';

class Item
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getItemsByCategory($category)
    {
        $this->db->query('SELECT * FROM items WHERE category = :category');
        $this->db->bind(':category', $category);
        return $this->db->resultSet();
    }

    public function getItemById($id)
    {
        $this->db->query('SELECT * FROM items WHERE id = :id');
        $this->db->bind(':id', $id);
        return $this->db->single();
    }
}
