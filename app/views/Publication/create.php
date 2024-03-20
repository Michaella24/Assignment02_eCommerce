<html>
    <head>
        <title>Home</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css" rel="stylesheet">

        <style>
            #wrapper{
                padding: 20px;
            }
            #leading{
                display: flex;
                align-items: center;
            }

            #title{
                margin-left: 15px;
                width: 550px;
            }

        </style>
       
    </head>
        
    <body>

        <div id = 'wrapper'>

            <form method='post' action=''>
                <div id = 'leading' style ="margin-bottom: 15px">

                    <i class="bi bi-plus-square-fill" style="font-size: 130px;"></i>

                    <input type="text" id="title" name="title" placeholder="Title" style="font-size: 25;">
        
                </div>

                <div id = 'content' style = 'margin-bottom: 15'>

                    <textarea id="content" name="content" placeholder="Publication content" style="width:750px; height: 400px; vertical-align: top; line-height: normal; resize: none;"></textarea>

                </div>

                <input type="submit" name="action" value ="Publish" />

            </form>

        </div>

    </body>
</html>