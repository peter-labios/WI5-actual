<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserData_m extends CI_Model {

  private $UserAccount = 'tbl_useraccount';
  private $UserProfile = 'tbl_user_profile';
  private $UserSkills = 'tbl_user_skills';
  private $PreTest = 'tbl_pretest_data';
  private $PostTest = 'tbl_posttest_data';
  private $USER_UAT = 'tbl_user_uat';
  private $EasyData = 'tbl_easy_data';
  private $AverageData = 'tbl_average_data';
  private $DifficultData = 'tbl_difficult_data';
  private $Computer_Skills = 'tbl_skills_questions';
  private $UAT = 'tbl_uat';
  private $Easy_Score = 'easy_highscore';
  private $Average_Score = 'average_highscore';
  private $Difficult_Score = 'difficult_highscore';


  public function __construct()
  {
    parent::__construct();
  }



  public function Check($Type,$query = null)
  {
    if($Type === "account")
      return $this->Database_m->Check($this->UserAccount,$query);
    elseif ($Type === "profile") {
      return $this->Database_m->Check($this->UserProfile,$query);
    } elseif ($Type === "skill") {
      return $this->Database_m->Check($this->UserSkills,$query);
    } elseif ($Type === "pretest") {
      return $this->Database_m->Check($this->PreTest,$query);
    } elseif ($Type === "easy") {
      return $this->Database_m->Check($this->EasyData,$query);
    } elseif ($Type === "average") {
      return $this->Database_m->Check($this->AverageData,$query);
    } elseif ($Type === "difficult") {
      return $this->Database_m->Check($this->DifficultData,$query);
    } elseif ($Type === "posttest") {
      return $this->Database_m->Check($this->PostTest,$query);
    } elseif ($Type === "user_uat") {
      return $this->Database_m->Check($this->USER_UAT,$query);
    } 
  }

  public function GetData($Type,$query = null,$GroupBy=null,$OrderBy=null,$Limit=null,$SpecificData=null){
    if($Type === "account"){
      return $this->Database_m->Get($this->UserAccount,$query,$GroupBy,$OrderBy,$Limit,$SpecificData);
    } elseif ($Type === "pretest") {
      return $this->Database_m->Get($this->PreTest,$query,$GroupBy,$OrderBy,$Limit,$SpecificData);
    } elseif ($Type === "computer_skill") {
      return $this->Database_m->Get($this->Computer_Skills,$query,$GroupBy,$OrderBy,$Limit,$SpecificData);
    } elseif ($Type === "easy") {
      return $this->Database_m->Get($this->EasyData,$query,$GroupBy,$OrderBy,$Limit,$SpecificData);
    } elseif ($Type === "average") {
      return $this->Database_m->Get($this->AverageData,$query,$GroupBy,$OrderBy,$Limit,$SpecificData);
    } elseif ($Type === "difficult") {
      return $this->Database_m->Get($this->DifficultData,$query,$GroupBy,$OrderBy,$Limit,$SpecificData);
    } elseif ($Type === "uat") {
      return $this->Database_m->Get($this->UAT,$query,$GroupBy,$OrderBy,$Limit,$SpecificData);
    } elseif ($Type === "easy_score") {
      return $this->Database_m->Get($this->Easy_Score,$query,$GroupBy,$OrderBy,$Limit,$SpecificData);
    } elseif ($Type === "average_score") {
      return $this->Database_m->Get($this->Average_Score,$query,$GroupBy,$OrderBy,$Limit,$SpecificData);
    } elseif ($Type === "difficult_score") {
      return $this->Database_m->Get($this->Difficult_Score,$query,$GroupBy,$OrderBy,$Limit,$SpecificData);
    } elseif ($Type === "profile") {
      return $this->Database_m->Get($this->UserProfile,$query,$GroupBy,$OrderBy,$Limit,$SpecificData);
    }

  }

  public function InsertData($Type,$data){
    if($Type === "account"){
      return $this->Database_m->Insert($this->UserAccount,$data);
    } elseif ($Type === "profile") {
      return $this->Database_m->Insert($this->UserProfile,$data);
    } elseif ($Type === "pretest") {
      return $this->Database_m->Insert($this->PreTest,$data);
    } elseif ($Type === "posttest") {
      return $this->Database_m->Insert($this->PostTest,$data);
    }
  }

  public function Batch_Insertion($Type,$data){
    if ($Type === "skill") {
      return $this->Database_m->Batch_Insertion($this->UserSkills,$data);
    } elseif ($Type === "easy") {
      return $this->Database_m->Batch_Insertion($this->EasyData,$data);
    } elseif ($Type === "average") {
      return $this->Database_m->Batch_Insertion($this->AverageData,$data);
    } elseif ($Type === "difficult") {
      return $this->Database_m->Batch_Insertion($this->DifficultData,$data);
    } elseif ($Type === "user_uat") {
      return $this->Database_m->Batch_Insertion($this->USER_UAT,$data);
    } 
  }

  public function Update($Type,$data,$where_Query){
    if($Type === "account")
      return $this->Database_m->Update($this->UserAccount,$data,$where_Query);
  }


}//END OF CLASS