<?php
	/* By Oto Brglez */
?>

<!doctype html>
<html lang="sl">
<head> 
	<meta charset="utf-8"> 
	<title>MeSecure Eksperiment</title> 
	<meta name="description" content="MeSecure - Eksperiment - Oto Brglez"> 
	<meta name="author" content="Oto Brglez"> 
	<link rel="stylesheet" href="/css/screen.css">  
</head>
<body>
	<div id="main">
		<header><div id="header"><h1>MeSecure - Eksperiment</h1></div></header>
		<article><div id="article">

			<p>
				<a href="http://mesecure.banka.si">MeSecure na običajni http povezavi.</a><br/>
				<a href="https://mesecure.banka.si">MeSecure na varni https/ssl povezavi.</a><br/>
				<a href="https://mesecure.banka.si/secure/">MeSecure na varni https/ssl povezavi z 
					zahtevanim certifikatom.</a><br/>
			</p>

			<?php if(isset($_SERVER["SSL_CLIENT_CERT"]) && $_SERVER["SSL_CLIENT_CERT"] != ""){
				$pom = openssl_x509_parse($_SERVER["SSL_CLIENT_CERT"]);
				?>
				<h2><?= $pom["subject"]["CN"]; ?> - Certifikat</h2>
				<div class="pre">
					<table><tbody><?
					foreach($pom as $key=>$value){
						?>
							<tr>
								<th valign="top"><?= $key; ?></th>
								<td valign="top"><?
									if(!is_array($value)){ ?>  <?=$value;?> <? };
									if(is_array($value)){ ?> <pre><? print_r($value);?></pre> <? };
									
								?></td>
							</tr>
						<?
					};
					
					?></tbody></table>
				</div>
			<?php }; ?>
			
			<h2>Strežniške spremenljivke</h2>
			<div class="pre">
				<table><tbody>
				<? foreach($_SERVER as $key=>$value): ?>
					<tr>
						<th valign="top"><?= $key; ?></th>
						<td valign="top"><?= $value; ?></td>
					</tr>
				<? endforeach; ?>
				</tbody></table>
			</div>

		</div></article>
		<footer><div id="footer"><p>&copy; Oto Brglez - Junij 2011</p></div></footer>
	</div>
</body>
</html>