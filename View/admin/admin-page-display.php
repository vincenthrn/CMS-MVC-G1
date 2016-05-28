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
                <li class="active"><a href="">Liste</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <a class="navbar-brand" href="../index.php">Front</a>
            </ul>

        </div>
    </div>
</nav>
<div class="container theme-showcase" role="main">
    <h1>Liste des pages</h1>
    <table class="table-bordered table-responsive table">
        <tr>
            <th>ID</th>
            <th>Slug</th>
            <th>Titre</th>
            <th>Action</th>
        </tr>
<?php foreach($liste as $item): ?>
        <tr>
            <td><?= $item->id ?></td>
            <td><?= $item->slug ?></td>
            <td><?= $item->title ?></td>
            <td>
                <a href="index.php?a=details&id=<?= $item->id ?>">Details</a>
                <a href="index.php?a=modifier&id=<?= $item->id ?>">Modifier</a>
                <a href="index.php?a=supprimer&id=<?= $item->id ?>">Supprimer</a>
            </td>
        </tr>
<?php endforeach;?>
    </table>
    <a href="index.php?a=ajouter">Ajouter une page</a>
</div>
</body>
</html>