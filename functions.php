<?php
function checkitem($select,$from){
global $con;
$statement = $con->prepare("select $select from $from");
$statement->execute();
$count = $statement->rowCount();
return $count;
}


?> 