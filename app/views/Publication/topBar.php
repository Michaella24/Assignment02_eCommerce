<html>
    <head>
        <title>Home</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css" rel="stylesheet">

        <style>
            #wrapper{
                padding-top: 20px;
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
            }
            #leading{
                display: flex;
                align-items: center;
            }

            h1{
                font-weight: 200;
                font-size: 25;
            }


            .register, .logout {
                margin-top: 10px;
                display: inline-block;
                padding: 10px 20px;
                background-color: #007bff;
                font-size: 15;
                font-weight: 300;
                color: #fff;
                text-decoration: none;
                border: none;
                border-radius: 5px;
                cursor: pointer;
            }

            .login {
                margin-top: 10px;
                display: inline-block;
                padding: 10px 20px;
                background-color: #fff;
                font-size: 15;
                font-weight: 300;
                color: #007bff;
                text-decoration: none;
                border: none;
                border-radius: 5px;
                margin-left: 5px;
                cursor: pointer;
            }

            .buttons{
                margin-top: 10px;
                display: inline-block;
                padding: 10px 20px;
                background-color: #fff;
                font-size: 15;
                font-weight: 300;
                color: #333;
                text-decoration: none;
                border: none;
                border-radius: 5px;
                margin-right: 10px;
                cursor: pointer;
            }

            li{
                list-style-type: none;
                margin-top: 20px;
                padding: 0px;
                
            }
            ul{
                list-style-position: inside;
                padding-left: 0;
            }

            h4{
                margin-top: 75px;
                font-size: 70px;
                font-weight: 300;
            }

            #topBar{
                background-color: #333; 
                color: #fff; 
                padding: 10px; /* Add padding for spacing */
                display: flex; /* Use flexbox for layout */
                justify-content: space-between; /* Align items to the start and end of the container */
                align-items: center; /* Center items vertically */
                position: fixed; /* Position the top bar fixed */
                top: 0; /* Align the top bar to the top of the viewport */
                width: 100%;/* Align items to the start and end of the container */

            }
            h3{
                font-weight: 200;
                font-size: 35;
            }
            


        </style>
       
    </head>
        
    <body>
        <div id = 'wrapper'>

        <div id = 'topBar'>

            <h1>Publications.net</h1>
            <nav>

            <a href="/Publication/home" class="buttons">Home</a>

            <?php 
                if(isset($_SESSION['user_id'])) {
                    // Check if the user has a profile
                $profile = new \app\models\Profile();
                $profileData = $profile->getUser($_SESSION['user_id']); // Assuming this method returns user profile data

                    if ($profileData) {
                        echo '<a href="/Profile/home" class="buttons">Profile</a>';
                    }else{
                        echo '<a href="/Profile/creation" class="buttons">Profile</a>';
                    }
                
    
                
    
                if ($profileData) { // If user has a profile, show the "Post" button
                    echo '<a href="/Publication/create" class="buttons">Post</a>';
                }
    
                echo '<a href="/Publication/logout" class="logout">Log out</a>';
            }
            ?>

            


            <?php
                if(!isset($_SESSION['user_id'])) {
                    echo '<a href="/User/register" class="register">Register</a>';
                    echo '<a href="/User/login" class="login">Log In</a>';
                }
            ?>
                
            </nav>
                
        </div>

        </div>

    </body>
</html>