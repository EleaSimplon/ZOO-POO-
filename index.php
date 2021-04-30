<?php

    include __DIR__.'/Process/autoload.php';

    require_once(__DIR__."/Process/connexionBDD.php");


    include 'View/header.php';

?>

<!-- ***** BODY *****  -->

<?php

   $birdcage = new BirdCage([
        'type' => "birdcage",
        'surface' => 20,
        'max' => 6,
        'summit' => true,
        'height' => 50,
        'id_zoo' => 1,
   ]);

   $aqua = new Aqua([
        'type' => "aqua",
        'surface' => 20,
        'max' => 6,
        'salinity' => 10,
        'deep' => 50,
        'id_zoo' => 1,
    ]);

    $fish = new Fish([
        'nameSpecies' => "Truite",
        'sex' => 'female',
        'age' => 6,
        'weight' => 10,
        'size' => 50,
    ]);

    $eagle = new Eagle([
        'nameSpecies' => "Faucon",
        'sex' => 'male',
        'age' => 7,
        'weight' => 20,
        'size' => 120,
    ]);

    $worker = new Worker([
        'name' => "Prune",
        'sex' => 'woman',
        'age' => 36,
    ]);

    $zoo = new Zoo([
        'name' => "ZooLand",
        'worker' => $worker,

    ]);

    echo '<br>';

    $zooManager = new ZooManager($pdo);
    $workerManager = new WorkerManager($pdo);
    $enclosManager = new EnclosureManager($pdo);
    $animalManager = new AnimalManager($pdo);

    $zooManager->add($zoo);
    $workerManager->add($worker, $zoo);
    $enclosManager->add($birdcage, $zoo);
    $enclosManager->add($aqua, $zoo);
    $animalManager->add($fish, $aqua);
    $animalManager->add($eagle, $birdcage);
?>


<!-- ***** FOOTER *****  -->

<?php

    include 'View/footer.php';

?>