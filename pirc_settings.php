<div class="wrap">
<div class="icon32" id="icon-options-general"></div>
<h2><?php _e('PIRC Settings', 'pirc') ?></h2>
<form method="post" action="options.php">
<?php
settings_fields( 'pirc-settings' );
?>
<div id="poststuff">
<div class="postbox">
<h3><?php _e('Chat Settings', 'pirc') ?></h3>
	<div class="inside">
    <table class="form-table">
        <tr valign="top">
        <th scope="row"><?php _e('IRC Server', 'pirc') ?></th>
        <td><input type="text" size="50" name="pirc-server" value="<?php echo get_option('pirc-server'); ?>" /></td>
        </tr>
        <tr valign="top">
        <th scope="row"><?php _e('Server Port', 'pirc') ?></th>
        <td><input type="text" name="pirc-port" value="<?php echo get_option('pirc-port'); ?>" />
        	<br /><?php _e('Default: <code>6667</code>', 'pirc') ?></td>
        </tr>
        <tr valign="top">
        <th scope="row"><?php _e('Channels to join', 'pirc') ?></th>
        <td>
        	<input type="text" size="100" name="pirc-join" value="<?php echo get_option('pirc-join'); ?>" /><br />
        	<?php _e('A list of channels to join after connect, seperated by <b>,</b> <code>#Chan1, #Chan2</code>.', 'pirc') ?>
        </td>
        </tr>
        <tr valign="top">
        <th scope="row"><?php _e('Chat window size', 'pirc') ?></th>
        <td>
        	<?php _e('Width:', 'pirc') ?> <input type="text" name="pirc-width" value="<?php echo get_option('pirc-width'); ?>" /> pixel<br />
        	<?php _e('Height:', 'pirc') ?> <input type="text" name="pirc-height" value="<?php echo get_option('pirc-height'); ?>" /> pixel
        </td>
        </tr>
    </table>
    </div>
</div>
</div>
<input type="submit" class="button-primary" value="<?php _e('Save Changes', 'pirc') ?>" />
</form>
<br />

<div id="poststuff">
<div class="postbox">
<h3><?php _e('PIRC Usage', 'pirc') ?></h3>
	<div class="inside">
	<?php _e('Simple use a shortcode on a page of your choice or create a new page and insert the following shortcode: <b>[pirc]</b>.', 'pirc') ?><br />
	<br />
	<?php _e('Happy IRCing', 'pirc') ?>
    </div>
</div>

<div class="postbox">
<h3><?php _e('About', 'pirc') ?></h3>
	<div class="inside" style="overflow:auto">
		<div style="float:left;margin-right: 10px; display:inline;">
		<!-- www -->
		WWW: <a href="http://www.powie.de">powie.de</a>
		</div>
		<div style="float:left;margin-right: 10px; display:inline;">
		<!-- twitter -->
		<a href="https://twitter.com/PowieT" class="twitter-follow-button" data-show-count="false" data-lang="de">@PowieT folgen</a>
		<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
		</div>
		<div style="float:left;margin-right: 10px; display:inline;">
		<!-- fb -->
		<iframe src="//www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2Fpowiede&amp;send=false&amp;layout=standard&amp;width=450&amp;show_faces=false&amp;font&amp;colorscheme=light&amp;action=like&amp;height=35" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:350px; height:35px;" allowTransparency="true"></iframe>
		</div>
    </div>
</div>
</div>

</div>