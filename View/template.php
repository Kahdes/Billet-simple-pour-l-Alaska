<!DOCTYPE html>
<html lang="FR">

<head>
    <title><?= $title; ?></title>

    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="<?= $description; ?>">

    <link rel="icon" type="image/png" href="images/icon.jpg" />
        
    <link rel="stylesheet" type="text/css" href="Public/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="Public/css/bootstrap-theme.min.css" />
    <link rel="stylesheet" type="text/css" href="Public/css/style.css" />
    <link rel="stylesheet" type="text/css" href="Public/css/queries.css" />

    <script type="text/javascript" src="Public/js/tinymce/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>
    
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    
    <?php require_once('View/navbar.php'); ?>

    <div class="container main">

        <?= $content; ?>
        
    </div>

    <?php require_once('View/footer.php'); ?> 

    <script type="text/javascript" src="Public/js/navbar.js"></script>
    <script type="text/javascript" src="Public/js/billSlide.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

</body>
</html>