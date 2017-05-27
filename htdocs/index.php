<?php 
 $con = new SQLite3("/employee.db");
  if (!$con) {
    throw new Exception('Error connecting to database - ' . $con->lastErrorMsg());
  }

  $resultset = $con->query("select * from employees");
  $employees = array();
  while (($row = $resultset->fetchArray())) {
    $emp = array();
    $emp['id'] = $row['id'];
    $emp['name'] = $row['name'];
    print("{$emp['id']} {$emp['name']}<br>");
    array_push($employees, $emp);
  }
?>