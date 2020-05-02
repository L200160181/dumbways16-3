<?php

function cetak_gambar($n){
	if($n%2 == 0) {
		echo"Bilangan Genap </br>";
		return 0;
	}
	$mid = ($n+1)/2;
	for($i=1;$i<=$n;$i++)
    {
        for($j=1;$j<=$n;$j++)
        {
           
            
            if($j==$n){
                echo"  *</br> ";
            }
            elseif($j==1){
            	echo"  *  ";
            }
            elseif($j==$n){
            	echo"  *</br> ";
            }
            elseif($i==1){
            	echo"  =  ";
            }
            
            elseif($i==$n){
            	echo"  *  ";
            }
            

            elseif($i!= $mid){
            	echo "  =  ";
            }
            elseif($i==$mid){
            	echo "   *   ";
            }


        }
    }
 
	
  

}
cetak_gambar(5);
?><!-- 