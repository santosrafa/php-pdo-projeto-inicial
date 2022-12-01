<?php

/* --Criando uma conexao com o banco de dados-- */

use Alura\Pdo\Domain\Model\Student;

require_once 'vendor/autoload.php';

$databasePath = __DIR__ . '/banco.sqlite';
$pdo = new PDO('sqlite:' . $databasePath);

/* --fetchAll() retornara um array da consulta executada abaixo-- */
$statement = $pdo->query('SELECT * FROM students;');

/* --PDO::FETCH_ASSOC: Retorna cada linha como um array associativo, onde a chave é o nome da coluna, e o valor é o valor da coluna em si-- */
$studentDataList = $statement->fetchAll(PDO::FETCH_ASSOC);
$studentList = [];

foreach ($studentDataList as $studentData){
    $studentList[] = new Student(
        $studentData['id'],
        $studentData['name'],
        new \DateTimeImmutable($studentData['birth_date'])
    );
}

var_dump($studentList);

