<?php ob_start(); ?>

<pre>
    <?php
    /*
    foreach ($test as $p) {
        echo $p->to_string().'<br>';
    }*/
    var_dump($test);
    ?>
</pre>

<?php
$content = ob_get_clean();
$title_part = "TEST";
require("template.php");
?>