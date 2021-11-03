
<?php
require_once "service/officermanage.php";
$obj = new manage_officer();
$bid = '1';
$bid = $_REQUEST["bid"];

$result2 = $obj->fetchdata_department_byworkgroup($bid);


while ($row2 = mysqli_fetch_array($result2)) {
	echo "<option value='$row2[id]'>" . $row2["workgroup"] . " </option>";
	// echo"<option value='$row2[0]'>" .$row2["workgroup"]." </option>";
}
// }
