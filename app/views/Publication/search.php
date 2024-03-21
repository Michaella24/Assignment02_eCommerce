<html>
    <head>
        <title>Search Results</title>
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

            #links {
                color: #fff;
                background-color: #333; 
                border-radius: 10px; 
                box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); /* Add drop shadow */
                padding: 20px;
                width: 500px;
                margin-top: 25px;
                
                text-align: center;
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

        <?php include 'app/views/Publication/topBar.php'; ?>
        <h4>Welcome</h4>

            <div id = 'links' >
                <h3>Searched Publications</h3>
                
                <ul>
                    <?php 
                    if ($data['results'] == null) {
                        echo 'No results found';
                        exit(); //to avoid having errors if the user clicks the search bar multiple times
                    }
                    foreach ($data['results'] as $link): 
                    
                    ?>
                        <li><?= $link ?></li>
                        <?php endforeach; ?>
                        
                </ul>
            </div>

        </div>

    </body>
</html>