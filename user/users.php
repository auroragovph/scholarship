<?php include('includes/header.php'); ?>

  <!-- Main Sidebar Container -->
 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">System Users</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <a href="add_users.php"><button type="submit" class="btn btn-warning"><i class="fa fa-plus"></i> Add</button></a>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
         <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  
                  <th>Name</th>
                   <th>UserName</th>
                    <th>Office</th>
                    <th>Access Level</th>
                     
                   <th>Action</th>
               
                </tr>
                </thead>
              <tbody>
                  <?php
                $query1=mysqli_query($con,"
                  select * from users ;                 ;
                ")or die(mysqli_error($con));
                    while ($row=mysqli_fetch_array($query1)){
                      $ID=$row['ID'];
                  ?>
                 <tr>
                  <td> <?php  echo $lname=$row['name'];?></td>
                    <td><?php  echo $username=$row['username'];?> </td>
                     <td><?php  echo $office=$row['office'];?> </td>
                    <td><?php  echo $level=$row['level'];?> </td>
                   
                 <!--     <td><a href="print.php?editid=<?php echo $row['id'];?>"><input type="checkbox" name="names[]" value="<?php echo $row['id'];?>" class="success"></a> </td> -->

                     <td><a href="view_approved.php?view=<?php echo $row['ID'];?>"><button type="submit" class="btn btn-success"><i class="fa fa-search"></i> View</button></a>
                        <a href="view_approved.php?view=<?php echo $row['ID'];?>"><button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button></a>
                     </td>
                    
             <!--   <a href="scholarship_data.php?editid=<?php echo $row['ID'];?>"><button type="submit" class="btn btn-danger">Delete</button></a>
                 </td> -->

                </tr>
             <?php } ?>
               
                </tbody>
             
              </table>
            </div>
            <!-- /.card-body -->
          </div>






      </div>
    </section>
    <!-- /.content -->
  </div>


 
  <!-- /.content-wrapper -->
  <?php include('includes/footer.php'); ?>

  <!-- Control Sidebar -->

  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

</body>
</html>