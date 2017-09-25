<div id="my-account">
    <div id="content_formulaire" class="ui-widget ui-widget-content ui-corner-all " aria-labelledby="ui-dialog-title-dialog-form">
        <div class="ui-dialog-titlebar ui-widget-header ui-corner-top ui-helper-clearfix">
            <span class="ui-dialog-title Users_titleBar" id="ui-dialog-title-dialog-form"><?php echo I18n("my_account"); ?></span>
        </div>

        <div class="ui-dialog-content ui-widget-content" > 
            <form method="POST" id="form" action="users/update/<?php echo $session->get_id(); ?>" > 
                <?php require_once ("_form_seconde.php"); ?>
                <input type="hidden" name="origin_action" value="<?php echo $action; ?>" />
                <div id="content-button"> 
                    <div id="form-button" class="hidden"> 
                        <div id="save-form" class="js-button ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only"> 
                            <span class="ui-button-text"><?php echo I18n("save"); ?></span> 
                        </div> 
                    </div> 
                </div> 
            </form> 
        </div>
    </div> 
</div>