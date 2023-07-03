<?php
try {
    $bd = new PDO("mysql:host=localhost;dbname=gestion_parking", "root", "");
} catch (Exception $e) {
    die($e->getMessage());
}
?>