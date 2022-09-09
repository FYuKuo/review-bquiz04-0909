<?php
include('./base.php');
$bigs = $Type->all(['parent'=>0]);

foreach ($bigs as $key => $big) {
    echo "<option value='{$big['id']}'>{$big['name']}</option>";
}
?>