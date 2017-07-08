<!--hiba oldal-->
<section class="error-404 clearfix">
	<div class="left-col">
		<p>404</p>
	</div><!--left-col-->
	<div class="right-col">
		<h1>Az oldal nem található...</h1>
		<p>Nagyon sajnáljuk, de a keresett oldal nem található.</p>
		<br>
		<p>Lehet, hogy elgépelte a keresett oldal webcímét.</p>
		<ul class="arrow-list">
			<li><a href="#" id="vissza">Vissza az előző oldalra</a></li>
			<script type="text/javascript">
				$(document).ready(function(){
					$('a#vissza').click(function(){
						parent.history.back();
						return false;
					});
				});
			</script>
			<li><a href="<?php echo domain; ?>">Főoldalra</a></li>
		</ul>
	</div><!--right-col-->
</section>
<!--hiba oldal-->
