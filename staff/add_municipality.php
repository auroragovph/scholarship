

  <!-- Main Sidebar Container -->
 <?php 
include('includes/dbconnection.php');
if(isset($_POST['submit']))


  {
   
    $muni=$_POST['muni'];


$query=mysqli_query($con, "insert into  municipality(muni) value('$muni')");
    if ($query) {
echo "<script>alert('New System municipality has been added.');</script>"; 
echo "<script>window.location.href = 'address.php'</script>"; 
 } else {
echo "<script>alert('Something Went Wrong. Please try again.');</script>";    
} }
  ?>

    <!-- Main content -->
   
        
            <!-- general form elements disabled -->
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Add</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form role="form" method="POST" action="add_municipality.php">
               
                 
                   <div class="row">
                    <div class="col-sm-12">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Municipality</label>
                        <input type="text" name="muni" class="form-control" placeholder="Enter ...">
                      </div>
                    </div>
                  </div>
                
                   <button class="btn btn-primary form-control" name="submit"><i class="fa fa-arrow-right"></i> Submit</button>
                </form>
              </div>
              
          <hr/>
           <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example4" class="table table-bordered table-striped">
                <thead>
                <tr>
                  
                  <th>Municipality</th>
                   

                 
               
                </tr>
                </thead>
              <tbody>
                  <?php
                $query1=mysqli_query($con,"
                  select * from municipality;                 ;
                ")or die(mysqli_error($con));
                    while ($row=mysqli_fetch_array($query1)){
                      $id=$row['id'];
                  ?>
                 <tr>
                
                    <td><?php  echo $muni=$row['muni'];?> </td>
          
                   
                 <!--     <td><a href="print.php?editid=<?php echo $row['id'];?>"><input type="checkbox" name="names[]" value="<?php echo $row['id'];?>" class="success"></a> </td> -->

                    
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


