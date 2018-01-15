<?php
    function pagination($per_page, $pagenum, $sql, $conn) {

     echo '<form class="pslform">';
        $result = $conn->query($sql);
        $maxpage = ceil($result->num_rows / $per_page);
               
        if($_GET['page'] > 1){ 
            echo '<button type="submit" name="page" value="'.($pagenum - 1).'">'.'Atgal'.'</button>';
        }
        
        if ($maxpage == 1) {} else{
            for ($i = 1; $i <= $maxpage; $i++) {
                if($_GET['page'] == $i){
                    echo '<button disabled style="background-color:aqua;border:1px solid grey" type="submit" name="page" value="'.$i.'">'.$i.'</button>';
                } else {
                echo '<button type="submit" name="page" value="'.$i.'">'.$i.'</button>';
                }
            }
        }

        if($_GET['page'] < $maxpage){    
            echo '<button type="submit" name="page" value="'.($pagenum + 1).'">'.'Pirmyn'.'</button>';
        }
        echo '</form>';
    }
?>