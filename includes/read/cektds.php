<?php
$conection = mysqli_connect("localhost", "root", "", "iotmonitoring");
$sql = mysqli_query($conection, "SELECT * FROM data_monitoring order by id desc");

$data = mysqli_fetch_array($sql);
$TDS = $data['TDS'];

if ($TDS == "")  $TDS = 0;
echo $TDS;
