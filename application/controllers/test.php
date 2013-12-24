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
    
    public function index() {
        $this->load->model('restaurant/restaurant_apis');
        $this->restaurant_apis->get_all_restaurant_similar(100, 1, '52b17e0b6b2bf5b80d000002');
    }
    
}
