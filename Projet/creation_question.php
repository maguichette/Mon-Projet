<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>page admin</title>
    <link rel="stylesheet" href="creation_question.css">
</head>
<body>
<div class="white-right" id="content" >
<div class="bord">
      <label for="" id="nombre">PARAMETRER VOTRE QUESTION</label>
      </div>
      <div class="bloc">
          <div class="areatext">
          <h2>Question</h2>
          <textarea name="" class="typearea" cols="30" rows="10"></textarea>
          </div>
          <div class="areatext1">
            <h2>Nbre de points</h2>
            <input type="number" class="numero">
          </div>
          <div class="areatext2">
              <h2>Type de réponse</h2>
              <select name="choix" class="select" id="">
                  <option value="choix multiple">choix multiple</option>
                  <option value="choix simple">choix simple</option>
                  <option value="type texte">type texte</option>
              </select>
             <a href="#"> <img src="Images/ic-ajout-réponse.png" alt=""></a>
      </div>
      <div class="numreponse">
          
              <h2>Réponse1</h2>
                <textarea name="" id="réponse" cols="30" rows="10"></textarea>
                <input type="radio" name="" class="radio">
                <input type="checkbox"  class="checkbox">
                <img src="Images/ic-supprimer.png" alt="">
                <button class="enregistrer">ENREGISTRER</button>
          </div>
      </div>
      </div>
</div>