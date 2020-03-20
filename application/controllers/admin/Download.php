<?php

/**
 * Author: Amirul Momenin
 * Desc:Company Controller
 *
 */
class Download extends CI_Controller
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
        if (! $this->session->userdata('validated')) {
            redirect('admin/login/index');
        }
    }

    /**
     * Index Page for this controller.
     *
     * @param $start -
     *            Starting of company table's index to get query
     *            
     */
    function index()
    {
        
        $data['_view'] = 'admin/download/index';
        $this->load->view('layouts/admin/body', $data);
    }
	
	function export()
    {
       // Load the DB utility class
		$this->load->dbutil();
		
		// Backup your entire database and assign it to a variable
		$backup = $this->dbutil->backup();
		
		// Load the file helper and write the file to your server
		$this->load->helper('file');
		write_file(VIEWPATH.'/admin/download/mybackup.gz', $backup);
		
		// Load the download helper and send the file to your desktop
		$this->load->helper('download');
		force_download('mybackup.gz', $backup);
    }


}
//End of Company controller