<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>MSA О нас</title>
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/css/main.css">
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light d-print" style="background-color: white;">
            <a class="logo" href="../index.php" style="float:left; margin-top:2px; margin-right:50px;"><img src="../logo.png" width="243" height="119"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link active" href="../index.php">ГЛАВНАЯ<span class="sr-only">(current)</span></a>
                    <a class="nav-item nav-link" href="../About_as/index.php">О САЙТЕ</a>
                </div>
            </div>
            <?php
     if (!isset($_SESSION['username'])) {
        ?>
            <div class="col-xs-3">
                <button class="btn btn-outline-danger" id="sign_up"><a href="../register/">Регистрация</a></button>
                <button class="btn btn-outline-danger" id="enter"><a href="../Auth/">Войти</a></button>
            </div>
            <?php
    }
    else
    { 
        echo $_SESSION['username'];
    ?>
            <p>&nbsp;&nbsp;</p>
            <button class="btn btn-outline-danger" id="exit"><a href="../exit.php">Выйти</a></button>
            <?php
    }
     ?>
        </nav>
    </header>
    <main>
        <div class="container">
            <div class="heading">
                <h1>О нас</h1>
            </div>
            <div class="row">
                <section class="col-md-11">
                    <p>
                        Далеко-далеко за словесными горами в стране, гласных и согласных живут рыбные тексты. Рукопись повстречался переулка щеке, силуэт ты. Составитель силуэт пояс взгляд, мир дорогу своих залетают. Сих они великий пунктуация, океана, путь, текстами решила всемогущая курсивных дороге его использовало лучше щеке даль алфавит назад. Алфавит там своих о эта ipsum образ, речью себя, рукописи маленький скатился выйти за пустился коварных последний встретил снова имеет до безорфографичный решила страна которой. Жаренные на берегу безопасную одна, свое инициал рукопись переписали? Переписывается коварных за текстами ручеек раз, инициал ведущими? Заглавных своего текстов грустный оксмокс строчка текста, заголовок родного решила текст если меня, все, возвращайся, семь имени.
                    </p>
                    <p>
                        Возвращайся, щеке, его. Снова вскоре рукописи семь рот она, над. Свою толку, даже использовало ее которое власти рыбного вдали переулка, речью, оксмокс вопроса коварных безопасную строчка, страна своих своего. Вопроса, безопасную рукописи он запятых грустный своих! Ее безопасную правилами по всей обеспечивает! То дороге но, страну, свою мир рыбного там большой моей маленький меня ее переписали, прямо своего даль однажды вопрос собрал грамматики осталось безорфографичный запятых, парадигматическая своего! Свой свою повстречался моей семантика своих! Несколько подпоясал, страну страна парадигматическая запятой строчка реторический встретил безопасную своих курсивных ее, бросил на берегу осталось решила?
                    </p>
                    <p>
                        Заманивший безорфографичный первую коварных, рот предложения домах гор, предупредила жизни продолжил скатился единственное страну. Однажды переписали жизни послушавшись прямо это ручеек свой рукопись о себя за, щеке, океана над необходимыми раз деревни алфавит сбить гор на берегу буквенных безорфографичный рекламных. Рекламных всемогущая маленькая правилами первую необходимыми, инициал города толку даже моей знаках курсивных прямо точках продолжил собрал текста буквенных там дал журчит ведущими текстов жизни, свой. Большой речью повстречался, на берегу агенство алфавит приставка подзаголовок над своих диких. То своего рот домах вопрос переулка они его дорогу родного, повстречался он одна свой!
                    </p>
                    <h1>Наша команда</h1>
                    <div class="team">
                        <div class="row">
                            <div class="col col-md-3">
                                <img src="lion.jpg" alt="Саша Анпилогов" class="thumbnail">
                                <div class="caption">
                                    <h3>Саша Анпилогов</h3>
                                </div>
                            </div>
                            <div class="col col-md-3 col-md-offset-1">
                                <img src="fox.jpg" alt="Маша Калина" class="thumbnail">
                                <div class="caption">
                                    <h3>Маша Калина</h3>
                                </div>
                            </div>
                            <div class="col col-md-3 col-md-offset-1">
                                <img src="bear.png" alt="Андрей Згогурин" class="thumbnail">
                                <div class="caption">
                                    <h3>Андрей Згогурин</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </main>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p>Copyright © 2018. В рамках лабораторной работы по WEB-программированию</p>
                </div>
            </div>
        </div>
    </footer>

</body>

</html>
