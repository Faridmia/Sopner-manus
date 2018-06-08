<?php require_once('includes/header.php');  ?>
    <div id="wrapper">
        <!-- Navigation -->
        <?php require_once('includes/top-nav.php');  ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">All Product</h1>
                <?php
                        $database    = new Database();
                        $conn        = $database->connection;
                        $data        = array('p_id','p_name','p_qnt','p_availability','p_price','cat_name','sub_name','p_images');
                        $query = $database->joinquery('products','categories','sub_categories',$data,'LEFT JOIN','cat_id','sub_id','p_id');
                        /*$sql = "SELECT p_id,p_name,p_qnt,p_availability,p_price,cat_name,sub_name,p_images FROM products LEFT JOIN categories ON products.cat_id = categories.cat_id LEFT JOIN sub_categories ON products.sub_id = sub_categories.cat_id ORDER BY products.p_id DESC";
                        $query = mysqli_query($conn,$sql);
                        $query       = $database->getData("products",$data);*/
                            echo "<table class='table table-striped'>";
                                echo "<tr>
                                        <th>SL NO</th>
                                        <th>PID</th>
                                        <th>Name</th>
                                        <th>Quentity</th>
                                        <th>Availability</th>
                                        <th>Price</th>
                                        <th>Category</th>
                                        <th>Sub Category</th>
                                        <th>images</th>
                                        <th>Action</th>
                                     </tr>";
                                     $i = 1;
                                     while($row = mysqli_fetch_array($query)){
                                        $p_id           = (int) $row['p_id'];
                                        $p_name         = $row['p_name'];
                                        $p_qnt          = $row['p_qnt'];
                                        $p_availability = $row['p_availability'];
                                        if($p_availability == 1){
                                            $p_availability = "<span class='label label-success'>In Stock</span>";
                                        }
                                        elseif($p_availability == 2){
                                            $p_availability = "<span class='label label-danger'>Out of Stock</span>";
                                        }
                                        $p_price        = ceil($row['p_price']);
                                        $p_images       = $row['p_images'];
                                        $cat_name       = $row['cat_name'];
                                        $sub_name       = $row['sub_name'];
                                        echo "<tr>";
                                            echo "<td>$i</td>";
                                            echo "<td>$p_id</td>";
                                            echo "<td>$p_name</td>";
                                            echo "<td>$p_qnt</td>";
                                            echo "<td>$p_availability</td>";
                                            echo "<td>$p_price</td>";
                                            echo "<td>$cat_name</td>";
                                            echo "<td>$sub_name</td>";
                                            echo "<td><img src='../images/products/$p_images' width='100px' class='img-responsive'></td>";
                                            echo "<td><a href='edit.php?pid=$p_id&name=product'>Edit</a> | <a href='delete.php?pid=$p_id&name=product'>Delete</a></td>";
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