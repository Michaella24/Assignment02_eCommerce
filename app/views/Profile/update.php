<html>
    
<head>
    <title>Update Home page</title>
    <!-- //to do the css -->
</head>

<body>
<div class='container'>
<?php include 'app\views\Publication\topBar.php'; ?>
    <form method='post' action=''>
            <div class="form-group">
				<label>First name:<input type="text" class="form-control" name="first_name" value= <?=$data->first_name ?> /></label>
			</div>
            <div class="form-group">
				<label>Last Name:<input type="text" class="form-control" name="middle_name" value= <?=$data->middle_name ?>/></label>
			</div>
             <div class="form-group">   <!--middle name should be optional -->
				<label>Middle Name:<input type="text" class="form-control" name="last_name" value= <?=$data->last_name ?>/></label>
			</div>
            <div class="form-group">
                <input type="submit" name="action" value="Update Profile" />
                <a href='/User/login'>Cancel</a>
            </div>
</form>
</div>
</body>

</html>