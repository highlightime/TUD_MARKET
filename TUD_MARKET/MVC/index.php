<?php
    require 'model/model.php';
    require 'controller/controller.php';

    $model = new Model();
    $controller = new Controller($model);

    if(isset($_POST)){
        echo "있다 ㅂㅅ아";
        $controller->userLogin();
    }else{
        echo "없다 ㅂㅅ아";
        $controller->getLogin();
    }