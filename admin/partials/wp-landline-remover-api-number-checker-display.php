<?php

/**
 * Provide a admin area view for the number checker page
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://landlineremover.com/
 * @since      1.0.0
 *
 * @package    wp_landline_remover_api
 * @subpackage wp_landline_remover_api/admin/partials
 */
?>

<div class="col-sm-12 col-md-8 offset-md-2 col-lg-4 offset-lg-4" style="margin-top:2em">
    <div class="row ">
        <?php
            if(!empty($responce_array)){
                if($responce_array['type'] === 'error'){ ?>
                    <div class="notice notice-error is-dismissible" style="margin: 0 0 6px 0 !important">
                        <p><?php esc_html_e($responce_array['mcg']);?></p>
                        <button type="button" class="notice-dismiss"><span class="screen-reader-text">Dismiss this notice.</span></button>
                    </div>
                <?php }else{ ?>
                    <div class="notice notice-success" style="margin: 0 0 6px 0 !important">
                        <p>Phone: <?php esc_html_e($responce_array['mcg']['data']['Number']);?> || LineType: <?php esc_html_e($responce_array['mcg']['data']['LineType']);?> || DNCType: <?php esc_html_e($responce_array['mcg']['data']['DNCType']);?></p>
                    </div>
                <?php }
            }
        ?>
        </div>
    <div class="row ">    
    	<div class="card card-default ">
    		<div class="card-heading text-center">Check Number</div>
    		<div class="card-body">
    			<form method="post">
    				<div class="row form-group mb-3">
    					<div class="col">
    					    <div class="input-group">
                                  <span class="input-group-text" id="maf_check_phone_number">+1</span>
    						    <input type="number" class="form-control"  name="maf_lrapi_number" placeholder="Phone Number" required='required'  aria-describedby="maf_check_phone_number">
                            </div>
    					</div>
    				</div>
    				<div class="row">
                        <div class="d-grid gap-2 col-sm-12 col-md-8 col-lg-6 mx-auto">
                            <button type="submit" class="btn btn-primary " name="maf_lrapi_check_number">Check</button>
                        </div>
    				</div>
    			</form>
    		</div>
    	</div>
	</div>
</div>