<?php
    require('../../fpdf/fpdf.php');  
    include '../conexion.php';  
    include '../funciones_generales.php';  
    $conexion = conectarse();
    date_default_timezone_set('America/Guayaquil');    
    class PDF extends FPDF
    {   
        var $widths;
        var $aligns;
        function SetWidths($w){            
            $this->widths=$w;
        }
        function SetAligns($a){        
            $this->aligns=$a;
        }
        function Row($data){        
            $nb=0;
            for($i=0;$i<count($data);$i++)
                $nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
            $h=5*$nb;
            $this->CheckPageBreak($h);            
            for($i=0;$i<count($data);$i++){
                $w=$this->widths[$i];
                $a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';            
                $x=$this->GetX();
                $y=$this->GetY();            
                $this->MultiCell( $w,5,$data[$i],0,$a,false);            
                $this->SetXY($x+$w,$y);
            }        
            $this->Ln($h);
        }    
        function CheckPageBreak($h){        
            if($this->GetY()+$h>$this->PageBreakTrigger)
                $this->AddPage($this->CurOrientation);
        }
        function NbLines($w, $txt){    
            $cw=&$this->CurrentFont['cw'];
            if($w==0)
                $w=$this->w-$this->rMargin-$this->x;
            $wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
            $s=str_replace("\r", '', $txt);
            $nb=strlen($s);
            if($nb>0 and $s[$nb-1]=="\n")
                $nb--;
            $sep=-1;
            $i=0;
            $j=0;
            $l=0;
            $nl=1;
            while($i<$nb){
                $c=$s[$i];
                if($c=="\n"){
                    $i++;
                    $sep=-1;
                    $j=$i;
                    $l=0;
                    $nl++;
                    continue;
                }
                if($c==' ')
                    $sep=$i;
                $l+=$cw[$c];
                if($l>$wmax){
                    if($sep==-1){
                    if($i==$j)
                        $i++;
                    }
                    else
                        $i=$sep+1;
                    $sep=-1;
                    $j=$i;
                    $l=0;
                    $nl++;
                }
                else
                    $i++;
            }
            return $nl;
        }
        function Header(){                        
            $fecha = date('Y-m-d', time());
            $this->SetFont('Arial','',8);                        
            $this->Text(5, 5, $fecha, 0, 'C', 0);             
            $this->Text(105,5,"CLIENTE",0,'C',0);            
            $this->Image('../../empresa/logotipo.fw.png',-20,8,100,55);
            $this->SetFont('Arial','B',14); 
            $this->SetTextColor(67, 130, 121);
            $this->Text(70,15,"TOTORA SISA S.C.C",0,'C',0);            
            $this->SetTextColor(0,0,0);
            $this->SetFont('Arial','B',10);            
            $this->Text(75,21,"Dir: Bolivar e Imbacocha",0,'C',0);                        
            $this->Text(60,27,"Tel.: 2919-508 Cel.: 0988598926 - 0988449456",0,'C',0);            
            $this->SetFont('Arial','B',11);            
            $this->Text(75,33,"OTAVALO - ECUADOR",0,'C',0);
            $this->SetFont('Arial','B',10);            
            $this->Text(60,50,"OBLIGADO A LLEVAR CONTABILIDAD : SI",0,'C',0);
            $this->Text(150,27,"RUC:. 1091712381001",0,'C',0);
            $this->Text(160,32,"FACTURA",0,'C',0);
            $this->Text(150,37,"Nro Aut SRI: 1115375970",0,'C',0);
            $this->Text(140,43,"Fecha de Aut.: 11 AGOSTO DE 2014",0,'C',0);
            $this->SetDrawColor(0,0,0);
            $this->SetLineWidth(0.6);
            $this->Line(5,60,200,60);
            $this->Ln(65);
        }
        function Footer(){            
            $this->SetY(-15);            
            $this->SetFont('Arial','I',8);            
            $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
        }       
    }
    $pdf=new PDF('P','mm','A4');
    $pdf->SetMargins(0,0,0); 
    $pdf->AliasNbPages();    
    $pdf->AddPage();    
    $pdf->SetWidths(array(130,100));
    $pdf->SetFont('Arial','',9);   
    $tarifa0 = 0;
    $tarifa12 = 0;
    $iva = 0;
    $descuento = 0;
    $total = 0;
    $sql = "select nombres_completos,direccion,telefono1,telefono2,fecha_actual,identificacion,correo,fecha_actual,fecha_cancelacion,numero_serie,forma_pago,tarifa0,tarifa12,iva,descuento,total from cliente,factura_venta where cliente.id_cliente = factura_venta.id_cliente and id_factura_venta = '$_GET[id]'";
    $sql = sql($conexion,$sql);      
    while($row = pg_fetch_row($sql)){
        $pdf->SetX(5);
        $pdf->Row(array("CLIENTE: ".utf8_decode($row[0]), "FECHA: ".utf8_decode($row[4])));             
        $pdf->SetX(5);
        $pdf->Row(array("DIRECCION: ".utf8_decode($row[1]), "EMAIL: ".utf8_decode($row[6])));             
        $pdf->SetX(5);
        $pdf->Row(array("TELEFONO: ".utf8_decode($row[2]), "FECHA EMISION: ".utf8_decode($row[7])));             
        $pdf->SetX(5);
        $pdf->Row(array("CELULAR: ".utf8_decode($row[3]), "FECHA CANCELACION: ".utf8_decode($row[8])));             
        $pdf->SetX(5);
        $pdf->Row(array("RUC/CI: ".utf8_decode($row[5]), "NRO. FACTURA: ".utf8_decode($row[9]))); 
        $tarifa0 = $row[11];
        $tarifa12 = $row[12];
        $iva = $row[13];
        $descuento = $row[14];
        $total = $row[15];
    } 
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(0.6);
    $pdf->Line(5,93,200,93);
    $pdf->Ln(5);        
    $pdf->SetWidths(array(30,40,55,30,30,30));
    $pdf->SetFont('Arial','B',9);   
    $pdf->SetX(5);
    $sql = "select cantidad,codigo,descripcion,detalle_factura_venta.precio,descuento,total from detalle_factura_venta,productos where detalle_factura_venta.id_productos = productos.id_productos and detalle_factura_venta.id_factura_venta='$_GET[id]'";
    $sql = sql($conexion,$sql);      
    $pdf->Row(array(utf8_decode("Cantidad"),utf8_decode("Código"),utf8_decode("Descripción"),utf8_decode("Precio U"),utf8_decode("Descuento"),utf8_decode("Total")));             
    $pdf->SetFont('Arial','',9);   
    while($row = pg_fetch_row($sql)){
        $pdf->SetX(5);
        $pdf->Row(array(utf8_decode($row[0]),utf8_decode($row[1]),utf8_decode($row[2]),utf8_decode($row[3]),utf8_decode($row[4]),utf8_decode($row[5])));             
    }    

    $pdf->SetWidths(array(300));    
    $pdf->SetX(5);         
    $pdf->Row(array("----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------"));             
    $pdf->Ln(5);        
    $pdf->SetWidths(array(30,50));
    $pdf->SetFont('Arial','B',9);  
    $pdf->SetX(160);         
    $pdf->Row(array(utf8_decode("Tarifa 0"), $tarifa0));             
    $pdf->SetX(160);
    $pdf->Row(array(utf8_decode("Tarifa 12"), $tarifa12));             
    $pdf->SetX(160);
    $pdf->Row(array(utf8_decode("Iva"), $iva));             
    $pdf->SetX(160);
    $pdf->Row(array(utf8_decode("Descuento"), $descuento));             
    $pdf->SetX(160);
    $pdf->Row(array(utf8_decode("Total"), $total));             
    $pdf->Output();
?>