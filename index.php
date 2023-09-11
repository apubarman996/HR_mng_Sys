<!DOCTYPE html>
<html>
<head>
	<title>AB Software Limited</title>
	<meta charset="utf-8">
	<style type="text/css">
		@import url('https://fonts.googleapis.com/css?family=Black+Han+Sans');
        @import url('https://fonts.googleapis.com/css?family=Black+Han+Sans|Lobster');
        *{
        	margin: 0;
        	padding: 0;
        }
        html, body{
        	height: 100%;
        }
        body{
        	background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 100, 0.5)), url(img/office-2.jpg) no-repeat;
        	background-size: cover;
        	display: flex;
        	flex-direction: column;
        	justify-content: center; 
        }
        .container{
        	max-width: 600px;
        	margin: 0 auto;
        	text-align: center;
        }
        h1{
        	color: #ffffff;
        	font: 900 96px 'Black Han Sans', sans-serif;
        	text-shadow: 0px 2px 4px rgba(0, 0, 0, 0.6);
        	margin-bottom: 24px;
        }
        .btn{
        	background: linear-gradient(45deg, rgba(255, 133, 112, 0.65) 0%, rgba(255, 94, 185, 0.65) 51%, rgba(230, 39, 125, 0.65) 100%);
        	border-radius: 4px;
        	padding: 20px 48px;
        	color: #ffffff;
        	font: 'Lobster', cursive;
        	text-decoration: none;
        	text-transform: uppercase;
        	letter-spacing: 1px;
        	text-shadow: 0px 2px 4px rgba(0, 0, 0, 0.3);
        	transition: box-shadow is ease;
        }
        .btn:hover{
        	box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.3); 
        	-webkit-transition: box-shadow is ease;
        	transition: box-shadow is ease;
        }

	</style>
</head>
<body>
<div class="container">
	<h1>AB Software Limited</h1>
	<a href="login.php" class="btn">Get Started</a>
</div>
</body>
</html>