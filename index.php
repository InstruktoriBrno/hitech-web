<?php
  include ("db.php");

  if (isset($_POST["formular"]) && $_POST["formular"] == "Odeslat")
  {
    if ((empty($_POST["name"]))||(empty($_POST["mail"])))
      $report = "<span id=\"chyba\">CHYBA! Některé z polí nebylo vyplněno!</span><br /><br />";
    else
    {
      $ulozeni = mysqli_query($pspojeni, "INSERT INTO is_hitech (id,name,mail,telefon,vek,ocekavani,rok,zkmapa,zkradio,zkgps,gps,auto,odkud,strava,zdravo,tricko,vel,damske,barva) VALUES ('','${_POST["name"]}', '${_POST["mail"]}', '${_POST["telefon"]}', '${_POST["vek"]}', '${_POST["ocekavani"]}', '${_POST["rok"]}', '${_POST["zkmapa"]}', '${_POST["zkradio"]}', '${_POST["zkgps"]}', '${_POST["gps"]}', '${_POST["auto"]}', '${_POST["odkud"]}', '${_POST["strava"]}', '${_POST["zdravo"]}', '${_POST["tricko"]}', '${_POST["vel"]}', '${_POST["damske"]}', '${_POST["barva"]}')");
/*
      $soubor_name = ($_FILES["foto"]["name"]);
      $soubor = ($_FILES["foto"]["tmp_name"]);


      if ($soubor_name!="")
      {
        if (move_uploaded_file($soubor, "./fotky/$_POST[name].jpg"))
        {
          chmod ("./fotky/$soubor_name", 0646);
  //        echo "<b>Soubor $soubor_name byl nahran na server</b><BR>";
        }
        else
        {
          echo "<b>Chyba - soubor nebyl nahran</b><BR>";
        }
      }   */
    $report = "<span id=\"ok\">Přihlášení bylo úspěšné.</span><br /><br />";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv="x-ua-compatible" content="IE=9" /><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HiTech 2018</title>
    <meta name="description" content="Víkend zaměřený na orientaci a pohyb v terénu.">
    <meta name="keywords" content="orientace, mapa, buzola, vysilacky, OB">
    <meta name="author" content="">

    <!-- Favicons
    ================================================== -->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="img/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="img/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="img/apple-touch-icon-114x114.png">

    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css"  href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome/css/font-awesome.css">

    <!-- Slider
    ================================================== -->
    <link href="css/owl.carousel.css" rel="stylesheet" media="screen">
    <link href="css/owl.theme.css" rel="stylesheet" media="screen">

    <!-- Stylesheet
    ================================================== -->
    <link rel="stylesheet" type="text/css"  href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/responsive.css">

    <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,700,300,600,800,400' rel='stylesheet' type='text/css'>

    <script type="text/javascript" src="js/modernizr.custom.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <!-- Navigation
    ==========================================-->
    <nav id="tf-menu" class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">HiTech</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#tf-home" class="page-scroll">O akci</a></li>
            <li><a href="#tf-about" class="page-scroll">Praktické info</a></li>
            <li><a href="#tf-team" class="page-scroll">Přihláška</a></li>
            <li><a href="#tf-services" class="page-scroll">Seznam přihlášených</a></li>
            <li><a href="#tf-clients" class="page-scroll">Kontakt</a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>

    <!-- Home Page
    ==========================================-->
    <div id="tf-home" class="text-center">
        <div class="overlay">
            <div class="content">
                <p class="lead">Chceš zažít zajímavé aktivity s využitím OB, ROB, GPS či PMR?<br />Baví tě orientační běh?</p>
                <h1>Pojeď na <span class="color">HiTech</span> !<br />20. - 22. 4. 2018</h1>
                <p class="intro">
                <br /><br />
                  ... orientace, bloudění, mapa, tajná cesta, buzola, Severka, GPS, světlo, tma, čelovka, vybité baterky, <br />špatný signál, louč, akumulátory, karbid, nebezpečná operace, podezřelá zásilka, radiostanice, směrová anténa, <br />odraz v údolí, liška, stěhovaví ptáci, oči ve tmě, běh, plížení, hrubá síla, dobrý nápad, dostatek jídla, fajn parta, trocha spánku, Instruktoři...</p>
                <a href="#tf-about" class="fa fa-angle-down page-scroll"></a>
            </div>
        </div>
    </div>

    <!-- Info
    ==========================================-->
    <div id="tf-about">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="img/02b.jpg" class="img-responsive">
                </div>
                <div class="col-md-6">
                    <div class="about-text">
                        <div class="section-title">
                            <h2><strong>Co je to HiTech</strong></h2>
                            <hr>
                            <div class="clearfix"></div>
                        </div>
                        <p class="intro">
                          Projekt HiTech se skládá ze třech víkendových akcí - HiTech, HiTech+ a HiTech Z. Každý rok na jaře pořádáme některý z těchto HiTechů.<br />
                          <br />
                          <strong>HiTech</strong><br />
                          HiTech vznikl v roce 1998. Motivaci bylo seznámit a procvičit účastníky, zejména z řad instruktorů brno, v používáním technických zařízení (hlavně mapy, buzoly a radiostanic) při organizací programu v terénu. Z vikendovky se stala akce tradiční, později k tématům přibyla práce s GPS. HiTech nepredpokládá žádné předchozí znalosti. Účastníci se vše naučí, vyzkouší a procvičí od začátku. Klasických přednášek je minimum, vetšina programů se odehrává venku, formou tréningu, závodu a her.<br />
                          <br />
                          Program akce se postupně vylepšuje, ale jeho základ zůstává stejný. Nemá tedy velký smysl jezdit na akci opakovaně. Z tohoto důvodu vznik v roce 2011 HiTech+.<br />
                          <br />
                          <strong>HiTech+</strong><br />
                          Hitech+ navazuje na témata HiTechu, jeho cílem je vyzkoušet si limity práce s technikou. Na jak velkou vzdálenost se dovolám s vysílačkou? Jak přesně zaměřím vysílač?, jak rychle, jak moc věcí současně, ...? Pro účast není podmínkou mít absolvovaný základní HiTech. Stačí úplně základní znalost práce s mapou.<br />
                          <br />
                          <strong>HiTech Z</strong><br />
                          Hitech Z je sérií závodů a her, zpravidla netradičních, které využívají techniku (orientační běh, radiový orientační běh, práce s vysílačkami, GPS ap.)<br />
                        </p>
                        <br /><br />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <img src="img/02f.jpg" class="img-responsive">
                </div>
                <div class="col-md-6">
                    <div class="about-text">

                        <div class="section-title">
                            <h2><strong>Důležité termíny</strong></h2>
                            <hr>
                            <div class="clearfix"></div>
                        </div>
                        <ul class="about-list">
                            <li>
                                <span class="fa fa-bullseye"></span>
                                <strong>St 28. 2. 2018</strong> - poslední termín pro odeslání přihlášky.
                            </li>
                            <li>
                                <span class="fa fa-bullseye"></span>
                                <strong>St 14. 3. 2018</strong> - poslední termín pro zaplacení
                            </li>
                            <li>
                                <span class="fa fa-bullseye"></span>
                                <strong>Čt 15. 3. 2018</strong> - oslovení náhradníků
                            </li>
                            <li>
                                <span class="fa fa-bullseye"></span>
                                <strong>Pá 20. 4. 2018</strong> v 18:00 v blízkosti Poličky - začátek HiTech (předpokládaný odjezd autem z Brna kolem 16. hod.)
                            </li>
                        </ul>
                        <br /><br />
                        <div class="section-title">
                            <h2><strong>Cena akce</strong></h2>
                            <hr>
                            <div class="clearfix"></div>
                        </div>
                        <p class="intro">Cena akce je <strong>990,- Kč</strong> a zahrnuje ubytování, stravu a nezbytné náklady na techniku, zařízení a dobré počasí.</p>
                        <br /><br />
                        <div class="section-title">
                            <h2><strong>Místo konání a strava</strong></h2>
                            <hr>
                            <div class="clearfix"></div>
                            </div>
                        <p class="intro">Vysočina. Spát se bude ve vlastním spacáku. Veškerou stravu zajišťují organizátoři.</p>
                        <br /><br />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <img src="img/02d.jpg" class="img-responsive">
                </div>
                <div class="col-md-6">
                    <div class="about-text">
                        <div class="section-title">
                            <h2><strong>Požadavky na účastníky</strong></h2>
                            <hr>
                            <div class="clearfix"></div>
                        </div>
                        <p class="intro">Podmínkou účasti je věk alespoň 18 let.<br />
          Přednost mají účastníci, kteří na HiTech jedou poprvé.</p>
                        <br /><br />
                        <div class="section-title">
                            <h2><strong>Doprava</strong></h2>
                            <hr>
                            <div class="clearfix"></div>
                        </div>
                        <p class="intro">Vzhledem ke špatné dopravní dostupnosti základny (vlak, autobus) je výhodné, aby se účastníci již před odjezdem domluvili na dopravě na akci auty.<br /><br />
V seznamu přihlášených bude označeno, kdo jede na akci autem a také kdo jede odkud. Před akcí vám v případě potřeby zprostředkujeme kontakty na řidiče.<br /><br />
<br /><br /><br />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <img src="img/02e.jpg" class="img-responsive">
                </div>
                <div class="col-md-6">
                    <div class="about-text">
                        <div class="section-title">
                            <h2><strong>Potřebné vybavení</strong></h2>
                            <hr>
                            <div class="clearfix"></div>
                        </div>
                        <h4>Nezbytné vybavení každého účastníka</h4>
                        <ul class="about-list">
                            <li>
                                <span class="fa fa-bullseye"></span>
                                spacák - raději teplejší
                            </li>
                            <li>
                                <span class="fa fa-bullseye"></span>
                                ešus + lžíce
                            </li>
                            <li>
                                <span class="fa fa-bullseye"></span>
                                oblečení a obutí do terénu - je třeba počítat s delším pobytem venku.
                            </li>
                            <li>
                                <span class="fa fa-bullseye"></span>
                                boty vhodné k běháni v terénu
                            </li>
                            <li>
                                <span class="fa fa-bullseye"></span>
                                něco na převlečení pro případ deště
                            </li>
                            <li>
                                <span class="fa fa-bullseye"></span>
                                přezůvky do místnosti
                            </li>
                            <li>
                                <span class="fa fa-bullseye"></span>
                                buzola - zkus ji sehnat, kupovat ji nemusíš
                            </li>
                            <li>
                                <span class="fa fa-bullseye"></span>
                                baterka funkční - svítící alespoň 10 hodin
                            </li>
                            <li>
                                <span class="fa fa-bullseye"></span>
                                tužka, papír, blok, podložka A4 na psaní v terénu
                            </li>
                            <li>
                                <span class="fa fa-bullseye"></span>
                                PET láhev nebo termoska na pití
                            </li>
                            <li>
                                <span class="fa fa-bullseye"></span>
                                malý batůžek na věci do terénu
                            </li>
                            <li>
                                <span class="fa fa-bullseye"></span>
                                zápalky/zapalovač
                            </li>
                            <li>
                                <span class="fa fa-bullseye"></span>
                                hodinky
                            </li>
                            <li>
                                <span class="fa fa-bullseye"></span>
                                mikrotužka 0,5mm
                            </li>
                            <li>
                                <span class="fa fa-bullseye"></span>
                                tenký červený fix (lihový, vodou nesmývatelný, permanent) - např. <A HREF="http://www.centropen.cz/katalog-produktu/pro-kancelar/13-3-ohp--pro-zpetnou-projekci/41-ohp-permanent" target="_blank">Centropen&nbsp;2636&nbsp;OHP PERMANENT</A>
                            </li>
                        </ul>
                        <br />
                        <h4>Doporučené vybavení účastníka</h4>
                        <ul class="about-list">
                            <li>
                                <span class="fa fa-bullseye"></span>
                                pravítko 20-30 cm
                            </li>
                            <li>
                                <span class="fa fa-bullseye"></span>
                                kalkulačka
                            </li>
                            <li>
                                <span class="fa fa-bullseye"></span>
                                GPS - (kdo má)
                            </li>
                            <li>
                                <span class="fa fa-bullseye"></span>
                                osobní lékárnička
                            </li>
                        </ul>
                        <br />
                        <p class="intro">Definitivní seznam vybavení spolu s dalšími informacemi obdrží všichni zaplacení účastníci včas před akcí.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Prihlaska
    ==========================================-->
    <div id="tf-team" class="text-center">
        <div class="overlay">
            <div class="container">
                <div class="section-title center">
                    <h2><strong>Přihláška</strong></h2>
                    <br />Přihlašování na HiTech probíhá prostřednictvím této stránky. Ti, kteří se tímto formulářem přihlásí mezi prvními 32, mohou uhradit účastnický poplatek. Zájemci přihlášení přes počet se stávají náhradníky. Pokud od přihlášených účastníků neobdržíme na účet organizátorů účastnický poplatek do stanoveného termínu, budou jejich místa nabídnuta náhradníkům.
                    <div class="line">
                        <hr>
                    </div>
                </div>

                <form action="index.php#tf-services" method="post" ENCTYPE="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="jmeno">Jméno a příjmení</label>
                                <input type="text" class="form-control" id="jmeno" name="name" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="vek">Věk</label>
                                <input type="texy" class="form-control" id="vek" name="vek" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">E-mail</label>
                                <input type="email" class="form-control" id="email" name="mail" placeholder="@">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="telefon">Telefonní číslo</label>
                                <input type="text" class="form-control" id="telefon" name="telefon" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ocekavani">Co od HiTechu očekáváš?</label>
                        <textarea class="form-control" id="ocekavani" name="ocekavani" rows="2"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="rok">Byl/a jsi už někdy na HiTechu?</label>
                        <textarea class="form-control" id="rok" name="rok" rows="1"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="rok">Popiš svoje zkušenosti s orientací a prací s mapou a buzolou:</label>
                        <textarea class="form-control" id="zkmapa" name="zkmapa" rows="1"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="rok">Popiš svoje zkušenosti s použitím radiostanic:</label>
                        <textarea class="form-control" id="zkradio" name="zkradio" rows="1"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="rok">Popiš svoje zkušenosti s navigačním systémem GPS:</label>
                        <textarea class="form-control" id="zkgps" name="zkgps" rows="1"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="gps">Vlastníš GPS, resp. můžeš si ji půjčit a přivézt na HiTech? Pokud ano, tak jakou?</label>
                        <textarea class="form-control" id="gps" name="gps" rows="1"></textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="auto">Vlastníš auto, resp. můžeš s ním na HiTech přijet?</label>
                                <select class="form-control" id="auto" name="auto" placeholder="@">
                                    <option value="1">Ano
                                    <option value="0" selected>Ne
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="odkud">Odkud na HiTech pojedeš?</label>
                                <input type="text" class="form-control" id="odkud" name="odkud" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="strava">Máš nějaká stravovací omezení? (např.: vegetarianství, alergie apod.)</label>
                        <textarea class="form-control" id="strava" name="strava" rows="2"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="zdravo">Máš nějaká zdravotní omezení?</label>
                        <textarea class="form-control" id="zdravo" name="zdravo" rows="2"></textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="jmeno">V případě, že se HiTechu zúčastníš, měl bys zájem o tričko s logem za příplatek <strong>150Kč</strong>?</label>
                                <select class="btn form-control" id="tricko" name="tricko" placeholder="">
						                        <option value="0">Ne
						                        <option value="1">Ano
						                    </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="vel"><br />Pokud ano, tak jakou velikost?</label>
                                <select class="btn form-control" id="vel" name="vel" placeholder="">
                        						<option value="L"> L
                        						<option value="S"> S
                        						<option value="M"> M
                        						<option value="XL"> XL
                        						<option value="XXL"> XXL
						                    </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="barva"><br />A jakou barvu?</label>
                                <select class="btn form-control" id="barva" name="barva" placeholder="">
                        						<option value="C"> Černá
                        						<option value="M"> Modrá
                        						<option value="Z"> Zelená
                    						</select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="damske"><br />Dámské/Pánské</label>
                                <select class="btn form-control" id="damske" name="damske" placeholder="">
						                        <option value="0">Pánské
						                        <option value="1">Dámské
						                    </select>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn tf-btn btn-default" name="formular" value="Odeslat">Odeslat</button>
                </form>

            </div>
        </div>
    </div>

    <!-- Seznam prihlasenych
    ==========================================-->
    <div id="tf-services">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="img/05.jpg" class="img-responsive">
                </div>
                <div class="col-md-6">
                    <div class="about-text">
                        <div class="section-title">
                            <h2><strong>Seznam přihlášených</strong></h2>
                            <hr>
                            <div class="clearfix"></div>
                        </div>
                        <p class="intro">
<?php
			  if (isset($report)) {
				  echo "$report";
			  }
                          $res = mysqli_query($pspojeni, "SELECT id,name,auto,odkud FROM is_hitech WHERE status>0 AND status<5 ORDER BY id");
			  $poradi = 0;
                          while ($r = mysqli_fetch_array($res))
                          {
                            $poradi=$poradi+1;
                            if ($poradi == 33)
                            	echo "<hr>";

                            if (strlen($poradi) == 1)
                              $poradi = "0".$poradi;

                            if ($r["auto"] == 1)
                            	$a = ". Na akci bere auto.";
                            else
                            	$a = "";

                            if ($r["auto"]) echo "<span class=\"auto\">";
              							echo "$poradi. ${r["name"]} (${r["odkud"]}$a)<br />";
              							if ($r["auto"]) echo "</span>";
                        	}

                        	echo "<br /><div class=\"section-title\">
                                  <h2><strong>Náhradníci</strong></h2>
                                  <hr>
                                  <div class=\"clearfix\"></div>
                                </div>
                                <p class=\"intro\">
                          ";
                        	echo "<i>Seznam náhradníků. Budou přijati v případě, že se odhlásí někdo z již přihlášených lidí</i>.<br /><br />";
                        	$res = mysqli_query($pspojeni,"SELECT id,name,auto,odkud FROM is_hitech WHERE status=5 ORDER BY id");
                          while ($r = mysqli_fetch_array($res))
                          {
                            $poradi=$poradi+1;
                            if (strlen($poradi) == 1)
                              $poradi = "0".$poradi;

                            if ($r["auto"] == 1)
                            	$a = ". Na akci bere auto.";
                            else
                            	$a = "";

                            if ($r["auto"]) echo "<span class=\"auto\">";
              							echo "$poradi. ${r["name"]} (${r["odkud"]}$a)<br />";
              							if ($r["auto"]) echo "</span>";
                        	}

?>

                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tym/kontakt
    ==========================================-->
    <div id="tf-clients" class="text-center">
        <div class="overlay">
            <div class="container">

                <div class="section-title center">
                    <h2><strong>Tým a kontakt</strong></h2>
                    <div class="line">
                        <hr>
                    </div>
                </div>

                <p class="intro">Vaše případné dotazy ráda zodpoví Lenka:<br />lenka.raudenska@gmail.com<br />
                <br />
                <p class="intro">Teší se na vás celý organizátorský tým ve složení:<br />
                <br />
                Petr Jedla Jedlička<br />
Jiří Kiwi Mareček<br />
Honza Kořínek<br />
Martin Márty Popelka<br />
Petr Březouch Březina<br />
Bohdan Růžička<br />
Petr Matula<br />
Petr Ladin Ženožička<br />
Lenka Raudenská<br />
Tom Látal</p>
<br /><br /><br />
<p>
 <img src="img/lcr.png">&emsp;Konání akce umožnil podnik Lesy České republiky, s.p.
</p>
            </div>
        </div>
    </div>




    <nav id="footer">
        <div class="container">
            <div class="pull-left fnav">
                <p>ALL RIGHTS RESERVED. COPYRIGHT © 2014. Designed by <a href="https://dribbble.com/shots/1817781--FREEBIE-Spirit8-Digital-agency-one-page-template">Robert Berki</a> and Coded by <a href="https://dribbble.com/jennpereira">Jenn Pereira</a></p>
            </div>
            <div class="pull-right fnav">
                  <ul class="footer-social">
                    <li><a target="_bank" href="https://www.facebook.com/instruktori.brno"><i class="fa fa-facebook"></i></a></li>
                    <li><a target="_bank" href="http://www.instruktori.cz">Instruktoři Brno</a></li>
 <!--                   <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>                                       -->
                </ul>

            </div>
        </div>
    </nav>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery.1.11.1.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/SmoothScroll.js"></script>
    <script type="text/javascript" src="js/jquery.isotope.js"></script>

    <script src="js/owl.carousel.js"></script>

    <!-- Javascripts
    ================================================== -->
    <script type="text/javascript" src="js/main.js"></script>

  </body>
</html>
