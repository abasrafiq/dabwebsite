<?php
class News_m extends MY_Model {
protected $_table_name = 'news';
	protected $_primary_key = 'NewsId';
	protected $_primary_filter = 'intval';
	protected $_order_by = 'CreationDate';
	protected $_rules = array();
	protected $_timestamp = TRUE;
	}
?>