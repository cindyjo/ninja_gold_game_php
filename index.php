<?php 
session_start();

if(!isset($_SESSION['gold'])){
	$_SESSION['gold']=0;
}

if(!isset($_SESSION['activities'])){
	$_SESSION['activities']=array();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ninja Gold Game</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div id="wrapper">	
		<div id="header">
			<h2>Your Gold: </h2>
			<p> <?=$_SESSION['gold']?></p>
		</div>

		<div id="submission">
			<form action="process.php" method="post" />
				<input type="hidden" name="building" value="farm" />
				<h2>Farm</h2>
				<p>10 - 20 golds</p>
				<input type="submit" value="Find Gold!"/>
			</form>

			<form action="process.php" method="post" />
				<input type="hidden" name="building" value="cave" />
				<h2>Cave</h2>
				<p>5 - 10 golds</p>
				<input type="submit" value="Find Gold!"/>
			</form>

			<form action="process.php" method="post" />
				<input type="hidden" name="building" value="house" />
				<h2>House</h2>
				<p>2 - 5 golds</p>
				<input type="submit" value="Find Gold!"/>
			</form>

			<form action="process.php" method="post" />
				<input type="hidden" name="building" value="casino" />
				<h2>Casino!</h2>
				<p>-50 - 50 golds</p>
				<input type="submit" value="Find Gold!"/>
			</form>
		</div>

		<div id="bottom">
			<p>Activities:</p>
			<div>
<?php 			for ($i = count($_SESSION['activities'])-1; $i >=0; $i--)
				{	
					if($_SESSION['activities'][$i]['gold']<0)
					{
						$add_on="... Ouch..";?>
						<p class="red">
<?php 				}
					else 
					{
						$add_on="."?>
						<p class="green">
<?php 				}?>
					You entered a <?=$_SESSION['activities'][$i]['location']?> and earned <?=$_SESSION['activities'][$i]['gold']?> golds<?=$add_on?> (<?=$_SESSION['activities'][$i]['time']?>)</p>
<?php 			}?>				
			</div>
		</div>
		<form action="process.php" method="post">
			<input type="hidden" name="reset" value="gameover">
			<button>Reset</button>
		</form>
	</div>
</body>
</html>

