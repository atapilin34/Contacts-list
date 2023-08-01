<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="favicon.png">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <title>TEST</title>
</head>
<body>
<div class="wrapper">
    <div class="container">
        <div class="add-contact">
            <div class="common-title">Добавить контакт</div>
            <form action="server.php" method="POST" class="add-contact-forms">
                <label>
                    <input type="text" name="name" placeholder="Имя">
                </label>
                <label>
                    <input type="tel" name="phone" placeholder="Телефон">
                </label>
                <button type="submit">Добавить</button>
            </form>
        </div>
        <div class="list-contact">
            <div class="common-title">Список контактов</div>
            <ul class="list-items">
                <?php

                $connect = mysqli_connect("localhost","test", "test");
                mysqli_set_charset($connect, "utf8");
                mysqli_select_db($connect, "contacts_list");
                $query = 'SELECT * FROM contacts';
                $result = mysqli_query($connect, $query);
                while ($array = mysqli_fetch_assoc($result)):
                    echo "<li class=\"list-item\" data-id=\"$array[id]\">";
                        ?>
                        <div class="list-item-name"><span><?=$array['name']?></span>
                                <span class="delete-item">x</span>
                        </div>
                        <p class="list-item-phone"><?=$array['phone']?></p>
                    <?
                    echo "</li>";
                endwhile;
                mysqli_close($connect);
                ?>
            </ul>
        </div>
    </div>
</div>
<script src="js/script.js"></script>
</body>
</html>

