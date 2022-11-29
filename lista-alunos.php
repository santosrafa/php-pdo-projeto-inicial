<?php

/* --Criando uma conexao com o banco de dados-- */
$databasePath = __DIR__ . '/banco.sqlite';
$pdo = new PDO('sqlite:' . $databasePath);

/* --fetchAll() retornara um array da consulta executada abaixo-- */
$statement = $pdo->query('SELECT * FROM students;');
$studentList = $statement->fetchAll();

echo $studentList[0]['name'];

