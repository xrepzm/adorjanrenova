<?php
//include_once 'config.php';
//include_once 'function.php';
/*
$conn = open_db();
if ( $conn ){
*/
?>
<span class="mobile_menu">Menü</span>
<nav id="main-nav">
	<ul id="main-menu" class="clearfix">
		<?php
			$fomenu = mysql_query("select * from kategoriak_menu WHERE parent=0 and lathato=1 and menube=1 ORDER BY sorrend ASC");
			while($sor = mysql_fetch_assoc($fomenu)){
				$menu_id=$sor['id'];
				$menu_alias=$sor['alias'];
				$fo_cim=$sor['cim'];

				if( $menu_alias!="sitemap" and $menu_alias!="impressum" ){
					echo "<li".( $menu_id==64 ? ' id="menu_le"' : '' )." class='";
				}

					if( ($_SESSION['current'] == $fo_cim) and ($menu_alias!="sitemap") and ($menu_alias!="impressum")  ){
						echo "current-menu-item";
					}

					if( ($oldal_sor_szama > 0) and ($get_menu_id != 'kereses') and ($get_menu_id != 'hirlevel') ){
						$get_menu_id = $get_menu_id;
						$almenu=mysql_query("select * from kategoriak_menu WHERE parent=".$menu_id." and lathato=1 and menube=1 ORDER BY sorrend ASC");
						while($sor_almenu = mysql_fetch_assoc($almenu)){
							$almenu_id=$sor_almenu['id'];
							$almenu_alias=$sor_almenu['alias'];
							$almenu_cim=$sor_almenu['cim'];
							if( ($_SESSION['current'] == $almenu_cim) and ($almenu_id==$get_menu_id) ){
								echo "current-menu-item";
								break;
							}
							$al_almenu=mysql_query("select * from kategoriak_menu WHERE id=".$get_menu_id." and parent=".$almenu_id." and lathato=1 and menube=1 ORDER BY sorrend ASC");
							while($sor_al_almenu = mysql_fetch_assoc($al_almenu)){
								$al_almenu_id=$sor_al_almenu['id'];
								$al_almenu_alias=$sor_al_almenu['alias'];
								$al_almenu_cim=$sor_al_almenu['cim'];
								if( ($_SESSION['current'] == $al_almenu_cim) and ($al_almenu_id==$get_menu_id) ){
									echo "current-menu-item";
									break;
								}
							}
						}
					}
				if( $menu_alias=="fooldal" ){
					echo "'><a href='".domain."'><span>".$fo_cim."</span></a>";
				}else{
					if( $menu_alias=="arak-ajanlatkeres" ){
						echo "'><a href='".$menu_alias.".html'><span>Árak/Ajánlatkérés</span></a>";
					}else{
						if( $menu_alias!="impressum" ){
							if( $menu_alias=="tetoszigeteles-tipusok-szerint" ){
								echo "'><span><a href='/tetoszigeteles-tipusok-szerint.html'>".$fo_cim."</a></span>";
							}else{
								echo "'><a href='".$menu_alias.".html'><span>".$fo_cim."</span></a>";
							}
						}
					}
				}
			if( ($menu_alias <> 'fooldal') and ( $menu_alias!="sitemap" ) and ( $menu_alias!="impressum" ) ){
				echo "<ul>";
					$akt_hir_al=mysql_query("select * from kategoriak_menu WHERE parent=".$menu_id." and lathato=1 and menube=1 ORDER BY sorrend ASC");

					while($sor_al_id = mysql_fetch_assoc($akt_hir_al)){
						$al_id_=$sor_al_id['id'];
						$al_alias_=$sor_al_id['alias'];
						$al_cim=$sor_al_id['cim'];

						echo "<li><a href='".$al_alias_.".html'><span>".$al_cim."</span></a>";

								$akt_hir_al_al=mysql_query("select * from kategoriak_menu WHERE parent=".$al_id_." and lathato=1 and menube=1 ORDER BY sorrend ASC");
								$num_rows = mysql_num_rows($akt_hir_al_al);
								if( $num_rows > 0 ){
									echo "<ul>";
									while($sor_al_al = mysql_fetch_assoc($akt_hir_al_al)){
										$al_id_al=$sor_al_al['id'];
										$al_alias_al=$sor_al_al['alias'];
										$al_cim_al=$sor_al_al['cim'];
										echo "<li><a href='".$al_alias_al.".html'><span>".$al_cim_al."</span></a></li>";
									}
									echo "</ul>";
								}
						echo "</li>";
					}

					if( $menu_id==64  ){ //Tetőszigetelés tipusok és technológiák szerint
						echo "<li class='anch'><a href='".domain."laposteto-szigeteles.html'><span>Lapostető szigetelés</span></a></li>";
						echo "<li class='anch'><a href='".domain."palateto-felujitas.html'><span>Palatető felújítás</span></a></li>";
						echo "<li class='anch'><a href='".domain."cserepteto-felujitas.html'><span>Cseréptető felújítás</span></a></li>";
						echo "<li class='anch'><a href='".domain."specialis-vizzaro-bevonatok.html'><span>Spec. vízzáró bevonatok</span></a></li>";
					}

					/*
						if( $menu_id==64  ){ //Tetőszigetelés tipusok és technológiák szerint
						echo "<li class='anch'><a href='#lapostetoszigeteles'><img src='images/laposteto_szigeteles.jpg' alt=''><span>Lapostető szigetelés</span></a></li>";
						echo "<li class='anch'><a href='#palateto_felujitas'><img src='images/palatetofelujitas.jpg' alt=''><span>Palatető felújítás</span></a></li>";
						echo "<li class='anch'><a href='#csereptetofelujitas'><img src='images/csereptetofelujitas.jpg' alt=''><span>Cseréptető felújítás</span></a></li>";
						echo "<li class='anch'><a href='#mariseal'><img src='images/specvizzarobevonatok.jpg' alt=''><span>Spec. vízzáró bevonatok</span></a></li>";
					}
					*/

				echo "</ul>";

			}
				if( $menu_alias!="sitemap" and $menu_alias!="impressum" ){
					echo "</li>";
				}
			}
		?>
	</ul>


	<div id="mobile-menu">

		<ul id="toggle-view-menu">
			<?php
			$fomenu = mysql_query("select * from kategoriak_menu WHERE parent=0 and lathato=1 and menube=1 and alias!='impressum' ORDER BY sorrend ASC");
			while($sor = mysql_fetch_assoc($fomenu)){
				$menu_id=$sor['id'];
				$menu_alias=$sor['alias'];
				$fo_cim=$sor['cim'];
				if( $menu_alias=="fooldal" ){
					echo "<li class='clearfix'><h3><a href='".domain."'>".$fo_cim."</a></h3>";
				}else{
					/*
					if( $menu_alias=="arak-ajanlatkeres" ){
						echo "'><a href='".$menu_alias.".html'><span>Árak/Ajánlatkérés</span></a>";
					}else{
						echo "<li class='clearfix'><h3><a href='".$menu_alias.".html'>".$fo_cim."</a></h3>";
					}
					*/
					if( $menu_id!=64  ){
						echo "<li class='clearfix'><div class='h3'><a href='".$menu_alias.".html'>".$fo_cim."</a></div>";
					}
				}

				if( $menu_id==64  ){ //Tetőszigetelés tipusok és technológiák szerint
					echo "<li class='clearfix'><div class='h3'><a href='#' onclick='return false;'>".$fo_cim."</a></div><span>+</span><div class='clear'></div>
						<div class='menu-panel clearfix'><ul>";
					echo "<li><a href='".domain."laposteto-szigeteles.html'>Lapostető szigetelés</a></li>";
					echo "<li><a href='".domain."palateto-felujitas.html'>Palatető felújítás</a></li>";
					echo "<li><a href='".domain."cserepteto-felujitas.html'>Cseréptető felújítás</a></li>";
					echo "<li><a href='".domain."specialis-vizzaro-bevonatok.html'>Spec. vízzáró bevonatok</a></li>";
					echo "</ul></div>";
				}
				/*
			if( $menu_alias <> 'fooldal'){
					$num_rows_al=0;
					$akt_hir_al=mysql_query("select * from kategoriak_menu WHERE parent=".$menu_id." and lathato=1 and menube=1 ORDER BY sorrend ASC");
					$num_rows_al = mysql_num_rows($akt_hir_al);
					if( $num_rows_al > 0 ){
						echo "<span>+</span><div class='clear'></div>
								<div class='menu-panel clearfix'><ul>";
					}

					while($sor_al_id = mysql_fetch_assoc($akt_hir_al)){
						$al_id_=$sor_al_id['id'];
						$al_alias_=$sor_al_id['alias'];
						$al_cim=$sor_al_id['cim'];

						echo "<li><a href='".$al_alias_.".html'>".$al_cim."</a>";

								$akt_hir_al_al=mysql_query("select * from kategoriak_menu WHERE parent=".$al_id_." and lathato=1 and menube=1 ORDER BY sorrend ASC");
								$num_rows = mysql_num_rows($akt_hir_al_al);
								if( $num_rows > 0 ){
									echo "<ul>";
									while($sor_al_al = mysql_fetch_assoc($akt_hir_al_al)){
										$al_id_al=$sor_al_al['id'];
										$al_alias_al=$sor_al_al['alias'];
										$al_cim_al=$sor_al_al['cim'];
										echo "<li><a href='".$al_alias_al.".html'>".$al_cim_al."</a></li>";
									}
									echo "</ul>";
								}
						echo "</li>
						";
					}

					if( $num_rows_al > 0 ){
						echo "</ul></div>";
					}
			}
				*/
				echo "</li>";
			}
		?>
		</ul>
	</div>
</nav>
<?php
	/*close_db( $conn );
}*/
?>
