<?php

class PDF extends FPDF
{
    
    //constructor
    public function __construct($orientation='P', $unit='mm', $size='A4')
	{
		parent::__construct($orientation,$unit,$size);

	}
	
    // Load data
    function LoadData($file)
    {
        // Read file lines
        //$lines = file($file);
        $data = array();
        foreach($lines as $line)
            $data[] = explode(';',trim($line));
        return $data;
    }
    
    // Simple table
    function BasicTable($header, $data)
    {
        $columns_widths = ["10", "10", "10", "10", "10"];
        $i=0;
        $x=20.125;
        $y=20.125;

        
            //Grade 06
            //arbitory header
            $this->SetXY($x,$y);
            $this->Cell($columns_widths[0]+$columns_widths[1],7,"Grade 6",1,0,'L');
            $this->Cell($columns_widths[2]+$columns_widths[3]+$columns_widths[4],7,$data[6][0]['date'],1,0,'R');
            $this->Ln();
            // Header
            $this->SetX($x);
            foreach($header as $col) {
    
                $this->Cell($columns_widths[$i],7,$col,1,"L");
                $i += 1;
            }
            $this->Ln();
            // Data
            $label = ['cl_name','total','taught','nottaught','library','date','totall', 'tottaughtall', 'totnotall', 'totlib'];
            $this->SetX($x);
            for( $j=0; $j<count($data[6]);$j++ )
            {
                $num=count($data[6][$j]);
                
                for($i=0; $i<$num-5;$i++) {
                    if($i==0)
                        $this->Cell($columns_widths[$i],6,$data[6][$j][$label[$i]], 1,0, 'L');
                    else
                        $this->Cell($columns_widths[$i],6,$data[6][$j][$label[$i]], 1,0, 'C');
                    
                }
                $this->Ln();
                $this->SetX($x);
            }
            //var_dump($i);
            $this->Cell($columns_widths[$i-5],6,'', 1, 'C');
            $this->Cell($columns_widths[$i-4],6,$data[6][16]['totall'], 1,0,'C');
            $this->Cell($columns_widths[$i-3],6,$data[6][16]['tottaughtall'], 1,0, 'C');
            $this->Cell($columns_widths[$i-2],6,$data[6][16]['totnotall'], 1, 0,'C');
            $this->Cell($columns_widths[$i-1],6,$data[6][16]['totlib'], 1,0, 'C');
            $this->Ln();
            
            $taughtper = sprintf("% .2f",$data[6][16]['tottaughtall']/$data[6][16]['totall']*100);
            $taughtnotper = sprintf("% .2f",$data[6][16]['totnotall']/$data[6][16]['totall']*100);
            $this->SetX($x);
            $this->Cell($columns_widths[$i-5],6,'', 0, 'C');
            $this->Cell($columns_widths[$i-4],6,'', 0,0,'C');
            $this->Cell($columns_widths[$i-3],6, $taughtper, 0,0, 'C');
            $this->Cell($columns_widths[$i-2],6,$taughtnotper, 0, 0,'C');
            $this->Cell($columns_widths[$i-1],6,'', 0,0, 'C');
            
            
            
            //Grade 07    
            //arbitory header

            $this->SetXY($x+55,$y);
            $this->Cell($columns_widths[0]+$columns_widths[1],7,"Grade 7",1,0,'L');
            $this->Cell($columns_widths[2]+$columns_widths[3]+$columns_widths[4],7,$data[7][0]['date'],1,0,'R');
            $this->Ln();
            //$this->SetXY(65,$y);
            $y+=7;
            $this->SetXY($x+55, $y);
            // Header
            foreach($header as $col) {
                
                $this->Cell($columns_widths[0],7,$col,1,"L");
                //$i += 1;
                
            }
            $this->Ln();
            
            // Data
            $label = ['cl_name','total','taught','nottaught','library','date','totall', 'tottaughtall', 'totnotall', 'totlib'];
            $y+=7;
            $this->SetXY($x+55,$y);
            for( $j=0; $j<count($data[7]);$j++ )
            {
                $num=count($data[7][$j]);
                
                for($i=0; $i<$num-5;$i++) {
                    if($i==0)
                        $this->Cell($columns_widths[$i],6,$data[7][$j][$label[$i]], 1,0, 'L');    
                    else
                        $this->Cell($columns_widths[$i],6,$data[7][$j][$label[$i]], 1,0, 'C'); 
                    
                }
                $this->Ln();
                $y+=6;
                $this->SetXY($x+55,$y);
                
            }
            //var_dump($i);
            $this->Cell($columns_widths[$i-5],6,'', 1, 'C');
            $this->Cell($columns_widths[$i-4],6,$data[7][16]['totall'], 1,0,'C');
            $this->Cell($columns_widths[$i-3],6,$data[7][16]['tottaughtall'], 1,0, 'C');
            $this->Cell($columns_widths[$i-2],6,$data[7][16]['totnotall'], 1, 0,'C');
            $this->Cell($columns_widths[$i-1],6,$data[7][16]['totlib'], 1,0, 'C');
            $this->Ln();
            
            $taughtper = sprintf("% .2f",$data[7][16]['tottaughtall']/$data[7][16]['totall']*100);
            $taughtnotper = sprintf("% .2f",$data[7][16]['totnotall']/$data[7][16]['totall']*100);
            $y+=6;
            $this->SetXY($x+55,$y);
            $this->Cell($columns_widths[$i-5],6,'', 0, 'C');
            $this->Cell($columns_widths[$i-4],6,'', 0,0,'C');
            $this->Cell($columns_widths[$i-3],6, $taughtper, 0,0, 'C');
            $this->Cell($columns_widths[$i-2],6,$taughtnotper, 0, 0,'C');
            $this->Cell($columns_widths[$i-1],6,'', 0,0, 'C');
            
            
            //Grade 08    
            //arbitory header
            $y=20.125;
            $this->SetXY($x+110,$y);
            $this->Cell($columns_widths[0]+$columns_widths[1],7,"Grade 8",1,0,'L');
            $this->Cell($columns_widths[2]+$columns_widths[3]+$columns_widths[4],7,$data[8][0]['date'],1,0,'R');
            $this->Ln();
            // Header
            $y+=7;
            $this->SetXY($x+110,$y);
            foreach($header as $col) {
    
                $this->Cell($columns_widths[0],7,$col,1,"L");
                //$i += 1;
            }
            $this->Ln();
            // Data
            $label = ['cl_name','total','taught','nottaught','library','date','totall', 'tottaughtall', 'totnotall', 'totlib'];
            $y+=7;
            $this->SetXY($x+110,$y);
            for( $j=0; $j<count($data[8]);$j++ )
            {
                $num=count($data[8][$j]);
                
                for($i=0; $i<$num-5;$i++) {
                    if($i==0)
                        $this->Cell($columns_widths[$i],6,$data[8][$j][$label[$i]], 1,0, 'L');    
                    else
                        $this->Cell($columns_widths[$i],6,$data[8][$j][$label[$i]], 1,0, 'C'); 
                    
                }
                $this->Ln();
                $y+=6;
                $this->SetXY($x+110,$y);
                
            }
            //var_dump($i);
            $this->Cell($columns_widths[$i-5],6,'', 1, 'C');
            $this->Cell($columns_widths[$i-4],6,$data[8][16]['totall'], 1,0,'C');
            $this->Cell($columns_widths[$i-3],6,$data[8][16]['tottaughtall'], 1,0, 'C');
            $this->Cell($columns_widths[$i-2],6,$data[8][16]['totnotall'], 1, 0,'C');
            $this->Cell($columns_widths[$i-1],6,$data[8][16]['totlib'], 1,0, 'C');
            $this->Ln();
            
            $taughtper = sprintf("% .2f",$data[8][16]['tottaughtall']/$data[8][16]['totall']*100);
            $taughtnotper = sprintf("% .2f",$data[8][16]['totnotall']/$data[8][16]['totall']*100);
            $y+=6;
            $this->SetXY($x+110,$y);
            $this->Cell($columns_widths[$i-5],6,'', 0, 'C');
            $this->Cell($columns_widths[$i-4],6,'', 0,0,'C');
            $this->Cell($columns_widths[$i-3],6, $taughtper, 0,0, 'C');
            $this->Cell($columns_widths[$i-2],6,$taughtnotper, 0, 0,'C');
            $this->Cell($columns_widths[$i-1],6,'', 0,0, 'C');
            
            
            //Grade 09
            //arbitory header
            $y = 13.125;
            $this->SetXY($x,$y+135);
            $this->Cell($columns_widths[0]+$columns_widths[1],7,"Grade 9",1,0,'L');
            $this->Cell($columns_widths[2]+$columns_widths[3]+$columns_widths[4],7,$data[9][0]['date'],1,0,'R');
            $this->Ln();
            // Header
            $this->SetX($x);
            foreach($header as $col) {
    
                $this->Cell($columns_widths[0],7,$col,1,"L");
                //$i += 1;
            }
            $this->Ln();
            // Data
            $label = ['cl_name','total','taught','nottaught','library','date','totall', 'tottaughtall', 'totnotall', 'totlib'];
            $this->SetX($x);
            for( $j=0; $j<count($data[9]);$j++ )
            {
                $num=count($data[9][$j]);
                
                for($i=0; $i<$num-5;$i++) {
                    if($i==0)
                        $this->Cell($columns_widths[$i],6,$data[9][$j][$label[$i]], 1,0, 'L');    
                    else
                        $this->Cell($columns_widths[$i],6,$data[9][$j][$label[$i]], 1,0, 'C'); 
                    
                }
                $this->Ln();
                $this->SetX($x);
            }
            //var_dump($i);
            $this->Cell($columns_widths[$i-5],6,'', 1, 'C');
            $this->Cell($columns_widths[$i-4],6,$data[9][16]['totall'], 1,0,'C');
            $this->Cell($columns_widths[$i-3],6,$data[9][16]['tottaughtall'], 1,0, 'C');
            $this->Cell($columns_widths[$i-2],6,$data[9][16]['totnotall'], 1, 0,'C');
            $this->Cell($columns_widths[$i-1],6,$data[9][16]['totlib'], 1,0, 'C');
            $this->Ln();
            
            $taughtper = sprintf("% .2f",$data[9][16]['tottaughtall']/$data[9][16]['totall']*100);
            $taughtnotper = sprintf("% .2f",$data[9][16]['totnotall']/$data[9][16]['totall']*100);
            $this->SetX($x);
            $this->Cell($columns_widths[$i-5],6,'', 0, 'C');
            $this->Cell($columns_widths[$i-4],6,'', 0,0,'C');
            $this->Cell($columns_widths[$i-3],6, $taughtper, 0,0, 'C');
            $this->Cell($columns_widths[$i-2],6,$taughtnotper, 0, 0,'C');
            $this->Cell($columns_widths[$i-1],6,'', 0,0, 'C');
            
            
            //Grade 10    
            //arbitory header
            $y = 148.125;
            $this->SetXY($x+55,$y);
            $this->Cell($columns_widths[0]+$columns_widths[1],7,"Grade 10",1,0,'L');
            $this->Cell($columns_widths[2]+$columns_widths[3]+$columns_widths[4],7,$data[10][0]['date'],1,0,'R');
            $this->Ln();
            
            // Header
            $y+=7;
            $this->SetXY($x+55,$y);
            foreach($header as $col) {
    
                $this->Cell($columns_widths[0],7,$col,1,"L");
                //$i += 1;
            }
            $this->Ln();
            // Data
            $label = ['cl_name','total','taught','nottaught','library','date','totall', 'tottaughtall', 'totnotall', 'totlib'];
            
            $y+=7;
            $this->SetXY($x+55,$y);
            
            for( $j=0; $j<count($data[10]);$j++ )
            {
                $num=count($data[10][$j]);
                
                for($i=0; $i<$num-5;$i++) {
                    if($i==0)
                        $this->Cell($columns_widths[$i],6,$data[10][$j][$label[$i]], 1,0, 'L');    
                    else
                        $this->Cell($columns_widths[$i],6,$data[10][$j][$label[$i]], 1,0, 'C'); 
                    
                }
                $this->Ln();
                $y+=6;
                $this->SetXY($x+55,$y);
            }
            //var_dump($i);
            $this->Cell($columns_widths[$i-5],6,'', 1, 'C');
            $this->Cell($columns_widths[$i-4],6,$data[10][16]['totall'], 1,0,'C');
            $this->Cell($columns_widths[$i-3],6,$data[10][16]['tottaughtall'], 1,0, 'C');
            $this->Cell($columns_widths[$i-2],6,$data[10][16]['totnotall'], 1, 0,'C');
            $this->Cell($columns_widths[$i-1],6,$data[10][16]['totlib'], 1,0, 'C');
            $this->Ln();
            
            $taughtper = sprintf("% .2f",$data[10][16]['tottaughtall']/$data[10][16]['totall']*100);
            $taughtnotper = sprintf("% .2f",$data[10][16]['totnotall']/$data[10][16]['totall']*100);
            $y+=6;
            $this->SetXY($x+55,$y);
            $this->Cell($columns_widths[$i-5],6,'', 0, 'C');
            $this->Cell($columns_widths[$i-4],6,'', 0,0,'C');
            $this->Cell($columns_widths[$i-3],6, $taughtper, 0,0, 'C');
            $this->Cell($columns_widths[$i-2],6,$taughtnotper, 0, 0,'C');
            $this->Cell($columns_widths[$i-1],6,'', 0,0, 'C');
            
            
            //Grade 11    
            //arbitory header
            $y = 148.125;

            $this->SetXY($x+110,$y);
            $this->Cell($columns_widths[0]+$columns_widths[1],7,"Grade 11",1,0,'L');
            $this->Cell($columns_widths[2]+$columns_widths[3]+$columns_widths[4],7,$data[11][0]['date'],1,0,'R');
            $this->Ln();
            
            $y+=7;
            $this->SetXY($x+110,$y);
            // Header
            foreach($header as $col) {
    
                $this->Cell($columns_widths[0],7,$col,1,"L");
                //$i += 1;
            }
            $this->Ln();
            // Data
            $label = ['cl_name','total','taught','nottaught','library','date','totall', 'tottaughtall', 'totnotall', 'totlib'];
            $y+=7;
            $this->SetXY($x+110,$y);
            for( $j=0; $j<count($data[11]);$j++ )
            {
                $num=count($data[11][$j]);
                
                for($i=0; $i<$num-5;$i++) {
                    if($i==0)
                        $this->Cell($columns_widths[$i],6,$data[11][$j][$label[$i]], 1,0, 'L');
                    else
                        $this->Cell($columns_widths[$i],6,$data[11][$j][$label[$i]], 1,0, 'C');
                    
                }
                $this->Ln();
                $y+=6;
                $this->SetXY($x+110,$y);
            }
            //var_dump($i);
            $this->Cell($columns_widths[$i-5],6,'', 1, 'C');
            $this->Cell($columns_widths[$i-4],6,$data[11][16]['totall'], 1,0,'C');
            $this->Cell($columns_widths[$i-3],6,$data[11][16]['tottaughtall'], 1,0, 'C');
            $this->Cell($columns_widths[$i-2],6,$data[11][16]['totnotall'], 1, 0,'C');
            $this->Cell($columns_widths[$i-1],6,$data[11][16]['totlib'], 1,0, 'C');
            $this->Ln();
            
            $taughtper = sprintf("% .2f",$data[11][16]['tottaughtall']/$data[11][16]['totall']*100);
            $taughtnotper = sprintf("% .2f",$data[11][16]['totnotall']/$data[11][16]['totall']*100);
            
            $y+=6;
            $this->SetXY($x+110,$y);
            $this->Cell($columns_widths[$i-5],6,'', 0, 'C');
            $this->Cell($columns_widths[$i-4],6,'', 0,0,'C');
            $this->Cell($columns_widths[$i-3],6, $taughtper, 0,0, 'C');
            $this->Cell($columns_widths[$i-2],6,$taughtnotper, 0, 0,'C');
            $this->Cell($columns_widths[$i-1],6,'', 0,0, 'C');
            
            $this->AddPage();
            
            
            $i=0;
            $x=20.125;
            $y=20.125;
        
        
            
            //Grade 12
            //arbitory header
            $this->SetXY($x,$y);
            $this->Cell($columns_widths[0]+$columns_widths[1] + 5 ,7,"Grade 12",1,0,'L');
            $this->Cell($columns_widths[2]+$columns_widths[3]+$columns_widths[4],7,$data[6][0]['date'],1,0,'R');
            $this->Ln();
            // Header
            $this->SetX($x);
            
            $this->Cell($columns_widths[$i]+5 ,7,$header[0] ,1,"L");
            $this->Cell($columns_widths[$i] ,7,$header[1] ,1,"L");
            $this->Cell($columns_widths[$i] ,7,$header[2] ,1,"L");
            $this->Cell($columns_widths[$i] ,7,$header[3] ,1,"L");
            $this->Cell($columns_widths[$i] ,7,$header[4] ,1,"L");
            
            //foreach($header as $col) {
                
                //$this->Cell($columns_widths[$i],7,$col,1,"L");
                //$i += 1;
            //}
            
            $this->Ln();
            // Data
            $label = ['cl_name','total','taught','nottaught','library','date','totall', 'tottaughtall', 'totnotall', 'totlib'];
            $this->SetX($x);
            for( $j=0; $j<count($data[12]);$j++ )
            {
                $num=count($data[12][$j]);
                
                for($i=0; $i<$num-5;$i++) {
                    if($i==0)
                        $this->Cell($columns_widths[$i]+5 ,6,$data[12][$j][$label[$i]], 1,0, 'L');
                    else
                        $this->Cell($columns_widths[$i],6,$data[12][$j][$label[$i]], 1,0, 'C');
                    
                }
                $this->Ln();
                $this->SetX($x);
            }
            //var_dump($i);
            $this->Cell($columns_widths[$i-5]+5,6,'', 1, 'C');
            $this->Cell($columns_widths[$i-4],6,$data[12][16]['totall'], 1,0,'C');
            $this->Cell($columns_widths[$i-3],6,$data[12][16]['tottaughtall'], 1,0, 'C');
            $this->Cell($columns_widths[$i-2],6,$data[12][16]['totnotall'], 1, 0,'C');
            $this->Cell($columns_widths[$i-1],6,$data[12][16]['totlib'], 1,0, 'C');
            $this->Ln();
            
            $taughtper = sprintf("% .2f",$data[12][16]['tottaughtall']/$data[12][16]['totall']*100);
            $taughtnotper = sprintf("% .2f",$data[12][16]['totnotall']/$data[12][16]['totall']*100);
            $this->SetX($x);
            $this->Cell($columns_widths[$i-5]+5,6,'', 0, 'C');
            $this->Cell($columns_widths[$i-4],6,'', 0,0,'C');
            $this->Cell($columns_widths[$i-3],6, $taughtper, 0,0, 'C');
            $this->Cell($columns_widths[$i-2],6,$taughtnotper, 0, 0,'C');
            $this->Cell($columns_widths[$i-1],6,'', 0,0, 'C');
            
            
            
            //Grade 13    
            //arbitory header

            $this->SetXY($x+65,$y);
            $this->Cell($columns_widths[0]+$columns_widths[1]+5 ,7,"Grade 13",1,0,'L');
            $this->Cell($columns_widths[2]+$columns_widths[3]+$columns_widths[4],7,$data[7][0]['date'],1,0,'R');
            $this->Ln();
            //$this->SetXY(65,$y);
            $y+=7;
            $this->SetXY($x+65, $y);
            
            $this->Cell($columns_widths[0]+5 ,7,$header[0] ,1,"L");
            $this->Cell($columns_widths[1] ,7,$header[1] ,1,"L");
            $this->Cell($columns_widths[2] ,7,$header[2] ,1,"L");
            $this->Cell($columns_widths[3] ,7,$header[3] ,1,"L");
            $this->Cell($columns_widths[4] ,7,$header[4] ,1,"L");
            
            // Header
            //foreach($header as $col) {
                
                //$this->Cell($columns_widths[0],7,$col,1,"L");
                //$i += 1;
                
            //}
            $this->Ln();
            
            // Data
            $label = ['cl_name','total','taught','nottaught','library','date','totall', 'tottaughtall', 'totnotall', 'totlib'];
            $y+=7;
            $this->SetXY($x+65,$y);
            for( $j=0; $j<count($data[13]);$j++ )
            {
                $num=count($data[13][$j]);
                
                for($i=0; $i<$num-5;$i++) {
                    if($i==0)
                        $this->Cell($columns_widths[$i]+5 ,6,$data[13][$j][$label[$i]], 1,0, 'L');    
                    else
                        $this->Cell($columns_widths[$i],6,$data[13][$j][$label[$i]], 1,0, 'C'); 
                    
                }
                $this->Ln();
                $y+=6;
                $this->SetXY($x+65,$y);
                
            }
            //var_dump($i);
            $this->Cell($columns_widths[$i-5]+5 ,6,'', 1, 'C');
            $this->Cell($columns_widths[$i-4],6,$data[13][16]['totall'], 1,0,'C');
            $this->Cell($columns_widths[$i-3],6,$data[13][16]['tottaughtall'], 1,0, 'C');
            $this->Cell($columns_widths[$i-2],6,$data[13][16]['totnotall'], 1, 0,'C');
            $this->Cell($columns_widths[$i-1],6,$data[13][16]['totlib'], 1,0, 'C');
            $this->Ln();
            
            $taughtper = sprintf("% .2f",$data[13][16]['tottaughtall']/$data[13][16]['totall']*100);
            $taughtnotper = sprintf("% .2f",$data[13][16]['totnotall']/$data[13][16]['totall']*100);
            $y+=6;
            $this->SetXY($x+65,$y);
            $this->Cell($columns_widths[$i-5]+5,6,'', 0, 'C');
            $this->Cell($columns_widths[$i-4],6,'', 0,0,'C');
            $this->Cell($columns_widths[$i-3],6, $taughtper, 0,0, 'C');
            $this->Cell($columns_widths[$i-2],6,$taughtnotper, 0, 0,'C');
            $this->Cell($columns_widths[$i-1],6,'', 0,0, 'C');
            
    }
    
    
    function BasicTable1($header, $data) {
        
        $columns_widths = ["15", "67", "15", "73"];
        $i=0;
        $x=20.125;
        $y=20.125;
        
        $this->SetXY($x,$y);
        
        

        for( $j=0; $j<count($data); $j++ ) {
            
            $i=0;
            
            $this->SetFont('Arial','B',12);
            
            $this->Cell(20, 8, 'Class: '.$data[$j][0]['cl_name'] , 0, 1, 'L');

            $this->SetX($x);
            
            $this->Cell(20, 8, 'Date: '.$data[$j][0]['ts_date'] , 0, 1, 'L');

            $this->SetX($x);
            
            $this->SetFont('Arial', 'B', 9);
            
            foreach($header as $col) {
    
                $this->Cell($columns_widths[$i],12,$col,1,0,"C");
                $i += 1;
            }
            
            $this->Ln();
            $this->SetX($x);

            for( $k=0; $k<$data[$j][0]['numofrecords']; $k++ ) {
                
                $this->Cell($columns_widths[0],8,$data[$j][$k]['slot'],1,"L");
                $this->Cell($columns_widths[1],8,$data[$j][$k]['subname'],1,"L");
                $data[$j][$k]['isdone']==1?$this->SetTextColor(0,255,0):$this->SetTextColor(255,0,0);
                $this->Cell($columns_widths[2],8,$data[$j][$k]['isdone']==1?'Yes':'No',1,"L");
                $this->SetTextColor(0,0,0);
                $this->Cell($columns_widths[3],8,$data[$j][$k]['reason'],1,"L");
                $this->Ln();
                $this->SetX($x);
                
            }
            
            $y = $this->GetY();
            $this->SetXY($x,$y+10);
        }
        
    }


    function BasicTable3($data)
    {
        print_r($data);
        $this->SetFont('Times', 'B', 14);
        $columns_width = "22.5";
        
            $this->Cell(50);
            $this->Cell(112, 10, 'STUDENT ATTENDENCE REPORT - '.$data[6]['date'] , 0, 1, 'C');
            $this->Ln(7);

            $this->SetFont('Arial','B',8);
            $this->SetX(40);
            
            $x1 = $this->GetX();
            $y1 = $this->GetY();
            
            $this->Cell($columns_width+$columns_width,7,"Junior Section",1,1,'L');
            
            $this->SetX(40);
            $this->Cell($columns_width+$columns_width,7,"Grade 06",1,1,'L');
            $this->SetX(40);
            $this->Cell($columns_width,7,"Boys",1,0,'L');
            $this->SetX(40);
            $this->Cell($columns_width,7,$data[6]['boys'],1,1,'C');
            $this->SetX(40);
            $this->Cell($columns_width,7,"Girls",1,0,'L');
            $this->SetX(40);
            $this->Cell($columns_width,7,$data[6]['girls'],1,1,'C');
            
            $x2 = $this->GetX();
            $y2 = $this->GetY();

            $this->SetXY($x1+170,$y1);
            
            $this->Cell($columns_width+$columns_width,7,"Junior Section",1,1,'L');
            $this->SetX($x1+170);
            $this->Cell($columns_width+$columns_width,7,"Grade 07",1,1,'L');
            $this->SetX($x1+170);
            $this->Cell($columns_width,7,"Boys",1,0,'L');
            $this->SetX($x1+170);
            $this->Cell($columns_width,7,$data[7]['boys'],1,1,'C');
            $this->SetX($x1+170);
            $this->Cell($columns_width,7,"Girls",1,0,'L');
            $this->SetX($x1+170);
            $this->Cell($columns_width,7,$data[7]['girls'],1,1,'C');

            $x3 = $this->GetX();
            $y3 = $this->GetY();

            $this->SetXY($x2 + 40, $y2 +20);
            
            $this->Cell($columns_width+$columns_width,7,"Junior Secondary Section",1,1,'L');
            $this->SetX($x2+40);
            $this->Cell($columns_width+$columns_width,7,"Grade 08",1,1,'L');
            $this->SetX($x2+40);
            $this->Cell($columns_width,7,"Boys",1,0,'L');
            $this->SetX($x2+40);
            $this->Cell($columns_width,7,$data[8]['boys'],1,1,'C');
            $this->SetX($x2+40);
            $this->Cell($columns_width,7,"Girls",1,0,'L');
            $this->SetX($x2+40);
            $this->Cell($columns_width,7,$data[8]['girls'],1,1,'C');

            $x4 = $this->GetX();
            $y4 = $this->GetY();
            
            $this->SetXY($x3 + 170, $y3);
            
            $this->Cell($columns_width+$columns_width,7,"Junior Secondary Section",1,1,'L');
            $this->SetX($x3 + 170);
            $this->Cell($columns_width+$columns_width,7,"Grade 09",1,1,'L');
            $this->SetX($x3 + 170);
            $this->Cell($columns_width,7,"Boys",1,0,'L');
            $this->SetX($x3 + 170);
            $this->Cell($columns_width,7,$data[9]['boys'],1,1,'C');
            $this->SetX($x3 + 170);
            $this->Cell($columns_width,7,"Girls",1,0,'L');
            $this->SetX($x3 + 170);
            $this->Cell($columns_width,7,$data[9]['girls'],1,1,'C');

            $x5 = $this->GetX();
            $y5 = $this->GetY();

            $this->SetXY($x4 + 40, $y4 +20);
            
            $this->Cell($columns_width+$columns_width,7,"Middle Section",1,1,'L');
            $this->SetX($x4+40);
            $this->Cell($columns_width+$columns_width,7,"Grade 10",1,1,'L');
            $this->SetX($x4+40);
            $this->Cell($columns_width,7,"Boys",1,0,'L');
            $this->SetX($x4+40);
            $this->Cell($columns_width,7,$data[10]['boys'],1,1,'C');
            $this->SetX($x4+40);
            $this->Cell($columns_width,7,"Girls",1,0,'L');
            $this->SetX($x4+40);
            $this->Cell($columns_width,7,$data[10]['girls'],1,1,'C');

            $x6 = $this->GetX();
            $y6 = $this->GetY();

            $this->SetXY($x5 + 170, $y5);
            
            $this->Cell($columns_width+$columns_width,7,"Middle Section",1,1,'L');
            $this->SetX($x5 + 170);
            $this->Cell($columns_width+$columns_width,7,"Grade 11",1,1,'L');
            $this->SetX($x5 + 170);
            $this->Cell($columns_width,7,"Boys",1,0,'L');
            $this->SetX($x5 + 170);
            $this->Cell($columns_width,7,$data[11]['boys'],1,1,'C');
            $this->SetX($x5 + 170);
            $this->Cell($columns_width,7,"Girls",1,0,'L');
            $this->SetX($x5 + 170);
            $this->Cell($columns_width,7,$data[11]['girls'],1,1,'C');
 
            $x7 = $this->GetX();
            $y7 = $this->GetY();
            
            $this->SetXY($x6 + 40, $y6 +20);
            
            $this->Cell($columns_width+$columns_width,7,"AL Section",1,1,'L');
            $this->SetX($x6+40);
            $this->Cell($columns_width+$columns_width,7,"Grade 12",1,1,'L');
            $this->SetX($x6+40);
            $this->Cell($columns_width,7,"Boys",1,0,'L');
            $this->SetX($x6+40);
            $this->Cell($columns_width,7,$data[12]['boys'],1,1,'C');
            $this->SetX($x6+40);
            $this->Cell($columns_width,7,"Girls",1,0,'L');
            $this->SetX($x6+40);
            $this->Cell($columns_width,7,$data[12]['girls'],1,1,'C');

            $this->SetXY($x7 + 170, $y7);
            
            $this->Cell($columns_width+$columns_width,7,"AL Section",1,1,'L');
            $this->SetX($x7 + 170);
            $this->Cell($columns_width+$columns_width,7,"Grade 13",1,1,'L');
            $this->SetX($x7 + 170);
            $this->Cell($columns_width,7,"Boys",1,0,'L');
            $this->SetX($x7 + 170);
            $this->Cell($columns_width,7,$data[13]['boys'],1,1,'C');
            $this->SetX($x7 + 170);
            $this->Cell($columns_width,7,"Girls",1,0,'L');
            $this->SetX($x7 + 170);
            $this->Cell($columns_width,7,$data[13]['girls'],1,1,'C');

    }

    
    
    // Better table
    function ImprovedTable($header, $data)
    {
        // Column widths
        $w = array(40, 35, 40, 45);
        // Header
        for($i=0;$i<count($header);$i++)
            $this->Cell($w[$i],7,$header[$i],1,0,'C');
        $this->Ln();
        // Data
        foreach($data as $row)
        {
            $this->Cell($w[0],6,$row[0],'LR');
            $this->Cell($w[1],6,$row[1],'LR');
            $this->Cell($w[2],6,number_format($row[2]),'LR',0,'R');
            $this->Cell($w[3],6,number_format($row[3]),'LR',0,'R');
            $this->Ln();
        }
        // Closing line
        $this->Cell(array_sum($w),0,'','T');
    }
    
    // Colored table
    function FancyTable($header, $data)
    {
        // Colors, line width and bold font
        $this->SetFillColor(255,0,0);
        $this->SetTextColor(255);
        $this->SetDrawColor(128,0,0);
        $this->SetLineWidth(.3);
        $this->SetFont('','B');
        // Header
        $w = array(40, 35, 40, 45);
        for($i=0;$i<count($header);$i++)
            $this->Cell($w[$i],7,$header[$i],1,0,'C',true);
        $this->Ln();
        // Color and font restoration
        $this->SetFillColor(224,235,255);
        $this->SetTextColor(0);
        $this->SetFont('');
        // Data
        $fill = false;
        foreach($data as $row)
        {
            $this->Cell($w[0],6,$row[0],'LR',0,'L',$fill);
            $this->Cell($w[1],6,$row[1],'LR',0,'L',$fill);
            $this->Cell($w[2],6,number_format($row[2]),'LR',0,'R',$fill);
            $this->Cell($w[3],6,number_format($row[3]),'LR',0,'R',$fill);
            $this->Ln();
            $fill = !$fill;
        }
        // Closing line
        $this->Cell(array_sum($w),0,'','T');
    }
}



?>