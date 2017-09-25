<?php

define("LANGUAGE", 'fr');
define("DATEJOUR", date('Y-m-d'));
define("PATHCAPTCHA", "/librairies/captcha");

$locale = locale($_REQUEST['locale']);
$return = path_return();
$encoding = "";

// Déclaration des constantes
//dev
define("URL","");
define("EMAILADMIN","no-reply@sgdm-services.com");

// BRI
define("BRI", "1");
$bri_delivery_addresses = array("store" => I18n('bri_delivery_address_store'), "home" => I18n('bri_delivery_address_home'), "other" => I18n('bri_delivery_address_other'));
$raffle_delivery_addresses = array("warehouse" => I18n('raffle_delivery_address_warehouse'), "home" => I18n('raffle_delivery_address_home'), "store" => I18n('raffle_delivery_address_store'), "other" => I18n('raffle_delivery_address_other'));

// Jour de délai minimum pour la date de livraison
define("NBDAYDELIVERY", "10");

// Status Utilisateur
define("ADMINSTATUS", "1");
define("MEMBERSTATUS", "2");
define("RDVSTATUS", "3");

// Entete des fichiers d'import
define("HEADERIMPORTPRODUCT", "|Survey_Name|Survey_Question|Description|Gencod|UC_caisse|UC_pal|Tarif|BR|BRI_Coef|Code PRO");
define("HEADERIMPORTCUSTOMER", "Unit_Group,State,City,Suburb,Street_Address,PostCode,Group,Banner,Customer_Type,Channel,Grade,Territory_Name,User_Name,User_Role,CustomerName,Customer_Number_1,Store_Chain_No,NoCheckouts,Store_Size,callfrequency,Custom1,Custom2,Custom3");

// Export
define("EXPORTSHEETNAME", "prépa vol");

?>
