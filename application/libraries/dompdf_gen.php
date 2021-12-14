<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once("./application/third_party/dompdf/autoload.inc.php");

use Dompdf\Dompdf;
use Dompdf\Options; //updated
class Dompdf_gen
{
	public function generate($html, $filename = '', $paper = '', $orientation = '', $stream = TRUE)
	{
		$options = new Options(); //updated
		$options->set('isRemoteEnabled', TRUE); //updated
		$dompdf = new Dompdf($options); //updated
		$dompdf->loadHtml($html);
		$dompdf->setPaper($paper, $orientation);
		$dompdf->render();
		if ($stream) {
			$dompdf->stream($filename . ".pdf", array("Attachment" => 0));
		} else {
			return $dompdf->output();
		}
	}
}
