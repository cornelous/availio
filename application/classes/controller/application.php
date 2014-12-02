<?php defined('SYSPATH') or die('No direct script access.');

abstract class Controller_Application extends Controller_Template {

    public function before()
    {
        parent::before();

        //Global variables
        View::set_global('site_name', 'Availio - FREE Online Booking and Calendar System');

        $this->template->view = '';
        $this->template->styles = array('admin', 'admin-calendar', 'admin-calendar_1', 'admin-pages', 'mootools-roar', 'nigran.datepicker', 'jquery-ui-1.10.1');
        $this->template->styles = array('easy-responsive-tabs');
        $this->template->scripts = array();
    }

}
