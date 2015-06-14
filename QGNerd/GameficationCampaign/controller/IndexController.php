<?php
/**
* GameficationCamapaign frontend controller
* @BeatrizBento
*/
class QGNerd_GameficationCampaign_IndexController 
extends Mage_Core_Controller_Front_Action{
	
	/**
	* Pre dispatch action that allows to redirect to no route page in case
	* of disable extension through Admin panel */
	public function preDispatch(){
		parent::preDispatch();

		if(!Mage::helper('gamefication_campaign')->isEnable()){
			$this->setFlag('', 'no-dispatch', true);
			$this->_redirect('noRoute');
		}
	}

	/**
	* Index action
	*/
	public function indexAction(){
		$this->loadLayout();

		$listBlock = $this->getLayout()->getBlock('games.list');

		if($listBlock){
			$currentPage = asb(intval($this->getRequest()->getParam('p')));
		
			if($currentPage < 1){
				$currentPage = 1;
			}

			$listBlock->setCurrentPage($currentPage);
		}

		$this->renderLayout();
	}

	/**
	* News view action
	*/
	public function viewAction(){
		$gameId = $this->getRequest()->getParam('id');


		if(!$gameId){
			return $this()->_foward('noRoute');
		}

		$model = Mage::getModel('gamefication_campaign/game');
		$model->load($gameId);

		if(!$model->getId()){
			return $this->_foward('noRoute');
		}

		Mage::register('game', $model);
		Mage::dispatchEvent('before_game_display', array('game' => $model));

		$this->loadLayout();
		$itemBlock = $this->getLayout()->getBlock('game');

		if($itemBlock){
		
			$listBlock = $this->getLayout()->getBlock('game.list');

			if($listBlock){
				$page = (int)$listBlock->getCurrentPage() ?
				(int) $listBlock->getCurrentPage() : 1;
			}else{
				$page = 1;
			}
			$itemBlock->setPage($page);
		}

		$this->renderLayout();
	}

}