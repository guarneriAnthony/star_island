<?php
//  fichier de config de l'app

session_start();

const CONFIG=[
    'db'=>[
        'HOST'=>'localhost',
        'PORT'=>'3306',
        'NAME'=>'star_island',
        'USER'=>'root',
        'PWD'=>''

    ],
    'app'=>[
        'name'=>'star_island',
        'projecturl'=>'http://localhost/PHP/star_island'
    ]

];

const BASE_PATH='/PHP/star_island';

