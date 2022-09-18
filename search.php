<?php    
$search_URL="http://www.google.com/search?q="; // Google Search Query URL  
if(isset($_POST['keys_submit'])){ 
echo $keywords=$_POST['keywords'];
 header("location: ".$search_URL.$keywords);

}
?>