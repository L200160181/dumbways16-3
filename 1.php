<?php
function count_handshake($v) {
    $i=0;
    $t=0;
    for($i;$i<$v;$i++){
        $t +=$i;
    }
   echo $t;
}
count_handshake(7);


?>