<?php

use Alura\Pdo\Domain\Model\Student;
use Alura\Pdo\Infrastructure\Persistence\ConnectionCreator;
use Alura\Pdo\Infrastructure\Repository\PdoStudentRepository;

require_once 'vendor/autoload.php';

$connection = ConnectionCreator::createConnection();
$studentRepository = new PdoStudentRepository($connection);

$connection->beginTransaction();

try {

    $aStudent = new Student(
        null,
        'Nico Bianco',
        new DateTimeImmutable('1985-05-01')
    );
    
    $studentRepository->save($aStudent);
    
    $anotherStudent = new Student(
        null,
        'Seginho Malandro',
        new DateTimeImmutable('1983-06-11')
    );
    
    $studentRepository->save($anotherStudent);

    $connection->commit();
    
}catch (\RuntimeException $e){
    echo $e->getMessage();
    $connection->rollBack();
}


