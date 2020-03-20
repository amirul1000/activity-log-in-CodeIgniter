<?php

/**
 * Author: Amirul Momenin
 * Desc:Bookings Controller
 *
 */
class Bookings extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->library('pagination');
        $this->load->library('Customlib');
        $this->load->helper(array(
            'cookie',
            'url'
        ));
        $this->load->database();
        $this->load->model('Bookings_model');
        if (! $this->session->userdata('validated')) {
            redirect('admin/login/index');
        }
    }

    /**
     * Index Page for this controller.
     *
     * @param $start -
     *            Starting of bookings table's index to get query
     *            
     */
    function index($start = 0)
    {
        $limit = 10;
        $data['bookings'] = $this->Bookings_model->get_limit_bookings($limit, $start);
        // pagination
        $config['base_url'] = site_url('admin/bookings/index');
        $config['total_rows'] = $this->Bookings_model->get_count_bookings();
        $config['per_page'] = 10;
        // Bootstrap 4 Pagination fix
        $config['full_tag_open'] = '<div class="pagging text-center"><nav><ul class="pagination">';
        $config['full_tag_close'] = '</ul></nav></div>';
        $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close'] = '</span></li>';
        $config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close'] = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['next_tag_close'] = '<span aria-hidden="true"></span></span></li>';
        $config['next_tag_close'] = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['prev_tag_close'] = '</span></li>';
        $config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['first_tag_close'] = '</span></li>';
        $config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['last_tag_close'] = '</span></li>';
        $this->pagination->initialize($config);
        $data['link'] = $this->pagination->create_links();

        $data['_view'] = 'admin/bookings/index';
        $this->load->view('layouts/admin/body', $data);
    }

    /**
     * Save bookings
     *
     * @param $id -
     *            primary key to update
     *            
     */
    function save($id = - 1)
    {
        $created_at = "";
        $updated_at = "";

        if ($id <= 0) {
            $created_at = date("Y-m-d H:i:s");
        } else if ($id > 0) {
            $updated_at = date("Y-m-d H:i:s");
        }

        $params = array(
		    'added_by_users_id' => $this->session->userdata('id'),
            'booking_date' => html_escape($this->input->post('booking_date')),
            'booking_time' => html_escape($this->input->post('booking_time')),
            'customers_id' => html_escape($this->input->post('customers_id')),
            'number_of_passengers' => html_escape($this->input->post('number_of_passengers')),
            'pickup_address' => html_escape($this->input->post('pickup_address')),
            'drop_off_address' => html_escape($this->input->post('drop_off_address')),
            'return_journey' => html_escape($this->input->post('return_journey')),
            'return_date' => html_escape($this->input->post('return_date')),
            'return_time' => html_escape($this->input->post('return_time')),
            'return_flight_number' => html_escape($this->input->post('return_flight_number')),
            'contact_telephone_number' => html_escape($this->input->post('contact_telephone_number')),
            'total_fare' => html_escape($this->input->post('total_fare')),
            'paid_or_unpaid' => html_escape($this->input->post('paid_or_unpaid')),
            'payment_method' => html_escape($this->input->post('payment_method')),
            'comments_for_booking' => html_escape($this->input->post('comments_for_booking')),
            'type_of_taxi' => html_escape($this->input->post('type_of_taxi')),
            'type_of_vehicle_required' => html_escape($this->input->post('type_of_vehicle_required')),
            'assign_to_driver_users_id' => html_escape($this->input->post('assign_to_driver_users_id')),
            'allocated_pickup_time' => html_escape($this->input->post('allocated_pickup_time')),
            'allocated_finish_time_of_booking_for_the_day' => html_escape($this->input->post('allocated_finish_time_of_booking_for_the_day')),
            'customer_type' => html_escape($this->input->post('customer_type')),
            'source_of_booking' => html_escape($this->input->post('source_of_booking')),
            'created_at' => $created_at,
            'updated_at' => $updated_at
        );

        if ($id > 0) {
            unset($params['created_at']);
        }
        if ($id <= 0) {
            unset($params['updated_at']);
        }
        $data['id'] = $id;
        // update
        if (isset($id) && $id > 0) {
            $data['bookings'] = $this->Bookings_model->get_bookings($id);
            if (isset($_POST) && count($_POST) > 0) {
                $this->Bookings_model->update_bookings($id, $params);
				
				//activity
			$this->load->model('Log_model');
			$params = array(
							'users_id' => $this->session->userdata('id'),
							'action' => 'update bookings '.$id,
							'ip' =>  $_SERVER['REMOTE_ADDR'],
							'created_at' =>date("Y-m-d H:i:s"),
							'updated_at' =>date("Y-m-d H:i:s"),
					);
			$this->Log_model->add_log($params);
			///////////
				
				
                redirect('admin/bookings/index');
            } else {
                $data['_view'] = 'admin/bookings/form';
                $this->load->view('layouts/admin/body', $data);
            }
        } // save
        else {
            if (isset($_POST) && count($_POST) > 0) {
                $bookings_id = $this->Bookings_model->add_bookings($params);
				//activity
			$this->load->model('Log_model');
			$params = array(
							'users_id' => $this->session->userdata('id'),
							'action' => 'save bookings '.$bookings_id,
							'ip' =>  $_SERVER['REMOTE_ADDR'],
							'created_at' =>date("Y-m-d H:i:s"),
							'updated_at' =>date("Y-m-d H:i:s"),
					);
			$this->Log_model->add_log($params);
			///////////
                redirect('admin/bookings/index');
            } else {
                $data['bookings'] = $this->Bookings_model->get_bookings(0);
                $data['_view'] = 'admin/bookings/form';
                $this->load->view('layouts/admin/body', $data);
            }
        }
    }

    /**
     * Details bookings
     *
     * @param $id -
     *            primary key to get record
     *            
     */
    function details($id)
    {
        $data['bookings'] = $this->Bookings_model->get_bookings($id);
        $data['id'] = $id;
        $data['_view'] = 'admin/bookings/details';
        $this->load->view('layouts/admin/body', $data);
    }

    /**
     * Deleting bookings
     *
     * @param $id -
     *            primary key to delete record
     *            
     */
    function remove($id)
    {
        $bookings = $this->Bookings_model->get_bookings($id);

        // check if the bookings exists before trying to delete it
        if (isset($bookings['id'])) {
            $this->Bookings_model->delete_bookings($id);
            redirect('admin/bookings/index');
        } else
            show_error('The bookings you are trying to delete does not exist.');
    }

    /**
     * Search bookings
     *
     * @param $start -
     *            Starting of bookings table's index to get query
     */
    function search($start = 0)
    {
        if (! empty($this->input->post('key'))) {
            $key = $this->input->post('key');
            $_SESSION['key'] = $key;
        } else {
            $key = $_SESSION['key'];
        }

        $limit = 10;
        $this->db->like('id', $key, 'both');
        $this->db->or_like('booking_date', $key, 'both');
        $this->db->or_like('booking_time', $key, 'both');
        $this->db->or_like('customers_id', $key, 'both');
        $this->db->or_like('number_of_passengers', $key, 'both');
        $this->db->or_like('pickup_address', $key, 'both');
        $this->db->or_like('drop_off_address', $key, 'both');
        $this->db->or_like('return_journey', $key, 'both');
        $this->db->or_like('return_date', $key, 'both');
        $this->db->or_like('return_time', $key, 'both');
        $this->db->or_like('return_flight_number', $key, 'both');
        $this->db->or_like('contact_telephone_number', $key, 'both');
        $this->db->or_like('total_fare', $key, 'both');
        $this->db->or_like('paid_or_unpaid', $key, 'both');
        $this->db->or_like('payment_method', $key, 'both');
        $this->db->or_like('comments_for_booking', $key, 'both');
        $this->db->or_like('type_of_taxi', $key, 'both');
        $this->db->or_like('type_of_vehicle_required', $key, 'both');
        $this->db->or_like('assign_to_driver_users_id', $key, 'both');
        $this->db->or_like('allocated_pickup_time', $key, 'both');
        $this->db->or_like('allocated_finish_time_of_booking_for_the_day', $key, 'both');
        $this->db->or_like('customer_type', $key, 'both');
        $this->db->or_like('source_of_booking', $key, 'both');
        $this->db->or_like('created_at', $key, 'both');
        $this->db->or_like('updated_at', $key, 'both');

        $this->db->order_by('id', 'desc');

        $this->db->limit($limit, $start);
        $data['bookings'] = $this->db->get('bookings')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }

        // pagination
        $config['base_url'] = site_url('admin/bookings/search');
        $this->db->reset_query();
        $this->db->like('id', $key, 'both');
        $this->db->or_like('booking_date', $key, 'both');
        $this->db->or_like('booking_time', $key, 'both');
        $this->db->or_like('customers_id', $key, 'both');
        $this->db->or_like('number_of_passengers', $key, 'both');
        $this->db->or_like('pickup_address', $key, 'both');
        $this->db->or_like('drop_off_address', $key, 'both');
        $this->db->or_like('return_journey', $key, 'both');
        $this->db->or_like('return_date', $key, 'both');
        $this->db->or_like('return_time', $key, 'both');
        $this->db->or_like('return_flight_number', $key, 'both');
        $this->db->or_like('contact_telephone_number', $key, 'both');
        $this->db->or_like('total_fare', $key, 'both');
        $this->db->or_like('paid_or_unpaid', $key, 'both');
        $this->db->or_like('payment_method', $key, 'both');
        $this->db->or_like('comments_for_booking', $key, 'both');
        $this->db->or_like('type_of_taxi', $key, 'both');
        $this->db->or_like('type_of_vehicle_required', $key, 'both');
        $this->db->or_like('assign_to_driver_users_id', $key, 'both');
        $this->db->or_like('allocated_pickup_time', $key, 'both');
        $this->db->or_like('allocated_finish_time_of_booking_for_the_day', $key, 'both');
        $this->db->or_like('customer_type', $key, 'both');
        $this->db->or_like('source_of_booking', $key, 'both');
        $this->db->or_like('created_at', $key, 'both');
        $this->db->or_like('updated_at', $key, 'both');

        $config['total_rows'] = $this->db->from("bookings")->count_all_results();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        $config['per_page'] = 10;
        // Bootstrap 4 Pagination fix
        $config['full_tag_open'] = '<div class="pagging text-center"><nav><ul class="pagination">';
        $config['full_tag_close'] = '</ul></nav></div>';
        $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close'] = '</span></li>';
        $config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close'] = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['next_tag_close'] = '<span aria-hidden="true"></span></span></li>';
        $config['next_tag_close'] = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['prev_tag_close'] = '</span></li>';
        $config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['first_tag_close'] = '</span></li>';
        $config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['last_tag_close'] = '</span></li>';
        $this->pagination->initialize($config);
        $data['link'] = $this->pagination->create_links();

        $data['key'] = $key;
        $data['_view'] = 'admin/bookings/index';
        $this->load->view('layouts/admin/body', $data);
    }

    /**
     * Export bookings
     *
     * @param $export_type -
     *            CSV or PDF type
     */
    function export($export_type = 'CSV')
    {
        if ($export_type == 'CSV') {
            // file name
            $filename = 'bookings_' . date('Ymd') . '.csv';
            header("Content-Description: File Transfer");
            header("Content-Disposition: attachment; filename=$filename");
            header("Content-Type: application/csv; ");
            // get data
            $this->db->order_by('id', 'desc');
            $bookingsData = $this->Bookings_model->get_all_bookings();
            // file creation
            $file = fopen('php://output', 'w');
            $header = array(
                "Id",
                "Booking Date",
                "Booking Time",
                "Customers Id",
                "Number Of Passengers",
                "Pickup Address",
                "Drop Off Address",
                "Return Journey",
                "Return Date",
                "Return Time",
                "Return Flight Number",
                "Contact Telephone Number",
                "Total Fare",
                "Paid Or Unpaid",
                "Payment Method",
                "Comments For Booking",
                "Type Of Taxi",
                "Type Of Vehicle Required",
                "Assign To Driver Users Id",
                "Allocated Pickup Time",
                "Allocated Finish Time Of Booking For The Day",
                "Customer Type",
                "Source Of Booking",
                "Created At",
                "Updated At"
            );
            fputcsv($file, $header);
            foreach ($bookingsData as $key => $line) {
                fputcsv($file, $line);
            }
            fclose($file);
            exit();
        } else if ($export_type == 'HTML') {
            $this->db->order_by('id', 'desc');
            $bookings = $this->db->get('bookings')->result_array();
            // get the HTML
            ob_start();
            include (APPPATH . 'views/admin/bookings/print_template.php');
            $html = ob_get_clean();
			echo $html;
            /*include (APPPATH . "third_party/vendor/autoload.php");
            $mpdf = new mPDF('', 'A4');
            // $mpdf=new mPDF('c','A4','','',32,25,27,25,16,13);
            // $mpdf->mirrorMargins = true;
            $mpdf->SetDisplayMode('fullpage');
            // ==============================================================
            $mpdf->autoScriptToLang = true;
            $mpdf->baseScript = 1; // Use values in classes/ucdn.php 1 = LATIN
            $mpdf->autoVietnamese = true;
            $mpdf->autoArabic = true;
            $mpdf->autoLangToFont = true;
            $mpdf->setAutoBottomMargin = 'stretch';
            $stylesheet = file_get_contents(APPPATH . "third_party/vendor/mpdf/mpdf/lang2fonts.css");
            $mpdf->WriteHTML($stylesheet, 1);
            $mpdf->WriteHTML($html);
            // $mpdf->AddPage();
            $mpdf->Output($filePath);
            $mpdf->Output();
            // $mpdf->Output( $filePath,'S');
            exit();*/
        }
    }
}
//End of Bookings controller