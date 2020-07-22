<html>
<head>
<meta charset="UTF-8">
<title>Record Insertion Form</title>
</head>
<body>
<form action="" method="POST">
<p>Text to Add:<br>
<input type="text" name="testfield" size="30">
<p><input type="submit" name="submit" value="insert record"></p>
</form>
<?php

$filename = "test.txt";

if (isset($_POST["testfield"])) {

    if($_POST["testfield"] != ''){
        
        if (!file_exists($filename)) { //create a file and write the text
        
            $fp = fopen($filename, "w") or die("Couldn't open $filename");
            fwrite($fp, $_POST["testfield"] . "\n");
            fclose($fp);
        }else{ //append text to the existing file
            
            $fp = fopen($filename, "a") or die("Couldn't open $filename");
            fputs($fp, $_POST["testfield"] . "\n");
            fclose($fp);
        }
        
    }

}

if (file_exists($filename)) {
	// write the lines out to the browser window
	echo "<p>------------ file contents ------------</p>";
	
	
	$fp = fopen($filename, "r") or die("Couldn't open $filename");
	while (!feof($fp)) {
		$line = fgets($fp, 1024);
		echo $line."<br/>";
	}

}else{
		echo 'File doesn\'t exist or isn\'t readable.';	
}
	
?>


</body>
</html>
