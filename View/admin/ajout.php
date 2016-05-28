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
                <li class="active"><a href="">Ajout</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="container theme-showcase" role="main">
    <a href="/TeletubbiesMVC2/CMS-MVC-G1/admin/"><button class="btn">Retour</button></a>
    <h1>Ajouter une page</h1>
    <form>
        <fieldset class="form-group">
            <label for="h1">H1</label>
            <input type="text" class="form-control" id="h1" placeholder="H1" required>
        </fieldset>
        <fieldset class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" placeholder="Title" required>
        </fieldset>
        <fieldset class="form-group">
            <label for="slug">Slug</label>
            <input type="text" class="form-control" id="slug" placeholder="Slug" required>
        </fieldset>
        <fieldset class="form-group">
            <label for="body">Body</label>
            ​<textarea id="body" class="form-control" rows="10" cols="70" required></textarea>
        </fieldset>
        <button type="submit" class="btn btn-primary">Ajouter la page</button>
    </form>
</div>
</body>
</html>