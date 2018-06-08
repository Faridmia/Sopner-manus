<?php 
    require_once('includes/header.php'); 
 ?>
    <div id="wrapper">
        <!-- Navigation -->
        <?php 
            require_once('includes/top-nav.php');

            $name = isset($_GET['name'])? $_GET['name'] : ''; 
            $database    = new Database();
            $conn        = $database->connection;
           // $page = $_POST['page'];
         ?>
         
         
        <div id="page-wrapper">
            <div class="row">
                
                <div class="col-lg-12">
                    <h1 class="page-header">Do You Want to Delete This <?php echo $name;?> </h1>
        
                
                </div>               
            </div> 
            <?php if($name == 'product'){ ?>         
            <div class="row">
                <div class="col-lg-3 col-md-6">

                <?php 
                     $pid         = isset($_GET['pid']) ? (int) $_GET['pid'] : '';
            
                 
                     $data        = array('p_id');
                     $query       = $database->getData("products",$data,'p_id','=',"$pid");
                     //$row         = mysqli_fetch_array($query);
                     //$dbpid       = (int) $row['p_id'];
                     $numrows     = $database->numRows($query);
                     if($numrows == 1){
                        if(isset($_POST['no']) && $_POST['no'] == 'NO'){
                            header('location:all-product.php');
                        }
                        elseif(isset($_POST['yes']) && $_POST['yes'] == 'YES'){
                            if($database->deletedata("products","p_id",$pid)){
                                echo "<div class='alert alert-success'> Successfully Deleted.</div>";
                            }
                            else
                            {
                                 echo "<div class='alert alert-danger'>Data is not Deleted.</div>";
                                 header('Refresh: 3;url=all-product.php');
                            }
                            
                        }
                        echo "<form method='post'action='delete.php?pid=$pid&name=$name'>
                            <input type='submit' name='no' value='NO' class='btn btn-success'/>
                            <input type='submit' name='yes' value='YES' class='btn btn-danger'/>
                            </form>";

                     }


                    ?>

                
                </div> 
                        
            </div> 
            <?php } elseif ( $name == 'category' ) { ?>    
                <?php
                    $catid          = (int) $_GET['catid'];
                    $data           = array('cat_id');
                    $query          = $database->getData("categories", $data, 'cat_id', '=', $catid);
                    $numRows        = $database->numRows($query);  

                    if( $numRows == 1 ) {
                        if( isset($_POST['no']) && $_POST['no'] == 'NO' ) {
                            header('Location:all-category.php');
                        } elseif( isset($_POST['yes']) && $_POST['yes'] == 'YES' ) {
                            if( $database->deletedata('categories', 'cat_id', $catid) ) {
                                echo "<div class='alert alert-success'>Successfully Deleted.</div>";
                                 header('Refresh: 3; url= all-category.php');
                            } else {
                                echo "<div class='alert alert-danger'>Data is not deleted.</div>";
                            }
                        }
                    } else {
                        echo 'Not found';
                    }
                ?>
                <form action="delete.php?catid=<?php echo $catid;?>&name=category" method="post">
                    <input type="submit" name="yes" value="YES" class="btn btn-danger">
                    <input type="submit" name="no" value="NO" class="btn btn-success">
                </form>
            <?php } elseif ( $name == 'subcategory') { ?> 

            <?php
                $subid          = (int) $_GET['subid'];
                $data           = array('sub_id');
                $query          = $database->getData("sub_categories", $data, 'sub_id', '=', $subid);
                $numRows        = $database->numRows($query);  

                if( $numRows == 1 ) {
                    if( isset($_POST['no']) && $_POST['no'] == 'NO' ) {
                        header('Location:all-sub-category.php');
                    } elseif( isset($_POST['yes']) && $_POST['yes'] == 'YES' ) {
                        if( $database->deletedata('sub_categories', 'sub_id', $subid) ) {
                            echo "<div class='alert alert-success'>Successfully Deleted.</div>";
                             header('Refresh: 3; url= all-sub-category.php');
                        } else {
                            echo "<div class='alert alert-danger'>Data is not deleted.</div>";
                        }
                    }
                } else {
                    echo 'Not found';
                }
            ?>
                <form action="delete.php?subid=<?php echo $subid;?>&name=subcategory" method="post">
                    <input type="submit" name="yes" value="YES" class="btn btn-danger">
                    <input type="submit" name="no" value="NO" class="btn btn-success">
                </form>


            <?php } elseif ( $name == 'brand') { ?>
                <?php
                        $bid          = (int) $_GET['bid'];
                        $data           = array('b_id');
                        $query          = $database->getData("brand", $data, 'b_id', '=', $bid);
                        $numRows        = $database->numRows($query);  

                        if( $numRows == 1 ) {
                            if( isset($_POST['no']) && $_POST['no'] == 'NO' ) {
                                header('Location:all-brand.php');
                            } elseif( isset($_POST['yes']) && $_POST['yes'] == 'YES' ) {
                                if( $database->deletedata('brand', 'b_id', $bid) ) {
                                    echo "<div class='alert alert-success'>Successfully Deleted.</div>";
                                     header('Refresh: 3; url= all-brand.php');
                                } else {
                                    echo "<div class='alert alert-danger'>Data is not deleted.</div>";
                                }
                            }
                        } else {
                            echo 'Not found';
                        }
                ?>
                <form action="delete.php?bid=<?php echo $bid;?>&name=brand" method="post">
                    <input type="submit" name="yes" value="YES" class="btn btn-danger">
                    <input type="submit" name="no" value="NO" class="btn btn-success">
                </form>


            <?php } elseif ( $name == 'banner') { ?> 

                <?php
                        $banid          = (int) $_GET['banid'];
                        $data           = array('ban_id');
                        $query          = $database->getData("banner", $data, 'ban_id', '=', $banid);
                        $numRows        = $database->numRows($query);  

                        if( $numRows == 1 ) {
                            if( isset($_POST['no']) && $_POST['no'] == 'NO' ) {
                                header('Location:all-banner.php');
                            } elseif( isset($_POST['yes']) && $_POST['yes'] == 'YES' ) {
                                if( $database->deletedata('banner', 'ban_id', $banid) ) {
                                    echo "<div class='alert alert-success'>Successfully Deleted.</div>";
                                     header('Refresh: 3; url= all-banner.php');
                                } else {
                                    echo "<div class='alert alert-danger'>Data is not deleted.</div>";
                                }
                            }
                        } else {
                            echo 'Not found';
                        }
                ?>
                <form action="delete.php?banid=<?php echo $banid;?>&name=banner" method="post">
                    <input type="submit" name="yes" value="YES" class="btn btn-danger">
                    <input type="submit" name="no" value="NO" class="btn btn-success">
                </form>


            <?php } ?>     
        </div>
            
    </div>
    <!-- /#wrapper -->
    <?php
    require_once('includes/js.php');
    require_once('includes/footer.php');
    ?>