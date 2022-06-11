<?php 
require("dbconnect.inc");
$sql="select *from loaisp";
$result=mysqli_query($link, $sql);
$fetch=mysqli_num_rows($result); 
if($fetch!=0)
{ 
echo "<table width=100% >"; 
    $i=1; 
    echo "<tr >";     
    while(($row=mysql_fetch_row($result))&&($i<=$fetch)){ 
            $i++;     
			 echo "<td width='50%'  align='center'>".$row['maloai']."</td>"; 
            echo "<td width='50%'  align='center'>".$row['ten']."</td>"; 
     
        if($i%2) echo "</tr>"; 
        } 
echo "</table>"; 
}else{ 
} 
?>