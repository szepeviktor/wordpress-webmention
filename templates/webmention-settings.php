<div class="wrap">
	<h1><?php esc_html_e( 'Webmention Settings', 'webmention' ); ?></h1>

	<form method="post" action="options.php">
		<?php settings_fields( 'webmention' ); ?>

		<h2 class="title"><?php _e( 'Sender', 'webmention' ); ?></h2>

		<p><?php _e( 'A Webmention Sender is an implementation that sends Webmentions.', 'webmention' ); ?></p>

		<table class="form-table">
			<tr>
				<th scope="row"><?php _e( 'Self-Ping settings', 'webmention' ); ?></th>
				<td>
					<fieldset>
						<label for="webmention_disable_selfpings_same_url">
							<input type="checkbox" name="webmention_disable_selfpings_same_url" id="webmention_disable_selfpings_same_url" value="1" <?php
								echo checked( true, get_option( 'webmention_disable_selfpings_same_url' ) );  ?> />
							<?php _e( 'Disable self-pings on the same URL', 'webmention' ) ?>
							<p class="description">(for example "http://example.com/?p=123")</p>
						</label>

						<br />

						<label for="webmention_disable_selfpings_same_domain">
							<input type="checkbox" name="webmention_disable_selfpings_same_domain" id="webmention_disable_selfpings_same_domain" value="1" <?php
								echo checked( true, get_option( 'webmention_disable_selfpings_same_domain' ) );  ?> />
							<?php _e( 'Disable self-pings on the same Domain', 'webmention' ) ?>
							<p class="description">(for example "example.com")</p>
						</label>
					</fieldset>
				</td>
			</tr>
		</table>

		<?php do_settings_fields( 'webmention', 'sender' ); ?>

		<h2 class="title"><?php _e( 'Receiver', 'webmention' ); ?></h2>

		<p><?php _e( 'A Webmention Receiver is an implementation that receives Webmentions to one or more target URLs on which the Receiver\'s Webmention endpoint is advertised.', 'webmention' ); ?></p>

		<table class="form-table">
			<tr>
				<th scope="row"><?php _e( 'Webmention support for pages', 'webmention' ); ?></th>
				<td>
					<fieldset>
						<label for="webmention_support_pages">
							<input type="checkbox" name="webmention_support_pages" id="webmention_support_pages" value="1" <?php
								echo checked( true, get_option( 'webmention_support_pages' ) );  ?> />
							<?php _e( 'Enable Webmention support for pages', 'webmention' ) ?>
						</label>

						<br />

						<label for="webmention_home_mentions">
							<?php _e( 'Set a page for mentions of the homepage to be sent to:', 'webmention' ); ?>

							<?php
							wp_dropdown_pages( array(
								'show_option_none' => __( 'No homepage mentions', 'webmention' ),
								'name' => 'webmention_home_mentions',
								'id' => 'webmention_home_mentions',
								'selected' => get_option( 'webmention_home_mentions' ),
							) );
							?>

							<?php
							if ( get_option( 'webmention_home_mentions' ) ) {
								printf( '<a href="%s">%s</a>', get_permalink( get_option( 'webmention_home_mentions' ) ), __( 'Visit site', 'webmention' ) );
							}
							?>
						</label>
					</fieldset>
				</td>
			</tr>
			<tr>
				<th scope="row"><?php _e( 'Automatically Approve Mentions from these domains', 'webmention' ); ?></p></th>
				<td>
					<fieldset>
			                        <label for="webmention_approve_domains">
							<textarea name='webmention_approve_domains' rows='3' cols='50' class='large-text code'><?php echo get_option( 'webmention_approve_domains' ); ?></textarea>
							<br /><?php _e( 'A Webmention received from a site that matches a domain in this list will be auto-approved. One domain (e.g. indieweb.org) per line.
', 'webmention' ); ?>
						</label>
				</td>
			</tr>
			<tr>
				<th scope="row"><?php _e( 'Comment settings', 'webmention' ); ?></th>
				<td>
					<fieldset>
						<label for="webmention_show_comment_form">
							<input type="checkbox" name="webmention_show_comment_form" id="webmention_show_comment_form" value="1" <?php
								echo checked( true, get_option( 'webmention_show_comment_form' ) );  ?> />
							<?php _e( 'Show a Webmention form at the comment section, to allow anyone to notify you of a mention.', 'webmention' ) ?>
						</label>
					</fieldset>
				</td>
			</tr>
		</table>

		<?php do_settings_fields( 'webmention', 'receiver' ); ?>

		<?php do_settings_sections( 'webmention' ); ?>

		<?php submit_button(); ?>
	</form>
</div>
