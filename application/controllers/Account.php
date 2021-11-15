	<?php 

	defined("BASEPATH")or exit("NO DIRECT ACCESS ALLOWED");

		class Account extends CI_Controller

		{

			function __construct()

			{

				parent::__construct();

				$this->load->model('Account_m');

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



			function register(){

				$data['page'] 		= 'account';

				$this->template->load('main_page/base_v', 'main_page/register_v',$data);

			}

			function act_register(){

				$data = array(
					'nama'  	=> $this->input->post('name'),
					'email'  	=> $this->input->post('email'),
					'telp'  	=> $this->input->post('telp'),
					'password'  => md5($this->input->post('password')),
				);

				$this->db->insert('user', $data);

				$insert_id = $this->db->insert_id();

				$dataPrevilege = array(
					'id_user'  	=> $insert_id,
					'tipe_user'  	=> 'free',
					'expiry_date'  	=> null,
				);

				$this->db->insert('user_previlege', $data);

				$this->session->set_flashdata('status', 'ok');

				redirect('Account/register');

			}

			function login_act(){
				
		        $email = $this->input->post('email');
		        $password = $this->input->post('password');

		        $where = array(
		            'email' => $email,
		            'password' => md5($password)
		            );

		        $cek = $this->db->get_where("user",$where)->num_rows();
		        
		        if($cek > 0){
		                
		            $query  = $this->Account_m->GetUser($email);
		        
		            foreach ($query->result_array() as $values) {

		                $iduser = $values['iduser'];
		                $nama = $values['nama'];
		                $email = $values['email'];
		                $tipe_user = $values['tipe_user'];
		                $expiry_date = $values['expiry_date'];

		            }
		          
		            $data_session = array(
			            'id_user' => $iduser,
			            'nama' => $nama,
			            'email' => $email,
			            'tipe_user' => $tipe_user,
			            'expiry_date' => $expiry_date
		            );

		            $this->session->set_userdata($data_session);
		            
		            echo json_encode($data_session);
		 
		        }else{
		        	
		            $this->session->set_flashdata('error','true');
		        }
		    }
		 
		    function logout(){
		        $this->session->sess_destroy();
		        $this->session->set_flashdata('logout_notification', 'logged_out');
		        redirect(site_url('Auth'));
		    }


	}



?>