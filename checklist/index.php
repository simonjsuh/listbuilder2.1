<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	<!-- jQuery CDN -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	<!-- Main CSS -->
	<link rel="stylesheet" href="style/main.css">

  <title>Document</title>
</head>
<body>

<div class="container-full">
	<div id="left-sidebar">
		<div class="header">
			<div class="title">
				<h1>LUMA Process</h1>
				<span class="title-icon glyphicon glyphicon-menu-hamburger"></span>
			</div>
		</div>

		<div class="menu">
			<div class="navbar navbar-default">
				<ul class="nav navbar-nav">
					<li><a href=""><span class="glyphicon glyphicon-stats"></span>Overview</a></li>
					<li><a href=""><span class="glyphicon glyphicon-star"></span>Progress</a></li>
					<li><a href=""><span class="glyphicon glyphicon-check"></span>Checklists</a></li>
					<li><a href=""><span class="glyphicon glyphicon-road"></span>Processes</a></li>
					<li><a href=""><span class="glyphicon glyphicon-folder-open"></span>Folders</a></li>
					<li><a href=""><span class="glyphicon glyphicon-briefcase"></span>Organisation</a></li>
					<li><a href=""><span class="glyphicon glyphicon-user"></span>Teams</a></li>
				</ul>
			</div>
		</div>

		<div id="menu2">
			<a href="">Documentation <span class="glyphicon glyphicon-menu-down"></span></a>
		</div>
    <hr id="leftSidebarEndHR">
	</div>

  <!-- main content area -->
  <div id="admin-panel">
    <div id="top-menu-bar">
      <div id="user_menu">
        <img id="user_profile_img" src="users/profile_avatar/bezos_square_frame.jpg" alt=""> <span class="glyphicon glyphicon-menu-down"></span>
      </div>
    </div>
    <div id="main-content-area">
      <div id="breadcrumbs">
        <a href="">Dashboard</a> <span class="glyphicon glyphicon-menu-right"></span>
        <a href="">Processes</a> <span class="glyphicon glyphicon-menu-right"></span>
        <a class="chosen" href="">Website Design Process</a>
      </div>
    </div>
  </div>
</div>

</body>
</html>