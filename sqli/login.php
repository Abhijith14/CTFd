<?php
	$db_host="ec2-52-4-111-46.compute-1.amazonaws.com";
	$db_user="zkhhstixqwqjux";
	$db_pass="c6e8a0206b25dd727fc7bcc564be9c221c4537e02caf6d7ebb7478cd385fd3c5";
	$db_name="d1nsnpbdjf51k4";
	$admin_user = "admin";
	$admin_pass = "helloworld";
	$flag = "ctf{sQli_is_Great'+!-.@#$%?}";

		if(!empty($_POST['username'])) {

		    $connection = sprintf('mysql:host=%s;dbname=%s;charset=utf8mb4', $db_host, $db_name);
		    $db = new PDO($connection, $db_user, $db_pass);
		    
		    if($_POST['username'] == "or 1=1")
		    {
		    	$sql = sprintf("SELECT * FROM account WHERE name = '%s' AND passwd = '%s'",
		        	$admin_user,
		        	$admin_pass
		    	);

		    }
		    else
		    {

			    $sql = sprintf("SELECT * FROM account WHERE name = '%s' AND passwd = '%s'",
			        $_POST['username'],
			        $_POST['password']
			    );
			}

		    try {

		        $query = $db->query($sql);
		        if($query) {
		            $user = $query->fetchObject();
		        } else {
		            $user = false;
		        }
		    } catch(Exception $e) {
		        $user = false;
		    }
		}

?>
<?php if(!$user): ?>
<?php if($user === false): ?>
<?=$sql?>
<div class="alert alert-danger">login fail</div>
<?php endif; ?>
<?php else: ?>
<h3>Hi, <?=htmlentities($user->name)?></h3>
<h4><?=sprintf("You %s admin!", $user->name === "admin" ? "are" : "are not")?></h4>
<?php if($user->name === "admin") printf("%s %s", htmlentities("hello admin this is your flag :"),$flag); ?>
<?php endif; ?>
