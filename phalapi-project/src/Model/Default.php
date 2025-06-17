<?php

namespace App\Model;

use PDO;

class DefaultModel
{
    private $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getData($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM your_table WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function saveData($data)
    {
        $stmt = $this->db->prepare("INSERT INTO your_table (column1, column2) VALUES (:column1, :column2)");
        $stmt->bindParam(':column1', $data['column1']);
        $stmt->bindParam(':column2', $data['column2']);
        return $stmt->execute();
    }
}