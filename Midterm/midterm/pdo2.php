<?php

$pdo = new PDO('mysql:host=localhost;port=8888;dbname=misc', 'fred', 'zap1234');
// $pdo = new PDO('mysql:host=localhost;port=8888;dbname=misc', 'ugh', 'ugh');

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

