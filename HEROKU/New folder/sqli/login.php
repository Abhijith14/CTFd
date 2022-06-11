<?php
	include('db.php');


	$admin_user = "admin";
	$admin_pass = "helloworld";
	$flag = "ctf{sQli_is_Great'+!-.@#$%?}";

	if(!empty($_POST['username'])) {

		$user_username = $_POST['username'];
		$user_password = $_POST['password'];


			if($user_username == "or 1=1")
		    {
		    	$sql = "SELECT * FROM account WHERE name='$admin_user' AND passwd='$admin_pass'";

		    }
		    else
		    {

			    $sql = "SELECT * FROM account WHERE name='$user_username' AND passwd='$user_password'";
			}

		try{	
				// echo "INSIDE tTRY" . '<br>';

				$query = $pdo->prepare($sql);
				$query->execute();
				$row = $query->rowCount();
				// $user = $query->fetch();

				// print_r($result['visitors']);

				if($query) {
					$user = $query->fetch();
				}
				else{
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
