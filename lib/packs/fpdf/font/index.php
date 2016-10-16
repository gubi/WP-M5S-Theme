<?php
include("../config.php");

//TROVO LA FATTURA
$query10 = "SELECT * FROM FATTURE WHERE NOME_FILE = '$nome.pdf'"; $result10 = mysql_query($query10, $db); $row10 = mysql_fetch_array($result10);

//SE NON è ATTIVA MANDO VIA
if($row10[ATTIVO] == 1 || $row10[DATA_PAGAMENTO] == 0) {
header("Location: $URL");
}

//VARIABILI
$NUMERO = $row10[NUMERO];
$ANNO = $row10[ANNO];
$DATA = date('d/m/Y', $row10[DATA_PAGAMENTO]);
$NOME = $row10[NOME_UTENTE];
$INDIRIZZO = $row10[INDIRIZZO];
$CITTA = "$row10[CAP] - $row10[CITTA] ($row10[PROVINCIA])";
$COUNTRY = $row10[COUNTRY];

if($row10[PARTITA_IVA] != '') {
	$CODICE_UTENTE = "P. Iva $row10[PARTITA_IVA]";
} else {
	$CODICE_UTENTE = "Cod. fis. $row10[CODICE_FISCALE]";
}

$PAGAMENTO = $row10[TIPO_PAGAMENTO];


define("FPDF_FONTPATH","font/");
require("fpdf.php");


class PDF extends FPDF
{
//HEADER
function Header()
{
	$NUMERO = $GLOBALS['NUMERO'];
	$ANNO = $GLOBALS['ANNO'];
	$DATA = $GLOBALS['DATA'];
	
	$NOME = $GLOBALS['NOME'];
	$INDIRIZZO = $GLOBALS['INDIRIZZO'];
	$CITTA = $GLOBALS['CITTA'];
	$COUNTRY = $GLOBALS['COUNTRY'];
	$CODICE_UTENTE = $GLOBALS['CODICE_UTENTE'];
	$PAGAMENTO = $GLOBALS['PAGAMENTO'];
	
	//DATI DI WANTED
	$this->SetY(8);
	$this->SetFont('Arial','B', 13);
    $this->MultiCell(80, 5, "Societa della Rotonda srl", 0, 'L', 0);
	$this->SetFont('Arial','', 11);
    $this->MultiCell(80, 5, "Wanted in Rome\nVia dei Falegnami, 79\n00186 - Roma\nP. Iva 01626891004\nCod.Fisc. 06830330582", 0, 'L', 0);
	
	//FATTURA NUMERO
	$this->SetXY(-80,8);
	$this->SetFillColor(192, 192, 192);
	$this->SetFont('Arial','B', 11);
	$this->Cell(70, 8, "Fattura IN € N°: WEB$NUMERO/$ANNO", 1, 2, "C", 1);
	
	//PAGINA E DATA
	$this->SetXY(-80,20);
	$this->Cell(20, 8, "PAGINA", 1, 0, "C", 0);
	$this->Cell(30, 8, "DATA", 1, 2, "C", 0);
	
	$this->SetXY(-80,28);
	$this->SetFont('Arial','', 11);
	$this->Cell(20, 8, "".$this->PageNo()."", 1, 0, "C", 0);
	$this->Cell(30, 8, "$DATA", 1, 2, "C", 0);
	
	//DATI UTENTE
	$this->SetXY(-80,45);
	$this->MultiCell(70, 5, "$NOME\n$INDIRIZZO\n$CITTA\n$COUNTRY\n$CODICE_UTENTE", 0, 'L', 0);
	
	//MODALITA DI PAGAMENTO
	$this->SetY(75);
	$this->SetFont('Arial','B', 11);
	$this->Cell(60, 6, "MODALITA' DI PAGAMENTO", 1, 2, "C", 0);
	$this->SetFont('Arial','', 11);
	$this->Cell(60, 6, "$PAGAMENTO", 1, 2, "C", 0);
	
}
}


//********************************************************************** APRO LA PAGINA ************************************************************************************
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();


//DIDASCALIA
$pdf->SetY(95);
$pdf->SetFont('Arial','B', 11);
$pdf->Cell(75, 6, "DESCRIZIONE", 1, 0, "C", 0);
$pdf->Cell(25, 6, "QUANTITA'", 1, 0, "C", 0);
$pdf->Cell(45, 6, "VALORE UNITA'", 1, 0, "C", 0);
$pdf->Cell(45, 6, "IMPONIBILE", 1, 1, "C", 0);

//COLONNE
//$pdf->SetY(101);
$pdf->SetFont('Arial','', 11);
$pdf->Cell(75, 40, "Annuncio Internet", 1, 0, "L", 0);
$pdf->Cell(25, 40, "1", 1, 0, "C", 0);
$pdf->Cell(45, 40, "€", 1, 0, "C", 0);
$pdf->Cell(45, 40, "€", 1, 0, "C", 0);







//********************************************************************** FINE PDF ************************************************************************************
$pdf->Settitle("Fattura $row10[NUMERO]/$row10[ANNO]");
$pdf->SetAuthor("Wanted");
$pdf->Output("$row10[NOME_FILE]", 'I');
?>