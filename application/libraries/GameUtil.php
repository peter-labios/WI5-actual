	<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class GameUtil{
		public static function randomizeNumber($count){
			$RandomNum_List = array();
			for ($i=1; $i <= 10; $i++) {
				$isGenerated = false;
				do {
				//generate random number
					$Randomed_Number = (mt_rand(1, $count-1));
				//check if nasa array yung randomized number
					if(in_array($Randomed_Number, $RandomNum_List)){
						$isGenerated = true;
					}else{
						$RandomNum_List[] = $Randomed_Number;
						$isGenerated = false;
					}
				} while ($isGenerated === true);

			}
			return $RandomNum_List;
		}

		public static function countCorrectAnswer($Answers, $Information){
			$count = 0;
			foreach ($Answers as $key => $Answer) {
				$CorrectAnswer = trim(strtolower($Information[$key]->Answer));
				if($CorrectAnswer === trim(strtolower($Answer))){
					$count = $count + 1;
				}
			// else{
			// 	print_r("Correct Answer: " . $CorrectAnswer) . "<br>";
			// print_r("Answer: " . $Answer . "<br>");
			// }

			}
			return $count;
		}

		public static function convertToString($Information){
			$ConvertedString = "";
			foreach ($Information as $key => $Data) {
				if($key == 0)
					$ConvertedString = $Data->QA_ID;
				else
					$ConvertedString = $ConvertedString. "," .$Data->QA_ID;
			}
			return $ConvertedString;
		}

		public static function CheckTestStatus($Type){
			$CI =& get_instance();
			$User_ID = $CI->session->userdata['userAccount']['User_ID'];
			$counter = 0;
			//checking all dificulties kung na take na niya
			for ($i=1; $i <=3 ; $i++) { 
				$query = array(
					'User_ID' => $User_ID,
					'Difficulty_ID' => $i
				);
				if(!($CI->UserData_m->Check($Type,$query))) {
					$array = array(
						'Type' => $Type,
						'Difficulty_ID' => $i
					);
					$CI->session->set_userdata('test',$array);
					if($Type === "posttest"){
						$data['RandomizedQuestions'] = array();
					// get all questions from pre-test
						$query = array(
							'User_ID' => $User_ID,
							'Difficulty_ID' => $i
						);
						$Information = $CI->UserData_m->GetData("pretest",$query);

						foreach ($Information as $key => $preTestData) {
							$RandomizedQuestions;
							$query = array(
								'QA_ID' => $preTestData->QA_ID
							);
							if($i == 1){
								$RandomizedQuestions = $CI->Quiz_m->get_all_questions("Test_Easy",$query);
							} elseif ($i == 2) {
								$RandomizedQuestions = $CI->Quiz_m->get_all_questions("Test_Average",$query);
							} elseif ($i == 3) {
								$RandomizedQuestions = $CI->Quiz_m->get_all_questions("Test_Difficult",$query);
							}
							$data['RandomizedQuestions'][] = $RandomizedQuestions[0];
						}
						if($i == 1)
							$data['Page'][] = "Test_Easy";
						elseif ($i == 2) {
							$data['Page'][] = "Test_Average";
						} elseif ($i == 3) {
							$data['Page'][] = "Test_Difficult";
						}
						$data['Number'][] = 0;
						$data['Score'][] = 0;
						$CI->session->set_userdata('Information',$data);
					}
					if($i == 1){
						redirect("Game/Test_Easy");
					} elseif($i == 2){
						redirect("Game/Test_Average");
					} elseif($i == 3){
						redirect("Game/Test_Difficult");
					}
				}//hindi pa tapos sa pretest
				else{
					$counter +=1;
				}
			}// end of checking kung may pre-test
			if($counter == 3)
				return true;
			else
				return false;
		}

		public static function CheckGameStatus($id){
			$CI =& get_instance();
			$IsDone = false;
			$data = array();
			$Scores = array();
			$counter = 1;
			$flag = 0;
			$preTestData = $CI->UserData_m->GetData("pretest",$id,'difficulty_id',null,null,
				'difficulty_id,sum(score) as TotalScore');
			foreach ($preTestData as $testdata) {
				$flag2 = 0; // counter para sa scores sa loob kasi pwedeng maraming tries

				// checking kung pasado na sa lahat ng hindi optional
				if($testdata->TotalScore < 10){
					if($testdata->difficulty_id == 1){
						$Scores[1] = $CI->UserData_m->GetData("easy",$id,'attempt',null,null,'sum(score) as TotalScore');
					} elseif ($testdata->difficulty_id == 2) {
						$Scores[2] = $CI->UserData_m->GetData("average",$id,'attempt',null,null,'sum(score) as TotalScore');

					} elseif ($testdata->difficulty_id == 3) {
						$Scores[3] = $CI->UserData_m->GetData("difficult",$id,'attempt',null,null,'sum(score) as TotalScore');
					}
					// checking of scores per difficulty
					foreach ($Scores[$testdata->difficulty_id] as $Score) {
						if($Score->TotalScore >= 6){
							GameUtil::PutSession($testdata->difficulty_id);
							break;
						} else{
							$flag2 += 1;
						}
					}
					if($Scores[$testdata->difficulty_id] == null){
						$flag += 1;
					}
					if($flag2 > 0){
						$flag += 1;
					}
				} else{
					GameUtil::PutSession($testdata->difficulty_id,true);
					if($testdata->difficulty_id == 1){
						$Scores[1] = $CI->UserData_m->GetData("easy",$id,'attempt',null,null,'sum(score) as TotalScore');
					} elseif ($testdata->difficulty_id == 2) {
						$Scores[2] = $CI->UserData_m->GetData("average",$id,'attempt',null,null,'sum(score) as TotalScore');

					} elseif ($testdata->difficulty_id == 3) {
						$Scores[3] = $CI->UserData_m->GetData("difficult",$id,'attempt',null,null,'sum(score) as TotalScore');
					}
					// checking of scores per difficulty
					foreach ($Scores[$testdata->difficulty_id] as $Score) {
						if($Score->TotalScore >= 6){
							GameUtil::PutSession($testdata->difficulty_id);
							break;
						} else{
							$flag2 += 1;
						}
					}
				}
			}
			$count2 = 0;
			if($CI->session->has_userdata('easy'))
				$count2 += 1;
			if($CI->session->has_userdata('average'))
				$count2 += 1;
			if($CI->session->has_userdata('difficult'))
				$count2 += 1;
			if($count2 === 3){
				$IsDone = true;
			} else{
				$IsDone = false;
			}
			return $IsDone;
		}// end nung function

		public static function HasAvatar($id){
			$CI =& get_instance();
			$array = array(
				'User_ID' => $id,
				'Avatar' => ''
			);
			if($CI->UserData_m->Check("account",$array)){
				return false;
			}
			else{
				return true;
			}
		}

		public static function HasAgent($id){
			$CI =& get_instance();
			$array = array(
				'User_ID' => $id,
				'Agent' => ''
			);
			if($CI->UserData_m->Check("profile",$array)){
				return false;
			} else {
				return true;
			}
		}

		private static function PutSession($Difficulty_ID,$Optional=null){
			$CI =& get_instance();
			if($Optional == null){
				if($Difficulty_ID == 1){
					$CI->session->set_userdata('easy',"finished");
				} elseif ($Difficulty_ID == 2) {
					$CI->session->set_userdata('average',"finished");
				} elseif ($Difficulty_ID == 3) {
					$CI->session->set_userdata('difficult',"finished");
				}
			} else{
				if($Difficulty_ID == 1){
					$CI->session->set_userdata('easy',"optional");
				} elseif ($Difficulty_ID == 2) {
					$CI->session->set_userdata('average',"optional");
				} elseif ($Difficulty_ID == 3) {
					$CI->session->set_userdata('difficult',"optional");
				}
			}
			
		}
		private static function GetDifficultyData($difficulty_id){
			
		}
	}