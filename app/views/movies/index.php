<div id="movies" > 
	 <div class="actions-content"> 
		 <button id="js-new" class="js-button ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only"> 
			 <span class="ui-button-text"><?php echo I18n("new_movy");?></span> 
		 </button> 
		 <div class="both"></div> 
	 </div> 
	 <div id="waiting" ></div> 
	 <table id="table-movies" class="display ex_highlight_row js-table-sorter"> 
		 <thead> 
			 <tr class="ui-widget-header "> 
                             <?php if ($session->get_user_status_id() == MEMBERSTATUS){?>
				 <th class="column-action"></th> 
                                 <?php }?>
                                 <th class="column-jacket"><?php echo I18n("jacket");?></th> 
				 <th class="column-title-vf"><?php echo I18n("title_vf");?></th> 
				 <th class="column-title-vo"><?php echo I18n("title_vo");?></th> 
				 <th class="column-year"><?php echo I18n("year");?></th> 
				 <th class="column-synopsis"><?php echo I18n("synopsis");?></th> 
				 <th class="column-edition"><?php echo I18n("edition");?></th> 
				 <th class="column-distributor"><?php echo I18n("distributor");?></th> 
				 <th class="column-zone"><?php echo I18n("zone");?></th> 
				 <th class="column-duration"><?php echo I18n("duration");?></th> 
				 <th class="column-trailer"><?php echo I18n("trailer");?></th> 
				 <th class="column-loan"><?php echo I18n("loan");?></th> 
				 <th class="column-barcode"><?php echo I18n("barcode");?></th> 
				 <th class="column-manuel"><?php echo I18n("manuel");?></th>
                 <th class="column-price"><?php echo I18n("price");?></th> 
			 </tr> 
		 </thead> 
		 <tbody> 
		 <?php 
		 if($movies){ 
			 foreach ($movies as $movy) { ?> 
                     
				 <tr class="line js-over" id="line-<?php echo $movy->get_id(); ?>" > 
                                     <?php if ($session->get_user_status_id() == MEMBERSTATUS){?>
					 <td class="column-action "> 
                                             
						 <div class="action-icons"> 
							 <div class="delete js-delete js-button ui-widget-content ui-corner-all"> 
								 <span class="ui-icon ui-icon-close" title="<?php echo I18n("delete");?>"></span> 
							 </div>
                                    
							 <div class="update js-update js-button ui-state-default ui-corner-all" > 
								 <span class="ui-icon ui-icon-pencil" title="<?php echo I18n("edit");?>"></span> 
							 </div> 
						 </div>
                                             <?php }?>
					 </td>
                                         <?php if ($movy->get_jacket()!= ''){ ?>  
                                         <td class="jacket"><img src="../public/upload/<?php echo $movy->get_jacket(); ?>" id="img-jacket" class='js-show-view'/></td>
                                         <?php }else{ ?>
                                         <td class="jacket"><img src="../public/upload/jaquette-indisponible.gif" id="img-jacket"/></td>
                                         <?php } ?>
					 <td class="title-vf "><?php echo $movy->get_title_vf(); ?></td> 
					 <td class="title-vo "><?php echo $movy->get_title_vo(); ?></td> 
					 <td class="year "><?php echo localize($movy->get_year()); ?></td> 
					 <td class="synopsis " title="<?php echo $movy->get_synopsis();?>"><?php echo truncate_field($movy->get_synopsis(), '20'); ?></td>
                                  	 <td class="edition "><?php echo $movy->get_edition(); ?></td> 
					 <td class="distributor "title="<?php echo $movy->get_distributor();?>"><?php echo truncate_field($movy->get_distributor(),"10"); ?></td> 
					 <td class="zone "><?php echo $movy->get_zone(); ?></td> 
					 <td class="duration "><?php echo $movy->get_duration(); ?></td> 
					 <td class="trailer "><?php echo $movy->get_trailer(); ?></td> 
					 <td class="loan icon-check js-icon-check <?php if($movy->get_loan() == '1'){echo 'is-checked';} ?>"><?php echo $movy->get_loan(); ?></td> 
					 <td class="barcode "><?php echo $movy->get_barcode(); ?></td> 
					 <td class="manuel icon-check js-icon-check"><?php if($movy->get_manuel() != '0'){ ?><img src="/public/images/code128bar.jpg" width="40" /><?php }else{ ?><img src="/public/images/saisie.png" width="50" height="35"/><?php } ?><?php echo $movy->get_manuel(); ?></td>
                     <td class="price "><?php echo $movy->get_price(); ?></td> 
				 </tr> 
			 <?php } 
			 } ?> 
		 </tbody> 
	 </table> 
 </div> 
 <div id="js-dialog-form"></div> 
 <div id="js-dialog-delete"></div> 
 <div id="js-path" class="hidden"><?php echo $controller."/"; ?></div> 
 <div id="js-message-delete" class="hidden"><?php echo I18n("delete_movy");?></div> 
 <div id="js-table-no-data" class="hidden"><?php echo I18n("table_no_data");?></div> 
