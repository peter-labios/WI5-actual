<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ExcelController extends CI_Controller
{
	public function download()
	{
		$object = new PHPExcel();
		//creating sheets for easy, ave and difficult
		for ($i=0; $i <=2 ; $i++) { 
			//creating a sheet in PHPExcel
			$object->setActiveSheetIndex($i);


			if($i == 0)
				$this->SetDefaults($object,'Easy');
			elseif($i == 1)
				$this->SetDefaults($object,'Average');
			elseif($i == 2)
				$this->SetDefaults($object,'Difficult');

			$table_columns = array("User ID", "Q1", "Q1 Answer Time", "Q1 Hints Used", "Q1 Hint Time",
				"Q2", "Q2 Answer Time", "Q2 Hints Used", "Q2 Hint Time",
				"Q3", "Q3 Answer Time", "Q3 Hints Used", "Q3 Hint Time",
				"Q4", "Q4 Answer Time", "Q4 Hints Used", "Q4 Hint Time",
				"Q5", "Q5 Answer Time", "Q5 Hints Used", "Q5 Hint Time",
				"Q6", "Q6 Answer Time", "Q6 Hints Used", "Q6 Hint Time",
				"Q7", "Q7 Answer Time", "Q7 Hints Used", "Q7 Hint Time",
				"Q8", "Q8 Answer Time", "Q8 Hints Used", "Q8 Hint Time",
				"Q9", "Q9 Answer Time", "Q9 Hints Used", "Q9 Hint Time",
				"Q10", "Q10 Answer Time", "Q10 Hints Used", "Q10 Hint Time",
				"Total Score Percentage", "Total Score Percentage (z)", "Average Answer Time", "Average Answer Time (z)",
				"Total Hint Used", "Total Hint Used (z)", "Total Hint Time", "Total Hint Time (z)", "Total Tries", "Total Tries (z)");

			$column = 0;

			foreach($table_columns as $field)
			{
				$object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
				$column++;
			}
			if($i == 0)
				$data = $this->excel_export_model->fetch_data("easy");
			elseif($i == 1)
				$data = $this->excel_export_model->fetch_data("average");
			elseif($i == 2)
				$data = $this->excel_export_model->fetch_data("difficult");

			//populating of rows
			$this->Populate_Rows($data,$object);
			//to auto size every cells
			$this->Sheet_AutoSize($object);
			//change height
			$this->Change_Row_Dimensions($object);
			//creating the sheet
			$object->createSheet();

		}

		//for learning gain
		$object->setActiveSheetIndex(3);

		$this->SetDefaults($object,'Learning Gain');

		//$table_columns = array("User ID", "Pretest", "Posttest", "Learning Gain", "Learning Gain (z)");
		$table_columns = array("User ID", "Pretest(Easy)", "Posttest(Easy)", "Easy Learning Gain", "Easy Learning Gain (z)",
			"Pretest(Average)", "Posttest(Average)", "Average Learning Gain", "Average Learning Gain (z)",
			"Pretest(Difficult)", "Posttest(Difficult)", "Difficult Learning Gain", "Difficult Learning Gain (z)",
			"Pretest(Total)", "Posttest(Total)", "Total Learning Gain", "Total Learning Gain (z)");

		$column = 0;

		foreach($table_columns as $field)
		{
			$object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
			$column++;
		}
		$data = $this->excel_export_model->fetch_Learning_Gain();

			//populating of rows
		$excel_row = 2;

		foreach($data as $row)
		{
			$object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row->user_ID);
			$object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->Pre_Easy);
			$object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->Post_Easy);
			$object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row->Easy_Learning_Gain);
			$object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row->Easy_Learning_Gain_z);
			$object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $row->Pre_Average);
			$object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $row->Post_Average);
			$object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, $row->Average_Learning_Gain);
			$object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, $row->Average_Learning_Gain_z);
			$object->getActiveSheet()->setCellValueByColumnAndRow(9, $excel_row, $row->Pre_Difficult);
			$object->getActiveSheet()->setCellValueByColumnAndRow(10, $excel_row, $row->Post_Difficult);
			$object->getActiveSheet()->setCellValueByColumnAndRow(11, $excel_row, $row->Difficult_Learning_Gain);
			$object->getActiveSheet()->setCellValueByColumnAndRow(12, $excel_row, $row->Difficult_Learning_Gain_z);
			$object->getActiveSheet()->setCellValueByColumnAndRow(13, $excel_row, $row->Total_Pretest);
			$object->getActiveSheet()->setCellValueByColumnAndRow(14, $excel_row, $row->Total_Posttest);
			$object->getActiveSheet()->setCellValueByColumnAndRow(15, $excel_row, $row->Total_Learning_Gain);
			$object->getActiveSheet()->setCellValueByColumnAndRow(16, $excel_row, $row->Total_Learning_Gain_z);

			$excel_row++;
		}
			//to auto size every cells
		$this->Sheet_AutoSize($object);
			//change height
		$this->Change_Row_Dimensions($object);
		// for creating sheet
		$object->createSheet();

		//for skips
		$object->setActiveSheetIndex(4);

		$this->SetDefaults($object,'Skips');

		$table_columns = array("User ID", "Easy Skip", "Easy Skip (z)", "Average Skip", "Average Skip (z)", "Difficult Skip", "Difficult Skip (z)", "Total Skip", "Total Skip (z)");

		$column = 0;

		foreach($table_columns as $field)
		{
			$object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
			$column++;
		}
		$data = $this->excel_export_model->fetch_Skips();

			//populating of rows
		$excel_row = 2;

		foreach($data as $row)
		{
			$object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row->USER_ID);
			$object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->EASY_SKIP);
			$object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->Easy_Skip_z);
			$object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row->AVERAGE_SKIP);
			$object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row->Average_Skip_z);
			$object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $row->DIFFICULT_SKIP);
			$object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $row->Difficult_Skip_z);
			$object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, $row->SKIPS);
			$object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, $row->Total_Skips_z);

			$excel_row++;
		}
			//to auto size every cells
		$this->Sheet_AutoSize($object);
			//change height
		$this->Change_Row_Dimensions($object);
		
		$object->createSheet();

		//FOR UAT
		$object->setActiveSheetIndex(5);

		$this->SetDefaults($object,'UAT');

		$table_columns = array("User ID", "Q1", "Q2", "Q3", "Q4", "Q5", "Q6", "Q7", "Q8", "Q9", "Q10", "Q11", "Q12", "Q13", "Q14", "Q15");

		$column = 0;

		foreach($table_columns as $field)
		{
			$object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
			$column++;
		}
		$data = $this->excel_export_model->fetch_uat();

			//populating of rows
		$excel_row = 2;

		foreach($data as $row)
		{
			$object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row->USER_ID);
			$object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->Q1);
			$object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->Q2);
			$object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row->Q3);
			$object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row->Q4);
			$object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $row->Q5);
			$object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $row->Q6);
			$object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, $row->Q7);
			$object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, $row->Q8);
			$object->getActiveSheet()->setCellValueByColumnAndRow(9, $excel_row, $row->Q9);
			$object->getActiveSheet()->setCellValueByColumnAndRow(10, $excel_row, $row->Q10);
			$object->getActiveSheet()->setCellValueByColumnAndRow(11, $excel_row, $row->Q11);
			$object->getActiveSheet()->setCellValueByColumnAndRow(12, $excel_row, $row->Q12);
			$object->getActiveSheet()->setCellValueByColumnAndRow(13, $excel_row, $row->Q13);
			$object->getActiveSheet()->setCellValueByColumnAndRow(14, $excel_row, $row->Q14);
			$object->getActiveSheet()->setCellValueByColumnAndRow(15, $excel_row, $row->Q15);

			$excel_row++;
		}
			//to auto size every cells
		$this->Sheet_AutoSize($object);
			//change height
		$this->Change_Row_Dimensions($object);
		
		//$object->createSheet();


		$object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
		ob_end_clean();
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="Dataset.xls"');
		$object_writer->save('php://output');
	}

	private function SetDefaults($object,$title){
		//setting a default setting to center texts
		$object->getDefaultStyle()
		->getAlignment()
		->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		//renaming sheet
		$object->getActiveSheet()->setTitle($title);
	}

	private function Sheet_AutoSize($objPHPExcel){
		// Auto size columns for each worksheet
		foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {

			$objPHPExcel->setActiveSheetIndex($objPHPExcel->getIndex($worksheet));

			$sheet = $objPHPExcel->getActiveSheet();
			$cellIterator = $sheet->getRowIterator()->current()->getCellIterator();
			$cellIterator->setIterateOnlyExistingCells(true);
			/** @var PHPExcel_Cell $cell */
			foreach ($cellIterator as $cell) {
				$sheet->getColumnDimension($cell->getColumn())->setAutoSize(true);
			}
		}
	}

	private function Change_Row_Dimensions($xls){
		foreach($xls->getActiveSheet()->getRowDimensions() as $rd) { 
			$rd->setRowHeight(-1); 
		}
	}

	private function Populate_Rows($data,$object){
		$excel_row = 2;

		foreach($data as $row)
		{
			$object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row->user_ID);
			$object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->Q1);
			$object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->Q1_answer_time);
			$object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row->Q1_hints_used);
			$object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row->Q1_hints_time);

			$object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $row->Q2);
			$object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $row->Q2_answer_time);
			$object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, $row->Q2_hints_used);
			$object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, $row->Q2_hints_time);

			$object->getActiveSheet()->setCellValueByColumnAndRow(9, $excel_row, $row->Q3);
			$object->getActiveSheet()->setCellValueByColumnAndRow(10, $excel_row, $row->Q3_answer_time);
			$object->getActiveSheet()->setCellValueByColumnAndRow(11, $excel_row, $row->Q3_hints_used);
			$object->getActiveSheet()->setCellValueByColumnAndRow(12, $excel_row, $row->Q3_hints_time);

			$object->getActiveSheet()->setCellValueByColumnAndRow(13, $excel_row, $row->Q4);
			$object->getActiveSheet()->setCellValueByColumnAndRow(14, $excel_row, $row->Q4_answer_time);
			$object->getActiveSheet()->setCellValueByColumnAndRow(15, $excel_row, $row->Q4_hints_used);
			$object->getActiveSheet()->setCellValueByColumnAndRow(16, $excel_row, $row->Q4_hints_time);

			$object->getActiveSheet()->setCellValueByColumnAndRow(17, $excel_row, $row->Q5);
			$object->getActiveSheet()->setCellValueByColumnAndRow(18, $excel_row, $row->Q5_answer_time);
			$object->getActiveSheet()->setCellValueByColumnAndRow(19, $excel_row, $row->Q5_hints_used);
			$object->getActiveSheet()->setCellValueByColumnAndRow(20, $excel_row, $row->Q5_hints_time);

			$object->getActiveSheet()->setCellValueByColumnAndRow(21, $excel_row, $row->Q6);
			$object->getActiveSheet()->setCellValueByColumnAndRow(22, $excel_row, $row->Q6_answer_time);
			$object->getActiveSheet()->setCellValueByColumnAndRow(23, $excel_row, $row->Q6_hints_used);
			$object->getActiveSheet()->setCellValueByColumnAndRow(24, $excel_row, $row->Q6_hints_time);

			$object->getActiveSheet()->setCellValueByColumnAndRow(25, $excel_row, $row->Q7);
			$object->getActiveSheet()->setCellValueByColumnAndRow(26, $excel_row, $row->Q7_answer_time);
			$object->getActiveSheet()->setCellValueByColumnAndRow(27, $excel_row, $row->Q7_hints_used);
			$object->getActiveSheet()->setCellValueByColumnAndRow(28, $excel_row, $row->Q7_hints_time);

			$object->getActiveSheet()->setCellValueByColumnAndRow(29, $excel_row, $row->Q8);
			$object->getActiveSheet()->setCellValueByColumnAndRow(30, $excel_row, $row->Q8_answer_time);
			$object->getActiveSheet()->setCellValueByColumnAndRow(31, $excel_row, $row->Q8_hints_used);
			$object->getActiveSheet()->setCellValueByColumnAndRow(32, $excel_row, $row->Q8_hints_time);

			$object->getActiveSheet()->setCellValueByColumnAndRow(33, $excel_row, $row->Q9);
			$object->getActiveSheet()->setCellValueByColumnAndRow(34, $excel_row, $row->Q9_answer_time);
			$object->getActiveSheet()->setCellValueByColumnAndRow(35, $excel_row, $row->Q9_hints_used);
			$object->getActiveSheet()->setCellValueByColumnAndRow(36, $excel_row, $row->Q9_hints_time);

			$object->getActiveSheet()->setCellValueByColumnAndRow(37, $excel_row, $row->Q10);
			$object->getActiveSheet()->setCellValueByColumnAndRow(38, $excel_row, $row->Q10_answer_time);
			$object->getActiveSheet()->setCellValueByColumnAndRow(39, $excel_row, $row->Q10_hints_used);
			$object->getActiveSheet()->setCellValueByColumnAndRow(40, $excel_row, $row->Q10_hints_time);

			$object->getActiveSheet()->setCellValueByColumnAndRow(41, $excel_row, $row->TOTAL_SCORE);
			$object->getActiveSheet()->setCellValueByColumnAndRow(42, $excel_row, $row->Total_Score_Percentage_z);
			$object->getActiveSheet()->setCellValueByColumnAndRow(43, $excel_row, $row->Average_Answer_Time);
			$object->getActiveSheet()->setCellValueByColumnAndRow(44, $excel_row, $row->Average_Answer_Time_z);

			$object->getActiveSheet()->setCellValueByColumnAndRow(45, $excel_row, $row->Total_Hint_Used);
			$object->getActiveSheet()->setCellValueByColumnAndRow(46, $excel_row, $row->Total_Hint_Used_z);
			$object->getActiveSheet()->setCellValueByColumnAndRow(47, $excel_row, $row->Total_Hint_Time);
			$object->getActiveSheet()->setCellValueByColumnAndRow(48, $excel_row, $row->Total_Hint_Time_z);
			$object->getActiveSheet()->setCellValueByColumnAndRow(49, $excel_row, $row->Attempts);
			$object->getActiveSheet()->setCellValueByColumnAndRow(50, $excel_row, $row->Attempts_z);

			$excel_row++;
		}
	}
}