<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<title>Infinite Rounded Out Tabs</title>
	<link rel="stylesheet" href="css/infinite.tabs.min.css" />
	<script src="vendor/js/jquery.1.6.2.min.js"></script>
	<!--[if (gte IE 6)&(lte IE 8)]>
	<script type="text/javascript" src="vendor/js/selectivizr-min.js"></script>
	<link rel="stylesheet" href="css/infinite.tabs.lteqie8.min.css" />
	<![endif]-->
	<script src="jquery.infinite.tabs.min.js"></script>

	<style>
		* { margin: 0; padding: 0; }
		body { font: 14px Georgia, serif; }
		h1 {
			width: 660px;
			margin: 0 auto;
			padding: 20px 0;
			color: #222;
		}
		body {
			background: #222;
		}
		.tab-content {
			background: white;
			min-height: 50px;
		}
		.breaker {
			min-height: 20px;
		}
		.buttons {
			padding: 20px;
		}
	</style>

	<script>
    /* Sample code to handle tab selection */
    $(function() {
      var clickEvent = function(event) {
          event.preventDefault();
          event.stopPropagation();
          $(this).parents('ul.infinite-tabs').find('li').removeClass("active");
          $(this).addClass("active");
        },
        lastTab = false;
      $("ul.infinite-tabs").infiniteTabs()
      .find('li').click(clickEvent);
      $('#remove-tab').click(function(event) {
        var lastTab = $('#js-target li.scroller li:not(.hidden):not(.navigation):last')
        if (lastTab.length == 1) {
          $('#js-target').infiniteTabs('remove-tab', lastTab);
        }
      });
      $('#append-tab').click(function(event) {
        var newTab = $('<li><a href="#">' + Math.floor(Math.random() * 100) + '</a></li>').click(clickEvent).click(selectedEvent);
        $('#js-target').infiniteTabs('append-tab', newTab);
      });
      $('#prepend-tab').click(function(event) {
        var newTab = $('<li><a href="#">' + Math.floor(Math.random() * 100) + '</a></li>').click(clickEvent).click(selectedEvent);
        $('#js-target').infiniteTabs('prepend-tab', newTab);
      });
      var selectedEvent = function(event) {
        $('#js-target').infiniteTabs('set-tab-content', this, $(this).find('a').html() + ' selected');
        if (lastTab) {
          $('#js-target').infiniteTabs('set-tab-content', lastTab, $(lastTab).find('a').html().replace(/ selected/,''));
        }
        lastTab = this;
      };
      $('#js-target li.scroller li').click(selectedEvent);
    });
	</script>
</head>

<body>

<ul id="js-target" class="infinite-tabs">
	<li class="active locked"><a href="#one">Pinned</a></li>
	<li class="locked"><a href="#one">Also pinned</a></li>
	<li><a href="#one">1</a></li>
	<li><a href="#two">2</a></li>
	<li><a href="#three">3</a></li>
	<li><a href="#three">4</a></li>
	<li><a href="#one">5</a></li>
	<li><a href="#two">6</a></li>
	<li><a href="#three">7</a></li>
	<li><a href="#three">8</a></li>
	<li><a href="#one">9</a></li>
	<li><a href="#two">10</a></li>
	<li><a href="#three">11</a></li>
	<li><a href="#three">12</a></li>
	<li><a href="#one">13</a></li>
	<li><a href="#two">14</a></li>
	<li><a href="#three">15</a></li>
	<li><a href="#three">16</a></li>
	<li><a href="#one">17</a></li>
	<li><a href="#two">18</a></li>
	<li><a href="#three">19</a></li>
	<li><a href="#three">20</a></li>
</ul>

<div class="tab-content">
	<h1>Infinite Round Out Tabs (even number tabs) with Javascript manipulation</h1>
	<div class="buttons">
		<input type="button" id="remove-tab" value="Remove Tab">
		<input type="button" id="append-tab" value="Append Tab">
		<input type="button" id="prepend-tab" value="Prepend Tab">
	</div>
</div>

<div class="breaker"></div>

<ul class="infinite-tabs">
	<li class="active locked"><a href="#one">Pinned</a></li>
	<li class="locked"><a href="#one">Also pinned</a></li>
	<li><a href="#one">1</a></li>
	<li><a href="#two">2</a></li>
	<li><a href="#three">3</a></li>
	<li><a href="#three">4</a></li>
	<li><a href="#one">5</a></li>
	<li><a href="#two">6</a></li>
	<li><a href="#three">7</a></li>
	<li><a href="#three">8</a></li>
	<li><a href="#one">9</a></li>
	<li><a href="#two">10</a></li>
	<li><a href="#three">11</a></li>
	<li><a href="#three">12</a></li>
	<li><a href="#one">13</a></li>
	<li><a href="#two">14</a></li>
	<li><a href="#three">15</a></li>
	<li><a href="#three">16</a></li>
	<li><a href="#one">17</a></li>
	<li><a href="#two">18</a></li>
	<li><a href="#three">19</a></li>
</ul>

<div class="tab-content">
	<h1>Infinite Round Out Tabs (odd number tabs)</h1>
</div>

<div class="breaker"></div>

<ul class="infinite-tabs">
	<li class="active locked"><a href="#one">Pinned</a></li>
	<li><a href="#one">1</a></li>
	<li><a href="#two">2</a></li>
	<li><a href="#three">3</a></li>
	<li><a href="#three">4</a></li>
	<li><a href="#one">5</a></li>
	<li><a href="#two">6</a></li>
</ul>

<div class="tab-content">
	<h1>Infinite Round Out Tabs (few tabs, one pinned)</h1>
</div>

<div class="breaker"></div>

<ul class="infinite-tabs">
	<li><a href="#one">1</a></li>
	<li><a href="#two">2</a></li>
	<li><a href="#three">3</a></li>
	<li><a href="#three">4</a></li>
	<li><a href="#one">5</a></li>
	<li><a href="#two">6</a></li>
</ul>

<div class="tab-content">
	<h1>Infinite Round Out Tabs (few tabs, none pinned)</h1>
</div>

<div class="breaker"></div>

<ul class="infinite-tabs">
	<li><a href="#one">1</a></li>
	<li><a href="#two">2</a></li>
	<li><a href="#three">3</a></li>
	<li><a href="#three">4</a></li>
	<li><a href="#one">5</a></li>
	<li><a href="#two">6</a></li>
	<li><a href="#three">7</a></li>
	<li><a href="#three">8</a></li>
	<li><a href="#one">9</a></li>
	<li><a href="#two">10</a></li>
	<li><a href="#three">11</a></li>
	<li><a href="#three">12</a></li>
	<li><a href="#one">13</a></li>
	<li><a href="#two">14</a></li>
	<li><a href="#three">15</a></li>
	<li><a href="#three">16</a></li>
	<li><a href="#one">17</a></li>
	<li><a href="#two">18</a></li>
	<li><a href="#three">19</a></li>
	<li><a href="#three">20</a></li>
	<li><a href="#two">21</a></li>
	<li><a href="#three">22</a></li>
	<li><a href="#three">23</a></li>
</ul>

<div class="tab-content">
	<h1>Infinite Round Out Tabs (lots of tabs, none pinned)</h1>
</div>

<div class="breaker"></div>

<ul class="infinite-tabs">
	<li class="active locked"><a href="#one">Pinned</a></li>
</ul>

<div class="tab-content">
	<h1>Infinite Round Out Tabs (one pinned, no other tabs)</h1>
</div>

<div class="breaker"></div>

<ul class="infinite-tabs">
	<li class="active locked"><a href="#one">Pinned</a></li>
	<li class="locked"><a href="#two">Second pinned</a></li>
</ul>

<div class="tab-content">
	<h1>Infinite Round Out Tabs (two pinned, no other tabs)</h1>
</div>
</body>