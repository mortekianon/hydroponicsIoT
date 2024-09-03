<?php
$conection = mysqli_connect("localhost", "root", "", "iotmonitoring");
$sql = mysqli_query($conection, "SELECT * FROM data_monitoring order by id desc");

$data = mysqli_fetch_array($sql);
$suhu = $data['Suhu'];

if ($suhu == "")  $suhu = 0;
echo $suhu;
