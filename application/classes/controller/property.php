<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Property extends Controller_Application {

	public function action_index()
	{
	    $session = Session::instance();
        $username = $session->get('username');

//         protecting my controllers --- to make a helper class later
//        if (!isset($username))
//        {
//          $this->request->redirect('login');
//        }

        $property = new Model_Property;
        $property_count = $property->count_all();

        $pagination = Pagination::factory(array(
            'total_items'
            => $property_count,
            'items_per_page' => 3,
        ));
        $pager_links = $pagination->render();

        $properties = $property->get_all($pagination->items_per_page,
            $pagination->offset);

        $view = View::factory('property')
            ->bind('properties', $properties)
            ->bind('pager_links', $pager_links);

        $this->template->view = $view;
	}



} // End Property
