	<?php 

	defined("BASEPATH")or exit("NO DIRECT ACCESS ALLOWED");

		class Main extends CI_Controller

		{

			function __construct()

			{

				parent::__construct();

				$this->load->model('Main_m');

				$this->load->helper('url');

				$this->load->helper('form');

				$this->load->library('session');

				$this->load->library('form_validation');

				$this->load->library('pagination');

				$this->load->library('email');

				$this->load->library('template');

				$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');

		        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');

		        $this->output->set_header('Pragma: no-cache');

		        $this->output->set_header("Expires: Mon, 26 Jul 2010 05:00:00 GMT");

			}

			

			// 404 OVERRIDE

			function err404(){

				$this->load->view('errors/html/error_404-ppid');

			}



			function index(){

				$data['page'] 		= '';

				$this->template->load('main_page/base_v', 'main_page/index_v',$data);

			}

	}



?>