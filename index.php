<?php require 'db_conn.php'; 

    // if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    //     $title = $_POST['title'];
    // }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma-rtl.min.css">
    <link rel="stylesheet" href="css/main.css">
</head>

<body>
<div class="container  is-widescreen" style="background:#ece4db" >
    <div class="columns is-mobile is-centered">
        <div class="column is-half">
            <div class="card mt-6" style="background:#d8e2dc">
                <div class="card-content">
                    <form action="app/add.php" method="post" autocomplete="off">
                    <?php if(isset($_GET['message']) && $_GET['message'] === "error") { ?>
                        <input class="input is-danger is-focussed" type="text" name="title" placeholder="This field is required!" >
                    <?php } else {?>
                        <input class="input is-focussed " type="text" name="title" placeholder="What do you want to do?" >
                    <?php }  ?>
                    <button class="button is-fullwidth  mt-3" style="background:#5a716a52">Add a Todo</button>
                    </form>
                </div>
            </div>
        </div>
    </div>           
</div>

<div class="container is-widescreen" style="background:#ece4db">
    <div class="columns is-mobile is-centered">
        <div class="column is-half">
            <div class="card mt-5 p-2" style="background:#d8e2dc">
                <?php $todos = $conn->query("SELECT * FROM todos ORDER BY id DESC"); ?>
                <?php echo $todos->rowCount() ?>
                <?php if($todos->rowCount() === 0){ ?>
                    <div class="card mx-4 my-4" style="background:#d8e2dc" >
                    <div style="text-align: center">
                    <img src="img/duck.gif" alt="fdfdf" >
                    </div>
                            
                    </div>
                <?php } ?>
                <?php while($todo = $todos->fetch(PDO::FETCH_ASSOC)){ ?>
                <div class="card mx-4 my-4">
                    <div class="card-content"style="background:#e8e8e4" >
                        <div class="content is-size-6">
                            <span id=<?= $todo['id'] ?> class="remove-to-do">x</span>
                            <?php if($todo['checked']){ ?>
                                <input class="checkbox" type="checkbox" checked>
                                <span class="ml-2 strikeText"><?= $todo['title'] ?></span> <br>
                                <?php } else { ?>
                                <input class="checkbox" type="checkbox">
                                <span class="ml-2"><?= $todo['title'] ?></span> <br>
                                <?php } ?> 
                            <small class="is-size-7 ml-5 has-text-grey">created <?= $todo['date_time'] ?></small>                               
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<script src="js/remove.js"></script>
<script src="js/checkbox.js"></script>
</body>
</html>