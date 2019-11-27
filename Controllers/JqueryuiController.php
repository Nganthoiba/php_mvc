<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of JqueryuiController
 *
 * @author Nganthoiba
 */
class JqueryuiController extends Controller{
    //put your code here
    public function index(){
        Config::set('site_name', "Testing Jquery UI");
        return $this->view();
    }
}
