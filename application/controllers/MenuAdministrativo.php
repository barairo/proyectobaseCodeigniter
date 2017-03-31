<?php
class MenuAdministrativo extends CI_Controller {
public function index()
{
/* datos correspondientes al head */    
$dataH = array();
$dataH['archivoJS'] = "menuAdministrativo";
$dataH['titulo_pagina'] = "Menu Administrativo";
$this->load->view('view_Head', $dataH);
/* datos correspondientes al head */  

$this->load->view('view_MenuAdministrativo',"" );

 }
 
 public function calendarioActual()
    {
     
     $idUsuario = $this->session->userdata('usuarioActivo');   
   
			$pref['template']='
				{table_open}<table id="cuerpoCalendario" border="1" cellpadding="1" cellspacing="2">{/table_open}
				
				{heading_row_start}<tr>{/heading_row_start}
				{heading_previous_cell}<th class="prevcell"><a href="{previous_url}">&lt;&lt;</a></th>{/heading_previous_cell}
				{heading_title_cell}<th colspan="{colspan}">{heading}</th>{/heading_title_cell}
				{heading_next_cell}<th class="nextcell"><a href="{next_url}">&gt;&gt;</a></th>{/heading_next_cell}
				{heading_row_end}</tr>{/heading_row_end}
				
				{week_row_start}<tr class="wk_nm">{/week_row_start}
				{week_day_cell}<td class="celdaCalendario">{week_day}</td>{/week_day_cell} 
				{week_row_end}</tr>{/week_row_end}
				
				
				{cal_row_start}<tr>{/cal_row_start}
				{cal_cell_start}<td class="celdaCalendario">{/cal_cell_start}
				{cal_cell_content}<a href="{content}">{day}</a>{/cal_cell_content}
				{cal_cell_content_today}<div class="highlight"><a href="{content}">{day}</a></div>{/cal_cell_content_today}
				
				{cal_cell_content}{day}{/cal_cell_content}
				{cal_cell_content_today}<div class="highlight">{day}</div>{/call_cell_content_today}
				
				{cal_cell_blank}&nbsp;{/cal_cell_blank}
				
				{cal_cell_end}</td>{/cal_cell_end}
				{cal_row_end}</tr>{/cal_cell_end}
				
				{table_close}</table>{/table_close}
			';
			
			$pref['start_day']='monday';
			$pref['day_type']='short';
			$pref['show_next_prev']=false;
			
		$this->load->library('calendar',$pref);
 
    $año = date('Y');
    $mes = date('n');
       
      
$newdata = array(
                   'mesActual' => $mes,
                   'añoActual' => $año,
               );
$this->load->model('Model_Gastos');
$data['GastosPrueba'] = $this->Model_Gastos->obtener_gastosPorDia($mes,$año,$idUsuario);
$data1 = array();
   foreach($data['GastosPrueba'] as $fila){
        $data1[$fila['dias']] = site_url('Categorias/');
         }
         $data1[date('j')] = site_url('Categorias/');
$this->session->set_userdata($newdata);
echo $this->calendar->generate($año,$mes,$data1);


     
    }




public function mesAnterior(){
    $idUsuario = $this->session->userdata('usuarioActivo');
    
 $pref['template']='
				{table_open}<table id="cuerpoCalendario" border="1" cellpadding="1" cellspacing="2">{/table_open}
				
				{heading_row_start}<tr>{/heading_row_start}
				{heading_previous_cell}<th class="prevcell"><a href="{previous_url}">&lt;&lt;</a></th>{/heading_previous_cell}
				{heading_title_cell}<th colspan="{colspan}">{heading}</th>{/heading_title_cell}
				{heading_next_cell}<th class="nextcell"><a href="{next_url}">&gt;&gt;</a></th>{/heading_next_cell}
				{heading_row_end}</tr>{/heading_row_end}
				
				{week_row_start}<tr class="wk_nm">{/week_row_start}
				{week_day_cell}<td class="celdaCalendario">{week_day}</td>{/week_day_cell} 
				{week_row_end}</tr>{/week_row_end}
				
				
				{cal_row_start}<tr>{/cal_row_start}
				{cal_cell_start}<td class="celdaCalendario">{/cal_cell_start}
				{cal_cell_content}<a href="{content}">{day}</a>{/cal_cell_content}
				{cal_cell_content_today}<div class="highlight"><a href="{content}">{day}</a></div>{/cal_cell_content_today}
				
				{cal_cell_content}{day}{/cal_cell_content}
				{cal_cell_content_today}<div class="highlight">{day}</div>{/call_cell_content_today}
				
				{cal_cell_blank}&nbsp;{/cal_cell_blank}
				
				{cal_cell_end}</td>{/cal_cell_end}
				{cal_row_end}</tr>{/cal_cell_end}
				
				{table_close}</table>{/table_close}
			';
			
			$pref['start_day']='monday';
			$pref['day_type']='short';
			$pref['show_next_prev']=false;
			
                        $this->load->library('calendar',$pref);      
                        

$mesActual = $this->session->userdata('mesActual');
$añoActual = $this->session->userdata('añoActual');


$mes = $mesActual - 1;

if($mes <= 0 ){
    
    $mes = 12;
    $añoActual = $añoActual - 1;
}

$newdata = array(
                   'mesActual' => $mes,
                   'añoActual' => $añoActual
               );

$this->load->model('Model_Gastos');
$data['GastosPrueba'] = $this->Model_Gastos->obtener_gastosPorDia($mes,$añoActual,$idUsuario);
$data1 = array();
   foreach($data['GastosPrueba'] as $fila){
        $data1[$fila['dias']] = site_url('Categorias/');
         }
           $añoHoy = date('Y');
           $mesHoy = date('n');
           if($mesHoy == $mes && $añoHoy == $añoActual)
               {
                $data1[date('j')] = site_url('Categorias/');
               }
         
$this->session->set_userdata($newdata);
echo $this->calendar->generate($añoActual,$mes,$data1);
}


public function mesSiguiente(){
    $idUsuario = $this->session->userdata('usuarioActivo');
    
 $pref['template']='
				{table_open}<table id="cuerpoCalendario" border="1" cellpadding="1" cellspacing="2">{/table_open}
				
				{heading_row_start}<tr>{/heading_row_start}
				{heading_previous_cell}<th class="prevcell"><a href="{previous_url}">&lt;&lt;</a></th>{/heading_previous_cell}
				{heading_title_cell}<th colspan="{colspan}">{heading}</th>{/heading_title_cell}
				{heading_next_cell}<th class="nextcell"><a href="{next_url}">&gt;&gt;</a></th>{/heading_next_cell}
				{heading_row_end}</tr>{/heading_row_end}
				
				{week_row_start}<tr class="wk_nm">{/week_row_start}
				{week_day_cell}<td class="celdaCalendario">{week_day}</td>{/week_day_cell} 
				{week_row_end}</tr>{/week_row_end}
				
				
				{cal_row_start}<tr>{/cal_row_start}
				{cal_cell_start}<td class="celdaCalendario">{/cal_cell_start}
				{cal_cell_content}<a href="{content}">{day}</a>{/cal_cell_content}
				{cal_cell_content_today}<div class="highlight"><a href="{content}">{day}</a></div>{/cal_cell_content_today}
				
				{cal_cell_content}{day}{/cal_cell_content}
				{cal_cell_content_today}<div class="highlight">{day}</div>{/call_cell_content_today}
				
				{cal_cell_blank}&nbsp;{/cal_cell_blank}
				
				{cal_cell_end}</td>{/cal_cell_end}
				{cal_row_end}</tr>{/cal_cell_end}
				
				{table_close}</table>{/table_close}
			';
			
			$pref['start_day']='monday';
			$pref['day_type']='short';
			$pref['show_next_prev']=false;
			
                        $this->load->library('calendar',$pref);      
                        
$mesActual = $this->session->userdata('mesActual');
$añoActual = $this->session->userdata('añoActual');

$mes = $mesActual + 1;
if($mes > 12 ){
    
    $mes = 1;
    $añoActual = $añoActual + 1;
}

$newdata = array(
                   'mesActual' => $mes,
                   'añoActual' => $añoActual
               );

$this->load->model('Model_Gastos');
$data['GastosPrueba'] = $this->Model_Gastos->obtener_gastosPorDia($mes,$añoActual,$idUsuario);
$data1 = array();
   foreach($data['GastosPrueba'] as $fila){
        $data1[$fila['dias']] = site_url('Categorias/');
         }
         $añoHoy = date('Y');
           $mesHoy = date('n');
           if($mesHoy == $mes && $añoHoy == $añoActual)
               {
                $data1[date('j')] = site_url('Categorias/');
               }
$this->session->set_userdata($newdata);
echo $this->calendar->generate($añoActual,$mes,$data1);

}


    
    }
    ?>
