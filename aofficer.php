<?php
session_start();
if(isset($_SESSION['email'])){
include_once("include/header.php");
include_once("include/anavbar.php");
include_once("include/connection.php")
?>
<div class="container-fluid">
<div class="container-fluid px-4">
                        <h1 class="mt-4">Student Info</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active"></li>
                        </ol>
                        
                        <div class="card mb-4">
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                       
                                        <tr>
                                        <th>S. No.</th>
                                            <th>Name</th>
                                            <th>Email Id</th>
                                            <th>College</th>
                                            <th>Qualification</th>
                                            <th>View</th>
                                            <th>Remove</th>
                                        </tr>
                                       
                                    </thead>
                                    <tfoot>
                                    <tr>
                                            <th>S. No.</th>
                                            <th>Name</th>
                                            <th>Email Id</th>
                                            <th>College</th>
                                            <th>Qualification</th>
                                            <th>View</th>
                                            <th>Remove</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
			$stmt = $conn->prepare("SELECT * FROM tbl_officer");
			$stmt->execute();
			$tabledata = $stmt->fetchAll();
			$i=1;
			if($tabledata){
			foreach($tabledata as $data)
			{
				?>
                <tr>
				<td><?php echo $i++; ?></td>
				<td><?php echo $data['officer_name']; ?></td>
                <td><?php echo $data['officer_id']; ?></td>
                <td><?php echo $data['officer_clg']; ?></td>
				<td><?php echo $data['officer_qua']; ?></td>
				
                <td>
                    <form action="aofficerview.php" method="get">    
                    <input type="hidden" value="<?php echo $data['officer_id'];  ?>" name="email">
                    <?php// $_SESSION['email']=$data['email']; ?>
                    <input type="submit"  value="VIEW" name="view"class="btn btn-primary">
            </form>
                </td>
                <td><form action="#" method="get">    
                    <input type="hidden" value="<?php echo $data['officer_id']; ?>" name="email">
                    <input type="submit"  value="REMOVE" name="remove"class="btn btn-danger">
            </form></td>
		  </tr>
		  <?php
			}}
		  ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
</div>
<?php
include_once("include/footer.php");
}
else{
  header("Location: alogin.php");
}
?>