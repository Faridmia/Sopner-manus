<?php require_once('includes/header.php');  ?>
    <div id="wrapper">
        <!-- Navigation -->
        <?php require_once('includes/top-nav.php');  ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <?php 
                        $login = new login();
                        $login->logout();
                    ?>
                </div>               
            </div>          
                    
        </div>
    </div>
    <!-- /#wrapper -->
    <?php
    require_once('includes/js.php');
    require_once('includes/footer.php');
    ?>