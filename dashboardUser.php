<?php 
  include_once 'connectdb.php';
  session_start();
  if($_SESSION['userEmail']=="" )
    header("location:index.php");
  
  if($_SESSION['rol']=='Admin')
    header("location:dashboard.php");

    $name= $_SESSION['userName'];
    $select = $pdo->prepare("select * from users where id=".$_SESSION['userId']);
    $select->execute();
    $row  = $select->fetch(PDO::FETCH_ASSOC);
    $image = $row['img'];
    $status = $row['status'];
    include_once 'headerUser.php';
?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        User Dashboard
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <!--------------------------
        | Your Page Content Here |
        -------------------------->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php
    //footer
    include_once "footer.php"
  ?>