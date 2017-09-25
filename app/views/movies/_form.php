<input type="hidden" name="movy[id]" id="input-id" class="ui-widget-content ui-corner-all js-form " value="<?php echo $movy->get_id(); ?>" /> 
<div class="line-form "> 
	 <label class="label-form"> 
		 <?php echo I18n("title_vf"); ?> : <span class="mandatory ">*</span>
	 </label> 
	 <div class="content-input-form" > 
		 <input type="text" name="movy[title_vf]" id="input-title-vf" class="ui-widget-content ui-corner-all js-form js-mandatory js-show-view " value="<?php echo $movy->get_title_vf($encoding); ?>" <?php if($movy->get_manuel() == '1'){?>disabled="disabled"<?php } ?>/> 
	 </div> 
	 <div class="content-error-form ui-state-highlight ui-corner-all hidden"> 
		 <span class="icon-error-form ui-icon ui-icon-alert"></span> 
		 <div class="error-form hidden" id="error-not-null-title-vf"><?php echo I18n("error_not_null"); ?></div> 
	 </div> 
</div> 
<div class="line-form "> 
	 <label class="label-form"> 
		 <?php echo I18n("title_vo"); ?> : <span class="mandatory "></span>
	 </label> 
	 <div class="content-input-form" > 
		 <input type="text" name="movy[title_vo]" id="input-title-vo" class="ui-widget-content ui-corner-all js-form js-show-view " value="<?php echo $movy->get_title_vo($encoding); ?>" <?php if($movy->get_manuel() == '1'){?>disabled="disabled"<?php } ?>/> 
	 </div> 
	 <div class="content-error-form ui-state-highlight ui-corner-all hidden"> 
		 <span class="icon-error-form ui-icon ui-icon-alert"></span> 
		 <div class="error-form hidden" id="error-not-null-title-vo"><?php echo I18n("error_not_null"); ?></div> 
	 </div> 
</div> 
<div class="line-form "> 
	 <label class="label-form"> 
		 <?php echo I18n("year"); ?> : <span class="mandatory ">*</span>
	 </label> 
	 <div class="content-input-form" > 
		 <input type="text" name="movy[year]" id="input-year" class="ui-widget-content ui-corner-all js-form js-mandatory js-show-view js-date" value="<?php echo localize($movy->get_year($encoding)); ?>" <?php if($movy->get_manuel() == '1'){?>disabled="disabled"<?php } ?>/> 
	 </div> 
	 <div class="content-error-form ui-state-highlight ui-corner-all hidden"> 
		 <span class="icon-error-form ui-icon ui-icon-alert"></span> 
		 <div class="error-form hidden" id="error-not-null-year"><?php echo I18n("error_not_null"); ?></div> 
	 </div> 
</div> 
<div class="line-form "> 
	 <label class="label-form"> 
		 <?php echo I18n("synopsis"); ?> : <span class="mandatory "></span>
	 </label> 
	 <div class="content-input-form" > 
		 <input type="text" name="movy[synopsis]" id="input-synopsis" class="ui-widget-content ui-corner-all js-form js-show-view " value="<?php echo $movy->get_synopsis($encoding); ?>" <?php if($movy->get_manuel() == '1'){?>disabled="disabled"<?php } ?>/> 
	 </div> 
	 <div class="content-error-form ui-state-highlight ui-corner-all hidden"> 
		 <span class="icon-error-form ui-icon ui-icon-alert"></span> 
		 <div class="error-form hidden" id="error-not-null-synopsis"><?php echo I18n("error_not_null"); ?></div> 
	 </div> 
</div> 
<div class="line-form "> 
	 <label class="label-form"> 
		 <?php echo I18n("jacket"); ?> : <span class="mandatory "></span>
	 </label> 
	 <div class="content-input-form" > 
		 <input type="file" name="file" id="file" class="ui-widget-content ui-corner-all js-form js-show-view " value="<?php echo $movy->get_jacket($encoding); ?>" <?php if($movy->get_manuel() == '1'){?>disabled="disabled"<?php } ?>/> 
	 </div> 
         <div id="prev">
             <img id="img_upload"/>
             <input type='hidden' id="input-jacket" name="movy[jacket]" class='js-show-view'value="<?php echo $movy->get_jacket($encoding); ?>"/>
             <?php if ($movy->get_jacket()!= '') {?>
             <img id="img_upload" src= "../public/upload/<?php echo $movy->get_jacket();?>" class='js-show-view'/>
             <?php }?>
         </div>
         <progress id="progress" class="hidden"></progress>
</div> 
<div class="line-form "> 
	 <label class="label-form"> 
		 <?php echo I18n("edition"); ?> : <span class="mandatory "></span>
	 </label> 
	 <div class="content-input-form" > 
		 <input type="text" name="movy[edition]" id="input-edition" class="ui-widget-content ui-corner-all js-form js-show-view " value="<?php echo $movy->get_edition($encoding); ?>" <?php if($movy->get_manuel() == '1'){?>disabled="disabled"<?php } ?>/> 
	 </div>
       	 <div class="content-error-form ui-state-highlight ui-corner-all hidden"> 
		 <span class="icon-error-form ui-icon ui-icon-alert"></span> 
		 <div class="error-form hidden" id="error-not-null-edition"><?php echo I18n("error_not_null"); ?></div> 
	 </div> 
</div> 
<div class="line-form "> 
	 <label class="label-form"> 
		 <?php echo I18n("distributor"); ?> : <span class="mandatory "></span>
	 </label> 
	 <div class="content-input-form" > 
		 <input type="text" name="movy[distributor]" id="input-distributor" class="ui-widget-content ui-corner-all js-form js-show-view " value="<?php echo $movy->get_distributor($encoding); ?>" <?php if($movy->get_manuel() == '1'){?>disabled="disabled"<?php } ?>/> 
	 </div> 
	 <div class="content-error-form ui-state-highlight ui-corner-all hidden"> 
		 <span class="icon-error-form ui-icon ui-icon-alert"></span> 
		 <div class="error-form hidden" id="error-not-null-distributor"><?php echo I18n("error_not_null"); ?></div> 
	 </div> 
</div> 
<div class="line-form "> 
	 <label class="label-form"> 
		 <?php echo I18n("zone"); ?> : <span class="mandatory "></span>
	 </label> 
	 <div class="content-input-form" > 
		 <input type="text" name="movy[zone]" id="input-zone" class="ui-widget-content ui-corner-all js-form js-show-view " value="<?php echo $movy->get_zone($encoding); ?>" <?php if($movy->get_manuel() == '1'){?>disabled="disabled"<?php } ?> /> 
	 </div> 
	 <div class="content-error-form ui-state-highlight ui-corner-all hidden"> 
		 <span class="icon-error-form ui-icon ui-icon-alert"></span> 
		 <div class="error-form hidden" id="error-not-null-zone"><?php echo I18n("error_not_null"); ?></div> 
	 </div> 
</div> 
<div class="line-form "> 
	 <label class="label-form"> 
		 <?php echo I18n("duration"); ?> : <span class="mandatory ">*</span>
	 </label> 
	 <div class="content-input-form" > 
		 <input type="text" name="movy[duration]" id="input-duration" class="ui-widget-content ui-corner-all js-form js-mandatory js-show-view js-numeric" value="<?php echo $movy->get_duration($encoding); ?>" <?php if($movy->get_manuel() == '1'){?>disabled="disabled"<?php } ?> /> 
	 </div> 
	 <div class="content-error-form ui-state-highlight ui-corner-all hidden"> 
		 <span class="icon-error-form ui-icon ui-icon-alert"></span> 
		 <div class="error-form hidden" id="error-not-null-duration"><?php echo I18n("error_not_null"); ?></div> 
	 </div> 
</div> 
<div class="line-form "> 
	 <label class="label-form"> 
		 <?php echo I18n("trailer"); ?> : <span class="mandatory "></span>
	 </label> 
	 <div class="content-input-form" > 
		 <input type="text" name="movy[trailer]" id="input-trailer" class="ui-widget-content ui-corner-all js-form js-show-view " value="<?php echo $movy->get_trailer($encoding); ?>" <?php if($movy->get_manuel() == '1'){?>disabled="disabled"<?php } ?>/> 
	 </div> 
	 <div class="content-error-form ui-state-highlight ui-corner-all hidden"> 
		 <span class="icon-error-form ui-icon ui-icon-alert"></span> 
		 <div class="error-form hidden" id="error-not-null-trailer"><?php echo I18n("error_not_null"); ?></div> 
	 </div> 
</div> 

<div class="line-form "> 
	 <label class="label-form"> 
		 <?php echo I18n("barcode"); ?> : <span class="mandatory "></span>
	 </label> 
	 <div class="content-input-form" > 
		 <input type="text" name="movy[barcode]" id="input-barcode" class="ui-widget-content ui-corner-all js-form js-show-view " value="<?php echo $movy->get_barcode($encoding); ?>" disabled="disabled"/> 
	 </div> 
	 <div class="content-error-form ui-state-highlight ui-corner-all hidden"> 
		 <span class="icon-error-form ui-icon ui-icon-alert"></span> 
		 <div class="error-form hidden" id="error-not-null-barcode"><?php echo I18n("error_not_null"); ?></div> 
	 </div> 
</div> 

<div class="line-form "> 
	 <label class="label-form"> 
		 <?php echo I18n("price"); ?> : <span class="mandatory "></span>
	 </label> 
	 <div class="content-input-form" > 
		 <input type="text" name="movy[price]" id="input-price" class="ui-widget-content ui-corner-all js-form js-show-view js-decimal" value="<?php echo $movy->get_price($encoding); ?>" <?php if($movy->get_manuel() == '1'){?>disabled="disabled"<?php } ?>/> 
	 </div> 
	 <div class="content-error-form ui-state-highlight ui-corner-all hidden"> 
		 <span class="icon-error-form ui-icon ui-icon-alert"></span> 
		 <div class="error-form hidden" id="error-not-null-price"><?php echo I18n("error_not_null"); ?></div> 
	 </div> 
</div>


<div class="line-form "> 
	 <label class="label-form"> 
		 <?php echo I18n("loan"); ?> : <span class=""></span>
	 </label> 
	 <div class="content-input-form" > 
		 <?php if($movy->get_loan() == '1') { $checked="checked"; } else { $checked=""; }  ?> 
		 <input type="hidden" name="movy[loan]" class="" value="0" /> 
		 <input <?php echo $checked; ?> type="checkbox" name="movy[loan]" id="input-loan" class="ui-widget-content ui-corner-all js-form js-show-view js-checkbox " value="1" onclick="emprunt(this);"/> 
	 </div> 
	 <div class="content-error-form ui-state-highlight ui-corner-all hidden">
		 <span class="icon-error-form ui-icon ui-icon-alert"></span> 
		 <div class="error-form hidden" id="error-not-null-loan"><?php echo I18n("error_not_null"); ?></div> 
	 </div> 
</div> 

<?php  $loans = $loan->find($session->get_id(),$movy->get_id()); ?>

<div id="cadre_loan" <?php if($movy->get_loan() == 0) { ?>style="display:none"<?php } ?>>

	<div id="cadre_first"><p>Pr&ecirc;t pour une personne Ext&eacute;rieur au site :</p>
		

    		<div class="line-form ">
         		<label class="label-form"> 
             	Nom : <span class="mandatory "></span>
        	 	</label> 
         		<div class="content-input-form" > 
                            <?php if(($movy->get_loan() == '1') && ( $loans->get_id_user() == '')){?>
                        <input onblur="focus_loan();" type="text" name="nom_pret" id="input-name" class="loan_in ui-widget-content js-form js-mandatory ui-corner-all" value="<?php echo $loans->get_name();?>" <?php if(($movy->get_loan() == '1') && ( $loans->get_id_user() != '')){ ?>disabled="disabled"<?php } ?>/>      
                            <?php }else{?>
             			<input onblur="focus_loan();" type="text" name="nom_pret" id="input-name" class="loan_in ui-widget-content ui-corner-all" <?php if(($movy->get_loan() == '1') && ( $loans->get_id_user() != '')){ ?>disabled="disabled"<?php } ?>/> 
                        <?php }?>
         		</div> 
    		</div> 

    	<div class="line-form ">
        	 <label class="label-form"> 
             Prenom : <span class="mandatory "></span>
         	</label> 
         	<div class="content-input-form" > 
                       <?php if(($movy->get_loan() == '1') && ( $loans->get_id_user() == '')){?>                    
            	 <input onblur="focus_loan();" type="text" name="prenom_pret" id="input-firstname" class="loan_in ui-widget-content js-form js-mandatory ui-corner-all " value="<?php echo $loans->get_firs_name();?>" <?php if(($movy->get_loan() == '1') && ( $loans->get_id_user() != '')){ ?>disabled="disabled"<?php } ?>/> 
            	  <?php }else{?>
                 <input onblur="focus_loan();" type="text" name="prenom_pret" id="input-firstname" class="loan_in ui-widget-content ui-corner-all " <?php if(($movy->get_loan() == '1') && ( $loans->get_id_user() != '')){ ?>disabled="disabled"<?php } ?>/> 
         	<?php }?>
                </div> 
   		 </div> 

	    <div class="line-form ">
	         <label class="label-form"> 
	             Email : <span class="mandatory "></span>
	         </label> 
	         <div class="content-input-form" > 
                     <?php if(($movy->get_loan() == '1') && ( $loans->get_id_user() == '')){?>
	             <input onblur="focus_loan();" type="text" name="email_pret" id="input-mail" class="loan_in ui-widget-content js-form js-mandatory ui-corner-all "  value="<?php echo $loans->get_email();?>" <?php if(($movy->get_loan() == '1') && ( $loans->get_id_user() != '')){ ?>disabled="disabled"<?php } ?>/> 
                     <?php }else{?>
	             <input onblur="focus_loan();" type="text" name="email_pret" id="input-mail" class="loan_in ui-widget-content ui-corner-all " <?php if(($movy->get_loan() == '1') && ( $loans->get_id_user() != '')){ ?>disabled="disabled"<?php } ?>/> 
	         <?php }?>
                 </div> 
	    </div>
	
		
	</div>
<?php $user_loan = $user->find_by_id($loans->get_id_user());?>
    <div id="cadre_second"><p>Pr&ecirc;t pour une personne du site :</p>

            <div class="line-form ">
                <label id="membre" class="label-form">
                     Membre : <span class="mandatory "></span>
                </label> 
                <div class="content-input-form"> 
                    <?php if($movy->get_loan() == '1'){?>
                    <select  name="user_loan" id="user_loan" onchange="change_loan(this);" <?php if(($movy->get_loan() == '1') && ( $loans->get_id_user() == '')){ ?>disabled="disabled"<?php } ?>>
                        <option value=''><?php  echo $user_loan->get_name().' '.$user_loan->get_first_name();?></option>
                        <?php foreach ($users as $user) { 
                            if ($user->get_id() != $loans->get_id_user()){?>
                        <option value=<?php echo $user->get_id() ; ?>><?php echo $user->get_name().' '.$user->get_first_name(); ?></option> 
                         <?php } ?>
                        <?php } ?>
                        <option value="0">pas de membre interne </option> 
                    </select>  
                     <?php }else{?>   
                    <select  name="user_loan" id="user_loan" onchange="change_loan(this);"> 
                    		   <option value="0"></option> 
                    	<?php foreach ($users as $user) { ?>
                               <option value=<?php echo $user->get_id() ; ?>><?php echo $user->get_name().' '.$user->get_first_name(); ?></option> 
                        <?php } ?>
                    </select> 
                   <?php }?>     
                </div> 
            </div>

    </div>

</div>
