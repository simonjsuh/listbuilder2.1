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

	<!-- vue.js CDN-->
	<script src="https://unpkg.com/vue/dist/vue.js"></script>

	<!-- CSS style link -->
	<link rel="stylesheet" href="style/tabs2.css">

  <title>Document</title>
</head>
<body>
<div class="container">
	<div id="app">

			<ul class="nav nav-tabs">
				<li class="active checklist1"><a v-on:click="makeTabActive()" href="#">Menu 1</a></li>
				<li class="checklist2"><a href="#">Menu 2</a></li>
				<li class="checklist3"><a href="#">Menu 3</a></li>
				<li class="checklist4"><a href="#">Menu 4</a></li>
				<li class="checklist5"><a href="#">Menu 5</a></li>
			</ul>

			<!-- tab-contents-->
			<div id="checklists">
				<div class="tab-checklist checklist1 active">
					<p>Menu 1 content</p>
				</div>
				<div class="tab-checklist checklist2">
					<p>Menu 2 content</p>
				</div>
				<div class="tab-checklist checklist3">
					<p>Menu 3 content</p>
				</div>
				<div class="tab-checklist checklist4">
					<p>Menu 4 content</p>
				</div>
				<div class="tab-checklist checklist5">
					<p>Menu 5 content</p>
				</div>
			</div>


	</div>
</div>

<script>
let checklist = new Vue({
	el: '#app',
	methods: {
	  makeTabActive: function (tab) {
			alert(tab);
			return false;
	  }
	}
});
</script>
</body>
</html>