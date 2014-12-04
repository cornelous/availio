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

        $viewlet = View::factory('property/_list')
            ->bind('properties', $properties)
            ->bind('pager_links', $pager_links);

        $view = View::factory('property/side')
            ->bind('viewlet', $viewlet);

        $this->template->view = $view;
	}

    public function action_add()
    {
        //add new property
        //redirect back to properties list
        $viewlet = View::factory('property/_add');
        $view = View::factory('property/side')
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

           $property = new Model_Property;
           $newproperty = $property->add($externalid,$availioid,$propertyname,$propertytype,$bedrooms,$sleeps,$province,$city,$suburb,$url);

            if ($newproperty){
                echo "Record Added!";
                //redirect to property listing with success message
            }

        }

    }

    public function action_search(){

        if ($_POST){
            $curlresponse = "Awesome Response";
        }

        $viewlet = View::factory('property/_search');
        $view = View::factory('property/side')
            ->bind('curlresponse', $curlresponse)
            ->bind('viewlet', $viewlet);
        $this->template->view = $view;

        if ($_POST){
            echo "We are making headway";
        }

    }



} // End Property
