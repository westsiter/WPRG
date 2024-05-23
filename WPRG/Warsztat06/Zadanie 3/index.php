<?php 

function multiply(&$mat1, &$mat2, &$res) 
{ 
    $N = 4; 
    for ($i = 0; $i < $N; $i++) 
    { 
        for ($j = 0; $j < $N; $j++) 
        { 
            $res[$i][$j] = 0; 
            for ($k = 0; $k < $N; $k++) 
                $res[$i][$j] += $mat1[$i][$k] *  
                                $mat2[$k][$j]; 
        } 
    } 
} 
  
$mat1 = array(array(8, 1, 1, 1), 
              array(2, 2, 2, 2), 
              array(3, 3, 3, 3), 
              array(4, 4, 4, 4)); 
  
$mat2 = array(array(1, 1, 1, 1), 
              array(2, 2, 2, 2), 
              array(3, 3, 3, 3), 
              array(4, 4, 4, 4)); 
  
multiply($mat1, $mat2, $res); 
$N = 4; 
echo ("Wynik mnożenia:  <pre>
"); 
for ($i = 0; $i < $N; $i++) 
{ 
    for ($j = 0; $j < $N; $j++) 
    { 
        echo ($res[$i][$j]); 
        echo " "; 
    } 
    echo "<pre>"; 
} 
?> 