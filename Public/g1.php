<div class="jumbotron">
<center>
<div id="bouton">
<div class="alert alert-warning" role="alert"><b>Objectif :</b>Cliquer le plus de fois sur le cercle</div> 
<button type="button" class="btn btn-primary" onclick="start()">Lancer l'exercice</button></div>
<div id="bip" class="display"></div>
<div id="next">
<form method="POST" action="?load=g2">
<input type="hidden" name="clicks" id="clicks" value=""></input>
<button type="submit" class="btn btn-warning">Valider et passer au suivant</button>
</div>
</form>
</center>
<script>
//la ligne suivante dit à jQuery d'attendre que la page soit complétement chargée
jQuery(document).ready(function() {
    //dès que la page est chargée, par défaut, on cache la div
    jQuery('#cercle').hide();
	jQuery('#next').hide();
});
</script>
<script>
var counter = 10;
var intervalId = null;
function action()
{
  clearInterval(intervalId);
  document.getElementById("bip").innerHTML = "TERMINE!";	
  $('#cercle').hide();
  $('#bouton').hide();
  $('#next').show();
}
function bip()
{
  document.getElementById("bip").innerHTML = counter + " secondes restantes";
  $('#cercle').show();
  counter--;
}
function start()
{
  intervalId = setInterval(bip, 1000);
  setTimeout(action, counter * 1000);
}	
</script>
<script type="text/javascript">
var clicks = 0;
function onClick() {
clicks += 1;
document.getElementById("clicks").value = clicks;
document.getElementById("clickss").innerHTML = clicks;
};
</script>
<center><div id="cercle" class="display"><img width="150px" height="150px" src="/Img/cercle.png" onClick="onClick()"></img></div></center>
<p>Score: <a id="clickss">0</a></p>
</div>
</body></html>

</div>
