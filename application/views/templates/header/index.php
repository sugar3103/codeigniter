<!DOCTYPE html>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- <link rel="icon" type="image/png" sizes="16x16" href="../favicon/favicon.ico"> -->
    <!-- <link ref="stylesheet" href="<?php echo base_url() . 'assets/css/style.css' ?>"> -->
    <link rel="stylesheet" href="https://bootswatch.com/4/united/bootstrap.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>


    <title>Sugar TodoList Application with CodeIgniter</title>
</head>
<style>
* {
    box-sizing: border-box;
}

body {
    background: url('https://images.pexels.com/photos/1021068/pexels-photo-1021068.jpeg') no-repeat;
    background-size: cover;
}

.heading {
    width: 100%;
    margin: 30px auto;
    text-align: center;
    color: blue;
    background: #FFF8DC;
    border-radius: 20px;
    background: inherit;
}

.modal-open-box {
    margin-left: 40% !important;
    background: #1e87f0 !important;
}

form {
    width: 90%;
    padding: 5px 0 5px 30px;
    margin: 30px auto;
    background: inherit;
}


.task_input {
    width: 80%;
    padding: 5px;
    margin: 5px 0 5px 0;
    border-radius: 5px;
    box-shadow: 0px;
}

.task_checkbox {
    height: 30px;
}

.add_btn {
    background: #1e87f0;
    color: white;
    border: none;
    border-radius: 5px;
    padding: 10px;
    cursor: pointer;
}

table {
    width: 90%;
    margin: 30px auto;
    border-collapse: collapse;
}

tr {
    border-bottom: 1px solid #cbcbcb;
}

th {
    font-size: 19px;
    color: blue
}

th,
td {
    border: none;
    height: 30px;
    padding: 2px;
    font-weight: bold;
}

tr:hover {
    background: #E9E9E9;
}

.task {
    text-align: left;
}

.delete {
    text-align: center;
}

.delete a {
    color: white;
    background: #a52a2a;
    padding: 1px 6px;
    border-radius: 3px;
    text-decoration: none;
}
</style>
<section>
    <nav class="navbar navbar-expand-md navbar-dark bg-primary">
        <a class="navbar-brand" href="<?php echo base_url(); ?>">CodeIgniter</a>
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
            <form class="navbar-form navbar-right" action="search">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default">Search</button>
            </form>
        </div>
    </nav>
</section>
