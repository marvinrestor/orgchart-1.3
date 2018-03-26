<?php
include 'check_login.php';
include 'count_records.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>EIT | Admin Dashboard</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="../plugins/iCheck/flat/blue.css">
    <link rel="stylesheet" href="../plugins/morris/morris.css">
    <link rel="stylesheet" href="../plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <link rel="stylesheet" href="../plugins/datepicker/datepicker3.css">
    <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <link rel="icon" href="../dist/img/icon.png">


    <!-- Datatables Working -->
   <link rel="stylesheet" href="../css/dataTables.bootstrap.min.css">

    <!-- Datatables Buttons
   <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
   <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css"> -->

    <!-- Datatables for SWF BUTTONS
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.css"/>
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/tabletools/2.2.4/css/dataTables.tableTools.css"/> -->



</head>
<body class="hold-transition skin-red sidebar-mini">

  <div class="wrapper">

	<!-- TOPBAR NAVIGATION -->
	<?php
	include('topbar.php');
	?>

	<!-- SIDEBAR NAVIGATION -->
		<div class="pull-left info">
				<p><?php echo"$current_user"; ?></p>
					<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
		</div>
	</div>
				<ul class="sidebar-menu">
						<li class="header">MAIN NAVIGATION</li>
						<li class="treeview">
										<a href="#">
								<i class="fa fa-list-ol"></i>
										<span>Dashboard</span>

										</a>
							<ul class="treeview-menu">
										<li><a href="index.php"><i class="fa fa-circle-o"></i> Home</a></li>
										<li><a href="orgchart.php"><i class="fa fa-circle-o"></i> EIT Organization Chart</a></li>
							</ul>
						</li>
						<li class="treeview">
										<a href="#">
								<i class="fa fa-user"></i>
										<span>Employees</span>

										</a>
							<ul class="treeview-menu">
										<li><a href="new_employee.php"><i class="fa fa-circle-o"></i> Add New Employee</a></li>
										<li><a href="employee.php"><i class="fa fa-circle-o"></i> Edit Employee Profile</a></li>
										<li><a href="segment.php"><i class="fa fa-circle-o"></i> Business Segment</a></li>
							</ul>
						</li>

						<li class="treeview active">
										<a href="#">
								<i class="fa fa-list-ol"></i>
										<span>Scorecard</span>

										</a>
							<ul class="treeview-menu">
										<li class="active"><a href="emp_scorecard.php"><i class="fa fa-circle"></i> Employee Scorecard</a></li>
										<li><a href="metrics.php"><i class="fa fa-circle-o"></i> Metrics </a></li>
							</ul>
						</li>

						<li class="header">SYSTEM</li>
								<li class="treeview">
										<a href="#">
												<i class="fa fa-cogs"></i>
														<span>Administrator</span>
														</a>
										<ul class="treeview-menu">
												<li><a href="new_administrator.php"><i class="fa fa-circle-o"></i> Add New Admin</a></li>
												<li><a href="administrator.php"><i class="fa fa-circle-o"></i> Edit Admin Profile</a></li>
										</ul>
								</li>
							</section>
						</aside>

						<!--END OF SIDEBAR-->

<div class="content-wrapper">
    <section class="content-header">
      <div class="clearfix">

        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Scorecard</li>
        </ol>
    </section>

    <section class="content">

      <?php
        if(isset($_GET['ref'])) {
          $uid = $_GET['ref'];

             include '../db_config/connection.php';

                $sql = "SELECT * FROM user_info where user_id='$uid'";
                $result = $conn->query($sql);

                  if ($result->num_rows > 0) {

                while($row = $result->fetch_assoc()) {
                 $avatar = $row['avatar'];
                 $fullname = $row['full_name'];
                 $emp_no = $row['employee_no'];
                 $entid = $row['ent_id'];
                 $title = $row['title'];
                 $regid = $row['user_id'];
                 $personal_email = $row['email'];
                 $user_email = $row['email2'];
                 $member_sinc = $row['hire_date'];
                 $seg = $row['segment'];
                 $supervisor = $row['supervisor'];
                 $manager = $row['manager'];
                 $emptype = $row['type'];
                 $address = $row['address'];
                 $dob = $row['dob'];
                 $status = $row['status'];
                 $phone = $row['phone_number'];
                 $econtact = $row['e_contact'];
                 $rel = $row['relationship'];
                 $pcontact = $row['primary_contact'];
                 $acontact = $row['alternate_contact'];

               }
               } else {
               }
               $conn->close();
               }

           ?>

        <section class="col-lg-12"></section>

          <div class="box box-info">
            <div class="box-header">
              <i class="fa fa-users"></i>
                <h3 class="box-title"><?php echo"$fullname"; ?> Scorecard</h3>
            </div>



    <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="clearfix"></div>
                            <div class="panel-group">
                              <div class="panel panel-primary">
                                  <div class="panel-heading" align="center"><b>Personal Details</b></div>

                                  <table class="table table-striped table-condensed">
                              				<tr>
                              					<th width="30%">Full Name</th>
                              					<td><a class=""><?php echo"$fullname"; ?></td>
                                        <th width="30%">Position</th>
                                        <td><a class=""><?php echo"$title"; ?></td>
                              				</tr>
                              				<tr>
                              					<th>Employee Number</th>
                              					<td><a class=""><?php echo"$emp_no"; ?></td>
                                        <th>Business Segment</th>
                              					<td><a class=""><?php echo"$seg"; ?></td>
                              				</tr>
                              				<tr>
                              					<th>Supervisor</th>
                              					<td><a class=""><?php echo"$supervisor"; ?></td>
                                        <th>Manager</th>
                              					<td><a class=""><?php echo"$manager"; ?></td>
                              				</tr>
                              				<tr>
                              					<th>Coverage Date</th>
                              					<td><a class=""><input type="date" class="form-control" name="coverage"  placeholder="Coverage"></td>
                                        <th>Date Interim Review Conducted</th>
                              					<td><a class=""><input type="date" class="form-control" name="coverage"  placeholder="Coverage"></td>
                              				</tr>
                                      <tr>
                              					<th>Type of Appraisal</th>
                              					<td><a class="">
                                              <select class="form-control" name="status" required>
                                                  <option value="" disabled selected>Select Appraisal</option>
                                                  <option value="Interim Review">Interim Review</option>
                                                  <option value="Interim Review">Regularization</option>
                                              </select>
                                          </div>
                                        </td>
                                        <th></th>
                              					<td></td>
                              				</tr>
                              	  </table>
                            </div>
                      </div>

              <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Rating</th>
                                            <th>Definition</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="success">
                                            <td>4 = Above and beyond</td>
                                            <td>Performance is above and beyond the standard(s).</td>
                                        </tr>
                                        <tr class="info">
                                            <td>3 = Meets Expectations</td>
                                            <td>Met or somewhat exceeded the required objective or standard(s).</td>
                                        </tr>
                                        <tr class="warning">
                                            <td>2 = Needs Improvement</td>
                                            <td>Did not meet the required objective or standard(s).</td>
                                        </tr>
                                        <tr class="danger">
                                            <td>1 = Unacceptable Performance</td>
                                            <td>Not performing to expectations. Results are far from the required objective or standard(s).</td>
                                        </tr>
                                    </tbody>
                                </table>
                          </div>
                            <!-- /.table-responsive -->
                      </div>
                        <!-- /.panel-body -->
                  </div>
                    <!-- /.panel -->
              </div>
              <div class="col-lg-6 col-md-6">
                <div class="pull-right alert alert-warning">
                  <div style="text-align: center;">
                  <h1>Month to Date Score <strong><br/><span style="align=center" class="label label-success">0.00</span></h1></strong></div>
                </div>
              </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-info">
                        <div class="panel-heading" align="center"><b>Scorecard</b></div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                 <!-- <form name="frm-pin" method="post" action="pin-index-a.php">-->
                                      <input type="hidden" name="mode" value="PinRequest" />
                                    <thead>
                                        <tr>
                                            <th>Performance Expectations w/ Target</th>
                                            <th>Weight</th>
                                            <th>Indicators</th>
                                            <th>Evidence</th>
                                            <th>Rating</th>
                                            <th width="5%">Weighted Rating</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td width="15%">
                                            <h5 type="text" data-toggle="popover" data-placement="right" title="ATTENDANCE" data-content="SEE CHIP Employee handbook"><b>ATTENDANCE</b></h5>
                                            </td>
                                            <td width="10%">25%
                                            </td>
                                            <input type="hidden" id="rate" name="rate" value="0.25" disabled/>
                                            <td width="15%">
                                              4.00 0 instance of unscheduled absence during mentoring/training period <br/>
                                              3.00 1 to 2 unsecheduled absences <br/>
                                              2.00 > 3  unscheduled/scheduled leave and up / 1.00 - AWOL in a month automatic merits a 2
                                            </td>
                                            <td>
                                            <textarea class="form-control" rows="5" cols="20" id="house rules"></textarea></td>
                                            </td>
                                            <td>
                                              <select class="form-control" name="tot_pin_requested" onchange="calculateAttend(this.value)">
                                                  <option value="" disabled selected>Select Rating</option>
                                                  <option value="1.00">1.00</option>
                                                  <option value="1.25">1.25</option>
                                                  <option value="1.50">1.50</option>
                                                  <option value="1.75">1.75</option>
                                                  <option value="2.00">2.00</option>
                                                  <option value="2.25">2.25</option>
                                                  <option value="2.50">2.50</option>
                                                  <option value="2.75">2.75</option>
                                                  <option value="3.00">3.00</option>
                                                  <option value="3.25">3.25</option>
                                                  <option value="3.50">3.50</option>
                                                  <option value="3.75">3.75</option>
                                                  <option value="4.00">4.00</option>
                                              </select>
                                            </td>
                                            <td width="5%" align="center">
                                                <p style="text-align:center" class="weight" name="w1" id="w1"></p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                            <h5 type="text" data-toggle="popover" data-placement="right" title="TARDINESS" data-content="SEE CHIP Employee handbook"><b>TARDINESS
                                            </b></h5>
                                            </td>
                                            <td>10%</td>
                                            <input type="hidden" id="rate2" name="rate2" value="0.10" disabled/>
                                            <td>
                                              4.00 = 0 lates <br/>
                                              3.50 = 1-2 late < 10 mins <br/>
                                              3.00 = 3  instances < 10 mins <br/>
                                              2.00 =  1 or more w/ more than 10 mins grace period <br/>
                                              1.00 = any late instances w/ no notification or notification is past the grace period
                                            </td>
                                            <td>
                                              <textarea class="form-control" rows="5" cols="20" id="house rules"></textarea></td>
                                            </td>
                                            <td>
                                              <select class="form-control" name="tot_pin_requested" onchange="calculateTardiness(this.value)">
                                                  <option value="" disabled selected>Select Rating</option>
                                                  <option value="1.00">1.00</option>
                                                  <option value="1.25">1.25</option>
                                                  <option value="1.50">1.50</option>
                                                  <option value="1.75">1.75</option>
                                                  <option value="2.00">2.00</option>
                                                  <option value="2.25">2.25</option>
                                                  <option value="2.50">2.50</option>
                                                  <option value="2.75">2.75</option>
                                                  <option value="3.00">3.00</option>
                                                  <option value="3.25">3.25</option>
                                                  <option value="3.50">3.50</option>
                                                  <option value="3.75">3.75</option>
                                                  <option value="4.00">4.00</option>
                                              </select>
                                            </td>
                                              <td width="5%" align="center">
                                                  <p style="text-align:center" class="grand" name="w2" id="w2"></p>
                                              </td>
                                            </td>
                                        </tr>
                                        <tr>
                                          <td width="15%">
                                          <h5 type="text" data-placement="bottom" data-toggle="popover" title="ADHERENCE TO HOUSE RULES & COMPANY POLICIES/ COMPLIANCE to HR TOOLS" data-content="Browsing, Sleeping, Neglect of Duty, Insubordination or any Sanction Memo on violation under CHIP Handbook automatically merits a 1.0 rating. Compliance on MY LEARNING/WORKDAY"><b>
                                          ADHERENCE TO HOUSE RULES & COMPANY POLICIES/ COMPLIANCE to HR TOOLS</b>
                                          </h5>
                                          </td>
                                            <td>5%</td>
                                            <input type="hidden" id="rate3" name="rate3" value="0.05" disabled/>
                                            <td>
                                              4.00 = 100% compliant <br/>
                                              3.00 = w/ an instance of verbal warning <br/>
                                              2.00 = w/ incident report on any violation <br/>
                                              1.00 = w/ written show cause memo/Sanction Memo
                                            </td>
                                            <td><textarea class="form-control" rows="5" cols="20" id="house rules"></textarea></td>
                                            <td>
                                              <select class="form-control" name="tot_pin_requested" onchange="calculateRules(this.value)">
                                                  <option value="" disabled selected>Select Rating</option>
                                                  <option value="1.00">1.00</option>
                                                  <option value="1.25">1.25</option>
                                                  <option value="1.50">1.50</option>
                                                  <option value="1.75">1.75</option>
                                                  <option value="2.00">2.00</option>
                                                  <option value="2.25">2.25</option>
                                                  <option value="2.50">2.50</option>
                                                  <option value="2.75">2.75</option>
                                                  <option value="3.00">3.00</option>
                                                  <option value="3.25">3.25</option>
                                                  <option value="3.50">3.50</option>
                                                  <option value="3.75">3.75</option>
                                                  <option value="4.00">4.00</option>
                                              </select>
                                            </td>
                                            <td width="5%" align="center">
                                                <p style="text-align:center" class="w3-input w3-border" name="w3" id="w3"></p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                            <h5 type="text" data-toggle="popover" data-placement="bottom" title="CASE HANDLING" data-content="Valid CSAT,
                                            Valid DSAT,
                                            Emails or any instance of not following Knowledge Article / HIPAA / Security violation (Draft NTE for this)"><b>CASE HANDLING
                                            </b></h5>
                                            </td>
                                            <td>5%</td>
                                            <input type="hidden" id="rate-4" name="rate-4" value="0.05" disabled/>
                                            <td>
                                              DSAT <br/>
                                              4.00 = 0 instance <br/>
                                              2.00 = 1 instance <br/>
                                              1.00 = 2 or more <br/>
                                              <br/>
                                              CSAT <br/>
                                              4.00 = 1 instance <br/>
                                              3.00 = 0 CSAT <br/>
                                            </td>
                                            <td><textarea class="form-control" rows="5" cols="20" id="case handling"></textarea></td>
                                            <td>
                                              <select class="form-control" name="tot_pin_requested" onchange="calculateCases(this.value)">
                                                  <option value="" disabled selected>Select Rating</option>
                                                  <option value="1.00">1.00</option>
                                                  <option value="1.25">1.25</option>
                                                  <option value="1.50">1.50</option>
                                                  <option value="1.75">1.75</option>
                                                  <option value="2.00">2.00</option>
                                                  <option value="2.25">2.25</option>
                                                  <option value="2.50">2.50</option>
                                                  <option value="2.75">2.75</option>
                                                  <option value="3.00">3.00</option>
                                                  <option value="3.25">3.25</option>
                                                  <option value="3.50">3.50</option>
                                                  <option value="3.75">3.75</option>
                                                  <option value="4.00">4.00</option>
                                              </select>
                                            </td>
                                            <td width="5%" align="center">
                                                <p style="text-align:center" class="w3-input w3-border" name="w4" id="w4">0</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                            <h5 type="text" data-toggle="popover" data-placement="bottom" title="PRODUCTIVITY" data-content="Target = Average ACD calls of the team for the month (moving target)"><b>PRODUCTIVITY
                                            </b>
                                            </h5>
                                            </td>
                                            <td>15%</td>
                                            <input type="hidden" id="rates5" name="rates5" disabled/>
                                            <td>
                                              4.00 = above target <br/>
                                              3.50 = Meeting target <br/>
                                              3.00 = 5% below target <br/>
                                              2.00 =  10% below target
                                            </td>
                                            <td><textarea class="form-control" rows="5" cols="20" id="productivity"></textarea></td>
                                            <td>
                                              <select id="calc_prod" class="form-control" name="tot_pin_requested" onchange="calculateProd()">
                                                  <option value="" disabled selected>Select Rating</option>
                                                  <option value="1.00">1.00</option>
                                                  <option value="1.25">1.25</option>
                                                  <option value="1.50">1.50</option>
                                                  <option value="1.75">1.75</option>
                                                  <option value="2.00">2.00</option>
                                                  <option value="2.25">2.25</option>
                                                  <option value="2.50">2.50</option>
                                                  <option value="2.75">2.75</option>
                                                  <option value="3.00">3.00</option>
                                                  <option value="3.25">3.25</option>
                                                  <option value="3.50">3.50</option>
                                                  <option value="3.75">3.75</option>
                                                  <option value="4.00">4.00</option>
                                              </select>
                                            </td>
                                            <td width="5%" align="center">
                                                <p style="text-align:center" class="prod" name="w15" id="w15">0</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                            <h5 type="text" data-toggle="popover" data-placement="right" title="QA SCORE" data-content="Target = 92%"><b>QA SCORE</b>
                                            </h5>
                                            </td>
                                            <td>15%</td>
                                            <input type="hidden" id="qarate" name="qarate"  disabled/>
                                            <td>
                                              4.00 - 100-105% <br/>
                                              3.50 - 93 -99% <br/>
                                              3.00 - 90 - 92% <br/>
                                              2.00 - Below 90%
                                            </td>
                                            <td><textarea class="form-control" rows="5" cols="20" id="qa score"></textarea></td>
                                            <td>
                                              <select id="calc_qa" class="form-control" name="tot_pin_requested" onchange="calculateQuality()">
                                                  <option value="" disabled selected>Select Rating</option>
                                                  <option value="1.00">1.00</option>
                                                  <option value="1.25">1.25</option>
                                                  <option value="1.50">1.50</option>
                                                  <option value="1.75">1.75</option>
                                                  <option value="2.00">2.00</option>
                                                  <option value="2.25">2.25</option>
                                                  <option value="2.50">2.50</option>
                                                  <option value="2.75">2.75</option>
                                                  <option value="3.00">3.00</option>
                                                  <option value="3.25">3.25</option>
                                                  <option value="3.50">3.50</option>
                                                  <option value="3.75">3.75</option>
                                                  <option value="4.00">4.00</option>
                                              </select>
                                            </td>
                                            <td width="5%" align="center">
                                                <p style="text-align:center" class="w3-input w3-border" name="w6" id="w6">0</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                            <h5 type="text" data-toggle="popover" data-placement="right" title="UTILIZATION" data-content="Target = 70%"><b>UTILIZATION</b>
                                            </h5>
                                            </td>
                                            <td>5%</td>
                                            <input type="hidden" id="rate" name="rate" value="0.15" disabled/>
                                            <td>
                                              4.00 = above target <br/>
                                              3.50 = Meeting target <br/>
                                              3.00 = 5% below target <br/>
                                              2.00 =  10% below target
                                            </td>
                                            <td><textarea class="form-control" rows="5" cols="20" id="utilization"></textarea></td>
                                            <td>
                                              <select class="form-control" name="utilization" >
                                                  <option value="" disabled selected>Select Rating</option>
                                                  <option value="1.00">1.00</option>
                                                  <option value="1.25">1.25</option>
                                                  <option value="1.50">1.50</option>
                                                  <option value="1.75">1.75</option>
                                                  <option value="2.00">2.00</option>
                                                  <option value="2.25">2.25</option>
                                                  <option value="2.50">2.50</option>
                                                  <option value="2.75">2.75</option>
                                                  <option value="3.00">3.00</option>
                                                  <option value="3.25">3.25</option>
                                                  <option value="3.50">3.50</option>
                                                  <option value="3.75">3.75</option>
                                                  <option value="4.00">4.00</option>
                                              </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                            <h5 type="text" data-toggle="popover" data-placement="right" title="SCHEDULE ADHERENCE" data-content="Target = 70%"><b>SCHEDULE ADHERENCE</b>
                                            </h5>
                                            </td>
                                            <td>5%</td>
                                            <input type="hidden" id="rate" name="rate" value="0.15" disabled/>
                                            <td>
                                              4.00 = 100% <br/>
                                              3.50 = 95.00% to 99% <br/>
                                              3.00 = 90.00% to 94.99% <br/>
                                              2.00 = 85.00% to 89.99% <br/>
                                              1.00 = 84.99% or Below
                                            </td>
                                            <td><textarea class="form-control" rows="5" cols="20" id="schedule adherence"></textarea></td>
                                            <td>
                                              <select class="form-control" name="schedule adherence" >
                                                  <option value="" disabled selected>Select Rating</option>
                                                  <option value="1.00">1.00</option>
                                                  <option value="1.25">1.25</option>
                                                  <option value="1.50">1.50</option>
                                                  <option value="1.75">1.75</option>
                                                  <option value="2.00">2.00</option>
                                                  <option value="2.25">2.25</option>
                                                  <option value="2.50">2.50</option>
                                                  <option value="2.75">2.75</option>
                                                  <option value="3.00">3.00</option>
                                                  <option value="3.25">3.25</option>
                                                  <option value="3.50">3.50</option>
                                                  <option value="3.75">3.75</option>
                                                  <option value="4.00">4.00</option>
                                              </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                            <h5 type="text" data-toggle="popover" data-placement="right" title="FCR" data-content="Target = 68%"><b>FCR</b>
                                            </h5>
                                            </td>
                                            <td>10%</td>
                                            <input type="hidden" id="rate" name="rate" value="0.10" disabled/>
                                            <td>
                                              4.00 - 90-100 <br/>
                                              3.50 - 76-89 <br/>
                                              3.00 - 68-75 <br/>
                                              2.00 - below 68% <br/>
                                              1.00 - < 50%
                                            </td>
                                            <td><textarea class="form-control" rows="5" cols="20" id="fcr"></textarea></td>
                                            <td>
                                              <select class="form-control" name="fcr" >
                                                  <option value="" disabled selected>Select Rating</option>
                                                  <option value="1.00">1.00</option>
                                                  <option value="1.25">1.25</option>
                                                  <option value="1.50">1.50</option>
                                                  <option value="1.75">1.75</option>
                                                  <option value="2.00">2.00</option>
                                                  <option value="2.25">2.25</option>
                                                  <option value="2.50">2.50</option>
                                                  <option value="2.75">2.75</option>
                                                  <option value="3.00">3.00</option>
                                                  <option value="3.25">3.25</option>
                                                  <option value="3.50">3.50</option>
                                                  <option value="3.75">3.75</option>
                                                  <option value="4.00">4.00</option>
                                              </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                            <h5 type="text" data-toggle="popover" data-placement="right" title="aht" data-content="Target = 90%"><b>AHT</b>
                                            </h5>
                                            </td>
                                            <td>5%</td>
                                            <input type="hidden" id="rate" name="rate" value="0.05" disabled/>
                                            <td>
                                              4.00 = 100 and above <br/>
                                              3.50 = 95-99 % <br/>
                                              3.00 = 90-94% <br/>
                                              2.00 below 90%
                                            </td>
                                            <td><textarea class="form-control" rows="5" cols="20" id="aht"></textarea></td>
                                            <td>
                                              <select class="form-control" name="attendance" >
                                                  <option value="" disabled selected>Select Rating</option>
                                                  <option value="1.00">1.00</option>
                                                  <option value="1.25">1.25</option>
                                                  <option value="1.50">1.50</option>
                                                  <option value="1.75">1.75</option>
                                                  <option value="2.00">2.00</option>
                                                  <option value="2.25">2.25</option>
                                                  <option value="2.50">2.50</option>
                                                  <option value="2.75">2.75</option>
                                                  <option value="3.00">3.00</option>
                                                  <option value="3.25">3.25</option>
                                                  <option value="3.50">3.50</option>
                                                  <option value="3.75">3.75</option>
                                                  <option value="4.00">4.00</option>
                                              </select>
                                            </td>
                                        </tr>
                                        <tr>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td><button onclick="total()">test</button></td>
                                          <td class="text-left" contenteditable="false" id="grandTotal" name="tatal">0</td>

                                          </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


        <!-- Footer -->
             <?php
                include('footer.php');
             ?>

      <div class="control-sidebar-bg"></div>


    <!-- JAVASCRIPT -->
        <script src="../plugins/jQuery/jquery-3.3.1.min.js"></script>

    <!-- Script for Datatables Button

        <script type="text/javascript" scr="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" scr="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
        <script type="text/javascript" scr="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
        <script type="text/javascript" scr="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script type="text/javascript" scr="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
        <script type="text/javascript" scr="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
        <script type="text/javascript" scr="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
        <script type="text/javascript" scr="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script> -->


        <!-- Datatable Script for SWF
        <script type="text/javascript" src="https://code.jquery.com/ui/1.12.4/jquery-ui.min.js"></script>
        <script type="text/javascript" src="//cdn.datatables.net/tabletools/2.2.4/js/dataTables.tableTools.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script> -->

    <!-- Scripts for The Webpages -->

        <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript"  src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="../plugins/morris/morris.min.js"></script>
        <script src="../plugins/sparkline/jquery.sparkline.min.js"></script>
        <script src="../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
        <script src="../plugins/knob/jquery.knob.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>

        <script src="../plugins/daterangepicker/daterangepicker.js"></script>
        <script src="../plugins/datepicker/bootstrap-datepicker.js"></script>
        <script src="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
        <script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
        <script src="../plugins/fastclick/fastclick.js"></script>
        <script src="../dist/js/app.min.js"></script>
        <script src="../dist/js/pages/dashboard.js"></script>
        <script src="../dist/js/demo.js"></script>

    <!-- Script for DataTables  -->
        <script type="text/javascript" src="../js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="../js/dataTables.bootstrap.min.js"></script>

    <!-- Script for Datatables Search, Pagination and Ordering -->
    <script type="text/javascript" src="../dist/js/score.js"></script>

    <script>
$(document).ready(function(){
    $('[data-toggle="popover"]').popover();
});
</script>
    <script type="text/javascript">
    $(document).ready(function() {
        var table = $('#datatable').dataTable();
        var tableTools = new $.fn.dataTable.TableTools(table, {
            'sSwfPath':'//cdn.datatables.net/tabletools/2.2.4/swf/copy_csv_xls_pdf.swf',
            'aButtons': ['copy', {
            'sExtends': 'print',
            'bShowAll' : false
        },
        'csv',
        {
            'sExtends' : 'xlxs',
            'sFileName' : 'Data.xls'
        }
        ]

    });
    $(tableTools.fnContainer()).insertBefore('#datatable_wrapper');
});
    </script>
    <!--<script type="text/javascript">
        $(document).ready(function() {
            $(".table").DataTable({
                dom: 'Bfrtip',
                buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
                    ]
            });
        });
                //"ordering": true,
                //"searching": true,
                //"paging": true,
                //"columnDefs": [
                    //{
                        //"targets": 0,
                        //"searchable": false,
                        //"visible": true
                    //}
                //],
                //"order": [[2, "desc"]]
            //});
        //});
    </script> -->

</body>
</html>
