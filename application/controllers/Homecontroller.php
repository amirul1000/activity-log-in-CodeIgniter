<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Author: Amirul Momenin
 * Desc:Landing Page
 */
class Homecontroller extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->helper(array(
            'cookie',
            'url'
        ));
        $this->load->database();
        if (! $this->session->userdata('validated')) {
            redirect('admin/login/index');
        }
    }

    /**
     * Index Page for this controller.
     */
    public function index()
    {
		$data['bookings'] = $this->db->select('bookings.*,users.first_name,users.last_name')
         ->from('bookings')
         ->join('users', 'users.id = bookings.assign_to_driver_users_id')
		 ->get()->result_array();
		
        $data['_view'] = 'admin_homepage';
        $this->load->view('layouts/admin/body', $data);
    }
}
