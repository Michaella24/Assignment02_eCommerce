<html>

<head>
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        #wrapper {
            padding-top: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        #leading {
            display: flex;
            align-items: center;
        }

        h1 {
            font-weight: 200;
            font-size: 25;
        }

        #content {
            border: solid;
            border-width: 1;
            border-radius: 5px;
            width: 750px;
            height: 400px;
        }

        .register {
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
        }

        .create {
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
        }

        #topBar {
            background-color: #333;
            color: #fff;
            padding: 10px;
            /* Add padding for spacing */
            display: flex;
            /* Use flexbox for layout */
            justify-content: space-between;
            /* Align items to the start and end of the container */
            align-items: center;
            /* Center items vertically */
            position: fixed;
            /* Position the top bar fixed */
            top: 0;
            /* Align the top bar to the top of the viewport */
            width: 100%;
            /* Align items to the start and end of the container */

        }


        .create {
            margin-right: 10px;
        }

        #publication {
            color: #fff;
            background-color: #333;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            /* Add drop shadow */
            padding: 20px;
            width: auto;
            margin-top: 85px;
        }

        .post_button {
            margin-top: 10px;
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
        }

        #comment {
            list-style-type: none;
            margin-top: 20px;
            padding: 0px;
        }

        ul {
            list-style-position: inside;
            padding-left: 0;
        }

        #comment_header {
            size: 50px;
        }

        #editButton {
            margin-top: 10px;
            margin-left: 10px;
            display: inline-block;
            padding: 5px 20px;
            background-color: #007bff;
            font-size: 13;
            font-weight: 300;
            color: #fff;
            text-decoration: none;
            border: none;
            border-radius: 5px;
        }

        #editPublication {
            margin-top: 10px;
            display: inline-block;
            padding: 5px 20px;
            background-color: #007bff;
            font-size: 13;
            font-weight: 300;
            color: #fff;
            text-decoration: none;
            border: none;
            border-radius: 5px;
        }

        #yourComment {
            color: #007bff;
        }
    </style>

</head>

<body>

    <div id='wrapper'>

        <?php include 'app/views/Publication/topBar.php'; ?>

        <div id='publication'>
            <div id='leading' style="margin-bottom: 15px;">

                <i class="bi bi-journal-text" style="font-size: 130px;"></i>

                <div id='leadingText' style='margin-left: 15px'>
                    <h1 style='font-size: 30px;'><?= $data['publication']->publication_title ?></h1>
                    <h5 style='font-size: 20px; font-weight: 200;'><?= $data['publication']->timestamp ?></h5>
                    <h5 style='font-size: 20px; font-weight: 200;'><?= $data['publication']->username ?></h5>

                    <?php
                    if (isset($_SESSION['user_id'])) {
                        $profile = new \app\models\Profile();
                        $profileData = $profile->getUser($_SESSION['user_id']);

                        if ($profileData) {
                            $profileId = $profileData->profile_id;
                            $id = $data['publication']->publication_id;

                            if (isset($data['publication']) && $profileId === $data['publication']->profile_id) { ?>
                                <a id='editPublication' href="/Publication/update/<?= $id ?>">Edit</a>
                                <a id='deactivateActivate' href="/Publication/status/<?= $id ?>">Deactivate/Activate</a>
                    <?php }
                        }
                    }
                    ?>


                </div>

            </div>

            <div id='content' style='margin-bottom: 15'>

                <p style="margin:5px; padding: 5px;"><?= $data['publication']->publication_text ?></p>

            </div>

            <form method='post' action=''>

                <div id='comments'>
                    <h5 style='font-size: 30px; font-weight:300;'>Comments</h5>

                    <?php if (isset($_SESSION['user_id'])) {

                        if ($profileData) { ?>
                            <textarea id="content" name="comment" placeholder="Write comment..." style="width:750px; height: 200px; vertical-align: top; line-height: normal; resize: none;"></textarea>
                            <br>
                            <input type="submit" name="action" value="Post" class="post_button">
                    <?php }
                    } ?>

                    <ul>
                        <?php foreach ($data['commentHeaders'] as $commentHeader) : ?>
                            <h5 id='comment'><?= $commentHeader ?></h5>
                        <?php endforeach; ?>

                    </ul>
                </div>

            </form>

        </div>

    </div>

</body>

</html>