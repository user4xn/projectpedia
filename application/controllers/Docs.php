	<?php 

	defined("BASEPATH")or exit("NO DIRECT ACCESS ALLOWED");

		class Docs extends CI_Controller

		{

			function __construct()

			{

				parent::__construct();

				$this->load->model('Docs_m');

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

				$data['page'] 				= 'Document';

				$data['getRandomCategory']	= $this->Docs_m->getRandCategory();

				$this->template->load('main_page/base_v', 'main_page/docs_v',$data);

			}

			function jsonDocs(){

				$fetch['result'] = $this->Docs_m->getDocs();

				if ($fetch) {
					echo json_encode($fetch);
				}

			}


			function read(){

				$id 			= $this->uri->segment(3);
				
				$title 			= $this->uri->segment(4);
				

				$isValid 		= $this->Docs_m->checkValidDocs($id, $title);

				if($isValid){
					$data['page'] 	= 'Document';

					$data['fetchDoc']   = $isValid;

					$this->template->load('main_page/base_v', 'main_page/read_v',$data);
				}else{
					redirect('P/err404');
				}
			}

	}



?>