<?php

require_once "connect.php";

class Drug
{
    function getDrugs()
    {
        global $connect;
        $sql = "SELECT * FROM products ORDER BY name ASC";
        $result = $connect->query($sql);

        $drugs = [];
        while ($row = $result->fetch_assoc()) {
            $drugs[] = $row;
        }
        return $drugs;
    }

    function searchDrug($name)
    {
        global $connect;
        $sql = "SELECT * FROM products WHERE name LIKE '%$name%' ORDER BY name ASC";
        $result = $connect->query($sql);

        $drugs = [];
        while ($row = $result->fetch_assoc()) {
            $drugs[] = $row;
        }
        return $drugs;
    }
}