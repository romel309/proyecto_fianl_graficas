<?php
  echo '<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<title>Scores</title>

	
	<link href="https://fonts.googleapis.com/css?family=Montserrat:700,900" rel="stylesheet">

	
	<link type="text/css" rel="stylesheet" href="css/style.css" />


	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

</head>

<body>
    <style>
    * {
  -webkit-box-sizing: border-box;
          box-sizing: border-box;
}

body {
}

#notfound {
  position: relative;
  height: 150vh;
  background: #030005;
}

#notfound .notfound {
  position: absolute;
  left: 50%;
  top: 20%;
  -webkit-transform: translate(-50%, -50%);
      -ms-transform: translate(-50%, -50%);
          transform: translate(-50%, -50%);
}

.notfound {
  max-width: 767px;
  width: 100%;
  line-height: 1.4;
  text-align: center;
}

.notfound .notfound-404 {
  position: relative;
  margin-bottom: 20px;
  z-index: -1;
}

.notfound .notfound-404 h1{
  color: #ff005a;
}

.notfound .notfound-404 p{
  color: #fff;
}

.notfound .notfound-404 form{
  color: #fff;
}

.notfound .notfound-404 h2 {
  position: absolute;
  left: 0;
  right: 0;
  top: 110px;
  font-size: 42px;
  font-weight: 700;
  color: #fff;
  text-transform: uppercase;
  text-shadow: 0px 2px 0px #8400ff;
  letter-spacing: 13px;
  margin: 0;
}

.notfound a {
  display: inline-block;
  text-transform: uppercase;
  color: #ff005a;
  text-decoration: none;
  border: 2px solid;
  background: transparent;
  padding: 10px 40px;
  font-size: 14px;
  font-weight: 700;
  -webkit-transition: 0.2s all;
  transition: 0.2s all;
}

.notfound a:hover {
  color: #8400ff;
}

@media only screen and (max-width: 767px) {
    .notfound .notfound-404 h2 {
        font-size: 24px;
    }
}

@media only screen and (max-width: 480px) {
  .notfound .notfound-404 h1 {
      font-size: 182px;
  }
}

    </style>

	<div id="notfound">
		<div class="notfound">
			<div class="notfound-404">';

  $db =  new mysqli("localhost", 'romel309','', 'space');
  if(mysqli_connect_errno()){
    echo mysqli_connect_error();
  }
  if(isset($_POST['nombre'])){
    $db->query("insert into score (name, puntos) values ('".$_POST['nombre']."' , '".$_POST['puntos']."' )");
  }else{
    if(isset($_GET['name'])){
      echo '<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>';
      echo '<p>Your Score is: ' .intval(50000/htmlspecialchars($_GET["name"])) . '! </p>';
      echo '<form action="score.php" method="post">
            Name: <input type="text" name="nombre"><br>
            <input type="number" name="puntos" value='.intval(50000/htmlspecialchars($_GET["name"])).' hidden><br>
            <input type="submit" value="Submit Score">
            </form>';
    }
  }
  $result = $db->query("call getScore()");
  if($result){
       // Cycle through results
      echo '<br><br><br><br><br><br><br><br><br><br><br>';
      echo '<h1>Top scores</h1>';
      while ($row = $result->fetch_assoc()){
          echo '<p>';
          echo $row["name"]. " ".$row["puntos"]. "<br>";
          echo '</p>';
      }
      $result->close();
      $db->next_result();
  }
  
  echo '</div>
			<a href="index.html">Return to menu</a>
		</div>
	</div>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
';


  $db->close();
?>
