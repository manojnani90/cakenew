<?php 

		$this->PhpExcel->createWorksheet();
		$this->PhpExcel->setDefaultFont('Callibri',12);
		
		//define the table cells
               $table = array(
			
						array('label' => __('Employe Id'),'width' => 'auto','filter' => 'auto','filter' => true),
						array('label' => __('Employe Name'),'width' => 'auto','filter' =>'auto','float'=>'left','filter' => true),
						array('label' => __('Company Name'),'width' => 'auto','filter' =>'auto','filter' => true),
                        array('label' => __('Card Id'),'width' => 'auto','filter' =>'auto','filter' => true),
                        array('label' => __('Stage'),'width' => 'auto','filter' => 'auto','filter' => true),
                        array('label' => __('Date & Time'),'width' => 'auto','filter' => 'auto','filter' => true),
                        array('label' => __('Status'),'width' => 'auto','filter' => 'auto','filter' => true),
						/*array('label' => __('Latitude'),'width' => 'auto','filter' =>'auto','filter' => true),
						array('label' => __('Longitude'),'width' => 'auto','filter' =>'auto','filter' => true),*/
			
		);
		//heading
		$this->PhpExcel->addTableHeader($table,array('name' => 'Cambria', 'bold' => true));
		//data
		foreach($employeStages as $employeStage) {
			
			$this->PhpExcel->addTableRow(array(
				
                                $employeStage['Employe']['employeid'],
								$employeStage['Employe']['employe_name'],
                                $employeStage['Employe']['company_name'],
                                $employeStage['Employe']['cardid'],
                                $employeStage['EmployeStage']['stage'],
                                $employeStage['EmployeStage']['date'],
                                $employeStage['EmployeStage']['status'],
								/*$employeStage['EmployeStage']['latitude'],
                                $employeStage['EmployeStage']['longitude'],*/ 
        		
				)
			);
		}
		
		$this->PhpExcel->addTableFooter();
		$this->PhpExcel->output();
		
		
		
		
?>		