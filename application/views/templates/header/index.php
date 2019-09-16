<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- <link rel="icon" type="image/png" sizes="16x16" href="../favicon/favicon.ico"> -->
    <link rel="stylesheet" href="https://bootswatch.com/4/united/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <title>Sugar TodoList Application with CodeIgniter</title>
</head>
<style>
.main_page {
    color: red;
}
</style>
<section class="main_page">
    <a href="<?php echo base_url(); ?>css/test-css.php" style="margin: 10px 0 10px 50px">
        <!-- <img src="../../favicon/apple-touch-icon.png" width="80px"> -->
        Đi tới trang chủ
    </a>
    <p><?php echo base_url(); ?></p>
    <nav class="navbar navbar-expand-md navbar-dark bg-primary">
        <a class="navbar-brand" href="<?php echo base_url(); ?>">Speedlink</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01"
            aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo base_url(); ?>">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="features">Features</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="pricing">Pricing</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about">About</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="text" placeholder="Search">
                <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>
</section>