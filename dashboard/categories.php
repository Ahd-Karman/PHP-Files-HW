<?php
include('header.php');
require('dbconnect.php');
?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2><i class="fa fa-tasks"></i> Categories</h2>


                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <div class="row">
                    <div class="col-md-8">
                        <!-- Form Elements -->

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <i class="fa fa-plus-circle"></i> Add New Category
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                <?php 
                                if(isset($_POST['submit']))
                                {
                                    $name=trim($_POST['name']);
                                    $description=trim(($_POST['description']));
                                    $errors=array();
                                    if(empty($name))
                                    {
                                        $errors['cname']="<div style='color:red'>Enter Name of Category</div>";
                                    }
                                    elseif(is_numeric($name))
                                    {
                                        $errors['cnameNumber']="<div style='color:red'>Enter String Name of Category</div>";
                                    }
                                    else 
                                    {
                                        $sql="insert into category (name,description) values ($name, $description) ";
                                        
                                        if(mysqli_query($con,$sql))
                                        {
                                            echo "<div class='alert alert-success'>One Row Inserted </div>";
                                            
                                        }
                                        else{
                                            echo("Error description: " . mysqli_error($con));
                                           
                                        }
                                    }
                                }
                                
                                ?>
                                    <div class="col-md-12">
                                        <form role="form" method="post">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" placeholder="Please Enter your Name "
                                                    class="form-control" name="name" />
                                                <?php if(isset($errors['cname'])) echo $errors['cname'] ?>
                                                <?php if(isset($errors['cnameNumber'])) echo $errors['cnameNumber'] ?>
                                            </div>
                                            <div class="form-group">
                                                <label>Description</label>

                                                <textarea placeholder="Please Enter Description" 
                                                class="form-control" cols="30" rows="3" 
                                                name='description'></textarea>
                                            </div>
                                            
                                            <div style="float:right;">
                                                <button type="submit"  name="submit" class="btn btn-primary">Add Category</button>
                                                <button type="reset" class="btn btn-danger">Cancel</button>
                                            </div>

                                    </div>
                                    </form>

                                </div>

                            </div>
                        </div>
                    </div>

                </div>                    <hr />

                    <div class="row">
                        <div class="col-md-12">
                            <!-- Advanced Tables -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <i class="fa fa-tasks"></i> Categories
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover "
                                            id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Description</th>
                                                    <th>action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php 
                                           $stm= ("select * from categories");
                                           #$res= mysql_function($con,$stm);
                                           #$res= mysqli_query($con,$stm);
                                           echo(" 
                                           <span class='caret'></span></a>
                             
                                           <ul class='dropdown-menu' style='  background-color: #117a8b;'>
                                             <div class='notification-div'>
                                               <ul class='notification-points'> ") ; 

                                           if(mysqli_num_rows($res) > 0 )
                                            {
                                                while ( $row = mysqli_fetch_array($res) )
                                                {
                                                    $id=$row['id'];
                                                    $name=$row['name'];
                                                    $description=$row['description'];
                                                   
                                                
                                            
                                            ?>
                                                <tr class="odd gradeX">
                                                    <td><?php echo $name ?></td>
                                                    <td><?php  echo $description ?></td>
                                                    <td>
                                                        <a href="" class='btn btn-success'>Edit</a>
                                                        <a href="" class='btn btn-danger'>Delete</a>
                                                    </td>
                                                </tr>
                                   <?php 
                                           } } else { ?>
                                 
                                 <div class='alert alert-danger'>Not Row </div>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                            <!--End Advanced Tables -->
                        
                    </div>
                    <!-- /. ROW  -->
                </div>
                <!-- /. PAGE INNER  -->
            </div>
            <!-- /. PAGE WRAPPER  -->
        </div>
   </div>
   
   <?php
   include('footer.php');
   ?>
   <script>
   $('#delete').click (function () {
	   return confirm("are you sure ! " ) ;
   }) ;
   </script>
