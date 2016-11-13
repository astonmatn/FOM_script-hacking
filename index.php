<html>
	<head>
    <meta charset="utf-8">
		<title>Online Bibliothek – Homepage</title>
		<style>
  		td {
    		padding: 5px;
  		}
  		input[type="text"],
  		input[type="email"] {
    		width: 400px;
  		}
  		textarea {
    		width: 400px;
    		height: 80px;
  		}
  		
  		.error {
    		color: red;
  		}
  		#logo {
    		float: left;
    		width: 120px;
  		}
  		hr {
    		clear:left;
  		}
  		
  		li {
    		float: left;
    		list-style: none;
    		margin: 10px;
  		}
		</style>
	</head>
	<body>
		<img src="images/logo.png" id="logo">
		<ul>
  		<li><a href="index.php?seite=start">Start</a></li>
  		<li><a href="index.php?seite=allebuecher">Alle Bücher</a></li>
  		<li><a href="#">Bestand durchsuchen</a></li>
  		<li><a href="index.php?seite=kontakt">Kontakt</a></li>
		</ul>
		<hr>
    
    <?php
      
      
      if(!isset($_GET['seite'])){ 
        $seite = "start"; 
      } else {
        $seite = $_GET['seite'];
      }
      
      switch($seite){
        
        default:
        	case ('start'): include("start.php"); break;
        	case ('kontakt'): include("contactus.php"); break;
		  	case ('allebuecher'): include("allbooks.php"); break;

        
      }
      
      ?>
    
    		
	</body>
</html>
