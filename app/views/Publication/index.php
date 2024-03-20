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

            #content{
                border: solid;
                border-width: 1;
                border-radius: 5px;
                width: 750px;
                height: 400px;
            }

        </style>
       
    </head>
        
    <body>

        <div id = 'wrapper'>

            <div id = 'leading' style ="margin-bottom: 15px">

            <i class="bi bi-journal-text" style="font-size: 130px;"></i>

                <div id = 'leadingText' style='margin-left: 15px'>
                    <h1><?= $data->publication_title ?></h1>
                    <h5><?= $data->timestamp ?></h5> <!-- UPDATE TIMESTAMP LENGTH -->
                    <h5><?= $data->profile_id ?></h5>
                </div>
                
            </div>

            <div id = 'content' style = 'margin-bottom: 15'>

                <p style="margin:5px; padding: 5px;"><?= $data->publication_text ?></p>

            </div>

            <form method = 'post' action =''>
                <div id = 'comments'>
                <h5>Comments</h5>
                <textarea id="content" name="comment" placeholder="Write comment..." style="width:750px; height: 200px; vertical-align: top; line-height: normal; resize: none;"></textarea>
                <input type="submit" name='action' value='Post'>
                </div>

            </form>
            

        </div>

    </body>
</html>