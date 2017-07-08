<!-- <script src='https://www.google.com/recaptcha/api.js'></script> -->
<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>
<script type="text/javascript">
    var onloadCallback = function() {
        grecaptcha.render('recaptcha1', {'sitekey' : '6LdVNigUAAAAAAFssdu1bzn4TMxv0uBv0WdKqvWd', 'theme' : 'light' });
        grecaptcha.render('recaptcha2', {'sitekey' : '6LdVNigUAAAAAAFssdu1bzn4TMxv0uBv0WdKqvWd', 'theme' : 'light' });
        grecaptcha.render('recaptcha3', {'sitekey' : '6LdVNigUAAAAAAFssdu1bzn4TMxv0uBv0WdKqvWd', 'theme' : 'light' });
        grecaptcha.render('recaptcha4', {'sitekey' : '6LdVNigUAAAAAAFssdu1bzn4TMxv0uBv0WdKqvWd', 'theme' : 'light' });
    };
</script>

<?php
// include "simple-php-captcha.php";
// $_SESSION['captcha'] = simple_php_captcha();

if (($id != 76) and ($id != 77) and ($id != 78) and ($id != 79)) {
	echo "<div class='tab_out' role='tabpanel' data-example-id='togglable-tabs'>";
	echo "
        <ul id='myTab' class='nav nav-tabs bar_tabs' role='tablist'>
            <li role='presentation' class='" . ($tab == "#tab_content1" ? 'active' : '') . "'>
                <a href='#tab_content1' id='home-tab' role='tab' data-toggle='tab' aria-expanded='true'>Családi ház</a>
            </li>
            <li role='presentation' class='" . ($tab == "#tab_content2" ? 'active' : '') . "'>
                <a href='#tab_content2' role='tab' id='profile-tab' data-toggle='tab' aria-expanded='false'>Társasház</a>
            </li>
            <li role='presentation' class='" . ($tab == "#tab_content3" ? 'active' : '') . "'>
                <a href='#tab_content3' role='tab' id='profile-tab2' data-toggle='tab' aria-expanded='false'>Telephely</a>
            </li>
            <li role='presentation' class='" . ($tab == "#tab_content4" ? 'active' : '') . "'>
                <a href='#tab_content4' role='tab' id='profile-tab3' data-toggle='tab' aria-expanded='false'>Közület</a>
            </li>
        </ul>";
	echo "
        <div id='myTabContent' class='tab-content'>
            <div role='tabpanel' class='tab-pane fade " . ($tab == "#tab_content1" ? 'active in' : '') . "' id='tab_content1' aria-labelledby='home-tab'>";
} else {
	echo "<br>";
}

if (($id != 77) and ($id != 78) and ($id != 79)) {
	?>
            <div class="contact-box">
                <form class="contact-form_up clearfix contact-form_up_csalad" action="components/mail/phpmailer/mail_magan.php" method="post" enctype="multipart/form-data">
                    <p class="input-block clearfix">
                        <label class="required label_kiemelt">Ajánlatot kérek mint: *</label><br>
                        <label class="required radio_label"><input class="valid" type="radio" name="mint" value="Tulajdonos">Tulajdonos</label>
                        <label class="required radio_label"><input class="valid" type="radio" name="mint" value="Megbízott">Megbízott</label>
                        <label class="required radio_label"><input class="valid" type="radio" name="mint" value="Fővállalkozó">Fővállalkozó</label>
                        <label class="required radio_label"><input class="valid" type="radio" name="mint" value="Érdeklődő">Érdeklődő</label>
                    </p>
                    <p class="input-block clearfix">
                        <label class="required label_kiemelt">Felújítandó épület címe:</label><br>
                        <span class="clearfix iranyitoszam">
                            <input class="valid iranyitoszam" type="text" name="iranyitoszam" value="" maxlength="4" placeholder="Irányítószám">
                        </span>
                        <span class="clearfix telepules">
                            <input class="valid telepules" type="text" name="telepules" value="" placeholder="Település">
                        </span>
                        <input class="valid cim" type="text" name="cim" value="" placeholder="Cím">
                    </p>

                    <p class="input-block">
                        <input type="text" class="valid" name="nev" value="" placeholder="Név">
                    </p>

                    <p class="input-block clearfix">
                        <span class="clearfix plusz">
                            <label class="required cim">+36 </label>
                        </span>
                        <span class="clearfix korzetszam">
                            <input class="valid korzetszam" type="tel" name="korzetszam" value="" placeholder="Körzetszám">
                        </span>
                        <span class="clearfix telefonszam">
                            <input class="valid telefonszam" type="tel" name="telefonszam" value="" placeholder="Telefonszám">
                        </span>
                    </p>


                    <p class="input-block">
                        <input type="email" class="valid" name="email" value="" placeholder="E-mail">
                    </p>

                    <p class="input-block textarea-block">
                        <textarea rows="6" cols="80" name="message" class="erd_uzenet" placeholder="Üzenet"></textarea>
                    </p>

                    <p class="talloz">
                        <label class="label_kepfeltolt">Kérem töltsön fel 2-3 képet a tetőröl. (.pdf, .doc, .docx, .jpg, .png):<br><span class="segedlet">Segítség a képfeltöltéshez:<a href="pdf/kepfeltoltes_segedlet.pdf" target="_blank">ITT</a></span></label>
                        <input type="file" name="kep1" class=""/>
                        <input type="file" name="kep2" class=""/>
                        <input type="file" name="kep3" class=""/>
                    </p>

                    <p class="input-block contact-button clearfix p_kuld_uzenet">
                        <input type="hidden" name="captcha" value="<?php echo $_SESSION['captcha']['code']; ?>">
                        <input type="hidden" name="domain" value="<?php echo domain; ?>">
                        <input type="hidden" name="tab" value="#tab_content1">
                        <input type="hidden" name="akt_alias" value="<?php echo $_SESSION['akt_alias']; ?>">
                        <input type="hidden" name="micsoda" value="Családi ház">
                        <div class="g-recaptcha" id="recaptcha1"></div>
                        <input type="submit" value="Ajánlatkérés elküldése" name="elküld_ajanlat_gomb">
                    </p><div class="clear"></div>
                </form>
            </div>
<?php
}

if (($id != 76) and ($id != 77) and ($id != 78) and ($id != 79)) {
	echo "
                </div>
                <div role='tabpanel' class='tab-pane fade " . ($tab == "#tab_content2" ? 'active in' : '') . "' id='tab_content2' aria-labelledby='profile-tab'>
        ";
}

if (($id != 76) and ($id != 78) and ($id != 79)) {
	?>
            <div class="contact-box">
                <form class="contact-form_up clearfix contact-form_up_tarsashaz" action="components/mail/phpmailer/mail_tarsas.php" method="post" enctype="multipart/form-data">
                    <p class="input-block clearfix">
                        <label class="required label_kiemelt">Ajánlatot kérek mint: *</label><br>
                        <label class="required radio_label"><input class="valid" type="radio" name="mint" value="Közös képviselő">Közös képviselő</label>
                        <label class="required radio_label"><input class="valid" type="radio" name="mint" value="Lakástulajdonos">Lakástulajdonos</label>
                        <label class="required radio_label"><input class="valid" type="radio" name="mint" value="Fővállalkozó">Fővállalkozó</label>
                        <label class="required radio_label"><input class="valid" type="radio" name="mint" value="Érdeklődő">Érdeklődő</label>
                    </p>
                    <p class="input-block clearfix">
                        <input class="valid" type="text" name="tarsashaznev" value="" placeholder="Társasház név">
                    </p>
                    <p class="input-block clearfix">
                        <label class="required label_kiemelt">Felújítandó társasház címe:</label><br>
                        <span class="clearfix iranyitoszam">
                            <input class="valid iranyitoszam" type="text" name="iranyitoszam" value="" maxlength="4" placeholder="Irányítószám">
                        </span>
                        <span class="clearfix telepules">
                            <input class="valid telepules" type="text" name="telepules" value="" placeholder="Település">
                        </span>
                        <input class="valid cim" type="text" name="cim" value="" placeholder="Cím">
                    </p>
                    <p class="input-block">
                        <input type="text" class="valid" name="nev" value="" placeholder="Név">
                    </p>
                    <p class="input-block clearfix">
                        <span class="clearfix plusz">
                            <label class="required cim">+36 </label>
                        </span>
                        <span class="clearfix korzetszam">
                            <input class="valid korzetszam" type="tel" name="korzetszam" value="" placeholder="Körzetszám">
                        </span>
                        <span class="clearfix telefonszam">
                            <input class="valid telefonszam" type="tel" name="telefonszam" value="" placeholder="Telefonszám">
                        </span>
                    </p>
                    <p class="input-block">
                        <input type="email" class="valid" name="email" value="" placeholder="E-mail">
                    </p>


                    <p class="input-block textarea-block">
                        <textarea rows="6" cols="80" name="message" class="erd_uzenet" placeholder="Üzenet"></textarea>
                    </p>

                    <p class="talloz">
                        <label class="label_kepfeltolt">Kérem töltsön fel 2-3 képet a tetőröl. (.pdf, .doc, .docx, .jpg, .png):<br><span class="segedlet">Segítség a képfeltöltéshez:<a href="pdf/kepfeltoltes_segedlet.pdf" target="_blank">ITT</a></span></label>
                        <input type="file" name="kep1" class=""/>
                        <input type="file" name="kep2" class=""/>
                        <input type="file" name="kep3" class=""/>
                    </p>
                    <p class="input-block contact-button clearfix p_kuld_uzenet">
                        <input type="hidden" name="captcha" value="<?php echo $_SESSION['captcha']['code']; ?>">
                        <input type="hidden" name="domain" value="<?php echo domain; ?>">
                        <input type="hidden" name="tab" value="#tab_content2">
                        <input type="hidden" name="akt_alias" value="<?php echo $_SESSION['akt_alias']; ?>">
                        <input type="hidden" name="micsoda" value="Társasház">
                        <div class="g-recaptcha" id="recaptcha2"></div>
                        <input type="submit" value="Ajánlatkérés elküldése" name="elküld_ajanlat_gomb">
                    </p><div class="clear"></div>
                </form>
            </div>
<?php
}

if (($id != 76) and ($id != 77) and ($id != 78) and ($id != 79)) {
	echo "
                </div>
                <div role='tabpanel' class='tab-pane fade " . ($tab == "#tab_content3" ? 'active in' : '') . "' id='tab_content3' aria-labelledby='profile-tab'>
        ";
}

if (($id != 76) and ($id != 77) and ($id != 79)) {
	?>
            <div class="contact-box">
                <form class="contact-form_up clearfix contact-form_up_telephely" action="components/mail/phpmailer/mail_vallalat.php" method="post" enctype="multipart/form-data">
                    <p class="input-block clearfix">
                        <label class="required label_kiemelt">Ajánlatot kérek mint: *</label><br>
                        <label class="required radio_label"><input class="valid" type="radio" name="mint" value="Tulajdonos">Tulajdonos</label>
                        <label class="required radio_label"><input class="valid" type="radio" name="mint" value="Megbízott">Megbízott</label>
                        <label class="required radio_label"><input class="valid" type="radio" name="mint" value="Fővállalkozó">Fővállalkozó</label>
                        <label class="required radio_label"><input class="valid" type="radio" name="mint" value="Érdeklődő">Érdeklődő</label>
                    </p>
                    <p class="input-block clearfix">
                        <input class="valid" type="text" name="tulajdonosnev" value="" placeholder="Tulajdonos neve">
                    </p>
                    <p class="input-block clearfix">
                        <label class="required label_kiemelt">Felújítandó telephely címe:</label><br>
                        <span class="clearfix iranyitoszam">
                            <input class="valid iranyitoszam" type="text" name="iranyitoszam" value="" maxlength="4" placeholder="Irányítószám">
                        </span>
                        <span class="clearfix telepules">
                            <input class="valid telepules" type="text" name="telepules" value="" placeholder="Település">
                        </span>
                        <input class="valid cim" type="text" name="cim" value="" placeholder="Cím">
                    </p>
                    <p class="input-block">
                        <input type="text" class="valid" name="nev" value="" placeholder="Név">
                    </p>
                    <p class="input-block clearfix">
                        <span class="clearfix plusz">
                            <label class="required cim">+36 </label>
                        </span>
                        <span class="clearfix korzetszam">
                            <input class="valid korzetszam" type="tel" name="korzetszam" value="" placeholder="Körzetszám">
                        </span>
                        <span class="clearfix telefonszam">
                            <input class="valid telefonszam" type="tel" name="telefonszam" value="" placeholder="Telefonszám">
                        </span>
                    </p>
                    <p class="input-block">
                        <input type="email" class="valid" name="email" value="" placeholder="E-mail">
                    </p>



                    <p class="input-block textarea-block">
                        <textarea rows="6" cols="80" name="message" class="erd_uzenet" placeholder="Üzenet"></textarea>
                    </p>

                    <p class="talloz">
                        <label class="label_kepfeltolt">Kérem töltsön fel 2-3 képet a tetőröl. (.pdf, .doc, .docx, .jpg, .png):<br><span class="segedlet">Segítség a képfeltöltéshez:<a href="pdf/kepfeltoltes_segedlet.pdf" target="_blank">ITT</a></span></label>
                        <input type="file" name="kep1" class=""/>
                        <input type="file" name="kep2" class=""/>
                        <input type="file" name="kep3" class=""/>
                    </p>
                    <p class="input-block contact-button clearfix p_kuld_uzenet">
                        <input type="hidden" name="captcha" value="<?php echo $_SESSION['captcha']['code']; ?>">
                        <input type="hidden" name="domain" value="<?php echo domain; ?>">
                        <input type="hidden" name="tab" value="#tab_content3">
                        <input type="hidden" name="akt_alias" value="<?php echo $_SESSION['akt_alias']; ?>">
                        <input type="hidden" name="micsoda" value="Telephely">
                        <div class="g-recaptcha" id="recaptcha3"></div>
                        <input type="submit" value="Ajánlatkérés elküldése" name="elküld_ajanlat_gomb">
                    </p><div class="clear"></div>
                </form>
            </div>
<?php
}

if (($id != 76) and ($id != 77) and ($id != 78) and ($id != 79)) {
	echo "
                </div>
                <div role='tabpanel' class='tab-pane fade " . ($tab == "#tab_content4" ? 'active in' : '') . "' id='tab_content4' aria-labelledby='profile-tab'>
        ";
}

if (($id != 76) and ($id != 77) and ($id != 78)) {
	?>
            <div class="contact-box">
                <form class="contact-form_up clearfix contact-form_up_kozulet" action="components/mail/phpmailer/mail_kozulet.php" method="post" enctype="multipart/form-data">
                    <p class="input-block clearfix">
                        <label class="required label_kiemelt">Ajánlatot kérek mint: *</label><br>
                        <label class="required radio_label"><input class="valid" type="radio" name="mint" value="Megbízott">Megbízott</label>
                        <label class="required radio_label"><input class="valid" type="radio" name="mint" value="Fővállalkozó">Fővállalkozó</label>
                        <label class="required radio_label"><input class="valid" type="radio" name="mint" value="Érdeklődő">Érdeklődő</label>
                    </p>
                    <p class="input-block clearfix">
                        <input class="valid" type="text" name="kozuletnev" value="" placeholder="Közület neve">
                    </p>
                    <p class="input-block clearfix">
                        <label class="required label_kiemelt">Felújítandóközület címe:</label><br>
                        <span class="clearfix iranyitoszam">
                            <input class="valid iranyitoszam" type="text" name="iranyitoszam" value="" maxlength="4" placeholder="Irányítószám">
                        </span>
                        <span class="clearfix telepules">
                            <input class="valid telepules" type="text" name="telepules" value="" placeholder="Település">
                        </span>
                        <input class="valid cim" type="text" name="cim" value="" placeholder="Cím">
                    </p>
                    <p class="input-block">
                        <input type="text" class="valid" name="nev" value="" placeholder="Név">
                    </p>
                    <p class="input-block clearfix">
                        <span class="clearfix plusz">
                            <label class="required cim">+36 </label>
                        </span>
                        <span class="clearfix korzetszam">
                            <input class="valid korzetszam" type="tel" name="korzetszam" value="" placeholder="Körzetszám">
                        </span>
                        <span class="clearfix telefonszam">
                            <input class="valid telefonszam" type="tel" name="telefonszam" value="" placeholder="Telefonszám">
                        </span>
                    </p>
                    <p class="input-block">
                        <input type="email" class="valid" name="email" value="" placeholder="E-mail">
                    </p>
                    <p class="input-block textarea-block">
                        <textarea rows="6" cols="80" name="message" class="erd_uzenet" placeholder="Üzenet"></textarea>
                    </p>

                    <p class="talloz">
                        <label class="label_kepfeltolt">Kérem töltsön fel 2-3 képet a tetőröl. (.pdf, .doc, .docx, .jpg, .png):<br><span class="segedlet">Segítség a képfeltöltéshez:<a href="pdf/kepfeltoltes_segedlet.pdf" target="_blank">ITT</a></span></label>
                        <input type="file" name="kep1" class=""/>
                        <input type="file" name="kep2" class=""/>
                        <input type="file" name="kep3" class=""/>
                    </p>
                    <p class="input-block contact-button clearfix p_kuld_uzenet">
                        <input type="hidden" name="captcha" value="<?php echo $_SESSION['captcha']['code']; ?>">
                        <input type="hidden" name="domain" value="<?php echo domain; ?>">
                        <input type="hidden" name="tab" value="#tab_content4">
                        <input type="hidden" name="akt_alias" value="<?php echo $_SESSION['akt_alias']; ?>">
                        <input type="hidden" name="micsoda" value="Közület">
                        <div class="g-recaptcha" id="recaptcha4"></div>
                        <input type="submit" value="Ajánlatkérés elküldése" name="elküld_ajanlat_gomb">
                    </p><div class="clear"></div>
                </form>
            </div>
<?php
}
if (($id != 76) and ($id != 77) and ($id != 78) and ($id != 79)) {
	echo "
                </div>
            </div>
        </div>
        ";
}
?>
