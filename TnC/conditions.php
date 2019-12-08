<!DOCTYPE html>
<html lang="en">

<head>
    <title>Terms & Conditions</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="terms_style.css">
    <style>
    </style>
    <script>
    </script>
</head>

<body>
   <div class="bg-image"></div>
    <div id="container">
		<div id="header">
			<header>
				<h2>Terms & Conditions<h2>		
			</header>
			<div id="terms">
				<?php

					session_start();

					$db = mysqli_connect("localhost","root","","bigtree");// or die('unable to connect');

					$sql = "SELECT * FROM terms";
					$query_run = mysqli_query($db,$sql);
					$query_check = mysqli_num_rows($query_run);
					if($query_check > 0 )
					{	
						while($row = mysqli_fetch_assoc($query_run))
						{
							$terms_text = $row['terms_text'];
							echo "<div class='tnc'><p class='display'>$terms_text</p></div>";
						}
					}
				?>
			</div>
		</div>	
    </div>
   
				   <div class="footer">
	<h4 style="text-align: center; font-family: Hei; ">Terms & Conditions - 2019 © DOMISEP all rights reserved! Powered By BIGTREE</h4>
	</div>


</body>

</html>