<?php
session_start();

if(!isset($_SESSION["type"]))
{
    header("location: 0index.php");
}
require 'db/conn.php';
?>

<?php
	$user = '';

	if(isset($_SESSION['user'])){
		$user = $_SESSION['user'];
	}
	$dept = '';

	if(isset($_SESSION['type'])){
		$dept = $_SESSION['type'];
	}
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
	<!-- Bootstrap CSS -->
    <link href="https://cdn
	.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/the
	mes/base/jquery-ui.css">
    <!--<title> Responsive Sidebar Menu  | CodingLab </title>-->
    <link rel="stylesheet" href="css/styles.css">

	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<!--Font Styles-->
	<link rel="icon" type="image/png" href="img/Brgy-Commonwealth.png">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400&display=swap" rel="stylesheet">
	
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <!--<title> Responsive Sidebar Menu  | CodingLab </title>-->
    <link rel="stylesheet" href="css/styles.css">
	<link rel="stylesheet" href="css/captain.css">
	
     <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <title> Lupon Dashboard </title>
	 
	 
	 <style>



.dropbtn {
  background-color: #3498DB;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

.dropbtn:hover, .dropbtn:focus {
  background-color: #2980B9;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  overflow: auto;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown a:hover {background-color: #ddd;}

.show {display: block;}





		div.align-box{padding-top: 23px; display: flex; align-item: center;}
		.box-report{
			width: 300px;
			font-size: 14px;
			border: 4px solid #7dc748;
			padding: 30px;
			margin: 10px;
			border-radius: 5px;
			align-items: center;

		}
		
		 i.menu{color: #fff}
			 i.id{color: #a809b0}
			 i.clearance{color: #1cb009}
			 i.sms{color: #478eff}
			 i.blotter-com{color: #9e0202}
			 i.indigency{color: #0218bd}
			 i.permit{color: #e0149c}
	 </style>
   </head>
	<body>
		<!-- Side Navigation Bar-->
		   <div class="sidebar">
			<div class="logo-details">
			    <img class="brgy_icon" src="img/Brgy-Commonwealth.png" alt=""/>
				<div class="logo_name">Barangay Commonwealth</div>
				<i class='bx bx-menu menu' id="btn"></i>
			</div>
			<ul class="nav-list">
			  <li>
			  <a class="side_bar" href="lupon.php">
				  <i class='bx bx-grid-alt dash'></i>
				  <span class="links_name">Dashboard</span>
				</a>
				 <span class="tooltip">Dashboard</span>
			  </li>
			  
			 <li>
			   <a class="side_bar" href="form_lupon_printdocs.php">
				 <i class='fa fa-print'></i>
				 <span class="links_name">Print Document</span>
			   </a>
			   <span class="tooltip">Print Document</span>
			 </li>
			   

			<!--Setting Section-->
			 <li>
			   <a class="side_bar" href="settings.php">
				 <i class='bx bx-cog' ></i>
				 <span class="links_name">Setting</span>
			   </a>
			   <span class="tooltip">Setting</span>
			 </li>
			 
			 <li class="profile">
				 <div class="profile-details">
				   <img class="profile_pic" src="img/1.jpeg">
				   <div class="name_job">
				   		<div class="job"><strong><?php echo $user;?></strong></div>
						<div class="job" id=""><?php echo $dept; ?></div>
				   </div>
				 </div>
				 <a href="emplogout.php">
					<i class='bx bx-log-out d_log_out' id="log_out" ></i>
				 </a>
			 </li>
			</ul>
		  </div>
		  <!-- Middle Section -->
		  <section class="home-section">
			<!-- Top Section -->
			  <section class="top-section">
				  <div class="top-content">
					<div>
						<h5>UPCOMING HEARING
						<a href="#" class="circle">
							 <img src="img/dt.png" >
					    </a>
					    </h5>	  
					</div>
				  </div>
			  </section>
			  <div class="dropdown">
  <button onclick="myFunction()" class="dropbtn">MONDAY</button>
  <div id="myDropdown" class="dropdown-content">
    <a href="#home">MR. 1</a>
    <a href="#about">MR. 2</a>
    <a href="#contact">MR. 3</a>
  </div>
</div>

<div class="dropdown">
  <button onclick="myFunction()" class="dropbtn">TUESDAY</button>
  <div id="myDropdown" class="dropdown-content">
    <a href="#home">MR. 4</a>
    <a href="#about">MR. 5</a>
    <a href="#contact">MR. 6</a>
  </div>
</div>

<div class="dropdown">
  <button onclick="myFunction()" class="dropbtn">WEDNESDAY</button>
  <div id="myDropdown" class="dropdown-content">
    <a href="#home">MR. 4</a>
    <a href="#about">MR. 5</a>
    <a href="#contact">MR. 6</a>
  </div>
</div>

<div class="dropdown">
  <button onclick="myFunction()" class="dropbtn">THURSDAY</button>
  <div id="myDropdown" class="dropdown-content">
    <a href="#home">MR. 4</a>
    <a href="#about">MR. 5</a>
    <a href="#contact">MR. 6</a>
  </div>
</div>
<div class="dropdown">
  <button onclick="myFunction()" class="dropbtn">FRIDAY</button>
  <div id="myDropdown" class="dropdown-content">
    <a href="#home">MR. 4</a>
    <a href="#about">MR. 5</a>
    <a href="#contact">MR. 6</a>
  </div>
</div>
<div class="dropdown">
  <button onclick="myFunction()" class="dropbtn">SATURDAY</button>
  <div id="myDropdown" class="dropdown-content">
    <a href="#home">MR. 4</a>
    <a href="#about">MR. 5</a>
    <a href="#contact">MR. 6</a>
  </div>
</div>

			  <div>
			  <form action="user.php" method="POST">
				<div class="search_content">
                        <label>Search: 
                            <input type="text" class="r_search" name="keyword">
							<button type="button" name="search"><i class="bx bx-search"></i></button>
                        </label>
                </div> 
			  </form>

			  <div class="reg_table emp_tbl">
						<table class="content-table">
						
						<?php
						include "db/conn.php";
	                    include "db/user.php";
							
						$mquery = "SELECT * FROM lupondb";
						$countemployee = $db->query($mquery)
						?>

							<thead>
								<tr class="t_head">
									<th>Case No.</th>
									<th>Complainant</th>
									<th>Accussed</th>
									<th>Address</th>
									<th>Time And Date:</th>
									<th>Contact No.</th>
									<th>Complaints:</th>
									<th>Status</th>
									<th>Action</th>
								</tr>                       
							</thead>
							
						</table>
							<!--
								<input type="button" id="tst" value="ok" onclick="fnselect()"/>
						     -->
						</div>
					</div>
				</div>
				
			</section>
			
			<br>
			<br>
			<br>
			<br>
			<br>

			<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>
			
			</section>
	</body>
</html>