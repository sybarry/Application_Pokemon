<?php
require("model/model.php");

function home(){
    require("view/home.php");
}

function test(){
    try {
        $test = getAllPokemon();
        histo("voir", "Récupération des tous les Pokemon et leurs types en base.");
        require("view/test.php");
    }catch(Exception $e){
        $errorMsg = "Une exception a été levée<br>".$e->getMessage();
        require("view/error.php");
    }catch(Error $e){
        $errorMsg = "Une erreur a été levée<br>".$e->getMessage();
        require("view/error.php");
    }
}

function modiferPokemon(){
    try{
        $pokemon = getAllPokemon();
        histo("voir", "Récupération des tous les Pokemon et leurs types en base.");
        $optionsPokemon = array();
        $cpt = 0;
        foreach ($pokemon as $p) {  
            $optionsPokemon[] = array(
                "value" => $p->getId(),
                "text" => $p->getNom(),
                "selected" => !$cpt
            );
            $cpt += 1;
        }
        if(isset($_POST["idPokemon"]) && isset($_POST["taillePokemon"]) && isset($_POST["poidsPokemon"])){
            $old_poke = $pokemon[$_POST["idPokemon"]];
            modifPokemon($_POST["idPokemon"], $_POST["taillePokemon"], $_POST["poidsPokemon"]);
            $msg = "La taille (".$old_poke->getTaille()."->".$_POST["taillePokemon"].") et le poids (".$old_poke->getPoids()."->".$_POST["poidsPokemon"].") de ".$old_poke." modifiés.";
            histo("modif", $msg);
        }
        require("view/modifier.php");
    }catch(Exception $e){
        $errorMsg = "Une exception a été levée<br>".$e->getMessage();
        require("view/error.php");
    }catch(Error $e){
        $errorMsg = "Une erreur a été levée<br>".$e->getMessage();
        require("view/error.php");
    }
}

function histo($type, $desc){
    $dom=new DOMDocument;
    $file = "public/xml/histo.xml";
    $dom->load($file);
    $operations = $dom->getElementsByTagName("operations")[0];
    $operation = $dom->createElement('operation', '');
    $operations->appendChild($operation);
    $operation->appendChild($dom->createElement('type', $type));
    $operation->appendChild($dom->createElement('horodate', date("Y-m-d H:i:s")));
    $operation->appendChild($dom->createElement('desc', $desc));
    $dom->save($file);
}

function printHisto(){
    try{
        $labelsHisto = [
            "modif" => "Modifier",
            "voir" => "Voir",
            "other" => "Autres"
        ];
        $file = "public/xml/histo.xml";
        $xml = simplexml_load_file($file);
        require("view/histo.php");
    }catch(Exception $e){
        $errorMsg = "Une exception a été levée<br>".$e->getMessage();
        require("view/error.php");
    }catch(Error $e){
        $errorMsg = "Une erreur a été levée<br>".$e->getMessage();
        require("view/error.php");
    }

}

function printPokemon(){
    try{
        $types = getAllTypes();
        histo("voir", "Récupération de tous les types de pokémon en base.");
        $optionsTypes = array(array("value"=>'', "text"=>"---", "selected" => true));
        foreach ($types as $t) {  
            $optionsTypes[] = array(
                "value" => $t->getId(),
                "text" => $t->getNom(),
                "selected" => false
            );
        }
        require("view/afficher.php");
    }catch(Exception $e){
        $errorMsg = "Une exception a été levée<br>".$e->getMessage();
        require("view/error.php");
    }catch(Error $e){
        $errorMsg = "Une erreur a été levée<br>".$e;
        require("view/error.php");
    }
}

function jsonPokemonByType($type_id){
    $pokemonWithType = getPokemonByType($type_id);
    histo("voir", "Récupération des pokémon pour le type d'id=".$type_id);
    $pokemon = [];
    foreach($pokemonWithType as $p){
        $pokemon[]=[
            "id" => $p->getId(),
            "nom" => $p->getNom(),
            "taille" => $p->getTaille(),
            "poids" => $p->getPoids(),
            "types" => []
        ];
        foreach($p->getTypes() as $t){
            $pokemon[count($pokemon)-1]["types"][]=[
                "id" => $t->getId(),
                "nom" => $t->getNom()
            ];
        }
    }
    print_r(json_encode($pokemon));
}
?>