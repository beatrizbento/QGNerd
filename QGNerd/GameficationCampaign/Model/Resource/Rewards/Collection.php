<?php
/**
* Rewards Collection
* @Beatriz Bento
**/
class QGNerd_GameficationCampaign_Model_Resource_Rewards_Collection 
extends Mage_Core_Model_Resource_Db_Collection_Abstract{

	/*
	* Define collection model
	*/
	protected function _construct(){
		parent::_construct();
		$this->_init('qgnerd_gameficationcampaign/rewards');
	}

	/**
	* Prepare for displaying in list
	*
	* @param integer $page
	* @return QGNerd_GameficationCampaign_Model_Resource_Rewards_Collection
	*/
	public function prepareForList($page){
		$this->setPageSize(Mage::helper('qgnerd_rewards') ->getCampaignPerPage());
		$this->setCurPage($page)->setOrder('min_points');
		return $this;
	}
}