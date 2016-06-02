/**
	 * Return a monthly informations(progress, status .
	 * ..) about projects, employees and departments
	 * @Route("/admin/dashboard")
	 * @Route("/admin/dashboard/{sort}")
	 * @Security("has_role('IS_AUTHENTICATED_FULLY')")
	 * @Template("AdminBundle:Dashboard:index.html.twig")
	 * @return Response
	 */
	public function getDashboardAction(Request $request){
		if (! $this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')){
			throw $this->createAccessDeniedException('Unable To access this page');
		}
		
		$em = $this->getDoctrine()->getManager();
		//$dptHour = $em->getRepository('AppBundle:Activity')->ShowDepartementHour($em);
		
		
		if ($this->get('security.context')->isGranted('IS_AUTHENTICATED_FULLY')){
						
			$data = $this->get('dashboard_request_manager')->handle($request);
			
			if($data == null){
				$response = $this->getDashboardDefaultAction($request);
			}
			else{
					$parameters = array(
				
						'name' 				=> $data['option']['name'].'_chart',
						'data'				=> $data,
						'columnname'		=> strtoupper($data['option']['name']),
						'seriename'			=> $data['option']['id'],
						'path'				=> $data['option']['path'],
						'dropdown_selected'	=> (isset($data['option']['select_dropdownlist']))?'default':null
				);
			
				
				// create charts
				$pie = $this->get('chart_factory')->prepareChart('Pie');
				
				$pie->setTitle($data['option']['title']);
				$pie->setName($data['option']['name'].'_chart');
				
				$jsonpie = $pie->build($parameters);
					
				// create a dashboard
				$dashboard = $this->get('dashboard_builder')->prepareDashBoardAdmin($request->getSession()->get('iduser'));
					
				$dashboard->addItems(array($jsonpie));
				
				$formdata 	= $dashboard->render()['form'];
				$jsoncharts = $dashboard->render()['jsoncharts'];
					
				$response = new JsonResponse(array('dashboard' => $jsoncharts));
				
			}

		}
		return $response;
	}
