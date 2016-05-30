<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Liste des pages</title>
    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="../bootstrap/css/" rel="stylesheet">
    <link href="../bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
    <style>
        body {
            padding-top: 70px;
        }
    </style>
</head>
<body role="document">
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="">Back Office</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="">Détails</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <a class="navbar-brand" href="../index.php">Front</a>
            </ul>

        </div>
    </div>
</nav>
<div class="container theme-showcase" role="main">
    <h1>Détails de la page</h1>
    <table class="table-bordered table-responsive table">
        <tr>
            <th>ID</th>
            <th>Slug</th>
            <th>Titre</th>
            <th>H1</th>
        </tr>
        <tr>
            <td><?=$id?></td>
            <td><?=$details->slug?></td>
            <td><?=$details->title?></td>
            <td><?=$details->h1?></td>
        </tr>
    </table>
    <table class="table-bordered table-responsive table">
        <tr>
            <th>Body</th>
        </tr>
        <tr>
            <td><pre><?= htmlentities($details->body);?></pre></td>
        </tr>
    </table>
    <a href="/TeletubbiesMVC2/CMS-MVC-G1/admin/"><button class="btn">Retour</button></a>
</div>
</body>
</html>