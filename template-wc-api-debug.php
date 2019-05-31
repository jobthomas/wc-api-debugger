<?php
/**
 * The template for displaying the WooCommerce API Debug Fields.
 *
 * Template Name: WC API Debug
 *
 * @package wc-api-debugger
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) :
				the_post();

				do_action( 'storefront_page_before' );

				get_template_part( 'content', 'page' );

				?>

				<form id='search_form' action=''>

		        <p class='woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide'>
		            <label for='search_domain'>Site URL&nbsp;<span class='required'>*</span></label>
		            <input type='text' placeholder='e.g. https://google.com' class='search_domain' value='https://riaan.mystagingwebsite.com' />
		        </p>

		        <p class='woocommerce-form-row woocommerce-form-row--first form-row form-row-first'>
		            <label for='search_key'>Consumer Key&nbsp;<span class='required'>*</span></label>
		            <input type=text placeholder='API Key' class='search_key' value='ck_d3da3544c96a653ad1d2fc3944ef817e7baee163' />
		        </p>

		        <p class='woocommerce-form-row woocommerce-form-row--last form-row form-row-last'>
		            <label for='search_secret'>Consumer Secret&nbsp;<span class='required'>*</span></label>
		            <input type=text placeholder='API Secret' class='search_secret' value='cs_f72ae661a31734033bf69949f66dba9ef6a87312' />
		        </p>

		        <p class='woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide'>
		            <label for='search_permalink' class="woocommerce-form__label woocommerce-form__label-for-checkbox checkbox">Permalink Structure&nbsp;<span class='required'>*</span>
		            	<br />
		            	<input type=radio class='search_permalink woocommerce-form__input woocommerce-form__input-checkbox input-checkbox' value='pretty' name='search_permalink' />
		            	<span><abbr title="(e.g. https://yoursite.com/sample-page)">Pretty Permalinks</abbr></span>
		            	<br />
		            	<input type=radio class='search_permalink woocommerce-form__input woocommerce-form__input-checkbox input-checkbox' value='plain' name='search_permalink' />
		            	<span><abbr title="(e.g. https://yoursite.com/?p=123)">Plain Permalinks</abbr></span>
		            </label>
		        </p>

		        <input type='submit' class='search_submit'/></form>
		    
		        <div id='search_container'>

		            <div class="woocommerce-api-data">

		                <!-- General Environment Results Page -->
		                <table class="woocommerce-orders-table my_account_orders account-orders-table woocommerce-api-data-general inactive">
		                     
		                    <thead>
		                        <tr>
		                            <th class="woocommerce-orders-table__header"><span class="nobr">Store Data</span></th>
		                            <th class="woocommerce-orders-table__header"><span class="nobr">Values</span></th>
		                        </tr>
		                    </thead>

		                    <tbody>
		                        <tr>                
		                            <th>Site URL</th>
		                            <td class="woocommerce-api-environment-homeurl"></a></td>
		                        </tr>

		                        <tr>
		                            <th>API: Status</th>
		                            <td class="woocommerce-api-environment-apienabled"></td>
		                        </tr>
		                    
		                        <tr>
		                            <th>API URL</th>
		                            <td class="woocommerce-api-environment-domain"></a>
		                            </td>
		                        </tr>
		                    
		                        <tr>
		                            <th>Server Info</th>
		                            <td class="woocommerce-api-environment-serverinfo"></td>
		                        </tr>

		                        <tr>
		                            <th>PHP: Version</th>
		                            <td class="woocommerce-api-environment-phpversion"></td>
		                        </tr>

		                        <tr>
		                            <th>PHP: Maximum Execution Time</th>
		                            <td class="woocommerce-api-environment-phpmaxtime"></td>
		                        </tr>

		                        <tr>                        
		                            <th>PHP: Maximum Input Variables</th>
		                            <td class="woocommerce-api-environment-maxvars"></td>
		                        </tr>

		                        <tr>
		                            <th>PHP: Remote Post</th>
		                            <td class="woocommerce-api-environment-remotepost"></td>
		                        </tr>

		                        <tr>
		                            <th>PHP: Remote Get</th>
		                            <td class="woocommerce-api-environment-remoteget"></td>
		                        </tr>

		                        <tr>
		                            <th>PHP: Debug Mode</th>
		                            <td class="woocommerce-api-environment-debug"></td>
		                        </tr>

		                    </tbody>
		                </table>
		            </div>
		        </div>

				<?php
				/**
				 * Functions hooked in to storefront_page_after action
				 *
				 * @hooked storefront_display_comments - 10
				 */
				do_action( 'storefront_page_after' );

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
