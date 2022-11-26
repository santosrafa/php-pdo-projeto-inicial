<?php

/* --PDO é uma abstração para acesso a diversos bancos de dados-- */

$caminhoBanco = __DIR__ . 'banco.sqlite';

/* --driver:informacoes_especificas_do_driver-- */
$pdo =  new PDO('sqlite:' . $caminhoBanco);
echo "conectei";

