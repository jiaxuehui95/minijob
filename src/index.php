<?php
require_once(__DIR__ . '/../vendor/autoload.php');
use Something\Example;

// test the autoloader
$example = new Example();

// test the database connection
try {
    $user = 'tp_web';
    $pass = 'tp_web';
    $dbh = new PDO('pgsql:host=localhost;dbname=tp_web', $user, $pass);

    $tableRows = [];
    foreach ($dbh->query("select distinct d_client,texte from demande;") as $row) {
        $arr[] = [
            'd_client' => $row['d_client'],
            'texte' => $row['texte']
        ];
    }
    $dbh = null;
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>
<html>
<head>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <h3><?php echo 'list de demainde' . PHP_VERSION; ?></h3>

    <table class="table table-bordered table-hover table-striped">
        <?php foreach ($arr as $row) : ?>
            <tr>
                <td><?php echo "client: ".$row['d_client']." , dscription: ".$row['texte'] ?></td>
            </tr>
        <?php endforeach; ?>
        <?php
        
        $url = "accueil.php";
                Header("Location: $url");
        
        ?>
    </table>
    <a href="accueil.php">accueil</accueil></a>
     <a href="pagePerso2.php">pagePerso</accueil></a>
</div>
</body>
</html>