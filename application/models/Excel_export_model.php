<?php
class Excel_Export_Model extends CI_Model
{
	private $easy_pivot = 'easy_pivot';
	private $average_pivot = 'average_pivot';
	private $difficult_pivot = 'difficult_pivot';
	private $uat_pivot = 'uat_pivot';
	private $LearningGain_pivot = 'LearningGain_pivot';

	private $SpecificData = array();
	public function __construct()
	{
		parent::__construct();
		// $SpecificData[] = 'user_ID,Q1, q1_answer_time, q1_hints_used , q1_hints_time,
		// Q2, Q2_answer_time , Q2_hints_used , Q2_hints_time,
		// Q3, Q3_answer_time , Q3_hints_used ,Q3_hints_time ,
		// Q4, Q4_answer_time , Q4_hints_used ,Q4_hints_time ,
		// Q5, Q5_answer_time , Q5_hints_used ,Q5_hints_time ,
		// Q6, Q6_answer_time , Q6_hints_used ,Q6_hints_time ,
		// Q7, Q7_answer_time , Q7_hints_used ,Q7_hints_time ,
		// Q8, Q8_answer_time , Q8_hints_used ,Q8_hints_time ,
		// Q9, Q9_answer_time , Q9_hints_used ,Q9_hints_time ,
		// Q10, Q10_answer_time , Q10_hints_used ,Q10_hints_time ,TOTAL_SCORE,
		// (average_pivot.total_score - aggregates.AVGtotal_score) / aggregates.STDDEV_SAMPtotal_score AS Total_Score_Percentage_z,TOTAL_ANSWER_TIME AS Average_Answer_Time,
		// (average_pivot.Total_Answer_Time - aggregates.AVGTotal_Answer_Time) / aggregates.STDDEV_SAMPTotal_Answer_Time AS Average_Answer_Time_z , TOTAL_HINT AS Total_Hint_Used,
		// (average_pivot.Total_Hint - aggregates.AVGTotal_Hint) / aggregates.STDDEV_SAMPTotal_Hint AS  Total_Hint_Used_z,TOTAL_HINT_TIME AS Total_Hint_Time,
		// (average_pivot.Total_Hint_Time - aggregates.AVGTotal_Hint_Time) / aggregates.STDDEV_SAMPTotal_Hint_Time AS Total_Hint_Time_z';
	}

	function fetch_data($Pivot_Type)
	{
		$query = "SELECT
		user_ID,Q1, Q1_answer_time, Q1_hints_used , Q1_hints_time,
		Q2, Q2_answer_time , Q2_hints_used , Q2_hints_time,
		Q3, Q3_answer_time , Q3_hints_used ,Q3_hints_time ,
		Q4, Q4_answer_time , Q4_hints_used ,Q4_hints_time ,
		Q5, Q5_answer_time , Q5_hints_used ,Q5_hints_time ,
		Q6, Q6_answer_time , Q6_hints_used ,Q6_hints_time ,
		Q7, Q7_answer_time , Q7_hints_used ,Q7_hints_time ,
		Q8, Q8_answer_time , Q8_hints_used ,Q8_hints_time ,
		Q9, Q9_answer_time , Q9_hints_used ,Q9_hints_time ,
		Q10, Q10_answer_time , Q10_hints_used ,Q10_hints_time ,TOTAL_SCORE,
		(total_score - aggregates.AVGtotal_score) / aggregates.STDDEV_SAMPtotal_score AS Total_Score_Percentage_z,TOTAL_ANSWER_TIME AS Average_Answer_Time,
		(Total_Answer_Time - aggregates.AVGTotal_Answer_Time) / aggregates.STDDEV_SAMPTotal_Answer_Time AS Average_Answer_Time_z , TOTAL_HINT AS Total_Hint_Used,
		(Total_Hint - aggregates.AVGTotal_Hint) / aggregates.STDDEV_SAMPTotal_Hint AS  Total_Hint_Used_z,TOTAL_HINT_TIME AS Total_Hint_Time,
		(Total_Hint_Time - aggregates.AVGTotal_Hint_Time) / aggregates.STDDEV_SAMPTotal_Hint_Time AS Total_Hint_Time_z, Attempts,
		(Attempts - aggregates.AVGAttempts) / aggregates.STDDEV_SAMPAttempts AS Attempts_z
		FROM
		".$Pivot_Type."_pivot
		Cross Join (SELECT
			AVG(total_score) AS AVGtotal_Score,
			STDDEV_SAMP(total_score) AS STDDEV_SAMPtotal_score,
			AVG(Total_Answer_Time) AS AVGTotal_Answer_Time,
			STDDEV_SAMP(Total_Answer_Time) AS STDDEV_SAMPTotal_Answer_Time,
			AVG(Total_Hint) AS AVGTotal_Hint,
			STDDEV_SAMP(Total_Hint) AS STDDEV_SAMPTotal_Hint,
			AVG(Total_Hint_Time) AS AVGTotal_Hint_Time,
			STDDEV_SAMP(Total_Hint_Time) AS STDDEV_SAMPTotal_Hint_Time,
			AVG(Attempts) AS AVGAttempts,
			STDDEV_SAMP(Attempts) AS STDDEV_SAMPAttempts
			FROM
			".$Pivot_Type."_pivot) as aggregates GROUP BY user_ID ORDER BY user_ID ASC";
			return $this->Database_m->GET_With_Query($query);
		}

		function fetch_Learning_Gain(){
			$query = "SELECT user_ID,
			Pre_Easy,Post_Easy,Easy_Learning_Gain,
			(Easy_Learning_Gain - aggregates.AVGEasy_Learning_Gain) / aggregates.STDDEV_SAMPEasy_Learning_Gain AS 'Easy_Learning_Gain_z',
			Pre_Average,Post_Average,Average_Learning_Gain,
			(Average_Learning_Gain - aggregates.AVGAverage_Learning_Gain) / aggregates.STDDEV_SAMPAverage_Learning_Gain AS 'Average_Learning_Gain_z',
			Pre_Difficult,Post_Difficult,Difficult_Learning_Gain,
			(Difficult_Learning_Gain - aggregates.AVGDifficult_Learning_Gain) / aggregates.STDDEV_SAMPDifficult_Learning_Gain AS 'Difficult_Learning_Gain_z',
			Total_Pretest,Total_Posttest,Total_Learning_Gain,
			(Total_Learning_Gain - aggregates.AVGTotal_Learning_Gain) / aggregates.STDDEV_SAMPTotal_Learning_Gain AS 'Total_Learning_Gain_z'
			FROM test_pivot
			CROSS JOIN(
			SELECT
			AVG(Easy_Learning_Gain) AS AVGEasy_Learning_Gain,
			STDDEV_SAMP(Easy_Learning_Gain) AS STDDEV_SAMPEasy_Learning_Gain,
			AVG(Average_Learning_Gain) AS AVGAverage_Learning_Gain,
			STDDEV_SAMP(Average_Learning_Gain) AS STDDEV_SAMPAverage_Learning_Gain,
			AVG(Difficult_Learning_Gain) AS AVGDifficult_Learning_Gain,
			STDDEV_SAMP(Difficult_Learning_Gain) AS STDDEV_SAMPDifficult_Learning_Gain,
			AVG(Total_Learning_Gain) AS AVGTotal_Learning_Gain,
			STDDEV_SAMP(Total_Learning_Gain) AS STDDEV_SAMPTotal_Learning_Gain
			FROM
			Test_pivot) as aggregates;";
			return $this->Database_m->GET_With_Query($query);
		}

		function fetch_Skips(){
			$query = "SELECT USER_ID,EASY_SKIP, (EASY_SKIP - aggregates.AVGeasy_skip) / aggregates.STDDEV_SAMPeasy_skip AS 'Easy_Skip_z',
			AVERAGE_SKIP, (AVERAGE_SKIP - aggregates.AVGaverage_skip) / aggregates.STDDEV_SAMPaverage_skip AS 'Average_Skip_z',
			DIFFICULT_SKIP, (DIFFICULT_SKIP - aggregates.AVGdifficult_skip) / aggregates.STDDEV_SAMPdifficult_skip AS  'Difficult_Skip_z',
			SKIPS,(SKIPS - aggregates.AVGTotal_skips) / aggregates.STDDEV_SAMPTotal_skips AS 'Total_Skips_z'
			FROM TBL_SKIPS
			CROSS JOIN(
			SELECT
			AVG(EASY_SKIP) AS AVGeasy_skip,
			STDDEV_SAMP(EASY_SKIP) AS STDDEV_SAMPeasy_skip,
			AVG(AVERAGE_SKIP) AS AVGaverage_skip,
			STDDEV_SAMP(AVERAGE_SKIP) AS STDDEV_SAMPaverage_skip,
			AVG(DIFFICULT_SKIP) AS AVGdifficult_skip,
			STDDEV_SAMP(DIFFICULT_SKIP) AS STDDEV_SAMPdifficult_skip,
			AVG(SKIPS) AS AVGTotal_skips,
			STDDEV_SAMP(SKIPS) AS STDDEV_SAMPTotal_skips
			FROM
			TBL_SKIPS) as aggregates;";
			return $this->Database_m->GET_With_Query($query);
		}

		function fetch_uat(){
			return $this->Database_m->Get('uat_pivot');
		}
	}
	?>