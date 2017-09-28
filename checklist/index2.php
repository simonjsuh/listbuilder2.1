<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">

	<!-- jQuery CDN -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	<!-- Main CSS -->
	<link rel="stylesheet" href="style/main.css">

	<!-- Vue.js CDN-->
	<script src="https://unpkg.com/vue/dist/vue.js"></script>

	<style>
		.container {
			width: 1150px;
		}
		/* main checklist dashboard admin area */
		#tab-menu {
			width: 100%;
			height: 120px;
			/*border: 1px solid green;*/
		}
		.checklist-tab-button {
			cursor: pointer;
		}
		.nav-tabs>li.active>a.checklist-tab-button, .nav-tabs>li.active>a.checklist-tab-button:focus, .nav-tabs>li.active>a.checklist-tab-button:hover {
			cursor: pointer;
		}
		#checklist-list a {
			border: 1px solid #b1b1b1;
		}
		#checklist-list li.active a {
			border: 1px solid transparent;
		}
		#checklist-list {
			float: left;
			border: 1px solid green;
			width: 900px;
		}
		#move-buttons {
			float: right;
			border: 1px solid blue;
			width: 150px;
		}
		#checklist-list #move-buttons a {
			position: relative;
			padding: 10px 15px;
		}
	</style>

	<title>Tabs Tutorial using Vue.js Components</title>
</head>
<body>
<div class="container">
	<h3>String Length: <span id="stringLength"></span></h3>
	<br>
	<br>
	<br>
	<div id="application">
		<tabs>
			<tab name="Checklist 1 - Planning 25/25 - This is additional text" :selected="true">
				<h1>Heading for tab 1</h1>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti laudantium odit quam. Aliquam consectetur
					doloribus ducimus enim ex, illo ipsum magnam maxime necessitatibus omnis quis quo ratione sit veniam
					veritatis.</p>
			</tab>
			<tab name="Checklist 2 - Design 7/25">
				<h1>Two tabs roses red</h1>
				<p>Adipisci nesciunt omnis repellendus vel! Animi beatae blanditiis doloremque doloribus eligendi eos eum
					eveniet ex maiores molestias nam, natus nobis odit optio similique soluta, velit voluptates? Accusamus
					laboriosam, vitae. Aliquid!</p>
			</tab>
			<tab name="Checklist 3 - Example">
				<h1>Ocean is blue</h1>
				<p>Adipisci cupiditate debitis deserunt explicabo harum illo illum, iusto laborum provident quae quis ratione,
					recusandae reprehenderit, sit suscipit tempora voluptatum! Amet consectetur cum dicta, distinctio et
					reprehenderit tempore ullam voluptate.</p>
			</tab>
			<tab name="Checklist 4 - Developer">
				<h1>final tab in the sky</h1>
				<p>Ipsa tempora, vero! Asperiores cumque dignissimos esse ipsum modi nam numquam officiis repudiandae ullam
					voluptate. Animi aut cum eveniet facere inventore itaque minima minus odit, officia quidem, quis totam
					voluptatem.</p>
			</tab>
			<tab name="Checklist 5 - The title of this checklist is incredibly long">
				<h1>final tab in the sky</h1>
				<p>Ipsa tempora, vero! Asperiores cumque dignissimos esse ipsum modi nam numquam officiis repudiandae ullam
					voluptate. Animi aut cum eveniet facere inventore itaque minima minus odit, officia quidem, quis totam
					voluptatem.</p>
			</tab>
		</tabs>
	</div>
</div>

<script type="x-template" id="template-tabs">
	<div id="checklist-dashboard">
		<div id="tab-menu">
			<div id="list-of-tabs">
				<ul id="checklist-list" class="nav nav-tabs">
					<li v-for="(menuItem, itemObjKey) in navItemsArray" :class="{ selectedMenuItem: menuItem.isActive, active: menuItem.isActive }"><a class="checklist-tab-button" :class="['checklist-tab-button-' + (itemObjKey + 1)]" @click="selectMenuItem(menuItem)">{{ menuItem.name }}</a></li>
				</ul>
			</div>
			<div id="move-buttons">
				<span class="left"><a href=""><</a></span>
				<span class="right"><a href="">></a></span>
			</div>
		</div>

		<div>
			<slot></slot>
		</div>
	</div>
</script>

<script type="x-template" id="template-tab">
	<div id="checklist-details" v-show="isActive">
		<slot></slot>
	</div>
</script>

<!-- jQuery -->
<script>
	$(window).on('load',
		function () {
			// The code here denotes truncating all of the checklist titles in the tab menu
			// Locate all of the shown tab menu titles so we can use them as a foreach loop and truncate them one by one
			// array with all of the checklist item tabs
			var $allTabsObjects = document.getElementsByClassName('checklist-tab-button');
//			let $allTabsObjects = document.getElementsByClassName('checklist-tab-button')[0].innerHTML;
      var $allTabsObjectsTitlesArray = [];
      var $allTabsObjectsTitlesArrayTruncated = [];

			for (let i = 0; i < $allTabsObjects.length; i++) {
			  $allTabsObjectsTitlesArray.push($allTabsObjects[i].innerHTML);
			}

//			console.log($allTabsObjectsTitlesArray);

			// Truncate all items in $allTabsObjectsTitlesArray array and remake the array with the new truncated items in the $allTabsObjectsTitlesArrayTruncated array
			$allTabsObjectsTitlesArray.forEach(
			  function (arrayTitle, index) {
			    var arrayTitleTruncated = arrayTitle;

			    if (arrayTitle.length > 35) {
			      arrayTitleTruncated = arrayTitle.substring(0,35) + '...';
			    }
          $allTabsObjectsTitlesArrayTruncated.push(arrayTitleTruncated);
//          alert(arrayTitleTruncated);
			  }
			);

//			console.log('log');
			console.log($allTabsObjectsTitlesArrayTruncated);

			for (var i in $allTabsObjects) {
//			  console.log($allTabsObjects[i]);
				$allTabsObjects[i].innerHTML = $allTabsObjectsTitlesArrayTruncated[i];
			}

//sdfsdf

//			// The below code is specifically for check list button 5
//      let $divy = $('.checklist-tab-button-5').first().text();
//      let $divyLength = $divy.length;
//      let $divyText = $divyLength + 'chars - "' + $divy + '"';
//      $('#stringLength').text($divyText);
//
//      // check if string length is above 35. If so, truncate it and add the ... symbol at the end
//      if ($divyLength > 35) {
//				let $shortenedDivy = $divy.substring(0,35);
//				let $shortenedDivySummary = $shortenedDivy + '...';
//				let $element = $('.checklist-tab-button-5').first();
//				$element.html($shortenedDivySummary);
//      }
		}
	);
</script>

<!-- Vue.js Script -->
<script>
  Vue.component('tabs', {
    template: '#template-tabs',
    data() {
      return {
        navItemsArray: []
      }
    },
    mounted() {
      this.navItemsArray = this.$children;
    },
    methods: {
      selectMenuItem(passedMenuItemObject) {
        this.navItemsArray.forEach(item => {
          item.isActive = (item == passedMenuItemObject)
      });
      }
    }
  });

  Vue.component('tab', {
    template: '#template-tab',
    props: {
      name: { required: true },
      selected: { default: false }
    },
    data() {
      return {
        isActive: false
      }
    },
    mounted() {
      this.isActive = this.selected;
    }
  });

  new Vue({
    el: '#application'
  });
</script>
</body>
</html>