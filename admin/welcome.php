<?php include './../includes/session.php'; ?>
<?php include './../includes/navbar.php'; ?>
     <!DOCTYPE html> 
     <html lang="en"> 
     <head>
      <meta charset="UTF-8"> 
      <title>Welcome</title>
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css"> 
       <style type="text/css"> body{ font: 14px sans-serif; 
       text-align: center; }
</style>
</head> 
<body> 
<div class="page-header">


 <h1>ADMINISTRATION CENTER</h1> 
 
 </div> 

 <div class="bs-example w3layouts">
					<table class="table" id="orderTable">
						<thead>
							<tr>
								<th>First Name </th>
								<th>Last Name </th>
								<th>E-mail </th>
								<th>course Registered</th>
								<th>MARK OBTAINED</th>
								
							</tr>
						</thead>
						<tbody>
							<?php
                            $stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows1 FROM admin WHERE admin_id = :admin_id");
                            $stmt->execute(['admin_id'=>$_SESSION['admin']]);
                            $row = $stmt->fetch();


                            var_dump($_SESSION);
							?>
						</tbody>
					</table>

 </div>
 
 </body> 
 </html>