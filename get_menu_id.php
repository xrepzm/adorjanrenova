<?php
$alias1 = "";
$alias2 = "";
$alias3 = "";
$varos_neve = "";

/*
echo  "<br>alias1: ".$_GET['alias1']."<br>";
echo  "alias2: ".$_GET['alias2']."<br>";
echo  "alias3: ".$_GET['alias3']."<br>";
*/
/*
$conn = open_db();
if ( $conn ){
*/
	if( isset($_GET['alias1']) and ($_GET['alias1'] != "") ){
		$alias1 = $_GET['alias1'];

		if( $alias1 == 'kereses' ){
			$menu_id = "kereses";
			$menu_id2 = "";
			$menu_id3 = "";
			if( isset($_GET['alias2']) and ($_GET['alias2'] != "") ){
				$alias2 = $_GET['alias2'];
				$menu_id2 = $_GET['alias2'];
			}
			if( isset($_GET['alias3']) and ($_GET['alias3'] != "") ){
				$alias3 = $_GET['alias3'];
				$menu_id3 = $_GET['alias3'];
			}
		}elseif( $alias1 == 'lapozo' ){

			$menu_id2 = "lapozo";
			$menu_id = "";
			$menu_id3 = "";
			if( isset($_GET['alias2']) and ($_GET['alias2'] != "") ){
				$alias2 = $_GET['alias2'];

				$res_alias2=mysql_query("select id from kategoriak_menu WHERE alias='".$alias2."' AND lathato=1");
				if( mysql_num_rows($res_alias2) > 0 ){
					$data2=mysql_fetch_array($res_alias2);
					$menu_id = $data2['id'];
					$menu_id2 = "";
					$menu_id3 = "";
				}

			}
			if( isset($_GET['alias3']) and ($_GET['alias3'] != "") ){
				$alias3 = $_GET['alias3'];
				$menu_id3 = $_GET['alias3'];
			}
		}elseif( $alias1 == 'cimke' ){  //ha cimke vagy cimkefelho
			if( isset($_GET['alias2']) and ($_GET['alias2'] != "") ){
				$alias2 = $_GET['alias2'];
			}else{
				$alias2 = "";
			}
			$menu_id = $alias1;
			$menu_id2 = $alias2;
			$menu_id3 = "";
			$dbname = "cimke";
			$dbname_galeria = "galeria";

		}else{
			$res_alias1=mysql_query("select id from kategoriak_menu WHERE alias='".$alias1."' AND lathato=1");
			if( (mysql_num_rows($res_alias1)) > 0 ){
				$data1=mysql_fetch_array($res_alias1);
				$menu_id = $data1['id'];
				$menu_id2 = "";
				$menu_id3 = "";
				$dbname = "kategoriak_menu";
				$dbname_galeria = "galeria";
			}else{
				$res_alias1=mysql_query("select id,cim from kategoriak_aktualis WHERE alias='".$alias1."' AND lathato=1");
				if( mysql_num_rows($res_alias1) > 0 ){
					$data1=mysql_fetch_array($res_alias1);
					$menu_id = $data1['id'];
					$menu_id2 = "";
					$menu_id3 = "";
					$dbname = "kategoriak_aktualis";
					$blog_neve = $data1['cim'];
					$dbname_galeria = "galeria_aktualis";

				}else{  // ha város megye
					$res_alias1=mysql_query("select * from varosmegye WHERE link='".$alias1."'");
					if( mysql_num_rows($res_alias1) > 0 ){  //ha $alias1 = megyealias  ha megye
						$data1=mysql_fetch_array($res_alias1);
						//$menu_id = $data1['id'];
						if( isset($_GET['alias2']) and ($_GET['alias2'] != "") ){  //ha van 2 parameter is
							$res_alias2=mysql_query("select * from varos WHERE link='".$_GET['alias2']."'");
							if( mysql_num_rows($res_alias2) > 0 ){  //ha van ilyen város
								$data2=mysql_fetch_array($res_alias2);

								$varos_neve = $data2['nev'];
								$megye_neve = $data1['nev']." megye";
								$megye_link = $data1['link'];

								$menu_id = $data1['id'];
								$menu_id2 = $data2['id'];
								$menu_id3 = "";
								$dbname = "varos";
								$dbname_galeria = "galeria";
							}else{  //ha csak megye

								$megye_neve = $data1['nev']." megye";
								$megye_link = $data1['link'];

								$menu_id = $data1['id'];
								$menu_id2 = "";
								$menu_id3 = "";
								$dbname = "megye";
								$dbname_galeria = "galeria";
							}
						}else{  //ha nincs akkor csak megye
							$megye_neve = $data1['nev']." megye";
							$megye_link = $data1['link'];

							$menu_id = $data1['id'];
							$menu_id2 = "";
							$menu_id3 = "";
							$dbname = "megye";
							$dbname_galeria = "galeria";
						}

					}else{

					}

				}
			}
		}
	}else{
	/*
		$menu_id = "";
		$dbname = "kategoriak_menu";
		$dbname_galeria = "galeria";
	*/
		$menu_id = "";
		$menu_id2 = "";
		$menu_id3 = "";
		$masdb = 0;
		$dbname = "kategoriak_menu";
		$dbname_galeria = "galeria";
	}
/*
close_db( $conn );
}
*/
?>
