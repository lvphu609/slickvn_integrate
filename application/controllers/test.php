<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of test
 *
 * @author Huynh
 */
class Test extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        
    }
    
//    public function index() {
//        $this->load->model('restaurant/restaurant_apis');
//        $this->load->model('common/common_apis');
//        
//    }
    
    public function t($t, $t1) {
        echo $t.' - '.$t1;
    }
    
    public function aaa($action, $id=null, $name, $desc=null, $function_list) {
        $this->load->model('user/user_apis');
        $check = $this->user_apis->update_role($action, $id, $name, $desc, $function_list);
        
        print_r($check);
        
    }
    
    public function get_list_restaurant_liked_by_user($l, $p, $id_user) {
        $this->load->model('restaurant/restaurant_apis');
        $check = $this->restaurant_apis->get_list_restaurant_liked_by_user($l, $p, $id_user);
        
        print_r($check);
        
    }
    
    public function get_list_user_liked_restaurant($l, $p, $id_r) {
        $this->load->model('restaurant/restaurant_apis');
        $check = $this->restaurant_apis->get_list_user_liked_restaurant($l, $p, $id_r);
        
        print_r($check);
        
    }
    
    
}
