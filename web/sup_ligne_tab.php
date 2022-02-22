<?php
include_once "cnx.php";
if (!empty($_SESSION['panier']))
{
if(isset($_POST["action"]))
    {
            if($_POST["action"] == 'remove')
	            {
		            foreach($_SESSION["panier"] as $keys => $values)
		                {
		                	if($values["id"] == $_POST["id"])
			                    {
				                    unset($_SESSION["panier"][$keys]);
			                    }
		                }
                }
	}
}
            ?>