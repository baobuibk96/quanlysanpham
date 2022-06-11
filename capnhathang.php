<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
if(isset($_POST['submit']))
{
	unset($_SESSION['hang']);	
	foreach($_POST['qty'] as $key=>$value)
	{		
		if( ($value == 0) and (is_numeric($value)))
		{
			unset ($_SESSION['hang'][$key]);
		}
		elseif(((int)$value > 0) and (is_numeric((int)$value)))
		{
			$_SESSION['hang'][$key]=$value;
		}
	}
?>
    <script language="javascript">
		window.location="index.php?action=4";
	</script>
    <?php
}
?>