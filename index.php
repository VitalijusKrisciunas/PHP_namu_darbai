<?php

require_once 'db.php';
//require_once 'lentele.php';

$conn = connectDB();

// irasu skaicius
$per_page=10;

// puslapio numerio gavimas
if (isset($_GET['page'])) $page=($_GET['page']-1); else $page=0;

// pirma LIMIT reiksme
$start=abs($page*$per_page);

// sudarome uzklausa
// kintamaji $start naudojame kaip irasu numeratoriu.
$q="SELECT *, distance/time * 3.6 AS speed FROM `radars` 
ORDER BY speed DESC LIMIT $start,$per_page";
$res=$conn->query($q);
while($row=mysqli_fetch_array($res)) {
  echo ++$start.". ".$row['number'].' '.round($row['speed'],1)."<br>\n";
}

// isvedame nuorodas i puslapius:
$q="SELECT count(*) FROM `radars`";
$res=$conn->query($q);
$row=mysqli_fetch_row($res);
$total_rows=$row[0];

$num_pages=ceil($total_rows/$per_page);

if ($page >= 1) {
  $i = $_GET['page'] - 1;
  echo '<a href="'.$_SERVER['PHP_SELF'].'?page='.$i.'">'.'Atgal '.'</a>';
}

// puslapiu skaiciu isvedimas
/* for($i=1;$i<=$num_pages;$i++) {
  if ($i-1 == $page) {
    echo $i." ";
  } else {
    echo '<a href="'.$_SERVER['PHP_SELF'].'?page='.$i.'">'.$i."</a> ";
  }
} */

if ($page < $num_pages - 1) {
  $i = $_GET['page'] + 1;
  echo '<a href="'.$_SERVER['PHP_SELF'].'?page='.$i.'">'.' Pirmyn'.'</a>';
}

$conn->close();