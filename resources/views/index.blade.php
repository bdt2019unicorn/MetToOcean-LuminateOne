<!DOCTYPE html>
<html>
<head>
	<title>
		Met To Ocean 
	</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>

	<div id="display">
		
	</div>

	<footer>
		<div>
			<p>Air temperature(tmp) vs Significant wave height(hs)</p>
		</div>
		<div>
			<div><button type="button" class="btn btn-primary" onclick="display.url='full_data';">Full Data</button></div>
			<div><button type="button" class="btn btn-info" onclick="RandomData()">Random Data</button></div>
		</div>
	</footer>

	<div id="page_scripts">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
		
		<script type = "text/javascript" src = "https://d3js.org/d3.v4.min.js"></script>
		<script type="text/javascript" src="public/js/Home/index.js"></script>
	</div>
</body>
</html>