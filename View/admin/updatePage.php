<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Modifier la page</title>
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
                <li class="active"><a href="">Modification</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="container theme-showcase" role="main">
    <a href="../admin/"><button class="btn btn-info">Retour</button></a>
    <h1>Modifier la page</h1>
    <form action="" method="post">
        <fieldset class="form-group">
            <label for="slug">slug</label>
            <input type="text" class="form-control" id="slug" name="slug" placeholder="slug" value="<?=$details->slug?>" required>
        </fieldset>
        <fieldset class="form-group">
            <label for="h1">h1</label>
            <input type="text" class="form-control" id="h1" name="h1" placeholder="h1" value="<?=$details->h1?>" required>
        </fieldset>
        <fieldset class="form-group">
            <label for="title">title</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Title" value="<?=$details->title?>" required>
        </fieldset>
        <fieldset class="form-group">
            <label for="img">img</label>
            <input type="text" class="form-control" id="img" name="img" value="<?=$details->img?>" required>
        </fieldset>
        <fieldset class="form-group">
            <label for="span_text">span text</label>
            <input type="text" class="form-control" id="span_text" name="span_text" placeholder="Span Text" value="<?=$details->span_text?>" required>
        </fieldset>
        <fieldset class="form-group">
            <label for="span_class">span class</label>
            <select class="form-control" id="span_class" name="span_class">
                <option value="label-danger" <?=isSelected($details->span_class, "label-danger")?>>label-danger</option>
                <option value="label-success" <?=isSelected($details->span_class, "label-success")?>>label-success</option>
            </select>
        </fieldset>
        <input type="submit" name="submit" class="btn btn-primary"/>
    </form>
</div>
</body>
</html>