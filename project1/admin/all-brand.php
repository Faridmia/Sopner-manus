<?php require_once('includes/header.php');  ?>
    <div id="wrapper">
        <!-- Navigation -->
        <?php require_once('includes/top-nav.php');  ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">All Brand</h1>
                <?php
                    $database    = new Database();
                    $conn        = $database->connection;
                    $data        = array('b_id','b_name');
                    $query       = $database->getData("brand",$data);
                        echo "<table class='table table-striped'>";
                            echo "<tr>
                                    <th>SL NO</th>
                                    <th>Brand Id</th>
                                    <th>Brand Name</th>
                                    <th>Action</th>
                                 </tr>";
                                 $i = 1;
                                 while($row = mysqli_fetch_array($query)){
                                    $bid           = (int) $row['b_id'];
                                    $b_name         = $row['b_name'];
                                    
                                    echo "<tr>";
                                        echo "<td>$i</td>";
                                        echo "<td>$bid</td>";
                                        echo "<td>$b_name</td>";
                                        echo "<td><a href='edit_brand.php?bid=$bid&name=brand'>Edit</a> | <a href='delete.php?bid=$bid&name=brand'>Delete</a></td>";
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