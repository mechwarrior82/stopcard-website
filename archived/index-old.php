<?

error_reporting(E_ALL);
//error_reporting(0);
putenv("TZ=US/Central");
$date=date('Y-m-d');
$time=time();

$DOCROOT='/home/obtest/public_html/stopcard/';
$WEBSITE=$_SERVER["SERVER_NAME"];
$PRIMARY=(substr_count($WEBSITE,'.')==1)?$WEBSITE:substr_replace($WEBSITE,'',0,strrpos($WEBSITE, '.', -6)+1);
$SUBDOMAIN=(substr_count($WEBSITE,'.')==1)?'':substr_replace($WEBSITE,'',strrpos($WEBSITE, '.', -6));
$PATH=explode('/',substr_replace(strtolower($_SERVER["REQUEST_URI"]),'',0,1));
$PAGE=(strlen($PATH[0])>0) ? $PATH[0] : 'home' ;

header('HTTP/1.1 200 OK');


?><!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" id="view" content="width=device-width,initial-scale=1.0, user-scalable = no, minimum-scale=1.0, maximum-scale=1.0" />
		<title>Stopcard</title>
		<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
		<?php $files = glob('style/*.css');
		foreach($files as $file) { ?>
		<link rel="stylesheet" href="/<?=$file; ?>">
		<?php } ?>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script type="text/javascript" src="/scripts/modernizr.js"></script>
		<!--[if !IE]><!-->
			<script>
				if (/*@cc_on!@*/false) { document.documentElement.className+=' ie10 ie'; }
			</script>
		<!--<![endif]-->
		<!--[if IE]>
			<script>
				document.documentElement.className+=' ie';  
			</script>
		<![endif]-->
	</head>
	<body>
		<div id="wrapper">
			<header>
				<div id="header" class="section">
					<div>
						<a href="/" id="logo" alt="Stopcard -  Protect your identity.">Stopcard</a>
						<div id="nav">
							<nav>
								<!-- <a href=""> </a> -->
								<?php $files = glob('sections/*.php');
								foreach($files as $file) {
								if (strpos($file, 'nomenu') == FALSE) {
									$section_name=substr_replace($file, '', 0, strrpos($file, '_')+1);
									$section_name=substr_replace($section_name, '', strrpos($section_name, '.'));
								 ?>
								<a href="#<?=$section_name; ?>"><?=ucwords(str_replace('stopcard', 'stopcard&reg;',str_replace('-', ' ', $section_name))); ?></a>
								<?php } } ?>
							</nav>
						</div>
						<div class="clear"></div>
					</div>
				</div>
			</header>
			<div id="page">
				<div id="header_padding"></div>
				<div id="home_bg"></div>
				<?php
				foreach($files as $file) {
					$section_name=substr_replace($file, '', 0, strrpos($file, '_')+1);
					$section_name=substr_replace($section_name, '', strrpos($section_name, '.'));
				?>
				<section>
					<div id="<?=$section_name; ?>" class="section">
						<div>
							<?php include($file); ?>
							<div class="clear"></div>
						</div>
					</div>
				</section>
				<?php
	  			}
	  			?>
			</div>
			<footer>
				<div id="footer" class="section">
					<div>
						<a href="/" id="logo_footer" alt="Stopcard - Protect your identity.">Stopcard</a>
						<div id="footer_right">
							<?php include ("text/footer.php"); ?>
						</div>
						<div class="clear"></div>
					</div>
				</div>
			</footer>
		</div>	
	</body>
	<script type="text/javascript" src="/scripts/window.js"></script>
</html>