<?php require_once('includes/header.php');  ?>
    <div id="wrapper">
        <!-- Navigation -->
        <?php require_once('includes/top-nav.php');  ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">All Banner</h1>
                <?php
                    $database    = new Database();
                    $conn        = $database->connection;
                    $data        = array('ban_id','ban_title','ban_sub_title','ban_description','ban_button_url','ban_images');
                    $query       = $database->getData("banner",$data);
                        echo "<table class='table table-striped'>";
                            echo "<tr>
                                    <th>SL NO</th>
                                    <th>Banner Id</th>
                                    <th>Banner Title</th>
                                    <th>Banner Sub Title</th>
                                    <th>Banner Description</th>
                                    <th>Banner Button Url</th>
                                    <th>Banner Images</th>
                                    <th>Action</th>
                                 </tr>";
                                 $i = 1;
                                 while($row = mysqli_fetch_array($query)){
                                    $banid              = (int) $row['ban_id'];
                                    $ban_title          = $row['ban_title'];
                                    $ban_sub_title      = $row['ban_sub_title'];
                                    $ban_description    = $row['ban_description'];
                                    $ban_button_url     = $row['ban_button_url'];
                                    $ban_images         = $row['ban_images'];
                                    
                                    echo "<tr>";
                                        echo "<td>$i</td>";
                                        echo "<td>$banid</td>";
                                        echo "<td>$ban_title</td>";
                                        echo "<td>$ban_sub_title</td>";
                                        echo "<td>$ban_description</td>";
                                        echo "<td>$ban_button_url</td>";
                                        echo "<td><img src='../images/banner/$ban_images' width='100px' class='img-responsive'></td>";
                                        echo "<td><a href='edit_banner.php?banid=$banid&name=banner'>Edit</a> | <a href='delete.php?banid=$banid&name=banner'>Delete</a></td>";
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