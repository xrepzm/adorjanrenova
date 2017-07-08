<div class="blog_tartalom">
<?php

include_once 'config.php';
include_once 'function.php';

$conn = open_db();
if ( $conn ){
	

	 function feldolgoz($file) {
		 ob_start();
		 include($file);
		 $buffer = "<div class='telephely_video_in'>";
		 $buffer .= ob_get_contents();
		 $buffer .= "</div>";
		 ob_end_clean();
		 return $buffer;
	 }
	function csere( $data, $modul ) {
		foreach( $modul as $tag => $link ) {
			if( stristr( $data, $tag ) ) {
				$data = str_replace( $tag, feldolgoz( $link ), $data);
			}
		}
		return( $data );
	}
	$modul = array(
		'{telephely}' => 'kieg_szoveg.php',
		'{video}' => 'videok_box.php'
	);	 
	$szoveg =  csere( $szoveg, $modul );
	$szoveg2 =  csere( $szoveg2, $modul );
	$szoveg3 =  csere( $szoveg3, $modul );
	 
	 
	
			$blog_eleresi_ut = "images/tetoszigeteles_kollazs.jpg";
			
			/*$blog_res_kepek=mysql_query("select * from galeria_megye WHERE menu_id=".$id." order by id desc limit 0, 2");
			if( $blog_res_kepek and (mysql_num_rows($blog_res_kepek) > 0) ){
				while($blog_sor_k = mysql_fetch_assoc($blog_res_kepek)){
					$blog_eleresi_ut = $blog_sor_k['eleresi_ut'];
				}
			}*/
			
			
			echo "
				<a href=\"".domain."\"><H1 class='blog_h1'>Palatető felújítás, tetőszigetelés</H1></a>
				<H2 class='blog_h2'>".$h2."</H2>
				<H3 class='blog_h3 lead'>".$lead."</H3>	
				<div class='row-fluid'>
					
					<div class='varos_ajanlat span12'>
					
				";
			
			//include("uzenet_kuldes_bal_varos.php");
			//include("ajanlat_felugro.php");
		echo "
			<div class='varos_kep span6'>
				<img src='".domain.$blog_eleresi_ut."' alt='".$h4."' title='".$h4."' class='blog_img' />
			</div>
		";
		
?>
	
<div id="varosmegye" class="span6">
<div id="tabs" class="ajanlatkero_sarga_bg">
	<div id="ajanlatkero" class="ajanlatkero">
		
		<div class="ajanlatkero_tartalom" id="ajanlatkero_tartalom">
			<?php
				include('ajanlat_felugro.php');
			?>
		</div>
	</div>
</div>
<div class="clear"></div>
</div>

<?php
			
			echo "
					<H4 class='varos'>".$h4."</H4>
						<div class=''>".$szoveg."</div>
					</div>
				</div>
				<div class='clear'></div>

				<H4>".$h42."</H4>
				<div class=''>".$szoveg2."</div>
				<div class=''>".$szoveg3."</div>
			";
			
			
			
}
?>
</div>