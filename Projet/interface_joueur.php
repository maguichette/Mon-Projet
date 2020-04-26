<?php
session_start();
$avatar= $_SESSION['avatar'];
if (!isset($_SESSION['prenom'])){
    $_SESSION['msg']='Veuillez vous connecter d\'aboord';
    header('Location: qcm1.php');
    exit;
}
$json = file_get_contents('fichier.json');
$decode = json_decode($json, true);
$tabuser = [];
foreach ($decode as $value) {
    if ($value['role'] == "joueur") {
        $tab[] = $value;
    }
}
$columns = array_column($tab, "score");
array_multisort($columns, SORT_DESC, $tab);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="interface_joueur.css">
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<script>
    function cacher1() {
        document.getElementById('topscore').style.display = "block";
        document.getElementById('meilleurscore').style.display = "none";

    }

    function cacher2() {
        document.getElementById('topscore').style.display = "none";
        document.getElementById('meilleurscore').style.display = "block";

    }
</script>


<body onload="cacher1()">
    <div class="header">
        <div class="logo">
            <img src="Images/logo-QuizzSA.png" alt="">
        </div>

        <div class="header_title">
            <h3>Le plaisir de jouer</h3>
            <?php
            if (isset($_SESSION['message'])) { ?>
                <p id="msg" style="color: red"><?= $_SESSION['message'] ?></p>

            <?php
                unset($_SESSION['message']);
            }
            ?>

        </div>
    </div>
    <div class="background">
        <div class="background_header">
            <div class="image">

                <img src="<?= $avatar ?>" alt="">
            </div>
            <div class="prenom_nom"><?= $_SESSION['prenom'] ?> <br> <span class="nom"><?= $_SESSION['nom'] ?></span></div>
            <div class="titre">
                <h2> BIENVENUE SUR LA PLATEFORME DE JEU DE QUIZZ <br> JOUER ET TESTER VOTRE NIVEAU DE CULTURE GENERAL </h2>

                <div class="bouton"> <a href="deconnexion.php"><button class="logout" type="submit">Déconnexion</button></a></div>

            </div>
            <div class="form">
                <div class="white">
                    <div class="right">
                        <div class="white-right" id="content">
                            <div class="question"></div>


                        </div>
                    </div>
                    <div class="top">
                        <div class="tab">
                            <!-- <button class="tablinks">Top Score</button> -->
                            <button class="tablinks" id="click1" onclick="cacher1()">TOP Score</button>
                            <button class="tablinks" onclick="cacher2();">Mes meilleurs score</button>

                            <div id="meilleurscore" class="tabcontent">
                            <?php
                                $json = file_get_contents('fichier.json');
                                $decode = json_decode($json, true);
                                $tabuser = [];
                                foreach ($decode as $value) {
                                    if ($value['role'] == "joueur") {
                                        $tabuser[] = $value;
                                    }
                                }
                                $columns = array_column($tab, "score");
                                array_multisort($columns, SORT_DESC, $tab);
                                echo "<table>";
                                echo '<td><strong> Nom </stong></td><td><strong> Prenom </stong></td><td><strong> Score </stong></td>';
                               if (($_SESSION['prenom'])==$value['prenom']&&($_SESSION['nom'])==$value['nom']){
                                echo  $value=$score;
                                    echo "<tr>";
                                    echo '<td>' . $tab[$i]['prenom'] . '</td>';
                                    echo '<td>' . $tab[$i]['nom'] . '</td>';
                                    echo '<td>' . $tab[$i]['score'] . ' pts</td>';
                                    echo '</tr>';
                                    
                                    
                                }
                                echo "</table>"
                                ?>
                            </div>

                            <div id="topscore" class="tabcontent">
                                <?php
                                $json = file_get_contents('fichier.json');
                                $decode = json_decode($json, true);
                                $tabuser = [];
                                foreach ($decode as $value) {
                                    if ($value['role'] == "joueur") {
                                        $tabuser[] = $value;
                                    }
                                }
                                $columns = array_column($tab, "score");
                                array_multisort($columns, SORT_DESC, $tab);
                                echo "<table>";
                                echo '<td><strong> Nom </stong></td><td><strong> Prenom </stong></td><td><strong> Score </stong></td>';
                               for($i=0;$i<5;$i++) {
                                    echo "<tr>";
                                    echo '<td>' . $tab[$i]['prenom'] . '</td>';
                                    echo '<td>' . $tab[$i]['nom'] . '</td>';
                                    echo '<td>' . $tab[$i]['score'] . ' pts</td>';
                                    echo '</tr>';
                                    
                                    
                                }
                                echo "</table>"
                                ?>
                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
   
</body>

</html>