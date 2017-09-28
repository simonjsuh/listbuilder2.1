<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">

	<!-- jquery for Bootstrap -->
	<script
		src="https://code.jquery.com/jquery-3.1.1.min.js"
		integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
		crossorigin="anonymous"></script>

	<!-- bootstrap -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>

	<!-- font awesome -->
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

	<!-- Vue.js script source -->
	<script src="https://unpkg.com/vue/dist/vue.js"></script>

	<style>
		.taskDone {
			text-decoration: line-through;
		}
		.completionProgressGreyBar {
			background-color: lightsteelblue;
		}
		.completionProgressGreenBar {
			width: 80%;
			height: 30px;
			background-color: limegreen;
		}
		.green {
			background-color: springgreen;
		}
		.red {
			background-color: indianred;
		}
	</style>

	<title>Vue.js Todo List Application</title>
</head>
<body>
<div class="container">
	<div id="app" class="col-sm-10 col-sm-offset-1">
		<br>
		<div class="panel panel-success">
			<div class="panel-heading">
				<h3 class="text-center">Admin Panel</h3>
			</div>

			<div class="panel-body">
				<div class="col-sm-4">
					<label for="">Display Title</label>
					<input type="checkbox" v-model="displayTitle">
					<br>
					<label for="">Display Add New Task</label>
					<input type="checkbox" v-model="displayAddTasks">
					<br>
					<label for="">Display Task Stats</label>
					<input type="checkbox" v-model="displayTaskStatistics">
				</div>
				<div class="col-sm-4">
					<label for="">Display Tasks</label>
					<input type="checkbox" v-model="displayTasks">
					<br>
					<label for="">Display Task Completion Progress Bar</label>
					<input type="checkbox" v-model="displayProgressBar">
				</div>
				<div class="col-sm-4">
					<label for="">Change App Title</label>
					<input type="text" :value="appTitle" v-on:input="changeAppTitle">
				</div>
			</div>
		</div>

		<br>

		<h1 v-if="displayTitle">{{ this.appTitle }}</h1>

		<div class="panel panel-info" v-if="displayAddTasks">
			<div class="panel-heading">
				<h3 class="text-center">Add New Task</h3>
			</div>

			<div class="panel-body">
				<form v-on:submit="addTask">
					<div class="col-sm-8">
						<input type="text" class="form-control" v-model="tasks.name">
					</div>

					<div class="col-sm-4">
						<input type="submit" class="btn btn-primary btn-block" value="Add">
					</div>
				</form>
			</div>
		</div>

		<div class="panel panel-success" v-if="displayProgressBar">
			<div class="panel-heading">
				<h3 class="text-center">Completion Progress Bar</h3>
			</div>

			<div class="panel-body">
				<div class="col-sm-8 col-sm-offset-2">
					<div class="completionProgressGreyBar">
						<div class="completionProgressGreenBar text-center" :style="{ width: percentageOfTasksCompleted + '%' }">{{ Math.round(percentageOfTasksCompleted) }}%</div>
					</div>
				</div>
			</div>
		</div>

		<div class="panel panel-info" v-if="displayTaskStatistics">
			<div class="panel-heading">
				<h3 class="text-center">Tasks Statistics</h3>
			</div>

			<div class="panel-body">
				<div class="col-sm-6">
					<p v-on:mouseover="changeTotalTasks">Total Tasks: {{ tasks.length }}</p>
					<p v-on:mouseover="changeLeftToDo">Tasks Left To Do: {{ leftToDo }}</p>
					<p v-on:mouseover="changeCheckMarked">Check Marked Tasks: {{ checkMarkedTasks }}</p>
					<p v-on:mouseover="changeDeleted">Deleted Tasks: {{ this.deletedTasks }}</p>
				</div>
				<div class="col-sm-6">
					<h3>{{ displayedTasksStatView }}</h3>
					<h3 style="padding: 10px;" v-bind:class="manageable" class="green">{{ leftToDo < 10 ? 'Manageable' : 'Tasks Overload' }}</h3>
				</div>
			</div>
		</div>

		<table class="table" v-if="displayTasks && tasks.length > 0">
			<thead>
			<th>Check Mark Done</th>
			<th>Task Name</th>
			<th>Delete</th>
			</thead>

			<tbody>
			<tr v-for="task in tasks">
				<td><input type="checkbox" v-model="task.done"></td>
				<td><span :class="{ taskDone: task.done }">{{ task.name }}</span></td>
				<td><button class="btn btn-danger btn-block" v-on:click="deleteTask(task)">Delete</button></td>
			</tr>
			</tbody>
		</table>

		<h3 class="text-center" v-else>The tasks list has been hidden or there are no tasks to display</h3>

	</div>
</div>

<script>
  let todoApp = new Vue({
    el: '#app',
    data: {
      appTitle: 'Todo Task List App',
      displayTitle: true,
      displayTasks: true,
      displayProgressBar: false,
      displayAddTasks: true,
      displayTaskStatistics: false,
      displayedTasksStat: 'totalTasks',
      deletedTasks: 0,
      tasks: []
    },
    methods: {
      changeAppTitle: function(event) {
        this.appTitle = event.target.value;
      },
      addTask: function(event) {
        event.preventDefault();

        if (this.tasks.name !== '' && this.tasks.name !== undefined) {
          this.tasks.push({
            name: this.tasks.name,
            done: false,
          });
        }
      },
      deleteTask: function(task) {
        alert(task);
        return false;
        this.tasks.splice(this.tasks.indexOf(task), 1);
        this.deletedTasks++;
      },
      changeTotalTasks: function() {
        this.displayedTasksStat = 'totalTasks';
      },
      changeLeftToDo: function() {
        this.displayedTasksStat = 'leftToDo';
      },
      changeCheckMarked: function() {
        this.displayedTasksStat = 'checkMarked';
      },
      changeDeleted: function() {
        this.displayedTasksStat = 'deletedTasks';
      }
    },
    computed: {
      checkMarkedTasks: function() {
        let count = 0;
        for (let i = 0; i < this.tasks.length; ++i) {
          if (this.tasks[i].done == true) {
            count ++;
          }
        }
        return count;
      },
      leftToDo: function() {
        return this.tasks.length - this.checkMarkedTasks;
      },
      displayedTasksStatView: function() {
        if (this.displayedTasksStat == 'totalTasks') {
          return 'Total Tasks: ' + this.tasks.length;
        } else if (this.displayedTasksStat == 'leftToDo') {
          return 'Tasks Left: ' + this.leftToDo;
        } else if (this.displayedTasksStat == 'checkMarked') {
          return 'Check Marked Tasks: ' + this.checkMarkedTasks;
        } else if (this.displayedTasksStat == 'deletedTasks') {
          return 'Deleted Tasks: ' + this.deletedTasks;
        }
      },
      manageable: function() {
        if (this.leftToDo < 10) {
          return 'green';
        } else {
          return 'red';
        }
      },
      percentageOfTasksCompleted: function() {
        if (this.tasks.length == 0) {
          return 0;
        } else {
          return (this.checkMarkedTasks / this.tasks.length) * 100;
        }
      }
    }
  });
</script>
</body>
</html>