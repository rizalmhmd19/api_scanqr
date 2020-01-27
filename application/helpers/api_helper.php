<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('myimei')){
   function myimei($imei){
       //get main CodeIgniter object
       $ci =& get_instance();
       $myimei = $imei;

       return $myimei;
   }
}
