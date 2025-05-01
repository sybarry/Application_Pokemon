<?php
require("connexpdo.inc.php");
require_once("Pokemon.php");
require_once("Type.php");

function getAllPokemon(){
    $pdo = connexpdo("pokemon");
    $pdostt_pokemonWithTypes = $pdo->query("SELECT pt.pok_id, p.pok_height, p.pok_weight, p.pok_name, t.type_id, t.type_name FROM pokemon_types pt JOIN pokemon p ON p.pok_id=pt.pok_id JOIN types t ON t.type_id=pt.type_id ORDER BY p.pok_name");
    $pokemonWithTypes = [];
    while($pWt = $pdostt_pokemonWithTypes->fetch(PDO::FETCH_ASSOC)){
        if(isset($pokemonWithTypes[$pWt['pok_id']])){
            $pokemonWithTypes[$pWt['pok_id']]->addType(new Type($pWt['type_id'], $pWt['type_name']));
        }else{
            $p = new Pokemon(intval($pWt['pok_id']), $pWt['pok_name'], $pWt['pok_height'], $pWt['pok_weight']);
            $pokemonWithTypes[$pWt['pok_id']] = $p;
            $pokemonWithTypes[$pWt['pok_id']]->addType(new Type($pWt['type_id'], $pWt['type_name']));
        }
    }
    return $pokemonWithTypes;
}

function modifPokemon($id, $taille, $poids){
    $pdo = connexpdo("pokemon");
    $podstt_modifPokemon = $pdo->prepare("UPDATE pokemon SET pok_height=?, pok_weight=? WHERE pok_id=?");
    $podstt_modifPokemon->execute([$taille, $poids, $id]);
}

function getAllTypes(){
    $pdo=connexpdo("pokemon");
    $pdostt_types = $pdo->query("SELECT * FROM types ORDER BY type_name");
    $types = [];
    while($t = $pdostt_types->fetch(PDO::FETCH_ASSOC)){
        $types[$t["type_id"]]=new Type($t["type_id"], $t["type_name"]);
    }
    return $types;
}

function getPokemonByType($type_id){
    $pdo = connexpdo("pokemon");
    $pdostt_pokemonWithTypes = $pdo->prepare("SELECT pt.pok_id, p.pok_height, p.pok_weight, p.pok_name, t.type_id, t.type_name FROM pokemon_types pt JOIN pokemon p ON p.pok_id=pt.pok_id JOIN types t ON t.type_id=pt.type_id  WHERE pt.type_id=? ORDER BY p.pok_name");
    $pdostt_pokemonWithTypes->execute([$type_id]);
    $pokemonWithTypes = [];
    while($pWt = $pdostt_pokemonWithTypes->fetch(PDO::FETCH_ASSOC)){
        if(isset($pokemonWithTypes[$pWt['pok_id']])){
            $pokemonWithTypes[$pWt['pok_id']]->addType(new Type($pWt['type_id'], $pWt['type_name']));
        }else{
            $p = new Pokemon(intval($pWt['pok_id']), $pWt['pok_name'], $pWt['pok_height'], $pWt['pok_weight']);
            $pokemonWithTypes[$pWt['pok_id']] = $p;
            $pokemonWithTypes[$pWt['pok_id']]->addType(new Type($pWt['type_id'], $pWt['type_name']));
        }
    }
    return $pokemonWithTypes;
}
?>