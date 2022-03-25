<?php
session_start();
include("../db/conn.php");
include("../db/user.php");
include('../announcement_includes/functions.php');
include("../db/accounting_computation.php");


if (!isset($_SESSION["type"])) {
    header("location: 0index.php");
}

?>

<?php
$user = '';

if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
}
$dept = '';

if (isset($_SESSION['type'])) {
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
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/design.css">
    <link rel="stylesheet" href="../css/ionicons.min.css">

    <!--Font Styles-->
    <link rel="icon" type="image/png" href="../img/Brgy-Commonwealth.png">
    <link rel="stylesheet" href="../announcement_css/custom.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> Transaction History: Accounting Department </title>


    <style>
        div.align-box {
            padding-top: 23px;
            display: flex;
            align-items: center;
        }

        .box-report {
            width: 300px;
            font-size: 14px;
            border: 4px solid #7dc748;
            padding: 30px;
            margin: 10px;
            border-radius: 5px;
            align-items: center;
        }

        * {
            font-size: 13px;
        }

        a {
            text-decoration: none;
        }

        .addannounce {
            margin-top: 340px;
            margin-left: 25px;
            font-size: 13px;
        }

        .fileupload {
            font-size: 13px;
            margin-left: 15px;
        }

        .pagination {
            margin-top: 32%
        }

        .page {
            margin-left: 15px;
        }

        span.topright {
            margin-left: -50px;
            text-align: right;
            font-size: 25px;
        }

        .topright:hover {
            text-align: right;
            color: red;
            cursor: pointer;
        }

        .submitbtn,
        .cattxtbox,
        .refreshbtn,
        .fileimg {
            font-size: 14px;
            height: 35px;
            width: 84%;
            padding: 10px 10px;
            margin: 4px 25px;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        .errormsg,
        .del {
            color: #d8000c;
            background: #ffbaba;
            border-radius: 5px;
        }

        .edit {
            width: 40%;
            color: #9f6000;
            background: #feef83;
            margin-bottom: 5px;
            border-radius: 5px;
        }

        .del {
            width: 40%;
        }

        .select__select {
            margin-top: -32px;
            padding-left: 180px;
        }

        .bcircle:hover {
            color: black
        }

        .imgup {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 5px 5px 5px 5px;
            margin-left: 20px;
            margin-right: 25px;
        }

        .btnwidth {
            width: 70%;
            margin-bottom: 5px;
        }

        .announcedesc {
            margin-left: 20px;
        }

        .btnmargin {
            margin-bottom: 5px;
        }

        .hoverbtn:hover {
            background: orange;
        }

        .btnwidths {
            width: 40%
        }

        .descriptionStyle {
            overflow: auto;
            resize: none;
        }

        .addcat {
            background: #B6B4B4;
            border: 2px solid gray;
            height: 40px;
        }

        .tblinput {
            background: none;
            border: none;
            user-select: none;
            text-align: center;
            pointer-events: none;
        }

        .viewbtn {
            width: 45px;
            height: 35px;
        }

        .cattxtbox {
            font-size: 14px;
            height: 35px;
            width: 100%;
            padding: 10px 10px;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
            text-align: center;
        }

        .w3-quarter {
            margin-bottom: 10px;
        }

        .w3back {
            background: #04AA6D
        }

        .w3point:hover {
            cursor: pointer;
            background: orange;
            color: green
        }

        .w3bord {
            border: 2px solid white;
        }

        .w3borderbot {

            border-bottom-left-radius: 15px;
            border-bottom-right-radius: 15px;
            margin-left: 15px;
        }

        .w3bordertop {
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }

        .piechart {
            display: none;
            position: fixed;
            width: 100%;
            height: 100%;
            background-color: rgb(0, 0, 0);
            background-color: rgba(0, 0, 0, 0.4);
            padding-top: 5px;
        }
    </style>
</head>

<body>

    <!-- Side Navigation Bar-->
    <div class="sidebar">
        <div class="logo-details">
            <img class="brgy_icon" src="../img/Brgy-Commonwealth.png" alt="" />
            <div class="logo_name">Accounting Department</div>
            <i class='bx bx-menu menu' id="btn"></i>
        </div>
        <ul class="nav-list">
            <li>
                <a class="side_bar nav-button  " href="accounting_dashboard.php">
                    <i class='bx bx-category-alt dash'></i>
                    <span class="links_name">Dashboard</span>
                </a>
                <span class="tooltip">Dashboard</span>
            </li>

            <li>
                <a class="side_bar nav-button" href="accounting_attendance_list.php">
                    <i class='bx bx-calendar-check ongoing'></i>
                    <span class="links_name">Attendance List</span>
                </a>
                <span class="tooltip">Attendance List</span>
            </li>


            <li>
                <a class="side_bar nav-button" href="accounting_salary.php">
                    <i class='fa fa-users salary'></i>
                    <span class="links_name">Employee Salary</span>
                </a>
                <span class="tooltip">Employee Salary</span>
            </li>

            <li>
                <a class="side_bar nav-button" href="accounting_funds.php">
                    <i class='bx bx-coin-stack budget'></i>
                    <span class="links_name">Storage Funds</span>
                </a>
                <span class="tooltip">Storage Funds</span>
            </li>

            <li>
                <a class="side_bar nav-button" href="accounting_payroll.php">
                    <i class='fa fa-money payroll'></i>
                    <span class="links_name">Payroll</span>
                </a>
                <span class="tooltip">Payroll</span>
            </li>

            <li>
                <a class="side_bar nav-button nav-active" href="accounting_transaction_history.php">
                    <i class='fa fa-money payroll'></i>
                    <span class="links_name">Transaction History</span>
                </a>
                <span class="tooltip">Transaction History</span>
            </li>

            <li class="profile">
                <div class="profile-details">
                    <div class="name_job">
                        <div class="job"><strong><?php echo $user; ?></strong></div>
                        <span class="job" id=""><?php echo $dept; ?> | Online</span>
                    </div>
                </div>
                <a href="emplogout.php">
                    <i class='bx bx-log-out d_log_out' id="log_out"></i>
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
                    <h5>Transaction History
                        <a href="#" class="circle">
                            <img src="../img/dt.png">
                        </a>
                    </h5>
                </div>
            </div>
        </section>
        <?php
        // create object of functions class
        $function = new functions;

        // create array variable to store data from database
        $data = array();

        if (isset($_GET['keyword'])) {
            // check value of keyword variable
            $keyword = $function->sanitize($_GET['keyword']);
            $bind_keyword = "%" . $keyword . "%";
        } else {
            $keyword = "";
            $bind_keyword = $keyword;
        }

        if (empty($keyword)) {
            $sql_query = "SELECT id, name, amount, added_by, date_added, time_added
				FROM budget
				ORDER BY id ASC";
        } else {
            $sql_query = "SELECT id, name, amount, added_by, date_added, time_added
				FROM budget
				WHERE name LIKE ? 
				ORDER BY id ASC";
        }


        $stmt = $connect->stmt_init();
        if ($stmt->prepare($sql_query)) {
            // Bind your variables to replace the ?s
            if (!empty($keyword)) {
                $stmt->bind_param('s', $bind_keyword);
            }
            // Execute query
            $stmt->execute();
            // store result 
            $stmt->store_result();
            $stmt->bind_result(
                $data['id'],
                $data['name'],
                $data['amount'],
                $data['added_by'],
                $data['date_added'],
                $data['time_added']
            );
            // get total records
            $total_records = $stmt->num_rows;
        }

        // check page parameter
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }

        // number of data that will be display per page		
        $offset = 50;

        //lets calculate the LIMIT for SQL, and save it $from
        if ($page) {
            $from     = ($page * $offset) - $offset;
        } else {
            //if nothing was given in page request, lets load the first page
            $from = 0;
        }

        if (empty($keyword)) {
            $sql_query = "SELECT id, name, amount, added_by, date_added, time_added
				FROM budget
				ORDER BY id ASC LIMIT ?, ?";
        } else {
            $sql_query = "SELECT id, name, amount, added_by, date_added, time_added
				FROM budget 
				WHERE name LIKE ? 
				ORDER BY id ASC LIMIT ?, ?";
        }

        $stmt_paging = $connect->stmt_init();
        if ($stmt_paging->prepare($sql_query)) {
            // Bind your variables to replace the ?s
            if (empty($keyword)) {
                $stmt_paging->bind_param('ss', $from, $offset);
            } else {
                $stmt_paging->bind_param('sss', $bind_keyword, $from, $offset);
            }
            // Execute query
            $stmt_paging->execute();
            // store result 
            $stmt_paging->store_result();
            $stmt_paging->bind_result(
                $data['id'],
                $data['name'],
                $data['amount'],
                $data['added_by'],
                $data['date_added'],
                $data['time_added']
            );
            // for paging purpose
            $total_records_paging = $total_records;
        }

        // if no data on database show "No Reservation is Available"
        if ($total_records_paging == 0) {
            echo "
		<h1 style='text-align: center;'>404 Not Found</h1>
		<div class='alert alert-warning cattxtbox'>
			<h6> Unfortunately, the page you were looking for could not be found. It may be temporarily unavailable, moved or no longer exists </h6>
		</div>";
        ?>

        <?php
            // otherwise, show data
        } else {
            $row_number = $from + 1;
        ?>
            <div style="text-align: center; margin-left: 50px; margin-right:50px;" >
                <hr />
                <h5>Project Budget</h5>
                <hr />
            </div>
            <!-- Search -->
            <div class="search_content">
                <form class="list_header" method="get">
                    <label>
                        Search:
                        <input type="text" class=" r_search" name="keyword" value="<?php echo isset($_GET['keyword']) ? $_GET['keyword'] : "" ?>" />
                        <button type="submit" class="btn btn-primary" name="btnSearch" value="Search"><i class="bx bx-search-alt"></i></button>
                    </label>
                    <!-- <div style="float: right;">
										<a href="compAdmin_dashboard.php">
											<img src="../img/back.png" title="Back?" class="hoverback" style="margin-right: 20px; width: 50px; height: 50; cursor: pointer;" alt="Back?">
										</a>
									</div>		 -->
                </form>
            </div>
            <!-- end of search form -->

            <div class="col-md-12" style="margin-left: 50px; margin-right:50px;">
                <table class="content-table">
                    <thead>
                        <tr class="t_head">
                            <th width="5%">Project Budget ID</th>
                            <th width="5%">Name</th>
                            <th width="5%">Amount</th>
                            <th width="5%">Added by</th>
                            <th width="5%">Date added</th>
                            <th width="5%">Time added</th>
                        </tr>
                    </thead>
                    <?php
                    while ($stmt_paging->fetch()) { ?>
                        <tbody>
                            <tr class="table-row">
                                <td><?php echo $data['id']; ?></td>
                                <td><?php echo $data['name']; ?></td>
                                <td><?php echo $data['amount']; ?></td>
                                <td><?php echo $data['added_by']; ?></td>
                                <td><?php echo $data['date_added'] ?></td>
                                <td><?php echo $data['time_added']; ?></td>
                            </tr>
                        </tbody>
                <?php
                    }
                }
                ?>
                </table>

            </div>
            <div class="col-md-12 pagination">
                <!-- <h4 class="page">
									<?php
                                    // for pagination purpose
                                    $function->doPages($offset, 'compAdmin_BPSOpage.php', '', $total_records, $keyword);
                                    ?>
								</h4> -->
            </div>
            </div>
            <div class="separator"></div>
            </div>
            </div>

            <?php
        // create object of functions class
        $function = new functions;

        // create array variable to store data from database
        $data = array();

        if (isset($_GET['keyword'])) {
            // check value of keyword variable
            $keyword = $function->sanitize($_GET['keyword']);
            $bind_keyword = "%" . $keyword . "%";
        } else {
            $keyword = "";
            $bind_keyword = $keyword;
        }

        if (empty($keyword)) {
            $sql_query = "SELECT id, name, amount, added_by, date_added, time_added
				FROM equip_budget
				ORDER BY id ASC";
        } else {
            $sql_query = "SELECT id, name, amount, added_by, date_added, time_added
				FROM equip_budget
				WHERE name LIKE ? 
				ORDER BY id ASC";
        }


        $stmt = $connect->stmt_init();
        if ($stmt->prepare($sql_query)) {
            // Bind your variables to replace the ?s
            if (!empty($keyword)) {
                $stmt->bind_param('s', $bind_keyword);
            }
            // Execute query
            $stmt->execute();
            // store result 
            $stmt->store_result();
            $stmt->bind_result(
                $data['id'],
                $data['name'],
                $data['amount'],
                $data['added_by'],
                $data['date_added'],
                $data['time_added']
            );
            // get total records
            $total_records = $stmt->num_rows;
        }

        // check page parameter
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }

        // number of data that will be display per page		
        $offset = 50;

        //lets calculate the LIMIT for SQL, and save it $from
        if ($page) {
            $from     = ($page * $offset) - $offset;
        } else {
            //if nothing was given in page request, lets load the first page
            $from = 0;
        }

        if (empty($keyword)) {
            $sql_query = "SELECT id, name, amount, added_by, date_added, time_added
				FROM equip_budget
				ORDER BY id ASC LIMIT ?, ?";
        } else {
            $sql_query = "SELECT id, name, amount, added_by, date_added, time_added
				FROM equip_budget 
				WHERE name LIKE ? 
				ORDER BY id ASC LIMIT ?, ?";
        }

        $stmt_paging = $connect->stmt_init();
        if ($stmt_paging->prepare($sql_query)) {
            // Bind your variables to replace the ?s
            if (empty($keyword)) {
                $stmt_paging->bind_param('ss', $from, $offset);
            } else {
                $stmt_paging->bind_param('sss', $bind_keyword, $from, $offset);
            }
            // Execute query
            $stmt_paging->execute();
            // store result 
            $stmt_paging->store_result();
            $stmt_paging->bind_result(
                $data['id'],
                $data['name'],
                $data['amount'],
                $data['added_by'],
                $data['date_added'],
                $data['time_added']
            );
            // for paging purpose
            $total_records_paging = $total_records;
        }

        // if no data on database show "No Reservation is Available"
        if ($total_records_paging == 0) {
            echo "
		<h1 style='text-align: center;'>404 Not Found</h1>
		<div class='alert alert-warning cattxtbox'>
			<h6> Unfortunately, the page you were looking for could not be found. It may be temporarily unavailable, moved or no longer exists </h6>
		</div>";
        ?>

        <?php
            // otherwise, show data
        } else {
            $row_number = $from + 1;
        ?>
            <div style="text-align: center; margin-left: 50px; margin-right:50px;" >
                <hr />
                <h5>Equipment Budget</h5>
                <hr />
            </div>
            <!-- Search -->
            <div class="search_content">
                <form class="list_header" method="get">
                    <label>
                        Search:
                        <input type="text" class=" r_search" name="keyword" value="<?php echo isset($_GET['keyword']) ? $_GET['keyword'] : "" ?>" />
                        <button type="submit" class="btn btn-primary" name="btnSearch" value="Search"><i class="bx bx-search-alt"></i></button>
                    </label>
                    <!-- <div style="float: right;">
										<a href="compAdmin_dashboard.php">
											<img src="../img/back.png" title="Back?" class="hoverback" style="margin-right: 20px; width: 50px; height: 50; cursor: pointer;" alt="Back?">
										</a>
									</div>		 -->
                </form>
            </div>
            <!-- end of search form -->

            <div class="col-md-12" style="margin-left: 50px; margin-right:50px;">
                <table class="content-table">
                    <thead>
                        <tr class="t_head">
                            <th width="5%">Project Budget ID</th>
                            <th width="5%">Name</th>
                            <th width="5%">Amount</th>
                            <th width="5%">Added by</th>
                            <th width="5%">Date added</th>
                            <th width="5%">Time added</th>
                        </tr>
                    </thead>
                    <?php
                    while ($stmt_paging->fetch()) { ?>
                        <tbody>
                            <tr class="table-row">
                                <td><?php echo $data['id']; ?></td>
                                <td><?php echo $data['name']; ?></td>
                                <td><?php echo $data['amount']; ?></td>
                                <td><?php echo $data['added_by']; ?></td>
                                <td><?php echo $data['date_added'] ?></td>
                                <td><?php echo $data['time_added']; ?></td>
                            </tr>
                        </tbody>
                <?php
                    }
                }
                ?>
                </table>

            </div>
            <div class="col-md-12 pagination">
                <!-- <h4 class="page">
									<?php
                                    // for pagination purpose
                                    $function->doPages($offset, 'compAdmin_BPSOpage.php', '', $total_records, $keyword);
                                    ?>
								</h4> -->
            </div>
            </div>
            <div class="separator"></div>
            </div>
            </div>

            <?php
        // create object of functions class
        $function = new functions;

        // create array variable to store data from database
        $data = array();

        if (isset($_GET['keyword'])) {
            // check value of keyword variable
            $keyword = $function->sanitize($_GET['keyword']);
            $bind_keyword = "%" . $keyword . "%";
        } else {
            $keyword = "";
            $bind_keyword = $keyword;
        }

        if (empty($keyword)) {
            $sql_query = "SELECT id, name, amount, added_by, date_added, time_added
				FROM total_funds
				ORDER BY id ASC";
        } else {
            $sql_query = "SELECT id, name, amount, added_by, date_added, time_added
				FROM total_funds
				WHERE name LIKE ? 
				ORDER BY id ASC";
        }


        $stmt = $connect->stmt_init();
        if ($stmt->prepare($sql_query)) {
            // Bind your variables to replace the ?s
            if (!empty($keyword)) {
                $stmt->bind_param('s', $bind_keyword);
            }
            // Execute query
            $stmt->execute();
            // store result 
            $stmt->store_result();
            $stmt->bind_result(
                $data['id'],
                $data['name'],
                $data['amount'],
                $data['added_by'],
                $data['date_added'],
                $data['time_added']
            );
            // get total records
            $total_records = $stmt->num_rows;
        }

        // check page parameter
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }

        // number of data that will be display per page		
        $offset = 50;

        //lets calculate the LIMIT for SQL, and save it $from
        if ($page) {
            $from     = ($page * $offset) - $offset;
        } else {
            //if nothing was given in page request, lets load the first page
            $from = 0;
        }

        if (empty($keyword)) {
            $sql_query = "SELECT id, name, amount, added_by, date_added, time_added
				FROM total_funds
				ORDER BY id ASC LIMIT ?, ?";
        } else {
            $sql_query = "SELECT id, name, amount, added_by, date_added, time_added
				FROM total_funds 
				WHERE name LIKE ? 
				ORDER BY id ASC LIMIT ?, ?";
        }

        $stmt_paging = $connect->stmt_init();
        if ($stmt_paging->prepare($sql_query)) {
            // Bind your variables to replace the ?s
            if (empty($keyword)) {
                $stmt_paging->bind_param('ss', $from, $offset);
            } else {
                $stmt_paging->bind_param('sss', $bind_keyword, $from, $offset);
            }
            // Execute query
            $stmt_paging->execute();
            // store result 
            $stmt_paging->store_result();
            $stmt_paging->bind_result(
                $data['id'],
                $data['name'],
                $data['amount'],
                $data['added_by'],
                $data['date_added'],
                $data['time_added']
            );
            // for paging purpose
            $total_records_paging = $total_records;
        }

        // if no data on database show "No Reservation is Available"
        if ($total_records_paging == 0) {
            echo "
		<h1 style='text-align: center;'>404 Not Found</h1>
		<div class='alert alert-warning cattxtbox'>
			<h6> Unfortunately, the page you were looking for could not be found. It may be temporarily unavailable, moved or no longer exists </h6>
		</div>";
        ?>

        <?php
            // otherwise, show data
        } else {
            $row_number = $from + 1;
        ?>
            <div style="text-align: center; margin-left: 50px; margin-right:50px;" >
                <hr />
                <h5>Total Funds</h5>
                <hr />
            </div>
            <!-- Search -->
            <div class="search_content">
                <form class="list_header" method="get">
                    <label>
                        Search:
                        <input type="text" class=" r_search" name="keyword" value="<?php echo isset($_GET['keyword']) ? $_GET['keyword'] : "" ?>" />
                        <button type="submit" class="btn btn-primary" name="btnSearch" value="Search"><i class="bx bx-search-alt"></i></button>
                    </label>
                    <!-- <div style="float: right;">
										<a href="compAdmin_dashboard.php">
											<img src="../img/back.png" title="Back?" class="hoverback" style="margin-right: 20px; width: 50px; height: 50; cursor: pointer;" alt="Back?">
										</a>
									</div>		 -->
                </form>
            </div>
            <!-- end of search form -->

            <div class="col-md-12" style="margin-left: 50px; margin-right:50px;">
                <table class="content-table">
                    <thead>
                        <tr class="t_head">
                            <th width="5%">Project Budget ID</th>
                            <th width="5%">Name</th>
                            <th width="5%">Amount</th>
                            <th width="5%">Added by</th>
                            <th width="5%">Date added</th>
                            <th width="5%">Time added</th>
                        </tr>
                    </thead>
                    <?php
                    while ($stmt_paging->fetch()) { ?>
                        <tbody>
                            <tr class="table-row">
                                <td><?php echo $data['id']; ?></td>
                                <td><?php echo $data['name']; ?></td>
                                <td><?php echo $data['amount']; ?></td>
                                <td><?php echo $data['added_by']; ?></td>
                                <td><?php echo $data['date_added'] ?></td>
                                <td><?php echo $data['time_added']; ?></td>
                            </tr>
                        </tbody>
                <?php
                    }
                }
                ?>
                </table>

            </div>
            <div class="col-md-12 pagination">
                <!-- <h4 class="page">
									<?php
                                    // for pagination purpose
                                    $function->doPages($offset, 'compAdmin_BPSOpage.php', '', $total_records, $keyword);
                                    ?>
								</h4> -->
            </div>
            </div>
            <div class="separator"></div>
            </div>
            </div>

    </section>

</body>

</html>