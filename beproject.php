<?php

include "queen.php";
include "worker.php";
include "drone.php";

session_start();

class Bee
{
    public $hitpoints;
    public $lifespan;
    public $type;

    public function hit()
    {
    }

    public function getlifespan()
    {
        return $this->lifespan;
    }

    public function gettype()
    {
        return $this->type;
    }
}

if (isset($_GET['submit'])) {
} else {
    $colony = [
        new Queen(),
        new Worker(), new Worker(), new Worker(), new Worker(), new Worker(),
        new Drone(), new Drone(), new Drone(), new Drone(), new Drone(), new Drone(), new Drone(), new Drone(), new Drone()
    ];
    $_SESSION['colony'] = $colony;
}

function hit()
{
    $colony = $_SESSION['colony'];

    $index = array_rand($colony, 1);
    $currentlifespan = $colony[$index];
    $currentlifespan->hit();

    if ($colony[$index]->getlifespan() <= 0) {
        unset($colony[$index]);
    }
    if ($_SESSION['colony'][0]->lifespan <= 0) {
        unset($_SESSION['colony']);
        echo   "<h1>Queen is dead</h1>";
    }
    if (!$colony) {
        echo "Game over";
        exit;
    }

    foreach ($colony as $value) {
        echo "<div>";
        echo $value->gettype();
        echo " has ";
        echo $value->getlifespan();
    }


    $_SESSION['colony'] = $colony;
}
?>

<form action="" method="get">
    <input type="submit" value="Kill a be" name="submit" style="background-color: yellow; margin-left:45%;  width:200px;" />
</form>

<?php

if (isset($_GET['submit'])) {
} else {

    $colony = $_SESSION['colony'];
    foreach ($colony as $value) {

        echo "<div>";
        echo $value->gettype();
        echo " has ";
        echo $value->getlifespan();
    }
}

if (isset($_GET['submit'])) {
    hit();
}
?>