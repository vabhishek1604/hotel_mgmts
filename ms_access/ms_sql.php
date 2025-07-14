<?php
$serverName = "ANURAJ";

$db = array("Database" => "etimetracklite1");

$conn = sqlsrv_connect($serverName, $db);

if ($conn) {
  echo "Connection established.<br />";
} else {
  echo "Connection could not be established.<br />";
}
$sql = "SELECT TOP (1000) [DeviceLogId]
      ,[DownloadDate]
      -- ,[isUpdated]
      -- ,[DeviceId]
      ,[UserId]
      ,[LogDate]
    --   ,[Direction]
    --   ,[AttDirection]
    --   ,[C1]
    --   ,[C2]
    --   ,[C3]
    --   ,[C4]
    --   ,[C5]
    --   ,[C6]
    --   ,[C7]
    --   ,[WorkCode]
    --   ,[UpdateFlag]
    --   ,[IsApproved]
    --   ,[EmployeeImage]
    --   ,[FileName]
    --   ,[Longitude]
    --   ,[Latitude]
    --   ,[CreatedDate]
      ,[LastModifiedDate]
    --   ,[LocationAddress]
    --   ,[BodyTemperature]
    --   ,[IsMaskOn]
  FROM [etimetracklite1].[dbo].[DeviceLogs_8_2022]";


$stmt = sqlsrv_query($conn, $sql);

if ($stmt === false) {
  echo "Error in executing query.</br>";
  die(print_r(sqlsrv_errors(), true));
}

while ($obj = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
  echo $obj['DeviceLogId'] . 'user id ' . $obj['UserId'] . '<br>';
  $dv_llg = $obj['DeviceLogId'];
  $sql1 = 'UPDATE [etimetracklite1].[dbo].[DeviceLogs_8_2022] SET isUpdated = 1 WHERE DeviceLogId = ' . $dv_llg;
  sqlsrv_query($conn, $sql1);
}


sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);