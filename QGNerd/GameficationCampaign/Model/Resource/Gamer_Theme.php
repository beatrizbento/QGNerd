<?php
/**
* Gamer_Theme item model
* @Beatriz Bento
**/
class QGNerd_GameficationCampaign_Model_Resource_Gamer_Theme extends Mage_Core_Model_Resource_Db_Abstract{

	/*
	* Initialize connection and define main table and primary key
	*/
	protected function _construct(){
		parent::_construct();
		$this->_init('qgnerd_gameficationcampaign/gamer_theme', 'gamer_theme_id');
	}
}