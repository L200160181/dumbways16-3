<? php
$a=array(4,9,10,13,21);
for ($x = 0; $x <= 4; $x++) {
  $p=min($a);
  $q=max($a);
  $max = array_sum($a) - $p;
  $min = array_sum($a) - $q;
  $y = array_sum($a) - $a[$x];
  echo "angka $a[$x] =  $y</br>";
}
echo "</br>angka terbesar $max dan terkecil $min";
?>
