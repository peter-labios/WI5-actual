<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GameController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	// Question Type either Pre-test/Post-Test, Game (One choice)
	public function LoadQuestion($QuestionType){
		// checking if the page is different
		if(!($this->session->has_userdata('userAccount'))){
			redirect("Account/Login","refresh");
		}
		$data['RandomizedQuestions'] = array();
		if($this->session->has_userdata('Information')){
			// if($this->session->userdata['Information']['Page'][0] !== $QuestionType){
			// 	$this->RemoveSessions();
			// 	redirect("Game_Menu","refresh");
			// }
			foreach ($this->session->userdata['Information']['RandomizedQuestions']  as $RandomizedQuestions) {
				$data['RandomizedQuestions'][] = $RandomizedQuestions;
			}
			$data['Number'][] = $this->session->userdata['Information']['Number'][0];
			$data['Score'][] = $this->session->userdata['Information']['Score'][0];
			$data['Page'][] = $this->session->userdata['Information']['Page'][0];
		} else {
			$questions = $this->Quiz_m->get_all_questions($QuestionType);
			$arrNum_List = GameUtil::randomizeNumber(sizeof($questions));
			foreach ($arrNum_List as $RandomNumber) {
				$data['RandomizedQuestions'][] = $questions[$RandomNumber];
			}

			$data['Page'][] = $QuestionType;
			$data['Number'][] = 0;
			$data['Score'][] = 0;
			$this->session->set_userdata('Information',$data);
		}
		Template::render($QuestionType.'/index', $data);
	}

	// for the quiz
	public function validateAnswer(){
		if($this->session->has_userdata('Information'))
		{
			//for the associative array
			$level;
			$queries;
			$User_ID = $this->session->userdata['userAccount']['User_ID'];
			$Number = $this->session->userdata['Information']['Number'][0];
			$Score = $this->session->userdata['Information']['Score'][0];
			$Page = $this->session->userdata['Information']['Page'][0];
			$arrQuery = array(
				'User_ID' => $User_ID
			);
			$Attempt = $this->HasData($Page,$arrQuery);
			//checking of answers
			$data;
			$Item_Score;
			$Hint_Count = $this->input->post('hintcount');
			$Hint_Time = $this->input->post('hinttimer');
			$Answer_Time = $this->input->post('timer');
			$QA_ID = $this->session->userdata['Information']['RandomizedQuestions'][$Number]->QA_ID;

			if($Hint_Count == null){
				$Hint_Count = 0;
			}
			if($Hint_Time == null){
				$Hint_Time = 0;
			}


			$Answer = trim(strtolower($this->input->post('Answer')));
			$CorrectAnswer = trim(strtolower($this->session->userdata['Information']['RandomizedQuestions'][$Number]->Answer));
			
			if($Answer === $CorrectAnswer){
				$this->session->userdata['Information']['Score'][0] = $Score + 1;
				$Item_Score = 1;
				$this->session->set_userdata("Streak", $this->session->userdata("Streak") + 1);
			} else{
				$Item_Score = 0;
				$this->session->set_userdata("Streak", 0);
				$this->session->set_userdata("Current Agent Avatar", base_url()."/img/agent/Concerned - offering a hint (frame 1).png");
			}

			if($this->session->has_userdata('InsertData')){
				$data = $this->session->userdata('InsertData');
			} else{
				$data = array();
			}

			$array = array(
				'User_ID' => $User_ID,
				'QA_ID' => $QA_ID,
				'Item_Number' => ($Number+1),
				'Score' => $Item_Score,
				'Hint_Count' => $Hint_Count,
				'Hint_Time' => $Hint_Time,
				'Answer_Time' => $Answer_Time,
				'Attempt' => $Attempt
			);

			$data[$Number] = $array;
			$this->session->set_userdata('InsertData',$data);
			if($this->session->has_userdata('level')){
				$level = $this->session->userdata('level');
			}
			if($this->session->has_userdata('InsertData')){
				$queries = $this->session->userdata('InsertData');
			}

				//store mistakes
			$mistakes = ($Number + 1) - $this->session->userdata['Information']['Score'][0];
			if(($Number + 1 ) === 10){
				if($Item_Score === 0){
					if($mistakes >= 5 ){
					// save sa database
						$this->SaveQuizData($queries,$level);
					//show gameover
						redirect("Load/GameOver");
					//redirect("Game/".$Page);
					}

					if(!($this->session->has_userdata('Infected 0'))){
						$this->session->set_userdata('Infected 0', true);
					}
					elseif ($this->session->has_userdata('Infected 2')) {
						$this->session->set_userdata('Infected 3', true);
					}
					elseif ($this->session->has_userdata('Infected 1')) {
						$this->session->set_userdata('Infected 2', true);
					}
					elseif ($this->session->has_userdata('Infected 0')) {
						$this->session->set_userdata('Infected 1', true);
					}
					redirect("Load/Infected");
				} else {
					$this->SaveQuizData($queries,$level);
					//redirect sa game menu
					redirect("Level_Selection");
				}
			} else {
					//for the next number
				$this->session->userdata['Information']['Number'][0] = $Number +1;
				if($Item_Score === 0){
					if($mistakes >= 5 ){
					// save sa database
						$this->SaveQuizData($queries,$level);
					//show gameover
						redirect("Load/GameOver");
					//redirect("Game/".$Page);
					} 
					if(!($this->session->has_userdata('Infected 0')))
						$this->session->set_userdata('Infected 0', true);
					elseif ($this->session->has_userdata('Infected 2')) {
						$this->session->set_userdata('Infected 3', true);
					}
					elseif ($this->session->has_userdata('Infected 1')) {
						$this->session->set_userdata('Infected 2', true);
					}
					elseif ($this->session->has_userdata('Infected 0')) {
						$this->session->set_userdata('Infected 1', true);
					}
					redirect("Load/Infected");
				}
				else
					redirect("Game/".$Page);
			}
			
		}
		else{
			//redirect sa error page
			print_r("Walang Session!");
		}
	}

	public function BackToPage($Page){
		$Number = $this->session->userdata['Information']['Number'][0];
		$level = $this->session->userdata('level');
		$queries = $this->session->userdata('InsertData');
		$mistakes = $Number - $this->session->userdata['Information']['Score'][0];
			//check kung tapos na
		if($mistakes >= 5 ){
					// save sa database
			$this->SaveQuizData($queries,$level);
					//show gameover
			redirect("Load/GameOver");
					//redirect("Game/".$Page);
		} 
		if(($Number+1) >= 10){
			$this->SaveQuizData($queries,$level);
					//redirect sa game menu
			redirect("Level_Selection");

		}else
		redirect("Game/".$Page);
	}

	//For the pre test and post test 
	public function validateAnswers($TestType){
		$query;
		$Type = $this->session->userdata['test']['Type'];
		$Difficulty_ID = $this->session->userdata['test']['Difficulty_ID'];
		$User_ID = $this->session->userdata['userAccount']['User_ID'];

		$Answers = $this->input->post('Answers');
		$size = count($this->session->userdata['Information']['RandomizedQuestions']);
		$QandA = $this->session->userdata['Information']['RandomizedQuestions'];
		if(Validations::isComplete($Answers,$size)){
			//insertion sa database
			foreach ($Answers as $key => $Answer) {
				$count = 0;
				$CorrectAnswer = trim(strtolower($QandA[$key]->Answer));
				if($CorrectAnswer == trim(strtolower($Answer))){
					$count = 1;
				} else {
					$count = 0;
				}
				$query = array(
					'User_ID' => $User_ID,
					'Difficulty_ID' => $Difficulty_ID,
					'QA_ID' => $QandA[$key]->QA_ID,
					'Score' => $count
				);
				// insertion sa database
				$result = $this->UserData_m->InsertData($Type,$query);
			}
			
			$this->session->unset_userdata('Information');

			if ($TestType == "Test_Difficult") {
				$this->session->unset_userdata('test');
				if($Type == "pretest"){
					$this->session->set_userdata('pretest',true);
					// redirect sa character creation
					redirect("Load/MyScore");
				} elseif ($Type == "posttest") {
					$this->session->set_userdata('posttest',true);
					$this->RemoveSessions();
					$this->session->unset_userdata('level');
					//redirect sa Congratulations
					redirect("Load/Finale");
					//redirect("AccountController/ShowUAT");
				}
			//lagay ng session para makita na tapos na si difficult at maging visible si game menu
			}// end nung if testtype == difficult
			else{
				GameUtil::CheckTestStatus($Type);
			}

		}
		else{
			echo "Not Complete";
		}

	}

	//load the game menu
	public function Game_Menu(){
		if($this->session->has_userdata('userAccount')){
			$this->RemoveSessions();
			$this->session->unset_userdata('level');
			$ID = $this->session->userdata['userAccount']['User_ID'];
			$user_ID = array(
				'User_ID' => $ID
			);
			if(GameUtil::CheckGameStatus($user_ID)){
				if(GameUtil::CheckTestStatus("posttest")){
					$this->session->set_userdata('posttest',true);
					if($this->UserData_m->Check("user_uat",$user_ID)){
						//lagay ng session na tapos na siya sa lahat
						$this->session->set_userdata('uat',true);
						Template::render('DifficultyLevels/index');
					} else{
						redirect("AccountController/ShowUAT");
					}
				}
			}else{
				Template::render('DifficultyLevels/index');
			}// if di pa siya tapos yung required
		}else{
			redirect("Account/Login","refresh");
		}// kung walang user account na session
	}

	//selecting different difficulty in game menu
	public function SelectDifficultyLevel(){
		$DifficultyLevel = $this->input->post('Answer');
		if($DifficultyLevel == "Easy"){
			$this->session->set_userdata('level',1);
			redirect("Load/Easy");
		} elseif ($DifficultyLevel == "Average") {
			$this->session->set_userdata('level',2);
			redirect("Load/Average");
		} elseif ($DifficultyLevel == "Difficult") {
			$this->session->set_userdata('level',3);
			redirect("Load/Difficult");
		} elseif ($DifficultyLevel == "Post") {
			//Check kung anong difficulty level na
			$array = array(
				'Type' => 'posttest',
				'Difficulty_ID' => 1
			);
			$this->session->set_userdata('test',$array);
			redirect("Game/Test_Easy");

		} else{
			// load error page
		}

	}

	private function RemoveSessions(){
		$this->session->unset_userdata('Information');
		$this->session->unset_userdata('InsertData');
		$this->session->unset_userdata('Infected 0');
		$this->session->unset_userdata('Infected 1');
		$this->session->unset_userdata('Infected 2');
		$this->session->unset_userdata('Infected 3');
		if($this->session->userdata("Agent") == "yes"){
			$this->session->set_userdata("Current Agent Avatar", "none");
			$this->session->set_userdata('Streak', 0);
		}
	}

	private function SaveQuizData($queries,$level){
		if($level === 1){
			$this->UserData_m->Batch_Insertion("easy",$queries);
		} elseif ($level === 2) {
			$this->UserData_m->Batch_Insertion("average",$queries);
		} elseif ($level === 3) {
			$this->UserData_m->Batch_Insertion("difficult",$queries);
		}
	}

	private function HasData($Page,$data){
		$Attempt = 0;
		if($Page ===  "Quiz_Easy"){
			if($this->UserData_m->Check("easy",$data)){
				$Attempt = $this->UserData_m->GetData("easy",$data,'Attempt','Attempt',1);
			}
		} elseif ($Page === "Quiz_Average") {
			if($this->UserData_m->Check("average",$data)){
				$Attempt = $this->UserData_m->GetData("average",$data,'Attempt','Attempt',1);
			}
		} elseif ($Page === "Quiz_Difficult") {
			if($this->UserData_m->Check("difficult",$data)){
				$Attempt = $this->UserData_m->GetData("difficult",$data,'Attempt','Attempt',1);
			}
		}
		if($Attempt != 0){
			$Attempt = $Attempt[0]->Attempt;
		}
		return $Attempt+1;
	}

	public function Load($Page){
		$data['Pages'] = array();
		if($Page == "Game_Menu"){
			Template::render('GameMenu/index');
		} elseif ($Page == "Character_Selection") {
			Template::render('Character_Selection/index');
		} elseif ($Page == "girl") {
			Template::render('Characters/girl');
		} elseif ($Page == "boy") {
			Template::render('Characters/boy');
		} elseif ($Page == "Levels") {
			Template::render('Instruction/Levels');
		} elseif ($Page == "StageInstruction") {
			Template::render('Instruction/StageInstruction');
		} elseif ($Page == "GamePlay") {
			Template::render('Instruction/GamePlay');
		} elseif ($Page == "MyScore") {
			$query = array(
				'User_ID' => $this->session->userdata['userAccount']['User_ID']
			);
			$scores['myscores'] = $this->UserData_m->GetData("pretest",$query,'Difficulty_ID',null,null,'Difficulty_ID, SUM(score) as Score,');
			$average = 0;
			for ($i=0; $i <3 ; $i++) { 
				$average += $scores['myscores'][$i]->Score;
			}
			$average = $average/3;
			if ($average< 10) {
				$scores['standing'] = "low";
			}
			elseif ($average > 15) {
				$scores['standing'] = "high";
			}
			else
				$scores['standing'] = "average";
			Template::render('MyScore/index',$scores);
		} elseif ($Page == "HighScores") {
			$scores['easy_hs'] = $this->UserData_m->GetData("easy_score",null,null,null,'1',null);
			$scores['average_hs'] = $this->UserData_m->GetData("average_score",null,null,null,'1',null);
			$scores['difficult_hs'] = $this->UserData_m->GetData("difficult_score",null,null,null,'1',null);
			Template::render('HighScore/index',$scores);
		} elseif ($Page == "Infected") {
			$data['Page'][] = $this->session->userdata['Information']['Page'][0];
			Template::render('Quiz_Infected/index',$data);
		} elseif ($Page == "GameOver") {
			$data['Page'][] = $this->session->userdata['Information']['Page'][0];
			Template::render('Quiz_Infected/GameOver',$data);
			$this->RemoveSessions();
		} elseif ($Page == "Easy") {
			Template::render('EasyStory/Part1');
		}  elseif ($Page == "Easy2") {
			Template::render('EasyStory/Part2');
		}  elseif ($Page == "Easy3") {
			Template::render('EasyStory/Part3');
		}  elseif ($Page == "Easy4") {
			Template::render('EasyStory/Part4');
		}  elseif ($Page == "Easy5") {
			Template::render('EasyStory/Part5');
		}  elseif ($Page == "Easy6") {
			Template::render('EasyStory/Part6');
		}  elseif ($Page == "Easy7") {
			Template::render('EasyStory/Part7');
		}  elseif ($Page == "Easy8") {
			Template::render('EasyStory/Part8');
		}  elseif ($Page == "Easy9") {
			Template::render('EasyStory/Part9');
		}  elseif ($Page == "Easy10") {
			Template::render('EasyStory/Part10');
		}  elseif ($Page == "Easy11") {
			Template::render('EasyStory/Part11');
		}  elseif ($Page == "Easy12") {
			Template::render('EasyStory/Part12');
		}  elseif ($Page == "Easy13") {
			Template::render('EasyStory/Part13');
		}  elseif ($Page == "Easy14") {
			Template::render('EasyStory/Part14');
		}  elseif ($Page == "Average") {
			Template::render('AverageStory/Part1');
		}   elseif ($Page == "Average2") {
			Template::render('AverageStory/Part2');
		}   elseif ($Page == "Average3") {
			Template::render('AverageStory/Part3');
		}   elseif ($Page == "Average4") {
			Template::render('AverageStory/Part4');
		}   elseif ($Page == "Average5") {
			Template::render('AverageStory/Part5');
		}   elseif ($Page == "Average6") {
			Template::render('AverageStory/Part6');
		} elseif ($Page == "Difficult") {
			Template::render('DifficultStory/Part1');
		} elseif ($Page == "Difficult2") {
			Template::render('DifficultStory/Part2');
		} elseif ($Page == "Difficult3") {
			Template::render('DifficultStory/Part3');
		} elseif ($Page == "Difficult4") {
			Template::render('DifficultStory/Part4');
		} elseif ($Page == "Difficult5") {
			Template::render('DifficultStory/Part5');
		} elseif ($Page == "Difficult6") {
			Template::render('DifficultStory/Part6');
		} elseif ($Page == "Difficult7") {
			Template::render('DifficultStory/Part7');
		} elseif ($Page == "Finale") {
			Template::render('Finale/Finale1');
		} elseif ($Page == "Finale2") {
			Template::render('Finale/Finale2');
		} elseif ($Page == "Finale3") {
			Template::render('Finale/Finale3');
		}
		//else statement for makulit na kamay na tao
	}

	public function HasAvatar(){
		//check kung may avatar na si user
		if(!(GameUtil::HasAvatar($this->session->userdata['userAccount']['User_ID']))){
			redirect("Load/Character_Selection");
		} else {
			$query = array(
				'User_ID' => $this->session->userdata['userAccount']['User_ID']
			);
			$Userdata = $this->UserData_m->GetData("account",$query);
			$this->session->set_userdata('Avatar',$Userdata[0]->Avatar);

			//checks if the current value of 
			$Userdata = $this->UserData_m->GetData("profile",$query);
			$this->session->set_userdata("Agent",$Userdata[0]->Agent);
			if($this->session->userdata("Agent")=="yes"){
				$this->session->set_userdata("Current Agent Avatar", "none");
				$this->session->set_userdata('Streak', 0);
			}
			
			redirect("Level_Selection");
		}
	}

	public function getCurrentAgentAvatar(){
		return $this->session->userdata("Current Agent Avatar");
	}

	public function setCurrentAgentAvatar(){
		$currentAvatar = $this->input->post('currentAvatar');
		$this->session->set_userdata('Current Agent Avatar', $currentAvatar);
	}

	public function UpdateAvatar($Gender){
		$data = array(
			'Avatar' => $Gender
		);
		$Where_Query = array(
			'User_ID' => $this->session->userdata['userAccount']['User_ID']
		);
		$this->UserData_m->Update("account",$data,$Where_Query);
		$this->session->set_userdata('Avatar',$Gender);
		redirect("Level_Selection");
	}
}
