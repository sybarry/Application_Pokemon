<?php
function start_form(string $method, string $legend="", string $action="", $attributs = array()):string{
    $code =  "<form action=\"$action\" method=\"$method\" ";
    foreach($attributs as $key => $val){
        $code.="$key=\"$val\" ";
    }
    $code .= ">\n";
    if($legend !== "") $code .= "<fieldset><legend>$legend</legend>\n";
    return $code;
}

function end_form(bool $legend):string{
    $code = "";
    if($legend) $code= "</fieldset>";
    $code .= "</form>\n";
    return $code;
}

function gen_input(string $type, string $label="", $attributs = array()):string{
    $code = "";
    if($label !=="") $code .= "<label>$label</label>";
    $code .= "<input type=\"$type\" ";
    foreach($attributs as $key => $val){
        $code.="$key=\"$val\" ";
    }
    $code .= "/>\n";
    return $code;
}

function gen_select(string $label="", $attributs=array(), $options=array()):string{
    $code ="";
    if($label !=="") $code .= "<label>$label</label>";
    $code .= "<select ";
    foreach($attributs as $key => $val){
        $code.="$key=\"$val\" ";
    }
    $code .= ">";
    foreach($options as $val){
        $code .= "<option value=\"".$val["value"]."\" ";
        if($val['selected']) $code .= "selected ";
        $code .= ">".$val["text"]."</option>";
    }
    $code .= "</select>";
    return $code;
}
?>