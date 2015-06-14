<?php
/**
* Task Collection
* @Beatriz Bento
**/
class QGNerd_GameficationCampaign_Model_Resource_Task_Collection 
extends Mage_Core_Model_Resource_Db_Collection_Abstract{

	/*
	* Define collection model
	*/
	protected function _construct(){
		parent::_construct();
		$this->_init('qgnerd_gameficationcampaign/task');
	}

	/**
	* Prepare for displaying in list
	*
	* @param integer $page
	* @return QGNerd_GameficationCampaign_Model_Resource_Campaign_Collection
	*/
	public function prepareForList($page){
		$this->setPageSize(Mage::helper('qgnerd_task') ->getCampaignPerPage());
		$this->setCurPage($page)->setOrder('task_id');
		return $this;
	}
}