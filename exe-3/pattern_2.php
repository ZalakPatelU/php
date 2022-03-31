<?php


for($i=5;$i>=1;$i--)
{  
    
    for($k=0;$k<=$i;$k++)
    {  
        echo " ";  
    }  
    $k--;
    for($j=0;$j<=(5-$k);$j++)
    {
        echo "*  ";
    }
    echo "<br>";  
}  
?>  