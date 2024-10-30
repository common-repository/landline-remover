<?php

/**
 * Provide a admin area view for the settings of the plugin
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
	<div class="row">
        <?php
            if(isset($maf_lrapi_api_key) && trim($maf_lrapi_api_key) !== '' && !empty($responce_array)){
                if($responce_array['type'] === 'error'){ ?>
                    <div class="notice notice-error is-dismissible" style="margin: 0 0 6px 0 !important">
                        <p><?php esc_html__($responce_array['mcg']);?></p>
                        <button type="button" class="notice-dismiss"><span class="screen-reader-text">Dismiss this notice.</span></button>
                    </div>
                <?php }else{ ?>
                    <div class="notice notice-success" style="margin: 0 0 6px 0 !important">
                        <p>Your Remaining Credits: <?php esc_html_e($responce_array['mcg']['data']['RemainingCredits']);?></p>
                    </div>
                <?php }
            }
        ?>
    </div>
    <div class="row">
    	<div class="card card-success text-center">
    		<div class="card-title">Plugin Settings</div>
    		<div class="card-body">
    			<form method="post">
    				<div class="row form-group">
    				    <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="maf_lrapi_api_key" value="<?php esc_attr_e((isset($maf_lrapi_api_key,$maf_lrapi_api_key))? $maf_lrapi_api_key : '');?>"  name="maf_lrapi_api_key" required='required'>
                            <label for="maf_lrapi_api_key">Your API Key</label>
                        </div>
    				</div>
    				<div class="row">
                        <div class="d-grid gap-2 col-sm-12 col-md-8 col-lg-6 mx-auto">
                            <button type="submit" class="btn btn-success " name="maf_lrapi_settings_form_update">UPDATE</button>
                        </div>
    				</div>
    			</form>
    		</div>
    	</div>
	</div>
</div>