<?php
class database
{
    protected $db;
    protected string $prefix = 'p7urg_';

    public function __construct()
    {
        try {
            $this->db = new PDO('mysql:host=localhost;dbname=projet_de_tp', 'root', '');
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}