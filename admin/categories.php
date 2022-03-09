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

            <!--------------------- OOP PHP---------------------->
<?php
class Category {
   private $name;
   private $desc;

    function add_cat(){
        $sql="INSERT INTO category (name,description) VALUES ('$name','$description') ";
                                        
         if(mysqli_query($this->$con,$this-> $sql))
          {
            echo "<div class='alert alert-success'>One Row Inserted </div>";
          }
          else
            {
              echo("Error description: " . mysqli_error($con));
            }
    }

    function edit_cat($current_name, $name , $image , $desc){

    }

    function delete_cat($name , $image , $desc){

    }
}

    if(isset($_POST['submit']))
        {
            $name=trim(($_POST['name']));
            $description=trim(($_POST['description']));
            $cate = new Category();
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
                  $cate-> add_cat() ;
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


