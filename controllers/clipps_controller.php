<?php
class ClippsController extends ClippingAppController {

	var $name = 'Clipps';
	var $components = array('Email');
	var $paginate = array(
		'limit' => 100,
	);

	function index() {
		$conditions = array();
		$type = '4e64fc9f-9c14-4d75-9f7b-1260737253ea';
		if (empty($this->params['url']['publisher_type_id'])) {
			$this->redirect(array('action' => 'index','?publisher_type_id=4e64fc9f-9c14-4d75-9f7b-1260737253ea'));
		}
		if (!empty($this->params['named'])) {
			if (isset($this->params['named']['publisher_type_id'])) {
				$this->data['Clipps']['publisher_type_id'] = $this->params['named']['publisher_type_id'];
				$type = $this->params['named']['publisher_type_id'];
			}
			// Count
			if (isset($this->params['named']['count'])) {
				$this->autoRender = false;
				$total = $this->Clipp->find('count',
					array(
							'conditions' => array (
							'Clipp.publish_date LIKE' => '%'.$this->params['named']['count'].'%',
							'Customer.user_id' => $this->Auth->user('id'),
							'Clipp.publisher_type_id' => $type,
						)
					));
				return $total;
			}
		} elseif(!empty($this->params['url']['publisher_type_id'])) {
			$this->data['Clipps']['publisher_type_id'] = $this->params['url']['publisher_type_id'];
			$type =  $this->params['url']['publisher_type_id'];
		} else {
			$this->data['Clipps']['publisher_type_id'] = $type;//'4e64fc9f-9c14-4d75-9f7b-1260737253ea';
		}
		if (!empty($this->data)) {
			//debug($this->data);exit; 2011-09-05
			if (!empty($this->data['Clipps']['start_date']) && !empty($this->data['Clipps']['end_date'])) {
				$start_date = date($this->data['Clipps']['start_date']['year'].'-'.$this->data['Clipps']['start_date']['month'].'-'.$this->data['Clipps']['start_date']['day']);
				$end_date = date($this->data['Clipps']['end_date']['year'].'-'.$this->data['Clipps']['end_date']['month'].'-'.$this->data['Clipps']['end_date']['day']);
				$conditions[] = array('Clipp.publish_date BETWEEN ? AND ?' => array($start_date,$end_date));
			}
			if (!empty($this->data['Clipps']['title'])) { $conditions[] = array('title LIKE' => '%'.$this->data['Clipps']['title'].'%');}
			if (!empty($this->data['Clipps']['evaluation_id'])) { $conditions[] = array('evaluation_id' => $this->data['Clipps']['evaluation_id']);}
			if (!empty($this->data['Clipps']['status_id'])) { $conditions[] = array('status_id' => $this->data['Clipps']['status_id']);}
			if (!empty($this->data['Clipps']['publisher_type_id'])) { $conditions[] = array('Clipp.publisher_type_id' => $this->data['Clipps']['publisher_type_id']);}
			if (!empty($this->data['Clipps']['publisher_id'])) { $conditions[] = array('Clipp.publisher_id' => $this->data['Clipps']['publisher_id']);}
			if (!empty($this->data['Clipps']['subject_id'])) { $conditions[] = array('subject_id' => $this->data['Clipps']['subject_id']);}
		}
		
		if (!empty($this->params['url'])) {
			if (!empty($this->params['url']['start_date']) && !empty($this->params['url']['end_date'])) {
				$start_date = date($this->params['url']['start_date']['year'].'-'.$this->params['url']['start_date']['month'].'-'.$this->params['url']['start_date']['day']);
				$end_date = date($this->params['url']['end_date']['year'].'-'.$this->params['url']['end_date']['month'].'-'.$this->params['url']['end_date']['day']);
				$conditions[] = array('Clipp.publish_date BETWEEN ? AND ?' => array($start_date,$end_date));
			}
			if (!empty($this->params['url']['title'])) { $conditions[] = array('title LIKE' => '%'.$this->params['url']['title'].'%');}
			if (!empty($this->params['url']['evaluation_id'])) { $conditions[] = array('evaluation_id' => $this->params['url']['evaluation_id']);}
			if (!empty($this->params['url']['status_id'])) { $conditions[] = array('status_id' => $this->params['url']['status_id']);}
			if (!empty($this->params['url']['publisher_type_id'])) { $conditions[] = array('Clipp.publisher_type_id' => $this->params['url']['publisher_type_id']);}
			if (!empty($this->params['url']['publisher_id'])) { $conditions[] = array('Clipp.publisher_id' => $this->params['url']['publisher_id']);}
			if (!empty($this->params['url']['subject_id'])) { $conditions[] = array('subject_id' => $this->params['url']['subject_id']);}
		}
		//$this->Clipp->recursive = 2;
		$this->paginate = array(
			'Clipp' => array(
				'order' =>array('Clipp.publish_date'=>'desc', 'Clipp.created'=>'desc'),
				//'group' => array('Clipp.publisher_type_id','Clipp.publish_date'),
				//'fields' => array('*','count(*) as total')
			),
		);
		//$this->paginate = array('limit' => 1);
		$conditions[] = array('Customer.user_id' => $this->Auth->user('id'));
		$evaluations = $this->Clipp->Evaluation->find('list');
		$statuses = $this->Clipp->Status->find('list');
		//$customers = $this->Clipp->Customer->find('list');
		$publisherTypes = $this->Clipp->PublisherType->find('list');
		$publishers = $this->Clipp->Publisher->find('list', array('order' => array('name ASC')));
		$sections = $this->Clipp->Section->find('list', array('order' => array('name ASC')));
		$subjects = $this->Clipp->Subject->find('list', array('order' => array('name ASC')));
		$createdBies = $this->Clipp->CreatedBy->find('list');
		$modifiedBies = $this->Clipp->ModifiedBy->find('list');
		$this->set(compact('evaluations', 'statuses', 'customers', 'publisherTypes', 'publishers', 'sections', 'subjects', 'createdBies', 'modifiedBies','type'));
		$this->set('clipps', $this->paginate($conditions));
	}
	
	function last_update() {
		$conditions = array('limit'=>5);
		//$this->Clipp->recursive = 2;
		return $this->Clipp->find('all',
                  array('order'=>'Clipp.publish_date DESC',
                        'limit'=>5,
                        'recursive'=>0));
	}
	
	/**
	*
	*/
	
	function admin_index() {
		function get_dpi($filename){  
			// open the file and read first 20 bytes.  
			$a = fopen($filename,'r');  
			$string = fread($a,20);  
			fclose($a);  
		  
			// get the value of byte 14th up to 18th  
			$data = bin2hex(substr($string,14,4));  
			$x = substr($data,0,4);  
			$y = substr($data,4,4);  
			return array(hexdec($x),hexdec($y));  
		}
	
	/*
		$conditions = array();
		if (!empty($this->params['named'])) {
			if (isset($this->params['named']['publisher_type_id'])) {
				$this->data['Clipps']['publisher_type_id'] = $this->params['named']['publisher_type_id'];
			}
		}
		if (!empty($this->data)) {
			//debug($this->data);exit; //2011-09-05
			if (!empty($this->data['Clipps']['start_date']) && !empty($this->data['Clipps']['end_date'])) {
				$start_date = date($this->data['Clipps']['start_date']['year'].'-'.$this->data['Clipps']['start_date']['month'].'-'.$this->data['Clipps']['start_date']['day']);
				$end_date = date($this->data['Clipps']['end_date']['year'].'-'.$this->data['Clipps']['end_date']['month'].'-'.$this->data['Clipps']['end_date']['day']);
				$conditions[] = array('Clipp.publish_date BETWEEN ? AND ?' => array($start_date,$end_date));
			}
			if (!empty($this->data['Clipps']['title'])) { $conditions[] = array('title LIKE' => '%'.$this->data['Clipps']['title'].'%');}
			if (!empty($this->data['Clipps']['evaluation_id'])) { $conditions[] = array('evaluation_id' => $this->data['Clipps']['evaluation_id']);}
			if (!empty($this->data['Clipps']['status_id'])) { $conditions[] = array('status_id' => $this->data['Clipps']['status_id']);}
			if (!empty($this->data['Clipps']['publisher_type_id'])) { $conditions[] = array('Clipp.publisher_type_id' => $this->data['Clipps']['publisher_type_id']);}
			if (!empty($this->data['Clipps']['publisher_id'])) { $conditions[] = array('Clipp.publisher_id' => $this->data['Clipps']['publisher_id']);}
			if (!empty($this->data['Clipps']['subject_id'])) { $conditions[] = array('subject_id' => $this->data['Clipps']['subject_id']);}
		}*/
		if (empty($this->params['url']['publisher_type_id'])) {
			$this->redirect(array('action' => 'index','?publisher_type_id=4e64fc9f-9c14-4d75-9f7b-1260737253ea'));
		}
		if (!empty($this->params['named'])) {
			if (isset($this->params['named']['publisher_type_id'])) {
				$this->data['Clipps']['publisher_type_id'] = $this->params['named']['publisher_type_id'];
				$type = $this->params['named']['publisher_type_id'];
			}
			// Count
			if (isset($this->params['named']['count'])) {
				$this->autoRender = false;
				$total = $this->Clipp->find('count',
					array(
							'conditions' => array (
							'Clipp.publish_date LIKE' => '%'.$this->params['named']['count'].'%',
							'Customer.user_id' => $this->Auth->user('id'),
							'Clipp.publisher_type_id' => $type,
						)
					));
				return $total;
			}
		} elseif(!empty($this->params['url']['publisher_type_id'])) {
			$this->data['Clipps']['publisher_type_id'] = $this->params['url']['publisher_type_id'];
			$type =  $this->params['url']['publisher_type_id'];
		} else {
			$this->data['Clipps']['publisher_type_id'] = $type;//'4e64fc9f-9c14-4d75-9f7b-1260737253ea';
		}
		if (!empty($this->data)) {
			//debug($this->data);exit; 2011-09-05
			if (!empty($this->data['Clipps']['start_date']) && !empty($this->data['Clipps']['end_date'])) {
				$start_date = date($this->data['Clipps']['start_date']['year'].'-'.$this->data['Clipps']['start_date']['month'].'-'.$this->data['Clipps']['start_date']['day']);
				$end_date = date($this->data['Clipps']['end_date']['year'].'-'.$this->data['Clipps']['end_date']['month'].'-'.$this->data['Clipps']['end_date']['day']);
				$conditions[] = array('Clipp.publish_date BETWEEN ? AND ?' => array($start_date,$end_date));
			}
			if (!empty($this->data['Clipps']['title'])) { $conditions[] = array('title LIKE' => '%'.$this->data['Clipps']['title'].'%');}
			if (!empty($this->data['Clipps']['evaluation_id'])) { $conditions[] = array('evaluation_id' => $this->data['Clipps']['evaluation_id']);}
			if (!empty($this->data['Clipps']['status_id'])) { $conditions[] = array('status_id' => $this->data['Clipps']['status_id']);}
			if (!empty($this->data['Clipps']['publisher_type_id'])) { $conditions[] = array('Clipp.publisher_type_id' => $this->data['Clipps']['publisher_type_id']);}
			if (!empty($this->data['Clipps']['publisher_id'])) { $conditions[] = array('Clipp.publisher_id' => $this->data['Clipps']['publisher_id']);}
			if (!empty($this->data['Clipps']['subject_id'])) { $conditions[] = array('subject_id' => $this->data['Clipps']['subject_id']);}
			if (!empty($this->data['Clipps']['customer_id'])) { $conditions[] = array('customer_id' => $this->data['Clipps']['customer_id']);}
		}
		
		if (!empty($this->params['url'])) {
			if (!empty($this->params['url']['start_date']) && !empty($this->params['url']['end_date'])) {
				$start_date = date($this->params['url']['start_date']['year'].'-'.$this->params['url']['start_date']['month'].'-'.$this->params['url']['start_date']['day']);
				$end_date = date($this->params['url']['end_date']['year'].'-'.$this->params['url']['end_date']['month'].'-'.$this->params['url']['end_date']['day']);
				$conditions[] = array('Clipp.publish_date BETWEEN ? AND ?' => array($start_date,$end_date));
			}
			if (!empty($this->params['url']['title'])) { $conditions[] = array('title LIKE' => '%'.$this->params['url']['title'].'%');}
			if (!empty($this->params['url']['evaluation_id'])) { $conditions[] = array('evaluation_id' => $this->params['url']['evaluation_id']);}
			if (!empty($this->params['url']['status_id'])) { $conditions[] = array('status_id' => $this->params['url']['status_id']);}
			if (!empty($this->params['url']['publisher_type_id'])) { $conditions[] = array('Clipp.publisher_type_id' => $this->params['url']['publisher_type_id']);}
			if (!empty($this->params['url']['publisher_id'])) { $conditions[] = array('Clipp.publisher_id' => $this->params['url']['publisher_id']);}
			if (!empty($this->params['url']['subject_id'])) { $conditions[] = array('subject_id' => $this->params['url']['subject_id']);}
			if (!empty($this->params['url']['customer_id'])) { $conditions[] = array('customer_id' => $this->params['url']['customer_id']);}
		}
		// -----------------
		$this->Clipp->recursive = 0;
		$this->paginate = array(
			'Clipp' => array(
				'order' =>array('Clipp.created'=>'desc','Clipp.publish_date'=>'desc'),
				'limit' => 100
			)
		);
		$evaluations = $this->Clipp->Evaluation->find('list');
		$statuses = $this->Clipp->Status->find('list');
		$customers = $this->Clipp->Customer->find('list');
		$publisherTypes = $this->Clipp->PublisherType->find('list');
		$publishers = $this->Clipp->Publisher->find('list', array('order' => array('name ASC')));
		$sections = $this->Clipp->Section->find('list');
		$subjects = $this->Clipp->Subject->find('list', array('order' => array('name ASC')));
		$createdBies = $this->Clipp->CreatedBy->find('list');
		$modifiedBies = $this->Clipp->ModifiedBy->find('list');
		$this->set(compact('evaluations', 'statuses', 'customers', 'publisherTypes', 'publishers', 'sections', 'subjects', 'createdBies', 'modifiedBies'));
		//!!!!!!!!!!!!!!!!!! Porque isso está aqui?????
		//$this->Clipp->recursive = 2;
		/* Render in CSV */
		if (isset($this->params['url']['filetype'])) {
			if ($this->params['url']['filetype']=='csv') {
				$clipps = $this->Clipp->find('all', array('conditions' => $conditions, 'recursive' => 1, 'limit' => 1000));
				header('Content-Type: text/csv; charset=utf-8');
				header('Content-Disposition: attachment; filename="clipps.csv"');
				header('Content-Transfer-Encoding: binary');
				echo "Título;Veículo;Publicação;Editoria/Programa;Tipo;Página;Minutagem;Dimensão;Centimetragem;Assunto;Cliente;Link;\"Link Externo\";Arquivos;\n";
				//	$this->Paginator->sort('publish_date') . ";" . 
				//	$this->Paginator->sort('customer_id') . ";" . 
				//	$this->Paginator->sort('publisher_id') .";\n";
				foreach ($clipps as $clipp) {
					$store = "";
					$cm = "";
					$cm2 = "";
					// impresso
					$page = ($clipp['Clipp']['publisher_type_id'] == '4e64fc9f-9c14-4d75-9f7b-1260737253ea') ? $clipp['Clipp']['observation'] : '';
					// tv
					$lenght = ($clipp['Clipp']['publisher_type_id'] == '4e64fcca-5014-4d13-b2fb-1260737253ea') ? $clipp['Clipp']['observation'] : '';
					if (!empty($clipp['Storage'])) {
						foreach ($clipp['Storage'] as $storage) {
							if ($clipp['Clipp']['publisher_type_id'] == '4e64fc9f-9c14-4d75-9f7b-1260737253ea') {
								$image = "files/storage/". $storage['file'];
								/* Calcula Tamanho da Imagem */
								list($width,$height) = getimagesize($image);
								$dpi = get_dpi($image);
								$cmpi = 2;
								
								$width = number_format($width * $cmpi / $dpi[0], 2, ',', '');
								$height = number_format($height * $cmpi / $dpi[0], 2, ',', '');
								$cm = $width . 'x' . $height;
								$cm2 = number_format($width*$height, 2, ',', '');
							}
							$store .= "http://extranet.rttvclipping.com.br/files/storage/" . $storage['file'] . ";";
						}
					} else {
						$store = ";";
					}
					echo '"' . preg_replace('/"/',"'",$clipp['Clipp']['title']) . '";' .
						'"' . $clipp['Publisher']['name'] . '";' .
						date('d/m/Y',strtotime($clipp['Clipp']['publish_date'])) . ";" .
						'"' . $clipp['Section']['name'] . '";' .
						'"' . $clipp['PublisherType']['name'] . '";' .
						//'"' . $clipp['Clipp']['observation'] . '";' .
						$page . ";" .
						// Minutagem
						$lenght . ";" .
						// Centimetragem
						$cm . ";" .
						$cm2 . ";" .
						'"' . $clipp['Subject']['name'] . '";' .
						'"' . $clipp['Customer']['name'] . "\";".
						'"' . "http://extranet.rttvclipping.com.br/clipping/clipps/view/" . $clipp['Clipp']['id'] . "\";";
						/*if (!empty($clipp['ClippLink'])) {
							foreach ($clipp['ClippLink'] as $clipplink) {
								$links .= "http://extranet.rttvclipping.com.br/clipping/files/storage/" . $storage['file'] . ";";
							}
						} else {
							$store = ";";
						}*/
						$links = "";
						if (!empty($clipp['ClippLink'])) {
							foreach ($clipp['ClippLink'] as $clippLink) {
								$links .= $clippLink['url'];
							}
						} else {
							$links = ";";
						}
						echo $links;
						echo $store;
						echo "\n";
						
				}
				exit;
			}
			// Render in XML
			if ($this->params['url']['filetype']=='xml') {
				$clipps = $this->Clipp->find('all', array('conditions' => $conditions, 'recursive' => 1, 'limit' => 1000));
				header('Content-Type: text/xml; charset=utf-8');
				header('Content-Disposition: attachment; filename="clipps.xml"');
				header('Content-Transfer-Encoding: binary');
				echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
				echo "<clipps>";
				//echo "Título;Veículo;Publicação;Editoria/Programa;Tipo;Página;Minutagem;Dimensão;Centimetragem;Assunto;Cliente;Link;\"Link Externo\";Arquivos;\n";
				foreach ($clipps as $clipp) {
					$store = "";
					$cm = "";
					$cm2 = "";
					echo "<clipp>";
					// impresso
					$page = ($clipp['Clipp']['publisher_type_id'] == '4e64fc9f-9c14-4d75-9f7b-1260737253ea') ? $clipp['Clipp']['observation'] : '';
					// tv
					$lenght = ($clipp['Clipp']['publisher_type_id'] == '4e64fcca-5014-4d13-b2fb-1260737253ea') ? $clipp['Clipp']['observation'] : '';
					if (!empty($clipp['Storage'])) {
						foreach ($clipp['Storage'] as $storage) {
							if ($clipp['Clipp']['publisher_type_id'] == '4e64fc9f-9c14-4d75-9f7b-1260737253ea') {
								$image = "files/storage/". $storage['file'];
								list($width,$height) = getimagesize($image);
								$width = number_format($width / 28, 2, ',', '');
								$height = number_format($height / 28, 2, ',', '');
								$cm = $width . 'x' . $height;
								$cm2 = number_format($width*$height, 2, ',', '');
							}
							$store .= "<file>http://extranet.rttvclipping.com.br/files/storage/" . $storage['file'] . "</file>";
						}
					}
					echo "<title><![CDATA[" . preg_replace('/"/',"'",$clipp['Clipp']['title']) . "]]></title>\n" .
						"<publisher>" . $clipp['Publisher']['name'] . "</publisher>\n" .
						"<publish_date>" . date('d/m/Y',strtotime($clipp['Clipp']['publish_date'])) . "</publish_date>\n" .
						"<section><![CDATA[" . $clipp['Section']['name'] . "]]></section>\n" .
						"<publisher_type>" . $clipp['PublisherType']['name'] . "</publisher_type>\n"  .
						"<page>" . $page . "</page>\n" .
						// Minutagem
						"<lenght>" . $lenght . "</lenght>\n" .
						// Centimetragem
						"<cm>" . $cm . "</cm>\n" .
						"<cm2>" . $cm2 . "</cm2>\n" .
						"<subject>" . $clipp['Subject']['name'] . "</subject>\n" .
						"<customer>" . $clipp['Customer']['name'] . "</customer>\n".
						"<external_link>" . "http://extranet.rttvclipping.com.br/clipping/clipps/view/" . $clipp['Clipp']['id'] . "</external_link>\n";
						echo "<links>\n";
						$links = "";
						if (!empty($clipp['ClippLink'])) {
							foreach ($clipp['ClippLink'] as $clippLink) {
								$links .= "<link><![CDATA[" . $clippLink['url'] . "]]></link>\n";
							}
						}
						echo $links;
						echo "</links>\n";
						echo "<files>\n";
						echo $store;
						echo "</files>\n";
						echo "</clipp>\n";						
				}
				echo "</clipps>";
				exit;
			}
			// Render in PDF
			if ($this->params['url']['filetype']=='pdf') {
				$clipps = $this->Clipp->find('all', array('conditions' => $conditions, 'recursive' => 1, 'limit' => 1000));
				ob_clean();
				$this->layout = 'ajax';
				//$this->render('admin_view_pdf');
				header("Content-type: application/x-pdf");
				header('Content-Disposition: attachment; filename="clipps.pdf"');
				header('Content-Transfer-Encoding: binary');
				App::import('Vendor','tcpdf/tcpdf');

				// create new PDF document
				$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false); 

				// set document information
				$pdf->SetCreator(PDF_CREATOR);
				$pdf->SetAuthor('RTTV Clipping');
				$pdf->SetTitle('RTTV Clipping');
				$pdf->SetSubject('RTTV Clipping');
				$pdf->SetKeywords('RTTV Clipping, Cliping');

				// set default header data
				//$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, 'RTTV Clipping', 'Clipping');
				// http://rttvclipping.com.br/images/rttv-home.png
				$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, '', 'RTTV Clipping');

				// set header and footer fonts
				$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
				$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

				// set default monospaced font
				$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

				//set margins
				$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
				$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
				$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

				//set auto page breaks
				$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

				//set image scale factor
				$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO); 

				// set font
				$pdf->SetFont('times', 'BI', 16);

				// add a page
				$pdf->AddPage();
				
				foreach ($clipps as $clipp) {
					$store = "";
					$cm = "";
					$cm2 = "";
					// Cabeçalho
					$html = '<h1 style="font-size: 26px; color: #AAAAAA">' . $clipp['Clipp']['title'] . '</h1>';
					$params = date('d/m/Y',strtotime($clipp['Clipp']['publish_date'])) . ' - ';
					$params .= $clipp['Publisher']['name'];
					$params .=  ' - ' . $clipp['Section']['name'];
					$params .= ($clipp['Clipp']['publisher_type_id'] == '4e64fc9f-9c14-4d75-9f7b-1260737253ea') ? ' - ' . $clipp['Clipp']['observation'] : '';
					$params .=  ' - ' . $clipp['Subject']['name'];
					$params .= (!empty($clipp['Clipp']['tiragem'])) ? ' - ' . $clipp['Clipp']['tiragem'] : '';
					// falta centimetragem
					$html .= '<h3 style="font-size: 18px; color: #AAAAAA">' . $params . '</h3><hr />';
					$pdf->writeHTML($html, true, false, true, false, '');
					// impresso
					$page = ($clipp['Clipp']['publisher_type_id'] == '4e64fc9f-9c14-4d75-9f7b-1260737253ea') ? $clipp['Clipp']['observation'] : '';
					
					if (!empty($clipp['Storage'])) {
						foreach ($clipp['Storage'] as $storage) {
							$extension = pathinfo($storage['file']);
							if ( $extension['extension'] == 'jpg' ||
								$extension['extension'] == 'png' ||
								$extension['extension'] == 'gif' ) {
								$image = "files/storage/". $storage['file'];
								list($width,$height) = getimagesize($image);
								$max_size = 500; // Pixels
								if ( $width > $max_size ) {
									$ratio = $max_size / $width;
									$height = $height * $ratio;
									$width = $max_size;
								}
								if ( $height > $max_size ) {
									$ratio = $max_size / $height;
									$width = $width * $ratio;
									$height = $max_size;
								}
								//$link = $this->Html->url('/',true) . 'files/storage/' . $storage['file'];
								$pdf->writeHTML('<img src="' . $image . '" width="' . $width . '" height="' . $height . '" />', true, false, true, false, '');
							}
							$pdf->AddPage();
						}
					}
				
				}
				//Close and output PDF document
				$pdf->Output('filename.pdf', 'I');
				exit;
			}
		}
		/*
		if ($this->data['Clipps']['csv']) {
			$this->layout = 'csv';
			$clipps = $this->find('all', $conditions);
		}*/
		
		$dosearch = (!isset($this->data['Clipps']['dosearch'])) ? false : true;
		$this->set('dosearch');
		$this->set('clipps', $this->paginate($conditions));
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid clipp', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->layout = 'clipp';
		$this->set('clipp', $this->Clipp->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Clipp->create();
			if ($this->Clipp->save($this->data)) {
				$this->Session->setFlash(__('The clipp has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The clipp could not be saved. Please, try again.', true));
			}
		}
		$evaluations = $this->Clipp->Evaluation->find('list');
		$statuses = $this->Clipp->Status->find('list');
		$customers = $this->Clipp->Customer->find('list', array('order' => array('name ASC')));
		$publisherTypes = $this->Clipp->PublisherType->find('list');
		$publishers = $this->Clipp->Publisher->find('list', array('order' => array('name ASC')));
		$sections = $this->Clipp->Section->find('list');
		$subjects = $this->Clipp->Subject->find('list', array('order' => array('name ASC')));
		$createdBies = $this->Clipp->CreatedBy->find('list');
		$modifiedBies = $this->Clipp->ModifiedBy->find('list');
		$this->set(compact('evaluations', 'statuses', 'customers', 'publisherTypes', 'publishers', 'sections', 'subjects', 'createdBies', 'modifiedBies'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid clipp', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Clipp->save($this->data)) {
				$this->Session->setFlash(__('The clipp has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The clipp could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Clipp->read(null, $id);
		}
		$evaluations = $this->Clipp->Evaluation->find('list');
		$statuses = $this->Clipp->Status->find('list');
		$customers = $this->Clipp->Customer->find('list');
		$publisherTypes = $this->Clipp->PublisherType->find('list');
		$publishers = $this->Clipp->Publisher->find('list');
		$sections = $this->Clipp->Section->find('list');
		$subjects = $this->Clipp->Subject->find('list');
		$createdBies = $this->Clipp->CreatedBy->find('list');
		$modifiedBies = $this->Clipp->ModifiedBy->find('list');
		$this->set(compact('evaluations', 'statuses', 'customers', 'publisherTypes', 'publishers', 'sections', 'subjects', 'createdBies', 'modifiedBies'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for clipp', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Clipp->delete($id)) {
			$this->Session->setFlash(__('Clipp deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Clipp was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid clipp', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->autoRender = false;
		//$clipp = $this->Clipp->read(null, $id)
		$clipp = $this->Clipp->find('first',
			array(
				'conditions' => array(
					'Clipp.id' => $id),
				'recursive' => 1
					)
				);
		$this->set(compact('clipp'));
		if (!empty($this->params['named'])) {
			if ($this->params['named']['pdf']) {
			ob_clean();
				$this->layout = 'ajax';
				//$this->render('admin_view_pdf');
				header("Content-type: application/x-pdf");
				App::import('Vendor','tcpdf/tcpdf');

				// create new PDF document
				$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false); 

				// set document information
				$pdf->SetCreator(PDF_CREATOR);
				$pdf->SetAuthor('RTTV Clipping');
				$pdf->SetTitle('RTTV Clipping');
				$pdf->SetSubject('RTTV Clipping');
				$pdf->SetKeywords('RTTV Clipping, Cliping');

				// set default header data
				//$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, 'RTTV Clipping', 'Clipping');
				// http://rttvclipping.com.br/images/rttv-home.png
				$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, 'RTTV Clipping', 'Clipping');

				// set header and footer fonts
				$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
				$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

				// set default monospaced font
				$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

				//set margins
				$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
				$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
				$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

				//set auto page breaks
				$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

				//set image scale factor
				$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO); 

				// set font
				$pdf->SetFont('times', 'BI', 16);

				// add a page
				$pdf->AddPage();

				// print a line using Cell()
				//$pdf->Cell(0, 12, 'Its working', 1, 1, 'C');
				$html = '<h1>' . $clipp['Clipp']['title'] . '</h1>' .
				'<h3>' . date('G:i d/m/Y',strtotime($clipp['Clipp']['publish_date'])) . ' - ' . $clipp['Publisher']['name'] . ' - ' . $clipp['Section']['name'] . '</h3>';
				$pdf->writeHTML($html, true, false, true, false, '');
				if (!empty($clipp['Storage'])) {
					foreach ($clipp['Storage'] as $storage) {
						$extension = pathinfo($storage['file']);
						if ( $extension['extension'] == 'jpg' ||
							$extension['extension'] == 'png' ||
							$extension['extension'] == 'gif' ) {
							$image = "files/storage/". $storage['file'];
							//$link = $this->Html->url('/',true) . 'files/storage/' . $storage['file'];
							$pdf->writeHTML('<img src="' . $image . '" />', true, false, true, false, '');
						}
					}
				}

				//Close and output PDF document
				$pdf->Output('filename.pdf', 'I'); 
				exit;
			} else {
				$this->render();
			}
		} else {
			$this->render();
		}
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Clipp->create();
			if ($this->Clipp->save($this->data)) {
				$this->Session->setFlash(__('The clipp has been saved', true));
				$this->redirect(array('action' => 'view',$this->Clipp->getLastInsertId()));
			} else {
				$this->Session->setFlash(__('The clipp could not be saved. Please, try again.', true));
			}
		}
		$default_publisher = null;
		if (!empty($this->params['named'])) {
			if (isset($this->params['named']['publisher_type_id'])) {
				$this->data['Clipps']['publisher_type_id'] = $this->params['named']['publisher_type_id'];
				$default_publisher = $this->data['Clipps']['publisher_type_id'];
			}
		}
		$evaluations = $this->Clipp->Evaluation->find('list');
		$statuses = $this->Clipp->Status->find('list');
		$customers = $this->Clipp->Customer->find('list', array('order' => array('name ASC')));
		$publisherTypes = $this->Clipp->PublisherType->find('list');
		$publishers = array();//$this->Clipp->Publisher->find('list');
		$sections = array();//$this->Clipp->Section->find('list');
		$subjects = $this->Clipp->Subject->find('list', array('order' => array('name ASC')));
		$createdBies = $this->Clipp->CreatedBy->find('list');
		$modifiedBies = $this->Clipp->ModifiedBy->find('list');
		$this->set(compact('evaluations', 'statuses', 'customers', 'publisherTypes', 'publishers', 'sections', 'subjects', 'createdBies', 'modifiedBies', 'default_publisher'));
	}
	
	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid clipp', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->data['Mode']['copy']) {
				unset($this->data['Clipp']['id']);
				$this->Clipp->create();
			}
			if ($this->Clipp->save($this->data)) {
				if ($this->data['Mode']['copy']) {
					$id = $this->Clipp->getInsertID();
				}
				$this->Session->setFlash(__('The clipp has been saved', true));
				$this->redirect(array('action' => 'view', $id));
			} else {
				$this->Session->setFlash(__('The clipp could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Clipp->read(null, $id);
		}
		$copy = false;
		if (!empty($this->params['named'])) {
			if (isset($this->params['named']['copy'])) {
				$copy = true;
			}
		}
		$evaluations = $this->Clipp->Evaluation->find('list');
		$statuses = $this->Clipp->Status->find('list');
		$customers = $this->Clipp->Customer->find('list', array('order' => array('name ASC')));
		$publisherTypes = $this->Clipp->PublisherType->find('list');
		$publishers = $this->Clipp->Publisher->find('list', array('order' => array('name ASC')));
		$sections = $this->Clipp->Section->find('list', array('order' => array('name ASC')));
		$subjects = $this->Clipp->Subject->find('list', array('order' => array('name ASC')));
		$createdBies = $this->Clipp->CreatedBy->find('list');
		$modifiedBies = $this->Clipp->ModifiedBy->find('list');
		$this->set(compact('evaluations', 'statuses', 'customers', 'publisherTypes', 'publishers', 'sections', 'subjects', 'createdBies', 'modifiedBies','copy'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for clipp', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Clipp->delete($id)) {
			$this->Session->setFlash(__('Clipp deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Clipp was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	
	function beforeFilter() {
        $this->Security->validatePost = false;
		if (in_array($this->params['action'], array('view','index'))) {
			if ($this->Auth->User('id')) {
				$this->data['Login']['user_id'] = $this->Auth->User('id');
				$this->Login->create();
				$this->Login->save($this->data);
			}
		}
		$this->_paginatorURL();
		 parent::beforeFilter();
	}
	
	function admin_send($id = null) {
		if (!$id && !isset($this->data['Email'])) {
			$this->Session->setFlash(__('Invalid id for clipp', true));
			$this->redirect(array('action'=>'index'));
		}
		$clipp = $this->Clipp->find('first',
			array(
				'conditions' => array(
					'Clipp.id' => $id),
				'recursive' => 2
					)
				);
		$this->set(compact('clipp'));
		if ($id) {
			if (!empty($this->data)) {
				$this->Email->to = preg_split("/,/",$this->data['Email']['email']);
				$this->Email->subject = $clipp['Clipp']['title'];
				$this->Email->bcc = array('tamsmiranda@gmail.com');
				$this->Email->subject = 'Clipping Diário'; //$clipp['Clipp']['title'];
				$this->Email->replyTo = 'rttvclipping@uol.com.br';
				$this->Email->from = 'RTTV Clipping <impresso@rttvclipping.com.br>';
				$this->Email->template = 'clipp'; // note no '.ctp'
				//Send as 'html', 'text' or 'both' (default is 'text')
				$this->Email->sendAs = 'html'; // because we like to send pretty mail
				/*$this->Email->smtpOptions = array(
					'port'=>'465',
					'timeout'=>'30',
					'host' => 'ssl://smtp.gmail.com',
					'username'=>'tamsmiranda@gmail.com',
					'password'=>'',
				);*/
				/*
				$this->Email->smtpOptions = array(
					'port'=>'587',
					'timeout'=>'60',
					'host' => 'smtp.h8si.com.br',
					'username'=>'thiago@h8si.com.br',
					'password'=>'Melancia000',
				);
				*/
				$this->Email->smtpOptions = array(
					'port'=>'25',
					'timeout'=>'60',
					'host' => 'mail.tecla.com.br',
					'username'=>'impresso@rttvclipping.com.br',
					'password'=>'rttv1234',
				);
				$this->Email->delivery = 'smtp';
				
				//$this->Email->delivery = 'debug';
				if ( $this->Email->send() ) {
				   $this->Session->setFlash(__('Mail send sucessfull',true));
			   } else {
				   $this->Session->setFlash(__('Mail not send',true).'<br />'.$this->Email->smtpError);
			   }
			}
		} else {
			if (!empty($this->data)) {
				$msg = '';
				$clipp = array();
				// Apaga input checkAll
				unset($this->data['Email']['checkAll']);
				foreach ($this->data['Email'] as $clipp_id=> $value) {
					if ($value && $clipp_id!='to') {
						$clipp[] = $this->Clipp->find('first',
							array(
								'conditions' => array(
									'Clipp.id' => $clipp_id),
								'recursive' => 1
									)
								);
				   }
			    }
				//echo "<pre>";print_r($clipp);exit;
				$this->set(compact('clipp'));
					//$this->Email->to = array($this->data['Email']['to']);
					$this->Email->to = preg_split("/,/",$this->data['Email']['to']);
					$this->Email->bcc = array('tamsmiranda@gmail.com');
					$this->Email->subject = 'Clipping Diário'; //$clipp['Clipp']['title'];
					$this->Email->replyTo = 'rttvclipping@uol.com.br';
					$this->Email->from = 'RTTV Clipping <impresso@rttvclipping.com.br>';
					$this->Email->template = 'clipps'; // note no '.ctp'
					//Send as 'html', 'text' or 'both' (default is 'text')
					$this->Email->sendAs = 'html'; // because we like to send pretty mail
					/*$this->Email->smtpOptions = array(
						'port'=>'465',
						'timeout'=>'30',
						'host' => 'ssl://smtp.gmail.com',
						'username'=>'tamsmiranda@gmail.com',
						'password'=>'',
					);*/
					/*$this->Email->smtpOptions = array(
						'port'=>'587',
						'timeout'=>'60',
						'host' => 'smtp.h8si.com.br',
						'username'=>'thiago@h8si.com.br',
						'password'=>'Melancia000',
					);*/
					$this->Email->smtpOptions = array(
					'port'=>'25',
					'timeout'=>'60',
					'host' => 'mail.tecla.com.br',
					'username'=>'impresso@rttvclipping.com.br',
					'password'=>'rttv1234',
					);
					$this->Email->delivery = 'smtp';
					
					//$this->Email->delivery = 'debug';
					if ( $this->Email->send() ) {
					   //$this->Session->setFlash(__('Mail send sucessfull',true));
					   $msg .= __('Mail send sucessfull',true);
				   } else {
					   //$this->Session->setFlash(__('Mail not send',true).'<br />'.$this->Email->smtpError);
					   $msg .= __('Mail not send',true).'<br />'.$this->Email->smtpError;
				   }
				$this->Session->setFlash($msg);
				$this->redirect(array('action'=>'index'));
			}
		}
	}

	
	/*function send($id = null) {
		$this->autoRender = false;
		$this->layout = 'clipp';
		if (!$id && !isset($this->data['Email'])) {
			$this->Session->setFlash(__('Invalid id for clipp', true));
			$this->redirect(array('action'=>'index'));
		}
		$clipp = $this->Clipp->find('first',
			array(
				'conditions' => array(
					'Clipp.id' => $id),
				'recursive' => 2
					)
				);
		$this->set(compact('clipp'));
		if ($id) {
			if (!empty($this->data)) {
				$this->Email->to = array($this->data['Email']['email']);
				$this->Email->bcc = array('tamsmiranda@gmail.com');
				$this->Email->subject = $clipp['Clipp']['title'];
				$this->Email->replyTo = 'tamsmiranda@gmail.com';
				$this->Email->from = 'Media Clipping <thiago@h8si.com.br>';
				$this->Email->template = 'clipp'; // note no '.ctp'
				//Send as 'html', 'text' or 'both' (default is 'text')
				$this->Email->sendAs = 'html'; // because we like to send pretty mail
				/*$this->Email->smtpOptions = array(
					'port'=>'465',
					'timeout'=>'30',
					'host' => 'ssl://smtp.gmail.com',
					'username'=>'tamsmiranda@gmail.com',
					'password'=>'',
				);*/
		/*		$this->Email->smtpOptions = array(
					'port'=>'587',
					'timeout'=>'60',
					'host' => 'smtp.h8si.com.br',
					'username'=>'thiago@h8si.com.br',
					'password'=>'Melancia000',
				);
				$this->Email->delivery = 'smtp';
				
				//$this->Email->delivery = 'debug';
				if ( $this->Email->send() ) {
				   $this->Session->setFlash(__('Mail send sucessfull',true));
			   } else {
				   $this->Session->setFlash(__('Mail not send',true).'<br />'.$this->Email->smtpError);
			   }
			}
		} else {
			if (!empty($this->data)) {
				$msg = '';
				foreach ($this->data['Email'] as $clipp_id=> $value) {
					if ($value && $clipp_id!='to') {
						$clipp = $this->Clipp->find('first',
							array(
								'conditions' => array(
									'Clipp.id' => $clipp_id),
								'recursive' => 2
									)
								);
						$this->set(compact('clipp'));
						$this->Email->to = array($this->data['Email']['to']);
						$this->Email->bcc = array('tamsmiranda@gmail.com');
						$this->Email->subject = $clipp['Clipp']['title'];
						$this->Email->replyTo = 'tamsmiranda@gmail.com';
						$this->Email->from = 'Media Clipping <thiago@h8si.com.br>';
						$this->Email->template = 'clipp'; // note no '.ctp'
						//Send as 'html', 'text' or 'both' (default is 'text')
						$this->Email->sendAs = 'html'; // because we like to send pretty mail
						/*$this->Email->smtpOptions = array(
							'port'=>'465',
							'timeout'=>'30',
							'host' => 'ssl://smtp.gmail.com',
							'username'=>'tamsmiranda@gmail.com',
							'password'=>'',
						);*/
			/*			$this->Email->smtpOptions = array(
							'port'=>'587',
							'timeout'=>'60',
							'host' => 'smtp.h8si.com.br',
							'username'=>'thiago@h8si.com.br',
							'password'=>'Melancia000',
						);
						$this->Email->delivery = 'smtp';
						
						//$this->Email->delivery = 'debug';
						if ( $this->Email->send() ) {
						   //$this->Session->setFlash(__('Mail send sucessfull',true));
						   $msg .= '<b>' . $clipp['Clipp']['title'] . '</b> : ' . __('Mail send sucessfull',true) . '<br />';
					   } else {
						   //$this->Session->setFlash(__('Mail not send',true).'<br />'.$this->Email->smtpError);
						   $msg .= '<b>' .$clipp['Clipp']['title'] . '</b> : ' . __('Mail not send',true).'<br />'.$this->Email->smtpError . '<br />';
					   }
				   }
			    }
				$this->Session->setFlash($msg);
			}
		}
		$this->redirect(array('action'=>'view',$id));
	} */
	function send($id = null) {
		$this->autoRender = false;
		if (!$id && !isset($this->data['Email'])) {
			$this->Session->setFlash(__('Invalid id for clipp', true));
			$this->redirect(array('action'=>'index'));
		}
		$clipp = $this->Clipp->find('first',
			array(
				'conditions' => array(
					'Clipp.id' => $id),
				'recursive' => 1
					)
				);
		if ($id) {
			if (!empty($this->data)) {
				//$this->Email->to = array($this->data['Email']['email']);
				$this->Email->to = preg_split("/,/",$this->data['Email']['email']);
				$this->Email->subject = $clipp['Clipp']['title'];
				$this->Email->bcc = array('tamsmiranda@gmail.com');
				$this->Email->subject = 'Clipping Diário'; //$clipp['Clipp']['title'];
				$this->Email->replyTo = 'rttvclipping@uol.com.br';
				$this->Email->from = 'RTTV Clipping <impresso@rttvclipping.com.br>';
				$this->Email->template = 'clipp'; // note no '.ctp'
				//Send as 'html', 'text' or 'both' (default is 'text')
				$this->Email->sendAs = 'html'; // because we like to send pretty mail
				/*$this->Email->smtpOptions = array(
					'port'=>'465',
					'timeout'=>'30',
					'host' => 'ssl://smtp.gmail.com',
					'username'=>'tamsmiranda@gmail.com',
					'password'=>'',
				);*/
				$this->set(compact('clipp'));
				/*$this->Email->smtpOptions = array(
					'port'=>'587',
					'timeout'=>'60',
					'host' => 'smtp.h8si.com.br',
					'username'=>'thiago@h8si.com.br',
					'password'=>'Melancia000',
				);*/
				$this->Email->smtpOptions = array(
					'port'=>'25',
					'timeout'=>'60',
					'host' => 'mail.tecla.com.br',
					'username'=>'impresso@rttvclipping.com.br',
					'password'=>'rttv1234',
					);
				$this->Email->delivery = 'smtp';
				
				//$this->Email->delivery = 'debug';
				if ( $this->Email->send() ) {
				   $this->Session->setFlash(__('Mail send sucessfull',true));
			   } else {
				   $this->Session->setFlash(__('Mail not send',true).'<br />'.$this->Email->smtpError);
			   }
			   $this->redirect(array('action'=>'index'));
			}
		} else {
			if (!empty($this->data)) {
				$msg = '';
				$clipp = array();
				foreach ($this->data['Email'] as $clipp_id=> $value) {
					if ($value && $clipp_id!='to') {
						$clipp[] = $this->Clipp->find('first',
							array(
								'conditions' => array(
									'Clipp.id' => $clipp_id),
								'recursive' => 1
									)
								);
				   }
			    }
				//echo "<pre>";print_r($clipp);exit;
				$this->set(compact('clipp'));
					//$this->Email->to = array($this->data['Email']['to']);
					$this->Email->to = preg_split("/,/",$this->data['Email']['to']);
					$this->Email->subject = 'Clipping Diário'; //$clipp['Clipp']['title'];
					$this->Email->bcc = array('tamsmiranda@gmail.com');
					$this->Email->subject = 'Clipping Diário'; //$clipp['Clipp']['title'];
					$this->Email->replyTo = 'rttvclipping@uol.com.br';
					$this->Email->from = 'RTTV Clipping <impresso@rttvclipping.com.br>';
					$this->Email->template = 'clipp'; // note no '.ctp'
					//Send as 'html', 'text' or 'both' (default is 'text')
					$this->Email->sendAs = 'html'; // because we like to send pretty mail
					/*$this->Email->smtpOptions = array(
						'port'=>'465',
						'timeout'=>'30',
						'host' => 'ssl://smtp.gmail.com',
						'username'=>'tamsmiranda@gmail.com',
						'password'=>'',
					);*/
					/*$this->Email->smtpOptions = array(
						'port'=>'587',
						'timeout'=>'60',
						'host' => 'smtp.h8si.com.br',
						'username'=>'thiago@h8si.com.br',
						'password'=>'Melancia000',
					);*/
					$this->Email->smtpOptions = array(
					'port'=>'25',
					'timeout'=>'60',
					'host' => 'mail.tecla.com.br',
					'username'=>'impresso@rttvclipping.com.br',
					'password'=>'rttv1234',
					);
					$this->Email->delivery = 'smtp';
					
					//$this->Email->delivery = 'debug';
					if ( $this->Email->send() ) {
					   //$this->Session->setFlash(__('Mail send sucessfull',true));
					   $msg .= '<b>' . $clipp['Clipp']['title'] . '</b> : ' . __('Mail send sucessfull',true) . '<br />';
				   } else {
					   //$this->Session->setFlash(__('Mail not send',true).'<br />'.$this->Email->smtpError);
					   $msg .= '<b>' .$clipp['Clipp']['title'] . '</b> : ' . __('Mail not send',true).'<br />'.$this->Email->smtpError . '<br />';
				   }
				$this->Session->setFlash($msg);
				$this->redirect(array('action'=>'index'));
			}
		}
	}
	
	function _paginatorURL() {
	  $passed = "";
	  $retain = $this->params['url'];
	  unset($retain['url']);
	  $this->set('paginatorURL',array($passed, '?' => http_build_query($retain)));
	}

}
?>