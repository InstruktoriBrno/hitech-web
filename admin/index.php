<?php
error_reporting(E_ALL ^ E_NOTICE);

include ("../db.php");
include ("auth.inc.php");

if(!isset($_SERVER['PHP_AUTH_USER']))
{
	Header("HTTP/1.0 401 Unauthorized");
	Header("WWW-authenticate: Basic realm=\"HiTech+ - administrace\"");
  echo "<h2>Access denied</h2>";
  exit;
}
else
{
 if (!($_SERVER['PHP_AUTH_USER']==$AUTH_USER AND $_SERVER['PHP_AUTH_PW']==$AUTH_PASS))
 {
	Header("HTTP/1.0 401 Unauthorized");
	Header("WWW-authenticate: Basic realm=\"HiTech+ - administrace\"");
  echo "<h2>Access denied</h2>";
  exit;
 }
}

function vs($id)
{
      if (strlen($id)==1)
        $zero = "0";
      else $zero = NULL;
  		$vs = "11800900".$zero.$id;

      return $vs;
}

if ($_POST["zmena"] == "Platba")
	MySQL_Query("UPDATE is_hitech SET status='2' WHERE id='$_POST[id]'");

if ($_POST["zmena"] == "Info OK")
	MySQL_Query("UPDATE is_hitech SET status='3' WHERE id='$_POST[id]'");

if ($_POST["zmena"] == "Nahradnik")
	MySQL_Query("UPDATE is_hitech SET status='5' WHERE id='$_POST[id]'");

if ($_POST["zmena"] == "Muze jet")
	MySQL_Query("UPDATE is_hitech SET status='1' WHERE id='$_POST[id]'");

if ($_POST["zmena"] == "Odhlásit")
	MySQL_Query("UPDATE is_hitech SET status='0' WHERE id='$_POST[id]'");


?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="generator" content="PSPad editor, www.pspad.com">
  <title>HiTech - Admin</title>
  <style>
    body {
      padding: 40px;
    }

    table, td, th {
			border: 1px dotted;
			border-collapse: collapse;
			padding: 1px 3px 1px 3px;
		}
  </style>

  </head>
  <body>
		<table>
			<tr>
			  <th></th>
				<th>jmeno</th>
        <th>VS</th>
				<th>e-mail</th>
				<th>telefon</th>
				<th>vek</th>
				<th>ocekavani</th>
        <th>HiTech</th>
				<th>zkusenosti mapa</th>
				<th>zkusenosti RDST</th>
				<th>zkusenosti GPS</th>
				<th>gps</th>
				<th>auto</th>
				<th>odkud</th>
				<th>strava</th>
				<th>zdravo</th>
				<th>tricko</th>
				<th>vel.</th>
				<th>barva</th>
        <th>damske</th>
				<th>time</th>
			</tr>
<?
	$statusy = array(0 => "odhlášení","přihlášení","zaplacení","last info potvrzeno","","náhradníci");

	for ($i=0;$i<=5;$i++)
	{
		echo "<tr><td align=center colspan=17><b>$statusy[$i]</b></td></tr>";
		$res = MySQL_Query("SELECT * FROM is_hitech WHERE status=$i ORDER BY id");
	  while ($r = MySQL_Fetch_Array($res))
		{
			if ($i>0)
				$num++;
			if (($i==2)||($i==3))
			  $num2++;
			echo "
				<tr>
					<td>
						<form action=\"index.php\" method=\"post\">
						<input name=\"id\" type=\"hidden\" value=\"$r[id]\">
			";
			if ($r[status]==1)
      {
				echo "<input name=\"zmena\" type=\"submit\" value=\"Platba\">";
        echo "<input name=\"zmena\" type=\"submit\" value=\"Nahradnik\">";
      }
			if ($r[status]==2)
				echo "<input name=\"zmena\" type=\"submit\" value=\"Info OK\">";
      if ($r[status]==5)
				echo "<input name=\"zmena\" type=\"submit\" value=\"Muze jet\">";
			if ($r[status]>0)
				echo "<input name=\"zmena\" type=\"submit\" value=\"Odhlásit\">";
			echo "
				</form>
				</td>
				<td>$r[name]</td>
        <td>".vs($r[id])."</td>
				<td>$r[mail]</td>
				<td>$r[telefon]</td>
				<td>$r[vek]</td>
				<td>$r[ocekavani]</td>
        <td>$r[rok]</td>
				<td>$r[zkmapa]</td>
				<td>$r[zkradio]</td>
				<td>$r[zkgps]</td>
				<td>$r[gps]</td>
				<td>$r[auto]</td>
				<td>$r[odkud]</td>
				<td>$r[strava]</td>
				<td>$r[zdravo]</td>
				<td>$r[tricko]</td>
				<td>$r[vel]</td>
				<td>$r[barva]</td>
        <td>$r[damske]</td>
				<td>$r[ts]</td>
			";
			echo "</tr>";

			if (($r[status]<5))
				$maily = $maily.", ".$r[mail];
			else
				$maily2 = $maily2.", ".$r[mail];
		}
	}
	echo "</table>";

	echo "
		<br />
		<b>
			Je přihlášeno $num lidí, zaplaceno $num2 lidí.<br />
		</b>
		<hr>
	";

	echo "<h1>maily</h1>";
	for ($i=0;$i<=5;$i++)
	{
		echo "<b>$statusy[$i]</b><br />";
		$res = MySQL_Query("SELECT mail FROM is_hitech WHERE status=$i ORDER BY id");
	  while ($r = MySQL_Fetch_Array($res))
		{
			echo "$r[mail], ";
		}
		echo "<br />";
	}

	echo "
		<hr />
		<h1>Variabilni symboly</h1>
	";
	for ($i=0;$i<=1;$i++)
  {
    $res = MySQL_Query("SELECT id,name FROM is_hitech WHERE status=1 AND tricko=$i ORDER BY id");
    echo "<h2>Tricko: $i</h2>";
  	while ($r = MySQL_Fetch_Array($res))
  	{

  		echo "$r[name] ".vs($r[id])."<br />";
  	}
  	echo "<br />";
	}

	echo "
    <hr />
    <h1>Trička</h1>
  ";

  echo "<b>Pánská:</b><br />";
	$res = MySQL_Query("SELECT vel,barva FROM is_hitech WHERE status>=1 AND status<5 AND tricko=1 AND damske=0 ORDER BY id");
	while ($r = MySQL_Fetch_Array($res))
	{
		$tricka["$r[barva]"]["$r[vel]"]++;
	}

	$barvy = array ("C" => "černá", "M" => "modrá", "Z" => "zelená");

	foreach ($tricka as $k1 => $v1)
		foreach ($v1 as $k2 => $v2)
			echo $v2."x ".$barvy[$k1]." ".$k2."<br />";

  $tricka = NULL;
  echo "<br /><br /><b>Dámská:</b><br />";
	$res = MySQL_Query("SELECT vel,barva FROM is_hitech WHERE status>=1 AND status<5 AND tricko=1 AND damske=1 ORDER BY id");
	while ($r = MySQL_Fetch_Array($res))
	{
		$tricka["$r[barva]"]["$r[vel]"]++;
	}

	$barvy = array ("C" => "černá", "M" => "modrá", "Z" => "zelená");

	foreach ($tricka as $k1 => $v1)
		foreach ($v1 as $k2 => $v2)
			echo $v2."x ".$barvy[$k1]." ".$k2."<br />";

?>
  <br />
  <table>
   <tr>
     <th>jmeno</th>
     <th>velikost</th>
     <th>barva</th>
     <th>druh</th>
   </tr>
<?
  $res = MySQL_Query("SELECT name,vel,barva,damske FROM is_hitech WHERE status>=1 AND status<5 AND tricko=1 ORDER BY id");
	$barvy = array ("C" => "černá", "M" => "modrá", "Z" => "zelená");
  $druh = array ("panske", "damske");
	while ($r = MySQL_Fetch_Array($res))
	{
    $c = $r[barva];
    $d = $r[damske];
		echo "
      <tr>
        <td>$r[name]</td>
        <td>$r[vel]</td>
        <td>$barvy[$c]</td>
        <td>$druh[$d]</tr>
      </tr>
    ";
	}


?>
  </table>

	<hr />
  <h1>Doprava</h1>

	<h2>Brno</h2>

  <table>
   <tr>
     <th>jmeno</th>
		 <th>e-mail</th>
     <th>auto</th>
   </tr>

<?
	$pocet = 0;
	$auta = 0;
  $res = MySQL_Query("SELECT name,mail,auto FROM is_hitech WHERE status>=1 AND status<5 AND odkud LIKE '%brn%' ORDER BY auto DESC");
	while ($r = MySQL_Fetch_Array($res))
	{
		echo "
      <tr>
        <td>$r[name]</td>
        <td>$r[mail]</td>
				<td>$r[auto]</td>
      </tr>
    ";
		$pocet = $pocet + 1;
		if ($r[auto] == 1)
			$auta = $auta + 1;
	}

  echo "</table>";
	echo "<b>Aut: ".$auta.", Lidí: ".$pocet."</b>";
?>

<h2>Praha</h2>

  <table>
   <tr>
     <th>jmeno</th>
		 <th>e-mail</th>
     <th>auto</th>
   </tr>

<?
	$pocet = 0;
	$auta = 0;
  $res = MySQL_Query("SELECT name,mail,auto FROM is_hitech WHERE status>=1 AND status<5 AND odkud LIKE '%prah%' ORDER BY auto DESC");
	while ($r = MySQL_Fetch_Array($res))
	{
		echo "
      <tr>
        <td>$r[name]</td>
        <td>$r[mail]</td>
				<td>$r[auto]</td>
      </tr>
    ";
		$pocet = $pocet + 1;
		if ($r[auto] == 1)
			$auta = $auta + 1;
	}

  echo "</table>";
	echo "<b>Aut: ".$auta.", Lidí: ".$pocet."</b>";
?>

<h2>Ostatní</h2>

  <table>
   <tr>
     <th>jmeno</th>
		 <th>e-mail</th>
     <th>auto</th>
		 <th>odkud</th>
   </tr>

<?
	$pocet = 0;
	$auta = 0;
  $res = MySQL_Query("SELECT name,mail,auto,odkud FROM is_hitech WHERE status>=1 AND status<5 AND odkud NOT LIKE '%brn%' AND odkud NOT LIKE '%prah%' ORDER BY auto DESC");
	while ($r = MySQL_Fetch_Array($res))
	{
		echo "
      <tr>
        <td>$r[name]</td>
        <td>$r[mail]</td>
				<td>$r[auto]</td>
				<td>$r[odkud]</td>
      </tr>
    ";
		$pocet = $pocet + 1;
		if ($r[auto] == 1)
			$auta = $auta + 1;
	}

  echo "</table>";
	echo "<b>Aut: ".$auta.", Lidí: ".$pocet."</b>";
?>

  <hr />
  <h1>GPS</h1>

  <table>
   <tr>
     <th>jmeno</th>
     <th>GPS</th>
   </tr>

<?
  $res = MySQL_Query("SELECT name,gps FROM is_hitech WHERE status>=1 AND status<5 AND (gps<>'ne' AND gps<>'ne.' AND gps<>'' AND gps<>'nie' AND gps<>'nie.' AND gps<>'nemam' AND gps<>'nemám') ORDER BY id");
	while ($r = MySQL_Fetch_Array($res))
	{
		echo "
      <tr>
        <td>$r[name]</td>
        <td>$r[gps]</td>
      </tr>
    ";
	}
?>
  </table>
  <hr />
  <h1>Zdravotní omezení</h1>

  <table>
   <tr>
     <th>jmeno</th>
     <th>Zdravotní omezení</th>
   </tr>

<?
  $res = MySQL_Query("SELECT name,zdravo FROM is_hitech WHERE status>=1 AND status<5 AND (zdravo<>'ne' AND zdravo<>'ne.' AND zdravo<>'' AND zdravo<>'nie' AND zdravo<>'nie.' AND zdravo<>'nemam' AND zdravo<>'nemám' AND zdravo<>'-' AND zdravo<>'nope') ORDER BY id");
	while ($r = MySQL_Fetch_Array($res))
	{
		echo "
      <tr>
        <td>$r[name]</td>
        <td>$r[zdravo]</td>
      </tr>
    ";
	}
?>
  </table>
  <hr />
  <h1>Stravovací omezení</h1>

  <table>
   <tr>
     <th>jmeno</th>
     <th>Stravovací omezení</th>
   </tr>

<?
  $res = MySQL_Query("SELECT name,strava FROM is_hitech WHERE status>=1 AND status<5 AND (strava<>'ne' AND strava<>'ne.' AND strava<>'' AND strava<>'nie' AND strava<>'nie.' AND strava<>'nemam' AND strava<>'nemám' AND strava<>'-' AND strava<>'nope' AND strava<>'nic') ORDER BY id");
	while ($r = MySQL_Fetch_Array($res))
	{
		echo "
      <tr>
        <td>$r[name]</td>
        <td>$r[strava]</td>
      </tr>
    ";
	}
?>
  </table>



  </body>
</html>
