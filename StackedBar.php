<?php

namespace XandrieBundle\Tools\Charts;


class StackedBar extends AbstractChart{
	
	public function __construct($type){
		
		parent::setType($type);
		parent::setOptionplot(array(
									'series' => array('stacking'	=>  "true"),
									"column" => array(
														"stacking" 	 => "normal",
														'pointWidth' => 1
													)	
									)
						);
	}
	
	
	
	/**
	 * @see \XandrieBundle\Tools\Charts\AbstractChart::build()
	 */
	public function build(array $array){
		$struct = array ();
		$data   = array ();
		$json	= null;
		
	
		$struct = array (
				'credits'	=> array('enabled' => false),
				'chart' 	=> array(
									'type' 	  => 'bar',
									'tooltip' => array('enabled' => true),									
				),
				'yAxis'			=> array(
									'type'		  			=> 'datetime',
									'dateTimeLabelFormats'	=> array('month' => '%e. %b', 'year' => '%b'),
									'title' 	 			=> array('text' 	 => "Total fruit consumption"),
									'stackLabels' 			=> array(
																		'enabled' 	=> 1,
																		'style' 	=> array('fontWeight' => "bold")),
				),
				'legend' 		=> array(
									/*'align' 		=> "right",
									'x' 			=> -70,
									'verticalAlign' => "top",
									'y' 			=> 20,
									'floating' 		=> 1,
									'borderColor' 	=> "#CCC",
									'borderWidth' 	=> 1,
									'shadow' 		=> false,*/
									//'reversed'		=> true,
									'layout'		=> 'vertical',
									'style'			=> '{}',
				),
				'xAxis'			=> array(
    											'startOnTick' 		=> true,
												'type' => 'datetime',
								                'minTickInterval'	=> 0
				),
				'title' 	  	=> array('text' => $this->getTitle()),
				'plotOptions' 	=> $this->getOptionplot(),
				'series' 	 	=> array(
											0 => array(
													'name' => "John",
													'data' => array(
															5,
															3,
															4,
															7,
															2
													)
											),
											1 => array(
													'name' => "Jane",
													'data' => array(
															2,
															2,
															3,
															2,
															1
													)
											),
											2 => array(
													'name' => "Joe",
													'data' => array(
															3,
															4,
															4,
															2,
															5
													)
						)),
		);
		
		$json = json_encode($struct, JSON_PRETTY_PRINT);
		
		return $json;
	}
	
	
	
	
	
	
	
	
	
	
}
