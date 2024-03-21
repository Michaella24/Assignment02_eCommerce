<html>

<head>
	<title><?= $name ?> view</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
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

		.buttons {
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
			<h1>Profile</h1>
			<dl>
				<dt>First name:</dt>
				<dd><?= $data['profile']->first_name ?></dd>
				<dt>Middle name:</dt>
				<dd><?= $data['profile']->middle_name ?></dd>
				<dt>Last name:</dt>
				<dd><?= $data['profile']->last_name ?></dd>
			</dl>
			<a class='buttons' href='/Profile/modify'>Modify my profile</a>
			<a class='buttons' href='/Profile/delete'>Delete my profile</a>

			<div id='publications'>
				<h5 style='font-size: 20px; font-weight: 400;'>Your Publications</h5>
				<ul>
					<?php foreach ($data['publications'] as $publication) : ?>
						<li><?= $publication ?></li>
					<?php endforeach; ?>
				</ul>
			</div>

			<div id='comments'>
				<h5 style='font-size: 20px; font-weight: 400;'>Your Comment History</h5>
				<?php foreach ($data['comments'] as $comment) : ?>
					<li><?= $comment ?></li>
				<?php endforeach; ?>
			</div>
		</div>

	</div>
</body>

</html>