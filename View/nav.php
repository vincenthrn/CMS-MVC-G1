<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.php?p=teletubbies">WtfWeb</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
<?php foreach ($nav as $row): ?>
                <li class="<?=isActive($row->slug, $slug)?>"><a href="index.php?p=<?= $row->slug ?>"><?= $row->title ?></a></li>
<?php endforeach; ?>
            </ul>
        </div>
    </div>
</nav>