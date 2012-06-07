<?php 
	echo $this->Paginator->sort('title');
	echo ";";
	echo $this->Paginator->sort('publish_date');
	echo ";";
	echo $this->Paginator->sort('customer_id');
	echo ";";
	echo $this->Paginator->sort('publisher_id');
	echo ";\n";
	foreach ($clipps as $clipp) {
		echo $clipp['Clipp']['title'];
		echo ";";
		echo date('G:i d-m-Y',strtotime($clipp['Clipp']['publish_date']));
		echo ";";
		echo $clipp['Customer']['name'];
		echo ";";
		echo $clipp['Publisher']['name'];
		echo ";\n";
	}
