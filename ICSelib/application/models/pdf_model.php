<?php
	class Pdf_model extends CI_Model{

		public function __construct(){

			$this->load->database();

		}

		public function get_pdf(){

			require_once "fpdf17/fpdf.php";
			//create a new pdf file using the fpdf class
			$pdf = new FPDF('L','mm','Legal');
			//create a new page
			$pdf->AddPage();

			$pdf->SetFont('arial','B',32);
			$pdf->Cell(40,10,"ICS ELib",0,1,'L');

			$pdf->SetFont('arial','B',20);
			$pdf->Cell(40,10,"Inventory of Materials",0,1,'L');

			$pdf->SetFont('arial','',8);

			$header = array(' ' ,'Accession Number', 'Title', 'Publisher', 'Author');

			$materials = array();
			$i = 0;

			$query = $this->db->query("SELECT * FROM material left join material_author on material.accession_number = material_author.accession_number GROUP BY material.accession_number ORDER BY title");

			foreach ($query->result() as $row) {

				$author = "";
				$z = 0;
				$query2 = $this->db->query("SELECT * FROM material_author WHERE accession_number='$row->accession_number'");
				foreach ($query2->result() as $row2) {
					
					if($z == 0)	$author = $row2->author;
					else $author = $author.", ".$row2->author;
					$z++;

				}
				$query2 = $query2->result();
				if($z>3)	$author = $query2[0]->author . " et al.";


				$material = array($i+1,$row->accession_number,
				utf8_decode($row->title),
				utf8_decode($row->publisher),
				utf8_decode($author));

				$materials[$i] = $material;
				$i++;

			}
			$w = array(13,40, 130, 50, 100);
		    // Header
		    for($i=0;$i<count($header);$i++)
		        $pdf->Cell($w[$i],5,$header[$i],1,0,'C');
		    $pdf->Ln();
		    // Data
		    foreach($materials as $row)
		    {
		        $pdf->Cell($w[0],5,$row[0],1,0,'LR');
		        $pdf->Cell($w[1],5,$row[1],1,0,'LR');
		        $pdf->Cell($w[2],5,$row[2],1,0,'LR');
		        $pdf->Cell($w[3],5,$row[3],1,0,'LR');
		        $pdf->Cell($w[4],5,$row[4],1,0,'LR');
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