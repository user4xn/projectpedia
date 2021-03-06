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

				$data['page'] 	= 'docs';

				$data['randCat']   = $this->Docs_m->getRandCategory(3);

				foreach ($data['randCat'] as $getCat){

					$matchLabel = $getCat['label'];

					$getDocs = $this->Docs_m->getDocs();

					$docArray[$getCat['label']] = array();
					
					foreach($getDocs as $docs){

						$doc_label = $docs['label'];

						if($docs['label'] == $matchLabel){
							array_push($docArray[$doc_label], $docs);
						}
						
					}
					
	
				}

				$data['docArray'] = $docArray;

				$data['categoryArray'] = $this->Docs_m->getCategory();

				$this->template->load('main_page/base_v', 'main_page/docs_v',$data);

			}

			function search(){

				$search = '';

				if($this->input->post('search') != null){
					$search = $this->input->post('search'); 
				}else if($this->uri->segment(3) != null){
					$search = $this->uri->segment(3); 
				}

				$data['page'] 	= 'docs';

				$data['docArray'] = $this->Docs_m->getDocs($search);

				$data['categoryArray'] = $this->Docs_m->getCategory();


				$this->template->load('main_page/base_v', 'main_page/search_v',$data);

			}

			function jsonDocs(){

				$fetch['result'] = $this->Docs_m->getDocs();

				if ($fetch) {
					echo json_encode($fetch);
				}

			}


			function read(){

				$id 				= $this->uri->segment(3);
				
				$title 				= $this->uri->segment(4);

				$data['recentDocs']	= $this->Docs_m->getRecentDocs(3);

				$isValid 			= $this->Docs_m->checkValidDocs($id, $title);

				if($isValid){
					$data['page'] 	= 'docs';

					$data['fetchDoc']   = $isValid;

					$this->template->load('main_page/base_v', 'main_page/read_v',$data);
				}else{
					redirect('P/err404');

				}
			}

	}



?>