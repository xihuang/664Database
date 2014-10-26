<?php

$pdo = new PDO('mysql:host=localhost;port=8888;dbname=huangxi_misc', 'huangxi_ugh', 'ugh1234');
// $pdo = new PDO('mysql:host=localhost;port=8888;dbname=misc', 'ugh', 'ugh');

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

