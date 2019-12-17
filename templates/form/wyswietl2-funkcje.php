<?php
function tabelka($TAB) {
?>
<table>
<tr><th>Nazwa</th><th>Wartość</th></tr>
<?php
if( isset($TAB) ) {
  reset($TAB);
  while( list( $nazwa, $wartosc ) = each( $TAB ) )
    echo "<tr><td>".$nazwa."</td><td>".$wartosc."</td></tr>\n";
}
?>
</table>
<?php
}
?>
