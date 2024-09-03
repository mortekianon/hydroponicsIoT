<?php
include '../../config.php';
$sql = mysqli_query($conection, "SELECT * FROM data_monitoring order by id desc");

$data = mysqli_fetch_array($sql);
$pH = $data['pH'];

if ($pH == "")  $pH = 0;
echo $pH;
