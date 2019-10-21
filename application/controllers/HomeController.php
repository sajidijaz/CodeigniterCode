<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeController extends CI_Controller {

    /**
     * HomeController constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /** @description
     * This Function load the index file and pass the data with title on it
     * @param none
     * @return none
     */
    public function index()
	{
	    $data['title']      = 'Welcome to Challenge';
	    $data['view_file']  = $this->load->view('pages/index',$data,true);
		$this->load->view('template',$data);
	}

    /** @description
     * This Function load the import file and pass the data with title on it
     * @param none
     * @return none
     */
    public function import()
    {
        $data['title']      = 'Import - Code Challenge';
        $data['view_file']  = $this->load->view('pages/import',$data,true);
        $this->load->view('template',$data);
	}

}
