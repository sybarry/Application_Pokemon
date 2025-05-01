<?php ob_start(); ?>
<div class="error">
    <h1>Erreur</h1>
    <p><?= $errorMsg ?></p>
</div>
<?php
$content = ob_get_clean();
$title_part = "Erreur";
require("template.php");
?>