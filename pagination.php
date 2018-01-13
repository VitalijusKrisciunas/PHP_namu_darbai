<?php
    function pagination($per_page, $pagenum, $sql, $conn) {

     echo '<form class="pslform">';
        $result = $conn->query($sql);
        $maxpage = ceil($result->num_rows / $per_page);
               
        if($_GET['page'] > 0){ 
            echo '<button type="submit" name="page" value="'.($pagenum - 1).'">'.'Atgal'.'</button>';
        }
        
        for ($i = 0; $i < $maxpage; $i++) {
            echo '<button type="submit" name="page" value="'.$i.'">'.($i+1).'</button>';
        }

        if($_GET['page'] < $maxpage - 1){    
            echo '<button type="submit" name="page" value="'.($pagenum + 1).'">'.'Pirmyn'.'</button>';
        }
        echo '</form>';
    }
?>