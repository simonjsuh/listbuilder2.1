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

	<script src="https://unpkg.com/vue/dist/vue.js"></script>

	<style>
		.selectedMenuItem {
			font-weight: bold;
		}
	</style>

	<title>Tabs Tutorial using Vue.js Components</title>
</head>
<body>
<div class="container">

	<div id="application">

		<tabs>
			<tab name="tab one">
				<h1>Heading for tab 1</h1>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti laudantium odit quam. Aliquam consectetur
					doloribus ducimus enim ex, illo ipsum magnam maxime necessitatibus omnis quis quo ratione sit veniam
					veritatis.</p>
			</tab>
			<tab name="second tab musketeers">
				<h1>Two tabs roses red</h1>
				<p>Adipisci nesciunt omnis repellendus vel! Animi beatae blanditiis doloremque doloribus eligendi eos eum
					eveniet ex maiores molestias nam, natus nobis odit optio similique soluta, velit voluptates? Accusamus
					laboriosam, vitae. Aliquid!</p>
			</tab>
			<tab name="three trio">
				<h1>Ocean is blue</h1>
				<p>Adipisci cupiditate debitis deserunt explicabo harum illo illum, iusto laborum provident quae quis ratione,
					recusandae reprehenderit, sit suscipit tempora voluptatum! Amet consectetur cum dicta, distinctio et
					reprehenderit tempore ullam voluptate.</p>
			</tab>
			<tab name="Build the Matrix" :selected="true">
				<h1>final tab in the sky</h1>
				<p>Ipsa tempora, vero! Asperiores cumque dignissimos esse ipsum modi nam numquam officiis repudiandae ullam
					voluptate. Animi aut cum eveniet facere inventore itaque minima minus odit, officia quidem, quis totam
					voluptatem.</p>
			</tab>
		</tabs>
	</div>
</div>

<script type="x-template" id="template-tabs">
	<div>
		<div>
			<ul>
				<li v-for="menuItem in navItemsArray" :class="{ selectedMenuItem: menuItem.isActive }"><a @click="selectMenuItem(menuItem)">{{ menuItem.name }}</a></li>
			</ul>
		</div>

		<div>
			<slot></slot>
		</div>
	</div>
</script>

<script type="x-template" id="template-tab">
	<div v-show="isActive">
		<slot></slot>
	</div>
</script>

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