<?php
	class Pdf_model extends CI_Model{

		public function __construct(){

			$this->load->database();

		}

		public function get_pdf(){

			require_once "/assets/fpdf17/fpdf.php";
			//create a new pdf file using the fpdf class
			$pdf = new FPDF('L','mm','Legal');
			//create a new page
			$pdf->AddPage();
			
			$pdf->SetFont('times','B',16);
			$pdf->Cell(40,10,"Inventory",0,1,'L');
			$pdf->SetFont('times','',12);

			$header = array('Accession Number', 'Title', 'Publisher', 'Author');

			$materials = array();
			$i = 0;

			$query = $this->db->query("SELECT material.accession_number ac_num,title,publisher,author FROM material left join material_author on material.accession_number = material_author.accession_number");

			foreach ($query->result() as $row) {
								
				$material = array($row->ac_num,
				$row->title,
				$row->publisher,
				$row->author);

				$materials[$i] = $material;
				$i++;

			}
			$w = array(40, 100, 70, 40);
		    // Header
		    for($i=0;$i<count($header);$i++)
		        $pdf->Cell($w[$i],7,$header[$i],1,0,'C');
		    $pdf->Ln();
		    // Data
		    foreach($materials as $row)
		    {
		        $pdf->Cell($w[0],6,$row[0],'LR');
		        $pdf->Cell($w[1],6,$row[1],'LR');
		        $pdf->Cell($w[2],6,$row[2],'LR',0,'R');
		        $pdf->Cell($w[3],6,$row[3],'LR',0,'R');
		        $pdf->Ln();
		    }
		    // Closing line
		    $pdf->Cell(array_sum($w),0,'','T');
		   
			$pdf->Output("inventory.pdf",'D');
			//$pdf->Output(concat_ticket_nos($ticket_nos).'flight.pdf','I');
			//$pdf->Close();

		}

	}
?>