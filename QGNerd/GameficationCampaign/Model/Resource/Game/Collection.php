<?php
/**
* Game Collection
* @Beatriz Bento
**/
class QGNerd_GameficationCampaign_Model_Resource_Game_Collection 
extends Mage_Core_Model_Resource_Db_Collection_Abstract{

	/*
	* Define collection model
	*/
	protected function _construct(){
		parent::_construct();
		$this->_init('qgnerd_gameficationcampaign/game');
	}

	/**
	* Prepare for displaying in list
	*
	* @param integer $page
	* @return QGNerd_GameficationCampaign_Model_Resource_Game_Collection
	*/
	public function prepareForList($page){
		$this->setPageSize(Mage::helper('qgnerd_game') ->getCampaignPerPage());
		$this->setCurPage($page)->setOrder('title', Varien_Data_Collection::SORT_ORDER_DESC);
		return $this;
	}
}