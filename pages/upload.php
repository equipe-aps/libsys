<?php
$destino = '../images/'.$_FILES['image']['name'];
$arquivo_tmp = $_FILES['image']['tmp_name'];
move_uploaded_file($arquivo_tmp, $destino);
?>