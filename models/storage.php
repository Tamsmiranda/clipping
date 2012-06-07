<?php
class Storage extends ClippingAppModel {
	var $name = 'Storage';
	var $displayField = 'name';
	var $actsAs = array(
		'MeioUpload.MeioUpload' => array(
			'file' => array(
				'dir' => 'files{DS}storage{DS}',
				'create_directory' => true,
				//'allowed_mime' => array('application/msword','application/excel','application/vnd.ms-excel','application/vnd.ms-powerpoint','application/zip','video/x-ms-wmv','video/x-flv',''),
				//'allowed_ext' => array('.jpg', '.jpeg', '.png','.gif','.doc','.docx','.wmv','.flv','.mp4','.avi','.xls','.xlsx','.ppt','.pptx','.wav','.zip'),
				'max_size' => '1024 mb',
				/*'thumbsizes' => array(
					'320x90' => array(
                        'width' => 320,
                        'height' => 90,
						'forceAspectRatio' => 'C',
                    )
				),*/
			)
		)
	);
	//The Associations below have been created with all possible keys, those that are not needed can be removed
	

	var $belongsTo = array(
		'Clipp' => array(
			'className' => 'Clipp',
			'foreignKey' => 'clipp_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Customer' => array(
			'className' => 'Customer',
			'foreignKey' => 'customer_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
?>