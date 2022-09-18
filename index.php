<?php

require 'includes/snippet.php';
require 'includes/db-inc.php';
include "includes/header.php";

	

 if(isset($_POST['submit'])){

    $news = sanitize(trim($_POST['news']));

    $sql = "INSERT into news (announcement) values ('$news')"; 

    $query = mysqli_query($conn,sql);
    $error = false;

       if($query){
       $error = true;
      }
      else{
        echo "<script>alert('Not successful!! Try again.');
                    </script>"; 
      }
 }

     if(isset($_POST['UpDat'])){
		$id = sanitize(trim($_POST['id']));
        $text = sanitize(trim($_POST['text']));

        $sql_up = "UPDATE news set announcement = '$text' where newsId = '$id'";
		echo mysqli_error($sql_up);
         $result = mysqli_query($conn,$sql_del);
                if ($result)
                {
                    echo "<script>
            
           
                   alert('Update successful');

         </script>";
                }


     }

     if(isset($_POST['del'])){

        $id = sanitize(trim($_POST['id']));

        $sql_del = "DELETE from news where newsId = $id"; 

        $result = mysqli_query($conn,$sql_del);
                if ($result)
                {
         
                }

     }






  ?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="flickity/flickity.css">
	<script type="text/javascript" src="flickity/flickity.js"></script>
	<title>Library Management</title>

</head>
<style> 
*
    {
        outline: none;
    }
    
    .col
    {
        display: table-cell;
        vertical-align: middle;
    }
    
    input, button
    {
        font-family: Nunito;
        padding: 0;
        margin: 0;
        border: 0;
        background-color: transparent;
    }
    
    .search_phase
    {
        width: 600px;
        padding: 2px;
        border-radius: 24px;
      border: 2px solid red;
        transform: scale(0.5);
    }
    .search_phase:hover{ 
     -moz-box-shadow: 0 0 10px  rgba(233, 17, 17, 0.6);
          -webkit-box-shadow: 0 0 10px  rgba(192, 10, 10, 0.6);
          -o-box-shadow: 0 0 10px  rgba(202, 9, 9, 0.6);
    }
    input[type="text"]
    {
        width: 100%;
        height: 100%;
        font-size: 50px;
    }
    button
    {
        position: relative;
        display: block;
        width: 80px;
        height: 90px;
        cursor: pointer;
		color:aqua
    }
    
    #search-circle
    {
        position: relative;
        top: -8px;
        left: 0;
        width: 30px;
        height: 30px;
        margin-top: 0;
        border-width: 15px;
        border: 15px solid #4285f4;
        background-color: red;
        border-radius: 50%;
        transition: 0.5s ease all;
    }
    
    button span
    {
        position: absolute;
        top: 68px;
        left: 43px;
        display: block;
        width: 30px;
        height: 15px;
        background-color: transparent;
        border-radius: 10px;
        transform: rotateZ(52deg);
        transition: 0.5s ease all;
    }
    
    button span:before, button span:after
    {
        content: '';
        position: absolute;
        bottom: 0;
        right: 0;
        width: 45px;
        height: 15px;
        background-color: blue;
        border-radius: 10px;
        transform: rotateZ(0);
        transition: 0.5s ease all;
    }

  

.speech {
        border: 1px solid #DDD;
        width:300px;
        padding:0;
        margin:0
      }

      .speech input {
        border:0;
        width:240px;
        display:inline-block;
        height:30px;
        font-size: 14px;
      }

      .speech img {
        float:right;
        width:40px
      }

    
    </style>

<script>

      function startDictation() {

        if (window.hasOwnProperty('webkitSpeechRecognition')) {

          var recognition = new webkitSpeechRecognition();

          recognition.continuous = false;
          recognition.interimResults = false;
          recognition.lang = "en-US";
          recognition.start();

          recognition.onresult = function (e) {
            document.getElementById('transcript').value = e.results[0][0].transcript;
            recognition.stop();
            document.getElementById('labnol').submit();
          };
          recognition.onerror = function(e) {
            recognition.stop();
          }
        }
      }

    </script>
<body>
<div class="container">
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example">
					<span class="sr-only">:</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#"> Web Based Library Management System</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example">
				<ul class="nav navbar-nav">
					<li class="active"><a href="#">Home</a></li>
										
				</ul>

				<ul class="nav navbar-nav">
					<form id="labnol" method="get" action="https://www.google.com/search">
				  <div class="speech">
					<input type="text" name="q" id="transcript" placeholder="Speak" />
					<img onclick="startDictation()" src="//i.imgur.com/cHidSVu.gif" />
				  </div>
				</form>
					</ul>


				<ul class="nav navbar-nav">	<div class="search_phase">
    <form action="search.php" method="POST" target="_blank">
     
        <div class="col"><input type="text" placeholder="Search...." name="keywords" required=""></div>
        
        <div class="col">
          <button type="submit" name="keys_submit">
            <div id="search-circle"></div>
            <span></span>
          </button>
        
      </div>
    </form>
	</ul>
	
	

				<ul class="nav navbar-nav navbar-right">
					<li class="active"><a href="login.php">Login</a></li>
				</ul>
			</div>
		</div>
	</nav>

</div>

		<div class="container-fluid slide">
			
	  		<div class="slider">
	  			


					<div class="carousel" data-flickity='{ "autoPlay": true }'; >

						  <div class="carousel-cell" auto-play >
						  	<img src="ify/my9.jpeg">
						  </div>
						  <div class="carousel-cell" auto-play>
						  	<img src="ify/my8.jpeg">

						  </div>
						  <div class="carousel-cell" auto-play>
						  	 <img src="ify/my6.jpeg">
						  </div>
						  
						  <div class="carousel-cell" auto-play >
						  	<img src="ify/my7.jpeg">
						  </div>
						   <div class="carousel-cell" auto-play>
						  	<img src="ify/my5.jpeg">
						  </div>

					</div>

					

	  		</div>
		</div>

			 
	





		<div class="container slide2">
			
			  <div class="panel-heading">
		  	<div class="row">
		  		<h3 class="center-block" style="font-size: 30px;">Published Announcements</h3>
			</div>
		  </div>
		  <table class="table table-bordered" style="font-size: 18px;">
         

      		<thead>
                <tr>
                    <th>NewsId</th>
                         <th>Announcement</th>
                          
                        
                </tr>
          </thead>

           <?php 

          $sql2 = "SELECT * from news";

      $query2 = mysqli_query($conn, $sql2);
      $counter = 1;
      while ($row = mysqli_fetch_array($query2)) {  ?>


        <tbody >
          <td><?php echo $counter++; ?></td>
          <td><?php echo $row['announcement']; ?></td>
        
        </tbody>

     <?php }
           ?>
		        
		         </tbody> 
		   </table>
		 
	  </div>

			
			</div>
	</div>



	  		

		<div class="container-fluid slide3" style="background-color: #282828">
			<div class="container">
				<div class="row">
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<a href="#" class="thumbnail">
						<img src="ify/my4.jpeg">
					</a>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<a href="#" class="thumbnail">
						<img src="ify/my3.jpeg">
					</a>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<a href="#" class="thumbnail">
						<img src="ify/my2.jpeg">
					</a>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<a href="#" class="thumbnail">
						<img src="ify/my.jpeg">
					</a>
				</div>
			</div>
			</div>
			
		</div>
		


<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
</body>
</html>