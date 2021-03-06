<?php
	
	session_start();
	
	if(!isset($_SESSION['zalogowany']))
	{
		header('Location: logowanie.php');
		exit(); //wyjscie z pliku
	}
		
?>

<!DOCTYPE html>
<html>
  <title>JBD Logistics</title>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue.css">
    <link href="/css/styles.css" rel="stylesheet" type="text/css">
  </head>
  <body>
  <?php 
  if ($_SESSION['zalogowany_D']==true)
  {
	  require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/sidebar_dyspozytor.php';
  }
  else if ($_SESSION['zalogowany_K']==true)
  {
	  require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/sidebar_kierowca.php';
  } 
   ?>
	  
		<div class="w3-main">
		<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/header.php'; ?>
		<div class="w3-container">
		<!-- content -->
            <script type="text/javascript">

            function zaznaczb(){
                document.forms.kalkulator.baga.checked = true;
                document.forms.kalkulator.kont.checked = false;
                    document.forms.kalkulator.tir.checked = false;
                document.images.baga.src ="img/b2.png";
                document.images.kont.src ="img/k1.png";
                    document.images.tir.src = "img/t1.png";
            }
                function zaznaczk(){
                document.forms.kalkulator.baga.checked = false;
                document.forms.kalkulator.kont.checked = true;
                    document.forms.kalkulator.tir.checked = false;
                document.images.baga.src ="img/b1.png";
                document.images.kont.src ="img/k2.png";
                    document.images.tir.src = "img/t1.png";
            }
                function zaznaczt(){
                document.forms.kalkulator.baga.checked = false;
                document.forms.kalkulator.kont.checked = false;
                document.forms.kalkulator.tir.checked = true;
                document.images.baga.src ="img/b1.png";
                document.images.kont.src ="img/k1.png";
                document.images.tir.src ="img/t2.png";
            }

                function zeruj(){
                window.document.getElementById("pole").innerHTML = '';
                }

            function licz(f)
            {
            var ludzie = parseFloat(f.ludzie.value);
            var km = Math.round(f.km.value.replace(",", "."), 1);
            var czas = parseFloat(f.czas.value);
            var pietra = parseFloat(f.pietra.value);
            var swynik = 0;
            if (f.km.value =="" || f.km.value.search(/^[0-9]*.[0-9]*$/)==-1 || f.km.value <0)
            {
            alert('Podaj poprawną liczbę kilometrów');
            f.km.focus();
            }
            //bagazowka
            else if (ludzie>1 && czas<1)
            {
            alert('W przypadku wybrania dodatkowych osób do pomocy minimalny czas postoju to 1h.');
            f.czas.focus();
            f.ludzie.focus();
            }
            else

            {if (f.auto[0].checked == true)
            {
            //do 3 km
            if (km<=3)
            {
            //bez pomocy
            if (ludzie==0)
            {
            swynik = Math.round((60+((czas-0.5)*50)), 1);
            window.document.getElementById("pole").innerHTML = 'Szacunkowa cena usługi to '+swynik+' zł netto, '+Math.round(swynik*1.23, 1)+' zł brutto.';
            }
            //z pomocą
            else{
            swynik = Math.round(60+(((50+pietra)*ludzie)*czas), 1);
            window.document.getElementById("pole").innerHTML = 'Szacunkowa cena usługi to '+swynik+' zł netto, '+Math.round(swynik*1.23, 1)+' zł brutto.';
            }
            }
            //powyzej 3 km
            else {
            //bez pomocy
            if (ludzie==0)
            {
            swynik = Math.round(((60+((km-3)*2.9))+((czas-0.5)*50)), 1);
            window.document.getElementById("pole").innerHTML = 'Szacunkowa cena usługi to '+swynik+' zł netto, '+Math.round(swynik*1.23, 1)+' zł brutto.';
            }
            else
            {
            //z pomocą
            swynik = Math.round((60+((km-3)*2.9))+(((50+pietra)*ludzie)*czas), 1);
            window.document.getElementById("pole").innerHTML = 'Szacunkowa cena usługi to '+swynik+' zł netto, '+Math.round(swynik*1.23, 1)+' zł brutto.';
            }
            }
            }
            //kontener
            else if (f.auto[1].checked == true)
            {
            //do 3 km
            if (km<=3)
            {
            //bez pomocy
            if (ludzie==0)
            {
            swynik = Math.round((70+((czas-0.5)*50)), 1);
            window.document.getElementById("pole").innerHTML = 'Szacunkowa cena usługi to '+swynik+' zł netto, '+Math.round(swynik*1.23, 1)+' zł brutto.';
            }
            else
            {
            //z pomocą
            swynik = Math.round(70+(((50+pietra)*ludzie)*czas), 1);
            window.document.getElementById("pole").innerHTML = 'Szacunkowa cena usługi to '+swynik+' zł netto, '+Math.round(swynik*1.23, 1)+' zł brutto.';
            }
            }
            //wiecej niz 3 km
            else
            {
            //bez pomocy
            if (ludzie==0)
            {
            swynik = Math.round(((70+((km-3)*3.3))+((czas-0.5)*50)), 1);
            window.document.getElementById("pole").innerHTML = 'Szacunkowa cena usługi to '+swynik+' zł netto, '+Math.round(swynik*1.23, 1)+' zł brutto.';
            }
            else
            {
            //z pomocą
            swynik = Math.round((70+((km-3)*3.3))+(((50+pietra)*ludzie)*czas), 1);
            window.document.getElementById("pole").innerHTML = 'Szacunkowa cena usługi to '+swynik+' zł netto, '+Math.round(swynik*1.23, 1)+' zł brutto.';
            }
            }
            }
            //tir
            else if (f.auto[2].checked == true)
            {
            //do 3 km
            if (km<=3)
            {
            //bez pomocy
            if (ludzie==0)
            {
            swynik = Math.round((80+((czas-0.5)*50)), 1);
            window.document.getElementById("pole").innerHTML = 'Szacunkowa cena usługi to '+swynik+' zł netto, '+Math.round(swynik*1.23, 1)+' zł brutto.';
            }
            else
            {
            //z pomocą
            swynik = Math.round(80+(((50+pietra)*ludzie)*czas), 1);
            window.document.getElementById("pole").innerHTML = 'Szacunkowa cena usługi to '+swynik+' zł netto, '+Math.round(swynik*1.23, 1)+' zł brutto.';
            }
            }
            //wiecej niz 3 km
            else
            {
            //bez pomocy
            if (ludzie==0)
            {
            swynik = Math.round(((80+((km-3)*5))+((czas-0.5)*50)), 1);
            window.document.getElementById("pole").innerHTML = 'Szacunkowa cena usługi to '+swynik+' zł netto, '+Math.round(swynik*1.23, 1)+' zł brutto.';
            }
            else
            {
            //z pomocą
            swynik = Math.round((80+((km-3)*5))+(((50+pietra)*ludzie)*czas), 1);
            window.document.getElementById("pole").innerHTML = 'Szacunkowa cena usługi to '+swynik+' zł netto, '+Math.round(swynik*1.23, 1)+' zł brutto.';
            }
            }
            }

            //nie wybrano auta
            else
            {
            alert('Proszę wybrać wielkość auta');
            }
            }}

            </script>
            <script src="http://code.jquery.com/jquery-latest.js"></script>

            <form action="" name="kalkulator" id="kalkulator" onsubmit="licz(this); return false">


            <h4> Wybierz ilość ludzi potrzebnych do załadunku: <br /> </h4>
            <select name="ludzie" id="ludzie" onchange="zeruj()">
            <option value=0 > Sam przewóz </option>
            <option value=1 > Kierowca aktywny </option>
            <option value=2 > Kierowca+1 </option>
            <option value=3 > Kierowca+2 </option>
            <option value=4 > Kierowca+3 </option>
            </select><br />
            <h4> Podaj długość trasy w km: <br /></h4>
            <input type="number" id="km" name="km" onchange="zeruj()" /><br />
            <h4> Podaj sumę pięter w budynkach (bez windy): <br /> </h4>
            <select  id="pietra" name="pietra" onchange="zeruj()">
            <option value=0> są windy/partery </option>
            <option value=0> łącznie 1 piętro </option>
            <option value=0> łącznie 2 piętra </option>
            <option value=10> łącznie 3 piętra </option>
            <option value=20> łącznie 4 piętra </option>
            <option value=20> łącznie 5 pięter </option>
            <option value=30> łącznie 6 pięter </option>
            <option value=30> łącznie 7 pięter </option>
            <option value=50> łącznie 8 pięter lub więcej </option><br /><br />
            </select><small></small>
            <h4> Podaj czas postoju wozu (łączny czas załadunku i rozładunku): <br /> </h4>
            <select id="czas" name="czas" onchange="zeruj()">
            <option value=0.5> Do 30 minut </option>
            <option value=1> 1h </option>
            <option value=1.5> 1,5h </option>
            <option value=2> 2h </option>
            <option value=2.5> 2,5h </option>
            <option value=3> 3h </option>
            <option value=3.5> 3,5h </option>
            <option value=4> 4h </option>
            <option value=4.5> 4,5h </option>
            <option value=5> 5h </option>
            <option value=5.5> 5,5h </option>
            <option value=6> 6h </option>
            </select> <br />
            <h4> Wybierz wielkość auta:<br /></h4>
            <input style="display: none;" type="radio" id="baga" name="auto" value="1" checked /> <button onclick="zaznaczb(); return false" onmouseup="zeruj()" class="w3-button w3-blue">BUS</button>
            <input style="display: none;" type="radio" id="kont" name="auto" value="2"/> <button onclick="zaznaczk(); return false" onmouseup="zeruj()" class="w3-button w3-blue">KONTENER</button>
            <input style="display: none;" type="radio" id="tir" name="auto" value="3"/> <button onclick="zaznaczt(); return false" onmouseup="zeruj()" class="w3-button w3-blue">TIR</button><br /><br /><br />
            <input style="display: none;"  class="oblicz" type="submit" value="    Oblicz    "/>
            </form>
            <h3 id="pole"></h3>
      <!-- content -->
      </div>
      <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php'; ?>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/js/bootbox.min.js"></script>
    <script src="/js/main.js"></script>
  </body>
</html>