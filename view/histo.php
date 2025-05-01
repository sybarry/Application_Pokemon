<?php
ob_start();
?>
<h1>Historisation des opérations modifiant la base</h1>
<?php
foreach($labelsHisto as $type => $label){
    echo "<h2>$label</h2><table><thead><tr><th>Horodatage</th><th>Description</th></tr></thead><tbody>";
    foreach($xml->xpath("operation") as $operation){
        if($operation->type == $type) echo "<tr><td>".$operation->horodate."</td><td>".$operation->desc."</td></tr>";
    }
    echo "</tbody></table>";
}
?>
<?php
$content = ob_get_clean();
$title_part = "Historisation";
require("template.php");
?>