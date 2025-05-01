<?php
require("controller/controller.php");
if(isset($_GET['action'])){
    if($_GET['action']==="test") test();
    elseif($_GET['action']==="historique") printHisto();
    elseif($_GET['action']==="modifyPokemon") modiferPokemon();
    elseif($_GET['action']==="printPokemon") printPokemon();
    elseif($_GET['action']==="getPokemonByType"){
        if(isset($_GET["idType"])) jsonPokemonByType($_GET["idType"]);
        else home();
    }
    else home();
}else{
    home();
}
?>