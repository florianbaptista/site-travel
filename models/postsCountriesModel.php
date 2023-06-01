<?php
class postCountries extends database
{

    public int $id = 0;
    public string $name = '';

    public function __construct()
    {
        parent::__construct();
    }

    public function getCountries()
    {
        $query = 'SELECT id, name FROM `' . $this->prefix . 'countries`';
        $request = $this->db->query($query);
        // recupérer les résultats de la requête (avec un SELECT uniquement)
        return $request->fetchAll(PDO::FETCH_OBJ);
    }

    public function checkIfCountriesExist()
    {
        $query = 'SELECT COUNT(id) FROM `' . $this->prefix . 'countries` WHERE id = :id';
        $request = $this->db->prepare($query);
        $request->bindValue(':id', $this->id, PDO::PARAM_INT);
        $request->execute();
        return $request->fetch(PDO::FETCH_COLUMN);
    }
}
