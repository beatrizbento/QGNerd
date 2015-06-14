<?php
/**
* Game_Gamer item model
* @Beatriz Bento
**/
class QGNerd_GameficationCampaign_Model_Resource_Game_Gamer extends Mage_Core_Model_Resource_Db_Abstract{

	/*
	* Initialize connection and define main table and primary key
	*/
	protected function _construct(){
		parent::_construct();
		$this->_init('qgnerd_gameficationcampaign/game_gamer', 'game_gamer_id');
	}
}