<?php
/**
 * PHPExcel
 *
 * Copyright (C) 2006 - 2014 PHPExcel
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * @category   PHPExcel
 * @package    PHPExcel
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt	LGPL
 * @version    1.8.0, 2014-03-02
 */

class PHPExcel_Custom {

	private $invoice;
	private $orders;
	private $customer; 

	private $objPHPExcel; 
	private $objReader; 

	public function set_settings($invoice, $orders, $customer){
		
		$this->invoice = $invoice; 
		$this->orders = $orders;
		$this->customer = $customer; 

		$this->init(); 
		$this->loadTemplate(); 
		$this->populateTemplate(); 
		
	}



	private function init(){
		/** Error reporting */
		error_reporting(E_ALL);
		ini_set('display_errors', TRUE);
		ini_set('display_startup_errors', TRUE);
		date_default_timezone_set('Europe/London');

		if (PHP_SAPI == 'cli')
			die('This example should only be run from a Web Browser');

		/** Include PHPExcel */
		require_once 'dist/phpexcel/Classes/PHPExcel.php';

		//	Change these values to select the Rendering library that you wish to use
		//and its directory location on your server
		$rendererName = PHPExcel_Settings::PDF_RENDERER_MPDF;

		$rendererLibrary = 'mpdf60';
		
		$rendererLibraryPath = 'dist/phpexcel/libraries/PDF/'.$rendererLibrary; 

		if (!PHPExcel_Settings::setPdfRenderer(
			$rendererName,
			$rendererLibraryPath
			)) {
			die(
				$rendererLibraryPath
			);
		}

		$this->objPHPExcel =  new PHPExcel();
		$this->objReader =  PHPExcel_IOFactory::createReader('Excel5');
	}
	
	private function loadTemplate(){
		
		// Create new PHPExcel object
		$this->objPHPExcel = $this->objReader->load('dist/phpexcel/templates/invoice_template.xls');

	}

	private function populateTemplate(){


		$this->objPHPExcel->getActiveSheet()->setCellValue('B9', $this->customer['company']); 
		$this->objPHPExcel->getActiveSheet()->setCellValue('B10', $this->customer['address'] . ' ' . $this->customer['city']); 
		$this->objPHPExcel->getActiveSheet()->setCellValue('B11', $this->customer['country']); 
		$this->objPHPExcel->getActiveSheet()->setCellValue('B12', $this->customer['phone']); 


		$this->objPHPExcel->getActiveSheet()->setCellValue('B3', $this->invoice['billing_company']); 
		$this->objPHPExcel->getActiveSheet()->setCellValue('F8', $this->invoice['reference_number']); 
		$this->objPHPExcel->getActiveSheet()->setCellValue('F9', $this->invoice['date_created']); 
		$this->objPHPExcel->getActiveSheet()->setCellValue('F10', $this->invoice['date_due']); 	

		
		$this->objPHPExcel->getActiveSheet()->setCellValue('F32', $this->invoice['discount']. ' %'); 
		$this->objPHPExcel->getActiveSheet()->setCellValue('F33', $this->invoice['tax']. ' %'); 
		$this->objPHPExcel->getActiveSheet()->setCellValue('F34', $this->invoice['total']); 

		$this->objPHPExcel->getActiveSheet()->setCellValue('F35', $this->invoice['paid_amount']); 

		$this->objPHPExcel->getActiveSheet()->setCellValue('F36', $this->invoice['total']  - $this->invoice['paid_amount']); 

		$this->create_orders(); 

	}

	private function create_orders(){
		
		$startRow = 15; 
		$totalCost = 0; 
		
		foreach($this->orders as $order){
			$this->objPHPExcel->getActiveSheet()->setCellValue('B'.$startRow, $order['article']); 
			$this->objPHPExcel->getActiveSheet()->setCellValue('C'.$startRow, $order['description']);
			$this->objPHPExcel->getActiveSheet()->setCellValue('D'.$startRow, $order['price']);
			$this->objPHPExcel->getActiveSheet()->setCellValue('E'.$startRow, $order['quantity']);
			$this->objPHPExcel->getActiveSheet()->setCellValue('F'.$startRow, $order['total']);

			$totalCost+= $order['total']; 

			++$startRow; 
		}

		$this->objPHPExcel->getActiveSheet()->setCellValue('F31', $totalCost); 
		$this->objPHPExcel->getActiveSheet()->setShowGridlines(false);

	}

    public function downloadFileXLS(){
    	// Redirect output to a client’s web browser (Excel5)
    	header('Content-Type: application/vnd.ms-excel');
    	header('Content-Disposition: attachment;filename="asadas.xls"');
    	header('Cache-Control: max-age=0');
		// If you're serving to IE 9, then the following may be needed
    	header('Cache-Control: max-age=1');

		// If you're serving to IE over SSL, then the following may be needed
		header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
		header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
		header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
		header ('Pragma: public'); // HTTP/1.0

		$objWriter = PHPExcel_IOFactory::createWriter($this->objPHPExcel, 'Excel5');
		$objWriter->save('php://output');
		exit;
    }

    public function downloadFilePDF(){
    	
    	header('Content-Type: application/pdf');
		header('Content-Disposition: attachment;filename="01simple.pdf"');
		header('Cache-Control: max-age=0');

		$objWriter = PHPExcel_IOFactory::createWriter($this->objPHPExcel, 'PDF');
		$objWriter->save('php://output');
		exit;
    }

     public function savePDF(){
    	
		$objWriter = PHPExcel_IOFactory::createWriter($this->objPHPExcel, 'PDF');
		$objWriter->save('uploads/invoices/test.pdf');
		exit;
		
    }

	
}