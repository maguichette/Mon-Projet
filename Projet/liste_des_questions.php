
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>page admin</title>
    <link rel="stylesheet" href="liste_des_questions.css">
</head>
<body>
<div class="white-right" id="content" >
      <div class="bord">
      <label for="" id="nombre">Nbre de questions/jeu</label>
      <input type="number" class="number">
      <button type="submit" class="ok" name="btn" id="">OK</button>
      </div>
      <div class="bloc">
      <?php
$Tab_Json = json_decode(file_get_contents("question.json"), true);

//Voir l'existence de $_GET['page']
      if (isset($_GET['page'])) {
          $num_page = $_GET['page'];
      }else{
          $num_page=1;
      }

      $valeur__total = count( $Tab_Json);//taille du tableau qui a les questions
      $nbr_par_page = 5; //questions par pages à changer apres
      $nbr_pages = ceil($valeur__total / $nbr_par_page); //nbre de page
      $debut = ($num_page - 1) * $nbr_par_page;
      $fin = $debut + $nbr_par_page - 1;
      $Tab_Json = array_slice($Tab_Json, $debut,$nbr_par_page); //permet de scinder le tableau en parti à se documenter


foreach ($Tab_Json as $key => $value) {
            echo ($key),". ",$value['questions'],"</br>";
            if ($value['typreponse']=="simple") {
            foreach ($value['reponses']  as $val) {
                
                    echo "<input type='radio' name='radio_$key'/> ",$val['reponse'],"</br>";
                }
            }elseif ($value['typreponse']=="multiple") {
                foreach ($value['reponses']  as $val) {
                
                    echo "<input type='checkbox' name='check'/> ",$val['reponse'],"</br>";
                }
            }
            elseif ($value['typreponse']=="texte"){
                  
                    echo "<input type='texte' name='texte' readonly> </br>";
                }
            
            
   }

if ($num_page > 1){
    $precedent= $num_page - 1;
    echo '<a class="precedent"  href="QUIZ.php?section=list&page='.$precedent.'">PREVIOUS</a>';
}

if ($num_page != $nbr_pages){
    $suivant= $num_page + 1;
    echo '<a class="next" href="QUIZ.php?section=list&page='.$suivant.'">NEXT</a>';
}

?>
 </div>
</div>
</body>
</html>