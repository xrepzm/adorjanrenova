<div class="blog_tartalom">
<?php

//include_once 'config.php';
//include_once 'function.php';
/*
$conn = open_db();
if ( $conn ){
	*/
	
	$blogs_fomenu = mysql_query("select * from kategoriak_menu WHERE cim='Blog'");
	$blogs_num_rows = mysql_num_rows($blogs_fomenu);

	if( $blogs_num_rows > 0 ){
		while($blogs_sor = mysql_fetch_assoc($blogs_fomenu)){
			$blogs_cim = $blogs_sor['cim'];
			$blogs_menu_tartalom = htmlspecialchars_decode($blogs_sor['tartalom']);
			$blogs_menu_tartalom = str_replace("<p>", "", $blogs_menu_tartalom);
			$blogs_menu_tartalom = str_replace("</p>", "", $blogs_menu_tartalom);
			
			echo "
				<a href=\"".domain."\"><H1 class='blog_h1'>Palatető felújítás, tetőszigetelés</H1></a>
				<!--<H2 class='blog_h2'>".$blogs_cim."</H2>-->
				<H2 class='blog_h2'>Tetőszigetelés blog</H2>
				<H3 class='lead'>".$blogs_menu_tartalom."</H3>			
			";
		}
		echo "<div class='tartalom_valaszto'></div>";
	}
	
	$fomenu = mysql_query("select * from kategoriak_aktualis WHERE parent=0 and lathato=1 and recept=2 ORDER BY ID desc");
	$num_rows = mysql_num_rows($fomenu);

	if( $num_rows > 0 ){
		
		$i=0;
		while($sor = mysql_fetch_assoc($fomenu)){
			$blog_menu_id = $sor['id'];
			
			$blog_gomb_felirat = $sor['gomb_felirat'];
			$blog_bevezeto_szoveg = $sor['bevezeto_szoveg'];
			
			//$fo_tartalom = szoveg_levag( 300, htmlspecialchars_decode($sor['tartalom']), "..." );
			$blog_title = $sor['title'];
			$blog_ido = $sor['feltolt_ido'];
			$blog_alias = $sor['alias'];
			$blog_fo_cim = $sor['cim'];
			$blog_eleresi_ut = "images/nincs_kep.jpg";
			
			$blog_res_kepek=mysql_query("select * from galeria_aktualis WHERE menu_id=".$blog_menu_id." order by id desc limit 0, 1");
			if( $blog_res_kepek and (mysql_num_rows($blog_res_kepek) > 0) ){
				while($blog_sor_k = mysql_fetch_assoc($blog_res_kepek)){
					$blog_eleresi_ut = $blog_sor_k['eleresi_ut_nagy'];
				}
			}
			
			
			
			echo "	<div class='blog_lista_box'>
						<div class='blog_lista_kep'>
							<a href='".domain.$blog_alias.".html'>";
							if( $blog_eleresi_ut != "images/nincs_kep.jpg" ){
								echo "<img src='".domain.$blog_eleresi_ut."' alt='".$blog_fo_cim."' title='".$blog_fo_cim."' class='blog_img' />";
							}else{
								echo "<img src='".domain.$blog_eleresi_ut."' alt='".$blog_fo_cim."' title='".$blog_fo_cim."' class='blog_img blog_nincs_kep' />";
							}
						echo "
							</a>
						</div>
						
						
						<div class='blog_lista_tartalom'>
							<a href=\"".domain.$blog_alias.".html\"><H3 class='blog_h3'>".$blog_fo_cim."</H3></a>
							<div class='blog_datum'>
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
							
							<div class='blog_szoveg'>".$blog_bevezeto_szoveg."</div>
							<div class='blog_lista_tovabb'><a href='".$blog_alias.".html'>".$blog_gomb_felirat."&nbsp;&gt;&gt;</a></div>
							<div class='clear'></div>
						</div>
						
						<div class='clear'></div>
					</div>
				";
		}
	}
	
//}
?>
</div>