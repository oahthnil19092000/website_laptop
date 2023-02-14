<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require_once "mvc/views/blocks/head.php";
    ?>
</head>

<body>
    <div class="app">
        <header class="header">
            <?php
    require_once "mvc/views/blocks/".$data['header'].".php";
    ?>
        </header>
        <main>
            <?php
    require_once "mvc/views/pages/".$data['page'].".php";
    ?>
        </main>
        <footer class="footer">
            <?php
    require_once "mvc/views/blocks/footer.php";
    ?>
        </footer>
    </div>
    <?php 
require_once "mvc/views/blocks/scripts.php";
?>
</body>

</html>