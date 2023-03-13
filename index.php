<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Back to the future</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>Date present :</h1>
    <?php
        $presentTime = new DateTime();
        echo $presentTime->format('F j Y, g:i a'); //mois jour année,
    ?>
    <h1>Date future : </h1>
    <?php
    $monthAleatoire = rand(0,12);
    $dayAleatoire = rand(0,30);
    $yearAleatoire = rand(0,100); //on ne peux pas faire un saut dans le futur de plus de 100

    $hourAleatoire = rand(0,24);
    $minuteAleatoire = rand(0,60);
    $dayAleatoire = rand(0,7);
    $hourAleatoire = rand(0,24);
    $minuteAleatoire = rand(0,60);

    //P1Y2M3D

    $date = 'P' . $yearAleatoire . 'Y' . $monthAleatoire . 'M' . $dayAleatoire . 'D' ;
    $time = 'PT' . $hourAleatoire . $minuteAleatoire . 'M';

    $destinationTime  = new DateTime();
    $destinationTime  = $destinationTime->add(new DateInterval ($date) );
    $destinationTime  = $destinationTime->add(new DateInterval ($time) );
    
    echo $destinationTime->format('F j Y, g:i a');
    ?>

    <h1>Difference : </h1>
    <?php
        $interval = $presentTime->diff($destinationTime);
        echo '<p>' . $interval->format('%y years, %m months, %d days, %h hours, %i minutes') . '</p>';
    ?>
    <h1>Nombre de litres à utiliser </h1>
    <?php
        $minutesTotal = $interval->days * 24 * 60 + $interval->h * 60 + $interval->i;
        $litres = floor($minutesTotal / 10000);
        echo '<p>Pour ce voyage il te faut ' . $litres . ' litres d\'essence.</p>';
        echo '<p> Vu le prix de l\'essence en ce moment bon courage ! 2€ le litres wshhhh ! 
              Ton petit voyage temporiel va te compter : ' . $litres*2 . '€ j\'espere que tu vas' .
              ' au moins que tu ne vas pas faire le crevard et me rapporter un petit quelque chose <p>';
    ?>
</body>

</html>
