<!DOCTYPE html>
<html>
    <head>
        <title>Poros</title>
        <meta charset="UTF-8">
    </head>
    <body>
    <?php
       
       $zmones = [
        ['vardas' => 'Jonas', 'lytis' => 'V'],
        ['vardas' => 'Ona', 'lytis' => 'M'],
        ['vardas' => 'Petras', 'lytis' => 'V'],
        ['vardas' => 'Marytė', 'lytis' => 'M'],
        ['vardas' => 'Eglė', 'lytis' => 'M']
        ];

        var_dump($zmones);

        foreach($zmones as $value){
        
            if($value['lytis'] == 'V'){
                $man = $value['vardas'];
                      
            } else {
                continue;
            }

            foreach($zmones as $value){
                if($value['lytis'] == 'M'){
                    $woman = $value['vardas'];
                    
                    echo $man.' - '.$woman.'<br>';
                }
                
            }
            
        }    
       

    ?>
    </body>
</html>