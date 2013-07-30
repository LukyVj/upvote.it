<?php include('config.php')?>
<!doctype html>
<html lang="en">
<head>
    <title>upvote.it</title>

    <meta charset="utf-8">
    <meta name="robots" content="index,follow">
    <meta name="revisit-after" content="1 days">

    <meta name="viewport" content="width=device-width">

    <link rel="stylesheet" href="style.css">
</head>

<body>




 <header class="header">
        <div class="content">
                                
              <!-- <h1 class="content__title"><a href="http://dev.web-gate.fr/upvote.it/index.php">UpVote.it</a></h1> -->
                         <h1 class="content__title"><a href="/">Lastwish.es</a></h1>
                         <h2>The place where you lost faith in humanity</h2>

            </div>
        </div>
    </header> <!-- .header -->


    <article class="content">

    <section class="content__box--padded content__body">

    
			<!--	 <h2>News Sucks ?</h2>
				  <h3>Why don't you create yours.</h3> -->
				  
				  <p>
				  <form action="index.php" method="POST" accept-charset="utf-8">
				  	 	<label for="link">Submit link</label>
				  	 	<input id="title" type="text" name="title" value="" placeholder="title" required>  
				  	 	<input id="desc" type="text" name="desc" value="" placeholder="a short description...">  
				  	 	<input id="link" type="url" name="link" value="" placeholder="http://" required>  
				  	 	<input id="submit" type="submit" name="submit" value="submit">  
				  </form>
				  </p>
				  
				<section>
				<ul>
					<?php 
				
					
				    $sql = "SELECT * From `upvote` ORDER BY note DESC"; 
				     
				  $req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
				while($data = mysql_fetch_array($req)) { 
					
					//remove below    
				
					echo '<li><a href="'.$data['link'].'">'.$data['title'].'</a><span class="small">('.$data['link'].')</span> <span><a href="upvote.php?id='.$data['id'].'" class="note"> | '.$data['note'].' | <span class="entypo-up-open-big"></span></a>  <a href="downvote.php?id='.$data['id'].'"><span class="entypo-down-open-big"></span></a></span>  <p>'.$data['description'].'</p></li>'; 
					}
				?>
				
				</ul>
				</section>
				</div>
				   

        

    </section> <!-- .content__box -->

</article> <!-- .content -->

 </body>


</html>
<?php 
//request
if (isset($_POST['submit']) && $_POST['link'] != "") {
		
	if(isset($_POST['link']))      $link= $_POST['link'];
	else      $link="";
	if(isset($_POST['title']))     $title= $_POST['title'];
	else      $title="";
	if(isset($_POST['desc']))      $desc= $_POST['desc'];
	else      $desc="";
	
	
	
    $sql = " INSERT IGNORE INTO `upvote` (`id`, `title`, `description`, `link`, `note`) VALUES (NULL,'$title','$desc','$link','0')"; 
     
    mysql_query($sql) or  die(mysql_error()); 


}
?>