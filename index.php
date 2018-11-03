<?php
session_start();
define('USERFILE', 'users.txt')
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="/" method="get">
    <input type="text" name="username" id="name">
    <input type="submit" value="Enter">
    </form>
<?php

if (!empty($_REQUEST['username'])) {
    $str = file_get_contents(USERFILE);
    $arrUser = explode(",", $str);
    if (in_array($_REQUEST['username'], $arrUser)) {
        echo 'This Name used... Please enter next name';
        
    } else {
        file_put_contents(USERFILE, $_REQUEST['username'] . ',', FILE_APPEND);
        fclose(USERFILE);
        var_dump($arrUser);
    }
} else {
    echo 'Enter name please!';
}



//var_dump(implode(",",file_get_contents(USERFILE)));
//var_dump(file_get_contents(USERFILE));
?>
</body>
</html>