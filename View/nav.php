<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.php?p=teletubbies">WtfWeb</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <?php
                foreach($navData as $row){
                    $active = '';
                    if($row['slug'] == $pageCourante) {
                        $active = ' class="active"';
                    }
                    ?>
                    <li <?=$active?>><a href="index.php?p=<?=$row['slug']?>"><?=$row['title']?></a></li>
                    <?php
                }
                ?>
            </ul>
        </div>
    </div>
</nav>