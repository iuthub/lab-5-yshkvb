<?php 
$name=isset($_POST["name"]) ? $_POST["name"]:"";
$Section=isset($_POST["Section"]) ? $_POST["Section"]:"";
$Credit=isset($_POST["card"])? $_POST["card"]:"";
$card=isset($_POST["card-type"])? $_POST["card-type"]:"";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Buy Your Way to a Better Education!</title>
		<link href="http://www.cs.washington.edu/education/courses/cse190m/09sp/labs/4-buyagrade/buyagrade.css" type="text/css" rel="stylesheet" />
	</head>

	<body>
		<?php
            if (
                empty($name) || 
                empty($Section) ||
                empty($Credit) ||  
                empty($card)
            ){
        ?>

        <h2>Sorry</h2>
        
        <p>
            You didn't fill out the form completely. 
            <a href="buyagrade.html">Try again?</a>
        </p>
        
        <?php
            }
            else {
                $data = $name . "; " . $Section . "; " . $Credit . "; " . $card . "\n";
        ?>
		<h1>Thanks, sucker!</h1>

		<p>Your information has been recorded.</p>

		<dl>
			<dt>Name</dt>
			<dd><?=$name?></dd>

			<dt>Section</dt>
			<dd><?=$Section?></dd>

			<dt>Credit Card</dt>
			<dd><?=$Credit." ($card)" ?></dd>
		</dl>
   		<?php
		file_put_contents(__DIR__ ."/suckers.txt", $data."\n", FILE_APPEND | LOCK_EX);
		$suckers=file_get_contents(__DIR__."/suckers.txt");
        ?>
        <div>
            <p>Here are all the suckers who have submitted here:</p>
            <pre><?=$suckers?></pre>
        </div>

        <?php
            }
        ?>

	</body>
</html>  