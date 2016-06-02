<?php

namespace XandrieBundle\Tools\Charts;

use XandrieBundle\Tools\Charts\Area;
use XandrieBundle\Tools\Charts\Bar;
use XandrieBundle\Tools\Charts\Bubble;
use XandrieBundle\Tools\Charts\Column;
use XandrieBundle\Tools\Charts\Line;
use XandrieBundle\Tools\Charts\Pie;
use XandrieBundle\Tools\Charts\Scatter;

class ChartFactory {
	
	/**
	 * Instantiate a ChartInterface type according to the given type
	 * 
	 * @param string $type        	
	 * @return Ambigous <NULL, \XandrieBundle\Tools\Charts\ChartInterface>
	 */
	public function prepareChart($type) {
		$charttype = null;
		
		switch($type){
			
			case strcasecmp('Area', $type) == 0 :
				$charttype = new Area(strtolower($type));
				break;
				
			case strcasecmp('Bar', $type) == 0 :
				$charttype = new Bar(strtolower($type));
				break;
				
			case strcasecmp('Bubble', $type) == 0 :
				$charttype = new Bubble(strtolower($type));
				break;
				
			case strcasecmp('Column', $type) == 0 :
				$charttype = new Column(strtolower($type));
				break;
				
			case strcasecmp('Line', $type) == 0 :
				$charttype = new Line(strtolower($type));
				break;
				
			case strcasecmp('Pie', $type) == 0 :
				$charttype = new Pie(strtolower($type));
				break;
				
			case strcasecmp('Scatter', $type) == 0:
				$charttype = new Scatter(strtolower($type));
				break;
			
			case strcasecmp('StackedBar', $type) == 0:
				$charttype = new StackedBar(strtolower($type));
				break;
				
			case strcasecmp('StockChart', $type) == 0:
				$charttype = new StockChart(strtolower($type));
				break;
				
		}
		return $charttype;
	}
}
