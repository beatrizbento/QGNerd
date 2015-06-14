<?php
/**
* Game_Gamer item model
* @Beatriz Bento
**/
class QGNerd_GameficationCampaign_Model_Game_Gamer extends Mage_Core_Model_Abstract{

	/*
	* Define resource model
	*/
	protected function _construct(){
		parent::_construct();
		$this->_init('qgnerd_gameficationcampaign/game_gamer');
	}
}