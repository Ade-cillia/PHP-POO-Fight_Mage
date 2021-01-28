<link rel="icon" type="image/png" href="./public/image/logo/logo.png" />
<?php

//include './pdo_connection.php';
include './layout/header.php';
$URIFolder= '/john/PHP-Fight_Mage';

if (!empty($_SERVER['QUERY_STRING'])) {
    $url= explode("?".$_SERVER['QUERY_STRING'],$_SERVER['REQUEST_URI'])[0];
}else{
    $url= $_SERVER['REQUEST_URI'];
}
switch ($url){
    case $URIFolder.'/':
    case $URIFolder.'/home':
        include "./controller/controlleur_home.php";
        break;
    default :
        include './controller/controller_404.php';
        break;
}

include './layout/footer.php';

?>
