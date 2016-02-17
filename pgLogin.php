<?php
include 'config/config.php';

$username = $_POST['username'];
echo $password = $_POST['password'];
exit;
$outPut='';
$result = mysqli_query($link, "SELECT * FROM users WHERE username='$username' AND password='$password' AND usergroup = 'Investor' LIMIT 1");
if (mysqli_num_rows($result) == 1) {
	$result2 = mysqli_query($link, "SELECT name_enterprise,investor_id,pendingwith FROM investor_tb WHERE username='$username'");
	while ($a = mysqli_fetch_assoc($result2)) {
		 if ($a['pendingwith'=='Completed']) {
			 $status="<span style='color:green'>Approved</span>";
		 } else {
			 $status="<span style='color:red'>Pending approval</span>";
		 }
		 
		$outPut .="<div data-role='collapsible' data-collapsed-icon='carat-d' data-expanded-icon='carat-u'>
					<h4>".$a['name_enterprise']."</h4>
					<ul data-role='listview' data-inset='false'>
						<li>
							<span style='font-weight:bolder'>Investor ID:</span> ".$a['investor_id']."
						</li>
						<li>
							<span style='font-weight:bolder'>Status:</span> ".$status."
						</li>
					</ul>
				</div>";
	}
	
	$outPut .= '|';
	$enterpriseName=$a['name_enterprise'];
	$result3 = mysqli_query($link, "SELECT expatriateName,position,status FROM investor_tb WHERE enterpriseName='$enterpriseName'");
	while ($a2 = mysqli_fetch_assoc($result2)) {
		 
		$outPut .="<div data-role='collapsible' data-collapsed-icon='carat-d' data-expanded-icon='carat-u'>
					<h4>".$a2['expatriateName']."</h4>
					<ul data-role='listview' data-inset='false'>
						<li>
							<span style='font-weight:bolder'>Position:</span> ".$a2['position']."
						</li>
						<li>
							<span style='font-weight:bolder'>Status:</span> ".$a2['position']."
						</li>
					</ul>
				</div>";
	}
} else {
	$outPut = "failed" . mysqli_error($link);
}
echo $outPut;
?>