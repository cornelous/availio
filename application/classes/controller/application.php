<?php defined('SYSPATH') or die('No direct script access.');

abstract class Controller_Application extends Controller_Template {

    public function before()
    {
        parent::before();

        //Global variables
        View::set_global('site_name', 'Availio - FREE Online Booking Calendar');

        $this->template->view = '';
        $this->template->styles = array('common', 'styles');
        $this->template->scripts = array();
    }

}
