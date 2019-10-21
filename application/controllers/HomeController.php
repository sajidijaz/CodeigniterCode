<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeController extends CI_Controller {

    /**
     * HomeController constructor.
     */
    public function __construct()
    {
        parent::__construct();
	$this->load->model('Customers','customers');
        $this->load->model('Products','products');
        $this->load->model('Sales','sales');
        $this->load->model('Home_model','home_model');
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

	/**
     *
     */
    public function read_json()
    {
        $result = file_get_contents($_FILES['file']['tmp_name']);
        $data = json_decode($result,true);
        $response = array('message'=> "File is not uploaded");
        if(!empty($data)){
            foreach($data as $key => $value){
                try{
                    $customer_id = save_customer($value);
                    $product_id  = save_product($value);
                    /* Sales Insertion */
                    $sales = array(
                        'customer_id'   => $customer_id,
                        'product_id'    =>  $product_id,
                        'created_at'    => $value['sale_date']
                    );
                    $insert = $this->sales->save($sales);
                    if($insert)
                        $response = array('message'=>"File is uploaded successfully");
                }catch (Exception $e){
                    $response= array('message'=>$e->getMessage());
                }

            }
        }
        echo json_encode($response);
	}

	 /** @description
     * Search the products and return the data in json
     * @return none
     * @param none
     */
    public function search_products()
    {
        $term = $this->input->get('term');
        $result = $this->products->search($term);
        echo json_encode($result);
	}


    /** @description
     * Search the customers and return the data in json
     * @return none
     * @param none
     */
    public function search_customers()
    {
        $term = $this->input->get('term');
        $result = $this->customers->search($term);
        echo json_encode($result);
	}

    /** @description
     * That function call when we submit the filter
     * form and load the html table with data
     * @param none
     * @return none
     */
    public function filter_submit()
    {
        $post_data = $this->input->post();
        $data['result'] = $this->home_model->filter($post_data);
        echo $this->load->view('partial/filter_data',$data,true);
	}	

}
