<?php

require "/../rb/rb.php";
R::setup( 'mysql:host=127.0.0.1;dbname=testdb',
        'root', '' );
if ( !R::testConnection() ) {
        exit ('Нет соединения с базой данных');
}

session_start();