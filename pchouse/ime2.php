<html>
<head>
<title>Prijava</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" href="css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
	
</head>
<body >
<div class="theme_bg2">
<div class="container">


                  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                     <div class="full">
                           <div class="logo">
                              <a href="index.html"><img src="images/logotip.png" alt="#" /></a>
                            </div>
                    </div>
                    </div>

            
            <form action="" method="post">
               <table>
               <tr>
               <td>
               <label>Korisnicko ime:</label>
               </td>
               <td>
            <input id="name2" name="ime2" type="text">
            <span id="porukaUsername" class="error"></span>
             <td>
               </tr>


            <tr>
            <td>
            <label>Lozinka :</label>
            </td>
            <td>
            <input id="lozinka2" name="lozinka2" placeholder="**********" type="password">
            <span id="porukaPassword" class="error"></span>
            <td>
            </tr>

            <tr>
            <td>
            <input name="submit" type="submit" id="gumb" value="Prijava"> </input>
            </td>
            <td>

            </table>
            </form>
<?php

$ime2="";
$lozinka2="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	$ans=$_POST;

	if (empty($ans["ime2"]))  {
        	echo "Korisnicko ime nije uneseno.Korisnicka imena su user1/user2/user3 itd";
		
    		}
	else if (empty($ans["lozinka2"]))  {
        	echo "Lozinka nije unesena.Lozinka ima 5 znakova i pocinje sa 1";
		
    		}
	else {
		$ime2= $ans["ime2"];
		$lozinka= $ans["lozinka2"];
	
		check($ime2,$lozinka2);
	}
}


function check($ime2, $lozinka2) {
	

	$xml=simplexml_load_file("users.xml");
	
	
	foreach ($xml->korisnik as $kor) {
  	 	$usrn = $kor->ime2;
		$usrp = $kor->lozinka;
		$usrime=$kor->ime;
		$usrprezime=$kor->prezime;
		if($usrn==$ime2){
			if($usrp == $lozinka2){
				echo "Prijavljeni ste kao $usrime $usrprezime";
				return;
				}
			else{
				echo "Netocna lozinka";
				return;
				}
			}
		}
		
	echo "Korisnik ne postoji.";
	return;
}
?>

</div>
 <!--  footer -->
 <footer>
            <div class="copyright">
               <div class="container">
                  <div class="row">
                     <div class="col-md-12">
                        <p>© 2021 Nikola Andrić</a></p>
                     </div>
                  </div>
               </div>
            </div>
      </footer>
      <!-- end footer -->
</body>
</html>
