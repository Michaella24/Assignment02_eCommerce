<html>

<head>
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body,
        html {
            height: 100%;
            margin: 0;
            display: flex;
            
            align-items: center;
           
            justify-content: center;
          
        }

        .container {
            width: auto;
         
            max-width: 80%;
           
            background-color: #333;
        
            color: #fff;
         
            padding: 10px;
        
            border-radius: 10px;
     
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
          
            font-family: Arial, Helvetica, sans-serif;
            text-align: center;
        
        }


        .form-group {
            margin-bottom: 20px;
        
        }

        .form-control {
            width: 100%;
           
            padding: 10px;
          
            border: none;
         
            border-radius: 5px;
           
        }

        input[type="submit"] {
            background-color: #007bff;
         
            color: white;
          
            border: none;
         
            padding: 10px 20px;
          
            border-radius: 5px;
           
            cursor: pointer;
            
            margin-bottom: 15px;
        }

        a {
            color: #007bff;
         
            text-decoration: none;
           
        }

        a:hover {
            text-decoration: underline;
           
        }
    </style>

</head>

<body>

    <div class="centered-content">
        <?php include 'app/views/Publication/topBar.php'; ?>
        <div class='container'>

            <form method='post' action=''>
                <div id='leading' style="margin-bottom: 15px">

                    <i class="bi bi-plus-square-fill" style="font-size: 130px;"></i>

                    <input style="margin-left: 10px;" type="text" id="title" name="title" placeholder="New Title" style="font-size: 25;">

                </div>

                <div id='content' style='margin-bottom: 15'>

                    <textarea id="content" name="content" placeholder="New Content" style="width:750px; height: 400px; vertical-align: top; line-height: normal; resize: none;"></textarea>

                </div>

                <input type="submit" name="action" value="Update" />

            </form>

        </div>

</body>

</html>