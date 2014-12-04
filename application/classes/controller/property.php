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

    //NightsBridge API
    private function sendPostData($url, $post){
        $headers= array('Accept: application/json','Content-Type: application/json');
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$post);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }

    public function action_search()
    {
        header('Content-Type: application/json');
        $nbid = '533';
        $pwd = 'jdawgs';

        if ($_POST){

            header('Content-Type: application/json');
            //*** TO DO: Make these configurable
            $nbid = '533';
            $pwd = 'jdawgs';

            //hit API and get  curl response

            //get bbid from DB and build bblist arrary
            $bblist = json_encode(array(17631, 17632, 17633));

            //get start/in date and end/out date from UI

            $startdate = $_POST['date-picker-input-1'];
            $enddate = $_POST['date-picker-input-2'];

            $json_str  = "{
                messagename: 'AvailRQ',
                credentials: {nbid: $nbid, password: $pwd},
                bblist: {
                bbid: $bblist
                },
                startdate: '$startdate',
                enddate: '$enddate'
              }";

            $url_send ="http://www.nightsbridge.co.za/bridge/jsonapi/4.0";
            $data = $json_str;

            $response = $this->sendPostData($url_send, $data);
            $curlresponse = json_decode($response, true);

        }

        $viewlet = View::factory('property/_search')
            ->bind('curlresponse', $curlresponse);
        $view = View::factory('property/side')
            ->bind('viewlet', $viewlet);
        $this->template->view = $view;
    }



} // End Property
