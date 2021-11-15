<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//if (isset($_GET['next'])){
//        $iso_code = $_GET['next'];
//    }
//if (isset($_POST['date'])){
//    session_start();
//        $_SESSION['date'] = $_POST['date'];
//       
//        
//    }
if (isset($_POST['daily'])){
    $iso_code = $_POST['daily'];
    header("Location: display_daliy_vaccine_graph.php?next=$iso_code");
}
if (isset($_POST['death'])){
    $iso_code = $_POST['death'];
    header("Location: display_death_serious_graph.php?next=$iso_code");
}
 
?>

