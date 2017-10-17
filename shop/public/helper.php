<?php
function p($var){
    echo '<pre style="background: #cccccc;">';
    print_r($var);
    echo "</pre>";
};
define('IS_POST',$_SERVER['REQUEST_METHOD']=='POST'?true :false);
$data = explode('/',$_SERVER['REDIRECT_URL']);
define('__PATH__',$data[2]);