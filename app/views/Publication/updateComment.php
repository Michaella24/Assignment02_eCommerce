<html>

<head>
    <title> User login </title>
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
                <div class="form-group">
                    <label>New:<input type="text" class="form-control" name="text" placeholder="Text" /></label>
                </div>
                <div class="form-group">
                    <input type="submit" name="action" value="Update" />
                    <br>
                    <a href='/User/register'>Cancel</a>
                </div>
            </form>
        </div>
    </div>



</body>



</html>