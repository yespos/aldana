<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $data = array();
        $this->load->model('login_model');
        if($this->session->userdata('id') && $this->session->userdata('ses_id'))
        {
              redirect('dashboard');
        }
      //  $this->db2 = $this->load->database('other_db',TRUE);
    
    }

    function index()
    { 
    	//  print_r($_SESSION); exit;
    	$this->load->view("login");
    }

    function login_act()
    {
       // print_r($_POST); exit;
      $isMobile = isMobile();
      if(isset($_POST))
        { 
             $type =  $this->input->post('type');
             $password = $this->input->post('password');
             $data = array(
                'email' => $this->input->post('email'),
                'password' => md5($password)
            );
             if($isMobile){
                // $data['design_id'] = 3;
             }
            $status = $this->login_model->login($data); 
                if($status == TRUE) 
                {
                	if($isMobile)
                	{
                		$this->session->set_userdata('pda',$isMobile);
                	    redirect('pda');
                	}
                	else
                	{
                	 redirect('dashboard');
                	}
                   
                }
                else
                {
                $this->session->set_flashdata('error', 'Username and Password does not Match');
                redirect('login');
                }
	     }
        
	    redirect('login');
     }


//    function isMobile() {
//    return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
//    }

   /* function otherdb()
    {  
        $data = $this->login_model->other_db();
        print_r($data);
    }*/
     
     
     function recovery()
    {
        if($this->input->post()){
            $post = $this->input->post();
            if($post['Continue'] == 'Continue' && !empty($post['code'])){
                $session_forget = $this->session->userdata('forgott');
//                echo (sha1($session_forget->id)).'<br>';
//                print_r(sha1($session_forget->email));die;
                if($session_forget->accesscode == $post['code']){
                    redirect('login/reset/?token='.sha1($session_forget->id).'&u='.sha1($session_forget->email).'&exp_locale=en_GB');
                }else{
                    $this->session->set_flashdata('message', 'Please enter valid 6 digit code..!');
                    redirect('login/recovery');
                } 
            }
            //die;
            $where['email'] = $post['email'];
            $query = $this->db->where($where)->get('admin');
            $data1 = $query->row();
            
            $dbs = $this->load->database('other_db', TRUE);
            $query2 = $dbs->where($where)->get('biller');
            $data2 = $query2->row();
            $data = array();
            if($data1){
                $data['id'] = $data1->id;
                $data['name'] = $data1->name;
                $data['email'] = $data1->email;
                $data['password_reset'] = $data1->password_reset;
                $data['userType'] = 'Admin';
            }else{
                $data['id'] = $data2->biller_id;
                $data['name'] = $data2->biller_name;
                $data['email'] = $data2->email;
                $data['password_reset'] = $data2->password_reset;
                $data['userType'] = 'Biller';
            }
            $data = (object)$data;
            die('Under process');
            //echo '<pre>';print_r($post);die;
            //echo '<pre>';print_r($data2);die;
            if($data->id){
                $accesscode = substr(number_format(time() * rand(),0,'',''),0,6);
                $data->accesscode = $accesscode;
                $emailData = array('details'=>$data);
                $this->load->library('email');
                //$config['mailtype'] = 'html';
                $config = Array(
                    'protocol' => 'mail',
                    'smtp_host' => 'ssl://smtp.googlemail.com',
                    'smtp_port' => 465,
                    'smtp_user' => 'sabir@jumeirahlsi.com',
                    'smtp_pass' => 'Noor@123#16',
                    'smtp_crypto'   => 'tls',
                    'mailtype'  => 'html', 
                    'charset'   => 'utf-8',
                );
                $this->email->initialize($config);
                $this->email->from('sabir@jumeirahlsi.com', 'AL DANA');
                $this->email->to($post['email']); 
                //$this->email->cc('sibo.sarso@gmail.com'); 

                $this->email->subject(''.$accesscode.' is your AL DANA account recovery code');
                $mailHTML =  $this->load->view('forgot_mail_html', $emailData, true);
                //echo $orderHTML;die;
                $this->email->message($mailHTML);	
                $this->email->send();
                $this->email->clear();
                
                $data_update = array(
                    'password_reset'=> sha1($accesscode),
                );
                if($data->userType == 'Admin'){
                    $where['id'] = $data->id;
                    $this->db->where($where)->update('admin',$data_update);
                }else{
                    $where['biller_id'] = $data->id;
                    $dbs->where($where)->update('biller',$data_update);
                }
                $this->session->set_userdata('forgott',$data);
                redirect('login/recovery');
            }else{
                $this->session->set_flashdata('message', 'Your search did not return any results. Please try again with other information.');
                redirect('login/recovery');
            }
            //echo '<pre>';print_r($data1);die;
        }
    	
    	$this->load->view("recovery");
    }
    
    function reset(){
        $session_forget = $this->session->userdata('forgott');
        if($session_forget){
            $data = array();
            $dbs = $this->load->database('other_db', TRUE);
            if($session_forget->userType == 'Admin'){
                $where['email'] = $session_forget->email;
                $query = $this->db->where($where)->get('admin');
                $data1 = $query->row();
                $data['id'] = $data1->id;
                $data['name'] = $data1->name;
                $data['email'] = $data1->email;
                $data['password_reset'] = $data1->password_reset;
                $data['userType'] = 'Admin';
            }else{
                $where['email'] = $session_forget->email;
                $query2 = $dbs->where($where)->get('biller');
                $data2 = $query2->row();
                $data['id'] = $data2->biller_id;
                $data['name'] = $data2->biller_name;
                $data['email'] = $data2->email;
                $data['password_reset'] = $data2->password_reset;
                $data['userType'] = 'Biller';
            }
            $data = (object)$data;
            if($this->input->post()){
                $post = $this->input->post();
                if($post['npass'] == $post['cpass']){
                    $data_update = array(
                        'password'=> md5($post['cpass']),
                        'password_reset'=> '',
                    );
                    if($data->userType == 'Admin'){
                        $where['id'] = $data->id;
                        $update = $this->db->where($where)->update('admin',$data_update);
                    }else{
                        $where['biller_id'] = $data->id;
                        $update = $dbs->where($where)->update('biller',$data_update);
                    }
                    if($update){
                        $this->session->sess_destroy();
                        $this->session->set_flashdata('error', 'Password changed successfully.');
                        redirect('login');
                    }
                }else{
                    $this->session->set_flashdata('message', 'Confirm password not matched.');
                    redirect('login/reset/?token='.sha1($session_forget->id).'&u='.sha1($session_forget->email).'&exp_locale=en_GB');
                }
            }
            
            $post = $this->input->get();
            $id = $post['token'];
            $email = $post['u'];
            
            if($id == sha1($data->id) && $email == sha1($data->email)){
                $this->load->view("reset_password");
            }else{
                die('oops something have errors or link expired');
            }
        }else{
            die('oops something have errors or link expired!');
        }        
    }
    
    function CheckUrl(){
        $post = $this->input->get();
        $id = $post['token'];
        $email = $post['u'];
        $accesscode = $post['accesscode'];
        $where['email'] = $email;
        $query = $this->db->where($where)->get('admin');
        $data = $query->row();
        if(sha1($accesscode) == $data->password_reset){
            $data->accesscode = $accesscode;
            $this->session->set_userdata('forgott',$data);
            redirect('login/reset/?token='.sha1($data->id).'&u='.sha1($data->email).'&exp_locale=en_GB');
        }else{
            die('Link expired or you have already used this link.');
        }
        
    }
    
    function cancel(){
        $this->session->sess_destroy();
    	redirect('login');
    }

    


}