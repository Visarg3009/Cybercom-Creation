<?php
include 'connection.php';
$obj = new query();

if (isset($_GET['id']) && $_GET['id']!='') {
    $id = $obj->get_safe_str($_GET['id']);
    $condition_arr=array('id'=>$id);
    $obj->deleteData('contacts',$condition_arr);

    header('location:contacts.php');
}
?>