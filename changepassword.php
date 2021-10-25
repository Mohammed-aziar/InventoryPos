<?php 
  include_once 'connectdb.php';
  session_start();
  if($_SESSION['userEmail']=="" )
    header("location:index.php");

    //   if($_SESSION['rol']=='User')
    //     header("location:dashboardUser.php");

    $userId = $_SESSION['userId'];
    $name   = $_SESSION['userName'];
    $image  = $_SESSION['img'];
    $status = $_SESSION['status'];

    $oldpassword_txt= $_POST['txtoldpass'];
    $newpassword_txt= $_POST['txtnewpass'];
    $confpassword_txt= $_POST['txtconfpass'];

    $resutlset = $pdo->prepare("select * from users WHERE id=".$userId);
    $resutlset->execute();
    $row1  = $resutlset->fetch(PDO::FETCH_ASSOC);
    $error="";
    if($oldpassword_txt == $row1['password']){
        $update = $pdo->prepare("update users SET password='$newpassword_txt' WHERE id=".$userId);
        $update->execute();
    }else{

        $error="incorrect password";
    }
    
    


  include_once 'header.php';
?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Admin Dashboard
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

    <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">change password form</h3>
            </div>
            <?php
                if($error != "" ){
                    echo '<div class="alert alert-danger" role="alert">
                    incorrect password !
                    </div>';
                }
            ?>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="POST">
              <div class="box-body">
                
                <div class="form-group">
                  <label for="exampleInputPassword1">Old Password</label>
                  <input type="text" class="form-control" name="txtoldpass" id="exampleInputPassword1" placeholder="password">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">New Password</label>
                  <input type="password" class="form-control" name="txtnewpass" id="exampleInputPassword1" placeholder="password">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">confirm Password</label>
                  <input type="password" class="form-control" name="txtconfpass" id="exampleInputPassword1" placeholder="password">
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" name="btn-update" value="update" class="btn btn-primary">Update</button>
              </div>
            </form>
          </div>
          <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php
    //footer
    include_once "footer.php"
  ?>