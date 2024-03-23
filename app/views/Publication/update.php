<html>
    <head>
        <title>Home</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css" rel="stylesheet">

        <style>

body, html {
    height: 100%;
    margin: 0;
    display: flex; /* Use flexbox to center the container */
    align-items: center; /* Center vertically */
    justify-content: center; /* Center horizontally */
}

.container {
    width: auto; /* Set width to auto */
    max-width: 80%; /* Set maximum width to 80% of the viewport */
    background-color: #333; /* Black background */
    color: #fff; /* White text color */
    padding: 10px; /* Adjust padding */
    border-radius: 10px; /* Rounded corners */
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.5); /* Drop shadow */
    font-family: Arial, Helvetica, sans-serif;
    text-align: center; /* Center the content horizontally */
}


.form-group {
    margin-bottom: 20px; /* Add space between form groups */
}

.form-control {
    width: 100%; /* Make form controls fill the container width */
    padding: 10px; /* Add padding to form controls */
    border: none; /* Remove default border */
    border-radius: 5px; /* Rounded corners for form controls */
}

input[type="submit"] {
    background-color: #007bff; /* Button background color */
    color: white; /* Button text color */
    border: none; /* Remove button border */
    padding: 10px 20px; /* Add padding to button */
    border-radius: 5px; /* Rounded corners for button */
    cursor: pointer; /* Change cursor to pointer on hover */
    margin-bottom: 15px;
}

a {
    color: #007bff; /* Link text color */
    text-decoration: none; /* Remove underline from links */
}

a:hover {
    text-decoration: underline; /* Add underline on hover */
}
</style>
       
    </head>
        
    <body>

    <div class="centered-content">
        <?php include 'app/views/Publication/topBar.php'; ?>
        <div class='container'>

            <form method='post' action=''>
                <div id = 'leading' style ="margin-bottom: 15px">

                    <i class="bi bi-plus-square-fill" style="font-size: 130px;"></i>

                    <input style ="margin-left: 10px;" type="text" id="title" name="title" value=<?= $data->publication_title ?> style="font-size: 25;">
        
                </div>

                <div id = 'content' style = 'margin-bottom: 15'>

                    <textarea id="content" name="content" style="width:750px; height: 400px; vertical-align: top; line-height: normal; resize: none;"><?= $data->publication_text ?></textarea>

                </div>

                <input type="submit" name="action" value ="Update" />

            </form>

        </div>

    </body>
</html>