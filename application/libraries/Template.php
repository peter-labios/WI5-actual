<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Template{
	
	public static function render($body, $param = null)
	{
		$CI =& get_instance();
		$CI->load->view('Header');
		if($CI->session->has_userdata('userAccount')){
			if ($param != null)
				$CI->load->view($body, $param);
			else
				$CI->load->view($body);
		}
		else{
			
			if($body === 'Authentication/Registration'){
				$CI->load->view('Authentication/Registration');
			}
			else {
				$CI->load->view('Authentication/Login');
			}
		}
		$CI->load->view('Footer');
		
	}
}