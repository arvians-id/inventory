<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="/template/adminwrap/assets/images/favicon.png">
    <title><?= $judul ?></title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/adminwrap/" />
    <!-- Bootstrap Core CSS -->
    <link href="/template/adminwrap/assets/node_modules/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- page css -->
    <link href="/template/adminwrap/main/css/pages/login-register-lock.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="/template/adminwrap/main/css/style.css" rel="stylesheet">

    <!-- You can change the theme colors from here -->
    <link href="/template/adminwrap/main/css/colors/default.css" id="theme" rel="stylesheet">
</head>

<body class="card-no-border">

    <!-- Preloader -->
    <?= $this->include('main/layout/preloader') ?>

    <!-- Konten -->
    <?= $this->renderSection('konten') ?>

    <script src="/template/adminwrap/assets/node_modules/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="/template/adminwrap/assets/node_modules/bootstrap/js/popper.min.js"></script>
    <script src="/template/adminwrap/assets/node_modules/bootstrap/js/bootstrap.min.js"></script>
    <!--Custom JavaScript -->
    <script type="text/javascript">
        $(function() {
            $(".preloader").fadeOut();
        });
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        });
    </script>

</body>

</html>