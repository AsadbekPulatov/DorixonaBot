<?php

require_once "connect.php";

class Drug
{
    function getDrugs()
    {
        global $connect;
        $sql = "SELECT * FROM products";
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
        $sql = "SELECT * FROM products WHERE name LIKE '%$name%'";
        $result = $connect->query($sql);

        $drugs = [];
        while ($row = $result->fetch_assoc()) {
            $drugs[] = $row;
        }
        return $drugs;
    }
}