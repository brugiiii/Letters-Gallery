<?php
$centered = $args["centered"] ?? false
?>

<div class="loader-wrapper position-absolute z-1 <?= $centered ? "start-50 top-50 translate-middle" : "" ?>">
    <div class="loader"></div>
</div>