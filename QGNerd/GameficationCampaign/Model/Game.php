<?php
/**
* Game item model
* @Beatriz Bento
**/
class QGNerd_GameficationCampaign_Model_Game extends Mage_Core_Model_Abstract{

	/*
	* Define resource model
	*/
	protected function _construct(){
		parent::_construct();
		$this->_init('qgnerd_gameficationcampaign/game');
	}
}