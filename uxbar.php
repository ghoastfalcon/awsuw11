<?php
// this file will be used to dynamically build the side (or top)
// nav menu on the map page.

require ('Search.php');
$search = new Search();

?>

    <!DOCTYPE html>
    <html>
    <head>
        <title>United Way Los Angeles Map Search</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
         <link href="assets/masterstyle.css" rel="stylesheet">
        

    </head>
    <body>
        <script src="http://code.jquery.com/jquery.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/verse.js"></script>
       
        <div>
        	<a href="unitedwayla.org"><img src="images/united-way-logo-aws.png"></a>
        </div>
        <br/>
        <div class="searchByDoner">
        	<a href="#" id="haveAccount" class="titleText">Have an account?</a>
        	<div class="span1 searchByDonerInput hide">
			    <div class="input-group">
			      <input type="text" id="donerid" name="donerid" class="form-control">
			      <span class="input-group-btn">
			        <button class="btn btn-default" id="donerSearch" type="button">Go!</button>
			      </span>
			    </div><!-- /input-group -->
			</div>
			<div class="welcomeBack hide">Welcome back!</div>
        </div>
        <div class="row searchByZip">
        	<div>Please enter address or zipcode:</div> 
        	<div class="span1">
			    <div class="input-group">
			      <input type="text" id="zipcode" name="zipcode" class="form-control">
			      <span class="input-group-btn">
			        <button class="btn btn-default" id="zipcodeSearch" type="button">Go!</button>
			      </span>
			    </div><!-- /input-group -->
			</div>
		</div><!-- /.row -->
		<br/>
		<div>Filters:</div>
		<div><hr></div>
		<div>
			<select multiple id="filters">
				<option value="company1">Company1</option>
				<option value="company2">Company2</option>
				<option value="company3">Company3</option>
				<option value="company4">Company4</option>
			</select>
		</div>
		<div>
			<div class="span1">
			    <div class="input-group">
			      <span class="input-group-btn">
			        <button class="btn btn-default" id="clearFilters" type="button">Clear Filters</button>
			        <button class="btn btn-default" id="search" type="button">Search</button>
			      </span>
			    </div><!-- /input-group -->
			</div>
		</div>

    </body>
    </html>

