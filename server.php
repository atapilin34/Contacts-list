<?php

$connect = mysqli_connect("localhost", "test", "test", "contacts_list");
mysqli_set_charset($connect, "utf8");
if (!empty($_POST['name']) && !empty($_POST['phone'])):
    $name = $_POST['name'];
    $phone = $_POST['phone'];

    if (!$connect):
        die('Connection error');
    else:
        $query = "INSERT INTO `contacts` (`id`, `name`, `phone`) VALUES (NULL, '$name', '$phone');";

    endif;
else:
    $id = $_POST['id'];

     $query = 'SELECT * FROM contacts';
                $result = mysqli_query($connect, $query);
                while ($array = mysqli_fetch_assoc($result)):
                    $del_query = "DELETE FROM `contacts` WHERE `contacts`.`id` = '$id'";
                    mysqli_query($connect,$del_query);  
                endwhile;
endif;
$result = mysqli_query($connect, $query) or die('Not added into database');
header('location:index.php');
header();
mysqli_close($connect);
?>

