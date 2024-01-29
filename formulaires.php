<?php
$nom=$_POST["nom"];
$prenom=$_POST["prenom"];
$email=$_POST["mail"];
$cv = $_FILES["fichier"];

//$date = date_create();

$destdir = 'files/';

$file_name = $_FILES["fichier"]["name"];

$fichier= $destdir."_".basename($file_name);

if (move_uploaded_file($_FILES["fichier"]["tmp_name"], $fichier)) {
    echo "The file ". htmlspecialchars( basename( $file_name)). " has been uploaded.";
} 
else {
    echo "Sorry, there was an error uploading your file.";
}



$request = "insert into candidature (nom,prenom,email,fichier) values ('$nom','$prenom','$email','$fichier')";

            $host = "localhost";
            $db = "formulaires";
            $user = "root";
            $pass = "";
            $mysqli = mysqli_connect($host,$user,$pass,$db);
            if(!$mysqli){
                echo "Error to connect db";
            }
            else{
                if(!mysqli_query($mysqli,$request)){
                    echo "error";
                }
                else {
                    echo "success";
                }
            }
?>
