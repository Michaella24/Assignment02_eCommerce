<html>

<head>
    <title>Profile Creation</title>
    <style>
        body,
        html {
            height: 100%;
            margin: 0;
            display: flex;
            /* Use flexbox to center the container */
            align-items: center;
            /* Center vertically */
            justify-content: center;
            /* Center horizontally */
        }

        .container {
            width: auto;
            /* Set width to auto */
            max-width: 80%;
            /* Set maximum width to 80% of the viewport */
            background-color: #333;
            /* Black background */
            color: #fff;
            /* White text color */
            padding: 10px;
            /* Adjust padding */
            border-radius: 10px;
            /* Rounded corners */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            /* Drop shadow */
            font-family: Arial, Helvetica, sans-serif;
            text-align: center;
            /* Center the content horizontally */
        }


        .form-group {
            margin-bottom: 20px;
            /* Add space between form groups */
        }

        .form-control {
            width: 100%;
            /* Make form controls fill the container width */
            padding: 10px;
            /* Add padding to form controls */
            border: none;
            /* Remove default border */
            border-radius: 5px;
            /* Rounded corners for form controls */
        }

        input[type="submit"] {
            background-color: #007bff;
            /* Button background color */
            color: white;
            /* Button text color */
            border: none;
            /* Remove button border */
            padding: 10px 20px;
            /* Add padding to button */
            border-radius: 5px;
            /* Rounded corners for button */
            cursor: pointer;
            /* Change cursor to pointer on hover */
            margin-bottom: 15px;
        }

        a {
            color: #007bff;
            /* Link text color */
            text-decoration: none;
            /* Remove underline from links */
        }

        a:hover {
            text-decoration: underline;
            /* Add underline on hover */
        }
    </style>
</head>

<body>
    <div class="centered-content">
        <?php include 'app/views/Publication/topBar.php'; ?>
        <div class='container'>
            <form method='post' action=''>
                <div class="form-group">
                    <label>First name:<input type="text" class="form-control" name="first_name" placeholder="First Name" /></label>
                </div>
                <div class="form-group"> <!--middle name should be optional ? -->
                    <label>Middle Name:<input type="text" class="form-control" name="middle_name" placeholder="Middle Name" /></label>
                </div>
                <div class="form-group">
                    <label>Last Name:<input type="text" class="form-control" name="last_name" placeholder="Last Name" /></label>
                </div>
                <div class="form-group">
                    <input type="submit" name="action" value="Submit profile" />
                </div>
            </form>
        </div>
    </div>
</body>

</html>