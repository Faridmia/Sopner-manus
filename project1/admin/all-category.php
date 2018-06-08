<?php require_once('includes/header.php');  ?>
    <div id="wrapper">
        <!-- Navigation -->
        <?php require_once('includes/top-nav.php');  ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">All Category</h1>
                <?php
                    $database    = new Database();
                    $conn        = $database->connection;
                    $data        = array('cat_id','cat_name');
                    $query       = $database->getData("categories",$data);
                        echo "<table class='table table-striped'>";
                            echo "<tr>
                                    <th>SL NO</th>
                                    <th>Cat Id</th>
                                    <th>Cat Name</th>
                                    <th>Action</th>
                                 </tr>";
                                 $i = 1;
                                 while($row = mysqli_fetch_array($query)){
                                    $cat_id           = (int) $row['cat_id'];
                                    $cat_name         = $row['cat_name'];
                                    
                                    echo "<tr>";
                                        echo "<td>$i</td>";
                                        echo "<td>$cat_id</td>";
                                        echo "<td>$cat_name</td>";
                                        echo "<td><a href='edit_category.php?catid=$cat_id&name=category'>Edit</a> | <a href='delete.php?catid=$cat_id&name=category'>Delete</a></td>";
                                    echo "</tr>";
                                    $i++;
                                    
                                 }
                            echo "</table>";
                    ?>
                
                </div>               
            </div>          
            <div class="row">
                <div class="col-lg-3 col-md-6">

                
                </div>             
            </div>          
        </div>
    </div>
    <!-- /#wrapper -->
    <?php
    require_once('includes/js.php');
    require_once('includes/footer.php');
    ?>