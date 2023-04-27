<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
</head>
<body>
<?php
$output = shell_exec('git pull');
echo "<pre>$output</pre>";
?>
</body>
</html>