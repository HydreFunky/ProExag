<?php
session_start();
// error_reporting(0);
include 'Class/Mysql.php';
function chargerClasse($classe)
{
  require 'Class/'. $classe . '.class.php';
}
spl_autoload_register('chargerClasse');

	require 'Design/body.php';

    if(isset($_GET['load']))
		{
			$load = 'Public/'.$_GET['load'].'.php';
			if (file_exists($load)) include_once($load);
		}
	else 
		{
		include_once('Public/accueil.php');
		}	
		
	require 'Design/footer.php';



