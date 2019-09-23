<?php
session_start();
 // Соединяемся с Базой Данных
include "./includes/config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Comments</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="css/app.css" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="index.html">
                    Project
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                            <li class="nav-item">
                                <a class="nav-link" href="login.html">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="register.html">Register</a>
                            </li>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header"><h3>Комментарии</h3></div>
                                <div class="card-body">
                                        
                                  <?php
                                    if(isset($_SESSION['messages'])) {
                                            $messages = $_SESSION['messages']['message'];
                                            echo "<div class=\"alert alert-success\" role=\"alert\">$messages</div>";
                                            unset($_SESSION['messages']);
                                        };
                                  ?>
                                  
                                  <?php 
                                       
                                        $sql = "SELECT * FROM `comments` ORDER BY `id` DESC";
                                        $statement = $pdo->prepare($sql);
                                        $statement->execute();
                                        $count_id = $statement->fetchAll(PDO::FETCH_ASSOC);

                                  ?>
                                  <?php foreach ($count_id as $comment): ?>
                                    <div class="media">
                                        <img src="<?php echo $comment['avatar'];?>" class="mr-3" alt="..." width="64" height="64">
                                        <div class="media-body">
                                          <h5 class="mt-0"><?php echo $comment['author'];?></h5> 
                                          <span><small><?php echo DateTime::createFromFormat('Y-m-d H:i:s',$comment['pubdate'])->format('d/m/Y H:i:s');?></small></span>
                                          <p>
                                              <?php echo $comment['text'];?>
                                          </p>
                                      </div>
                                  </div>
                              <?php endforeach ?>    
                          </div>
                        </div>
                    </div>
                
                    <div class="col-md-12" style="margin-top: 20px;">
                        <div class="card">
                            <div class="card-header"><h3>Оставить комментарий</h3></div>

                            <div class="card-body">
                                <form action="./includes/store_comm.php" method="POST">
                                    <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Имя</label>
                                     <?php
                                        if(isset($_SESSION['no_authors'])) {
                                            $no_author = $_SESSION['no_authors']['no_author'];
                                            echo "<div class=\"alert alert-success\" role=\"alert\">$no_author</div>";
                                            unset($_SESSION['no_authors']);
                                        };
                                      ?>
                                    <input name="name" class="form-control" id="exampleFormControlTextarea1" placeholder="Имя"/>
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Сообщение</label>
                                    <?php
                                        if(isset($_SESSION['no_texts'])) {
                                                $no_text = $_SESSION['no_texts']['no_text'];
                                                echo "<div class=\"alert alert-success\" role=\"alert\">$no_text</div>";
                                                unset($_SESSION['no_texts']);
                                        } 
                                      ?>
                                    <textarea name="text" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Текст комментария ..." ></textarea>
                                  </div>
                                  <button type="submit" name="do_post" class="btn btn-success">Отправить</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
