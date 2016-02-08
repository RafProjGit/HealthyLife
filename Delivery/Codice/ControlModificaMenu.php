<?php

include_once "MenuManager.php";
include_once "Menu.php";

$menMan = new MenuManager();
if(isset($_GET['userId'])){
    $pazienteId=$_GET['userId'];
    $menus = $menMan->getMenuByPaziente($pazienteId);
    if(count($menus) > 0){
        echo "<script type='text/javascript'>
                   newUrl= 'modificaMenuSettimanale.php?id='+'$pazienteId'
                window.location.replace(newUrl);
            </script>";
    }else{
        $res = $menMan->creaMenu($pazienteId);
        echo "<script type='text/javascript'>
                   newUrl= 'modificaMenuSettimanale.php?id='+'$pazienteId'
                window.location.replace(newUrl);
            </script>";
    }
} else if(!empty($_POST))
{
    foreach($_POST as $field_name => $val)
    {
        //clean post values
        $field_userid = strip_tags(trim($field_name));

        //separiamo dalla stringa ricevuta l'id dal nome della colonna
        $split_data = explode(':', $field_userid);
        $menuId = $split_data[1];
        $field_name = $split_data[0];
        if(!empty($menuId) && !empty($field_name) && !empty($val))
        {
            //update the values
            $res = $menMan->modificaMenu($field_name, $val, $menuId);
            if(!$res){
                //echo "Errore nella query al database";
            }
        } else {
            echo "Invalid Requests";
        }
    }
} else {
    echo "Invalid Requests";
}
