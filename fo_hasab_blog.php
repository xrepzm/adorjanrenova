<div class="blog_tartalom_in">
<?php

//include_once 'config.php';
//include_once 'function.php';

/*
$conn = open_db();
if ( $conn ){
	*/

	$fomenu = mysql_query("select * from kategoriak_aktualis WHERE parent=0 and lathato=1 and recept=2 and cim='".$cim."' ORDER BY ID desc");
	$num_rows = mysql_num_rows($fomenu);

	if( $num_rows > 0 ){

		$i=0;
		while($sor = mysql_fetch_assoc($fomenu)){
			$blog_menu_id = $sor['id'];

			$blog_gomb_felirat = $sor['gomb_felirat'];
			$blog_bevezeto_szoveg = $sor['bevezeto_szoveg'];
			$blog_bevezeto_szoveg = str_replace("<p>", "", $blog_bevezeto_szoveg);
			$blog_bevezeto_szoveg = str_replace("</p>", "", $blog_bevezeto_szoveg);
			$blog_tartalom = htmlspecialchars_decode($sor['tartalom']);

			$blog_h3 = $sor['h3'];
			$blog_szoveg2 = htmlspecialchars_decode($sor['szoveg2']);
			$blog_szoveg3 = htmlspecialchars_decode($sor['szoveg3']);

			$blog_title = $sor['title'];
			$blog_ido = $sor['feltolt_ido'];
			$blog_alias = $sor['alias'];
			$blog_fo_cim = $sor['cim'];
			$blog_eleresi_ut_nagy = "images/nincs_kep.jpg";

			$blog_res_kepek=mysql_query("select * from galeria_aktualis WHERE menu_id=".$blog_menu_id." order by id desc limit 0, 1");
			if( $blog_res_kepek and (mysql_num_rows($blog_res_kepek) > 0) ){
				while($blog_sor_k = mysql_fetch_assoc($blog_res_kepek)){
					$blog_eleresi_ut_nagy = $blog_sor_k['eleresi_ut_nagy'];
				}
			}



			echo "
					<a href=\"".domain."\"><H2 class='blog_h2'>Palatető felújítás, tetőszigetelés</H2></a>
					<H1 class='blog_h1'>".$cim."</H1>
					<div class='blog_szoveg'>
						<div itemprop='author' itemscope='' itemtype='http://schema.org/Person'>
							<!--<img itemprop='image' src='//lh3.googleusercontent.com/-dG5mgHQRHE4/AAAAAAAAAAI/AAAAAAAAABM/xqNZ4NfqSBU/s120-c/photo.jpg' alt='Ifj. Adorján Zoltán'/>-->
							<!--<div itemprop='dateCreated' itemscope='' itemtype='http://schema.org/CreativeWork'>-->
							<div itemscope='' itemtype='http://schema.org/CreativeWork'>
								<div itemprop='dateCreated' content='".$blog_ido."'>
									".$blog_ido."
									<a href='https://plus.google.com/u/0/106211816904795526432?rel=author'><span itemprop='name' class='blog_strukturalt_nev'>Ifj. Adorján Zoltán</span></a>
								</div>
							</div>
							<div>

							</div>
						</div>
					</div>
					<H3 class='blog_h3 lead'>".$blog_bevezeto_szoveg."</H3>";

					if( $blog_eleresi_ut_nagy != "images/nincs_kep.jpg" ){
						echo "<img src='".domain.$blog_eleresi_ut_nagy."' alt='".$blog_fo_cim."' title='".$blog_fo_cim."' class='blog_img' />";
					}
				echo "
					<div class='blog_szoveg'>".$blog_tartalom."</div>
					<H3 class='blog_h3'>".$blog_h3."</H3>
					<div class='blog_szoveg'>".$blog_szoveg2."</div>
					<div class='blog_szoveg'>".$blog_szoveg3."</div>
					<div class='blog_szoveg_link'><a href=\"".domain."blog.html\">Tetőszigetelés blog&nbsp;&gt;&gt;</a></div>
				";
		}
	}
//}

?>
</div>

