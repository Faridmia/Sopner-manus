<?php require_once('includes/header.php');  ?>
    <div id="wrapper">
        <!-- Navigation -->
        <?php require_once('includes/top-nav.php');  ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">All Sub Category</h1>
                <?php
                    $database    = new Database();
                    $conn        = $database->connection;
                    $data        = array('cat_id','sub_name','sub_id');
                    $query       = $database->getData("sub_categories",$data);
                        echo "<table class='table table-striped'>";
                            echo "<tr>
                                    <th>SL NO</th>
                                    <th>Sub Id</th>
                                    <th>Sub Name</th>
                                    <th>Cat Id</th>
                                    <th>Action</th>
                                 </tr>";
                                 $i = 1;
                                 while($row = mysqli_fetch_array($query)){
                                    $subid           = (int) $row['sub_id'];
                                    $catid           = (int) $row['cat_id'];
                                    $sub_name         = $row['sub_name'];
                                    
                                    echo "<tr>";
                                        echo "<td>$i</td>";
                                        echo "<td>$subid</td>";
                                        echo "<td>$sub_name</td>";
                                        echo "<td>$catid</td>";
                                        echo "<td><a href='edit-sub-category.php?subid=$subid&name=subcategory'>Edit</a> | <a href='delete.php?subid=$subid&name=subcategory'>Delete</a></td>";
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