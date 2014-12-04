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
            'items_per_page' => 1,
        ));
        $pager_links = $pagination->render();

        $properties = $property->get_all($pagination->items_per_page,
            $pagination->offset);

        $view = View::factory('property')
            ->bind('properties', $properties)
            ->bind('pager_links', $pager_links);

        $this->template->view = $view;
	}

    public function action_add()
    {
        //add new property
        //redirect back to properties list
        $viewlet = View::factory('property/add_');
        $view = View::factory('property/add')
            //->bind('errors', $errors)
            ->bind('viewlet', $viewlet);
        $this->template->view = $view;

        if ($_POST)
        {

            $externalid = $_POST['externalid'];
            $availioid = $_POST['availioid'];
            $propertyname = $_POST['propertyname'];
            $propertytype = $_POST['propertytype'];
            $bedrooms =  $_POST['bedrooms'];
            $sleeps = $_POST['sleeps'];
            $province = $_POST['province'];
            $city = $_POST['city'];
            $suburb = $_POST['suburb'];
            $url = $_POST['url'];             

            echo $externalid.'</br>';
            echo $availioid.'</br>';
            echo $propertyname.'</br>';
            echo $propertytype.'</br>';
            echo $bedrooms.'</br>';
            echo $sleeps.'</br>';
            echo $province.'</br>';
            echo $city.'</br>';
            echo $suburb.'</br>';
            echo $url.'</br>';


        }



    }


} // End Property
