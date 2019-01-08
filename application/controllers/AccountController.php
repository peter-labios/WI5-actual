<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AccountController extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}
	
	public function View($Page){
		if($Page == "Login"){
			Template::render('Authentication/Login');
		}
		elseif ($Page == "Registration") {
			Template::render('Authentication/Registration');
		}
		elseif($this->session->has_userdata('userAccount')){
			if ($Page == "Demographic_Profile") {
				if(!($this->session->has_userdata('Demographic_Profile'))){
					Template::render('Demographic_Profile/index');
				} else {
					$user_ID = array(
						'User_ID' => $this->session->userdata['userAccount']['User_ID']
					);
					if($this->UserData_m->Check("skill",$user_ID)){						
						// check kung nakapag pre-test na
						if(GameUtil::CheckTestStatus("pretest")){
							$this->session->set_userdata('pretest',true);
							// check kung natapos na niya yung game
							if(GameUtil::CheckGameStatus($user_ID)){
								// check kung nakapag post-test na
								if(GameUtil::CheckTestStatus("posttest")){
									//lagay session na tapos na sa post-test
									$this->session->set_userdata('posttest',true);
									//check kung nakapag UAT na
									if($this->UserData_m->Check("user_uat",$user_ID)){
									//lagay ng session na tapos na siya sa lahat
										$this->session->set_userdata('uat',true);
										redirect("Game_Menu");
									} else{
										redirect("AccountController/ShowUAT");
									}// kung nakapag uat na
								}
							} else {
								redirect("Game_Menu");
							}// kung hindi pa tapos sa game
						}
					}//may computer skill
					else{
						redirect("AccountController/View/Computer_Skills");
					}//walang computer skill
				}
			}
			elseif ($Page == "Computer_Skills") {
				if(!($this->session->has_userdata('computer_skills'))){
					redirect("Account/Computer_Skill");
				} else {
					if(GameUtil::CheckTestStatus("pretest")){
						$this->session->set_userdata('pretest',true);
							// check kung natapos na niya yung game
						if(GameUtil::CheckGameStatus($user_ID)){
								// check kung nakapag post-test na
							if(GameUtil::CheckTestStatus("posttest")){
									//lagay session na tapos na sa post-test
								$this->session->set_userdata('posttest',true);
									//check kung nakapag UAT na
								if($this->UserData_m->Check("user_uat",$user_ID)){
									//lagay ng session na tapos na siya sa lahat
									$this->session->set_userdata('uat',true);
									redirect("Game_Menu");
								} else{
									redirect("AccountController/ShowUAT");
								}// kung nakapag uat na
							}
						} else {
								redirect("Game_Menu");
						}// kung hindi pa tapos sa game
					}
				}
			}
		} else {
			redirect("Account/Login","refresh");
		}
	}

	//for login
		public function ValidateAccount(){
			$query = array(
				'username' => $this->input->post('txt_Username'),
				'password' => $this->input->post('txt_Password')
			);
			if($this->UserData_m->Check("account",$query)){
				$Userdata = $this->UserData_m->GetData("account",$query);
				$userdata_Session = array(
					'User_ID'  => $Userdata[0]->User_ID,
					'Username' => $Userdata[0]->Username,
					'Avatar' => $Userdata[0]->Avatar
				);
				
				$this->session->set_userdata('userAccount',$userdata_Session);
				//check kung may data na sa profile
				$user_ID = array(
					'User_ID' => $Userdata[0]->User_ID
				);
				if($this->UserData_m->Check("profile",$user_ID)){ //check kung may demo profile						
					if($this->UserData_m->Check("skill",$user_ID)){ //check kung may computer skill						
						if(GameUtil::CheckTestStatus("pretest")){ // check kung nakapag pre-test na
							$this->session->set_userdata('pretest',true); // lagay session na tapos na sa pre-test			
							if(GameUtil::CheckGameStatus($user_ID)){ // check kung natapos na niya yung game						
								if(GameUtil::CheckTestStatus("posttest")){ // check kung nakapag post-test na								
									$this->session->set_userdata('posttest',true); //lagay session na tapos na sa post-test								
									if($this->UserData_m->Check("user_uat",$user_ID)){ //check kung nakapag UAT na									
										$this->session->set_userdata('uat',true); //lagay ng session na tapos na siya sa lahat
										redirect("Game_Menu");
									} else {
										redirect("AccountController/ShowUAT"); // kung di pa nakapag uat
									}
								}
							} else {
								redirect("Game_Menu"); // kung hindi pa tapos sa game
							}
						}
					} else { 
						redirect("Account/Computer_Skills"); // walang computer skill
					} 
				} else {
					redirect("Account/Demographic_Profile"); // walang demo profile
				}
			} else {
				echo "<script type='text/javascript'>alert('No Account!');</script>";
				redirect("Account/Login","refresh");
			}//invalid account
		}

		//for register
		public function ValidateAccount_Info(){
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$array = array(
				'username' => $username
			);

			//check kung may same username na
			if($this->UserData_m->Check("account",$array)){
				echo "<script type='text/javascript'>alert('The username is taken!');</script>";
				redirect("Account/Register","refresh");
			} else{
				$query = array(
					'username' => $username,
					'password' => $password
				);
				//insertion sa database
				$this->UserData_m->InsertData("account",$query);

				//get id and save sa session
				$Userdata = $this->UserData_m->GetData("account",$query);
				$userdata_Session = array(
					'User_ID'  => $Userdata[0]->User_ID,
					'Username' => $Userdata[0]->Username
				);
				$this->session->set_userdata('userAccount',$userdata_Session);
			//if walang kaparehas, redirect sa demog profile na view
				redirect("Account/Demographic_Profile");
			}

		}
		//for demographic
		public function ValidateProfile_Info(){
		// check kung na fill na lahat ng info
			$data = array(
				'User_ID' => $this->session->userdata['userAccount']['User_ID'],
				'FirstName' => $this->input->post('firstname'),
				'LastName' => $this->input->post('lastname'),
				'Gender' => $this->input->post('gender'),
				'Program' => $this->input->post('program'),
				'Year' => $this->input->post('year'),
				'Agent' => $this->input->post('agent')
			);
			// check if complete and maayos mga input

			// insertion sa database
			$result = $this->UserData_m->InsertData("profile",$data);
			$this->session->set_userdata('Demographic_Profile',true);
			// show message
			
				// show computer skills
			redirect("AccountController/View/Computer_Skills");

		}

		public function ShowComputerSkill(){
			$data['Computer_Skills'] = $this->UserData_m->GetData("computer_skill");
			Template::render('Computer_Skills/index',$data);
		}

		//for computer Skills and UAT
		public function ValidateData($Page){
			$data['information'] = array();
			//Check kung na fill na lahat ng info
			//store answers sa array for database
			$Answers = $this->input->post('Answers');
			foreach ($Answers as $key => $Answer) {
				if($Page === "Computer_Skills"){
					$array = array(
						'User_ID' => $this->session->userdata['userAccount']['User_ID'],
						'Skill_ID' => ($key + 1),
						'Response' => $Answer
					);
				}
				elseif ($Page === "UAT"){
					$array = array(
						'User_ID' => $this->session->userdata['userAccount']['User_ID'],
						'UAT_ID' => ($key + 1),
						'Response' => $Answer
					);
				}
				$data['information'][] = $array;
			}
			if($Page === "Computer_Skills"){
				$this->UserData_m->Batch_Insertion("skill",$data['information']);
				$array = array(
					'Type' => 'pretest',
					'Difficulty_ID' => 1
				);
				$this->session->set_userdata('computer_skills',true);
				$this->session->set_userdata('test',$array);
				redirect("Game/Test_Easy");
			}
			elseif ($Page === "UAT"){
				$this->UserData_m->Batch_Insertion("user_uat",$data['information']);
				$this->session->set_userdata('uat',true);
				// kung saan ireredirect
				redirect("Game_Menu");
			}
		}

		public function ShowUAT(){
			$data['uat'] = $this->UserData_m->GetData("uat");
			Template::render('UAT/index',$data);
		}

		public function Logout(){
			session_destroy();
			redirect("Account/Login");
			
		}
	}
