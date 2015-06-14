<?php
/**
* News installation script
*
* @author Beatriz Bento
*/

/**
* @var $installer Mage_Core_Model_Resource_Setup
*/
$installer = $this;

/**
* Creating table campaign
*/
$table = $installer->getConnection()
	->newTable($installer->getTable('qgnerd_gameficationcampaign/campaign'))
	->addColumn('campaign_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
		'unsigned' => true,
		'identity' => true,
		'nullable' => false,
		'primary' => true,
		), 'Gamefication Campaign id')
	->addColumn('title', Varien_Db_Ddl_Table::TYPE_VARCHAR, 255, array(
		'nullable' => false,
		), 'Title')
	->addColumn('description', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(
		'nullable' => false,
		), 'Description')
	->addColumn('begin_at', Varien_Db_Ddl_Table::TYPE_DATE, null, array(
		'nullable' => false,
		'default' => null,
		), 'Begin At')
	->addColumn('end_at', Varien_Db_Ddl_Table::TYPE_DATE, null, array(
		'nullable' => false,
		'default' => null,
		), 'End At')
	->addIndex($installer->getIdxName(
		$installer->getTable('qgnerd_gameficationcampaign/campaign'),
		array('title'),
		Varien_Db_Adapter_Interface::INDEX_TYPE_INDEX
		),
	array('title'),
	array('type' => Varien_Db_Adapter_Interface::INDEX_TYPE_INDEX)
	)
	->SetComment('campaign item');

	$installer->getConnection()->createTable($table);

/**
* Creating table game
*/
$table = $installer->getConnection()
	->newTable($installer->getTable('qgnerd_gameficationcampaign/game'))
	->addColumn('game_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
		'unsigned' => true,
		'identity' => true,
		'nullable' => false,
		'primary' => true,
		), 'Game id')
	->addColumn('title', Varien_Db_Ddl_Table::TYPE_VARCHAR, 255, array(
		'nullable' => false,
		), 'Title')
	->addColumn('description', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(
		'nullable' => true,
		), 'Description')
	->addColumn('campaign_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
		'nullable' => false,
		), 'Campaign id')
	->addConstraint('FK_CAMPAIGN',
		$installer->getTable('qgnerd_gameficationcampaign/game'),
		'campaign_id',
		$installer->getTable('qgnerd_gameficationcampaign/campaign'),
		'campaign_id',
		Varien_Db_Ddl_Table::ACTION_CASCADE,
		Varien_Db_Ddl_Table::ACTION_CASCADE)
	->addIndex($installer->getIdxName(
		$installer->getTable('qgnerd_gameficationcampaign/game'),
		array('title'),
		Varien_Db_Adapter_Interface::INDEX_TYPE_INDEX
		),
	array('title'),
	array('type' => Varien_Db_Adapter_Interface::INDEX_TYPE_INDEX)
	)
	->SetComment('game item');

	$installer->getConnection()->createTable($table);

/**
* Creating table rewards
*/
$table = $installer->getConnection()
	->newTable($installer->getTable('qgnerd_gameficationcampaign/rewards'))
	->addColumn('rewards_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
		'unsigned' => true,
		'identity' => true,
		'nullable' => false,
		'primary' => true,
		), 'Rewards id')
	->addColumn('title', Varien_Db_Ddl_Table::TYPE_VARCHAR, 255, array(
		'nullable' => false,
		), 'Title')
	->addColumn('description', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(
		'nullable' => true,
		), 'Description')
	->addColumn('game_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
		'nullable' => false,
		), 'Game id')
	->addColumn('valid_until', Varien_Db_Ddl_Table::TYPE_DATE, null, array(
		'nullable' => true,
		'default' => null,
		), 'Valid Until')
	->addColumn('min_points', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
		'nullable' => false,
		), 'Minimus points')
	->addColumn('rewards_type', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(
		'nullable' => false,
		), 'Type')
	->addColumn('rewards_value', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(
		'nullable' => false,
		), 'Value')
	->addColumn('rewards_level', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(
		'nullable' => false,
		), 'Level')
	->addConstraint('FK_REWARDS_GAME',
		$installer->getTable('qgnerd_gameficationcampaign/rewards'),
		'game_id',
		$installer->getTable('qgnerd_gameficationcampaign/game'),
		'game_id',
		Varien_Db_Ddl_Table::ACTION_CASCADE,
		Varien_Db_Ddl_Table::ACTION_CASCADE)
	->addIndex($installer->getIdxName(
		$installer->getTable('qgnerd_gameficationcampaign/rewards'),
		array('title'),
		Varien_Db_Adapter_Interface::INDEX_TYPE_INDEX
		),
	array('title'),
	array('type' => Varien_Db_Adapter_Interface::INDEX_TYPE_INDEX)
	)
	->SetComment('rewards item');

	$installer->getConnection()->createTable($table);

/**
* Creating table task
*/
$table = $installer->getConnection()
	->newTable($installer->getTable('qgnerd_gameficationcampaign/task'))
	->addColumn('task_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
		'unsigned' => true,
		'identity' => true,
		'nullable' => false,
		'primary' => true,
		), 'Task id')
	->addColumn('title', Varien_Db_Ddl_Table::TYPE_VARCHAR, 255, array(
		'nullable' => false,
		), 'Title')
	->addColumn('description', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(
		'nullable' => true,
		), 'Description')
	->addColumn('game_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
		'nullable' => false,
		), 'Game id')
	->addColumn('pontuation', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
		'nullable' => true,
		), 'Pontuation')
	->addConstraint('FK_TASK_GAME',
		$installer->getTable('qgnerd_gameficationcampaign/task'),
		'game_id',
		$installer->getTable('qgnerd_gameficationcampaign/game'),
		'game_id',
		Varien_Db_Ddl_Table::ACTION_CASCADE,
		Varien_Db_Ddl_Table::ACTION_CASCADE)
	->addIndex($installer->getIdxName(
		$installer->getTable('qgnerd_gameficationcampaign/task'),
		array('title'),
		Varien_Db_Adapter_Interface::INDEX_TYPE_INDEX
		),
	array('title'),
	array('type' => Varien_Db_Adapter_Interface::INDEX_TYPE_INDEX)
	)
	->SetComment('task item');

	$installer->getConnection()->createTable($table);

/**
* Creating table theme
*/
$table = $installer->getConnection()
	->newTable($installer->getTable('qgnerd_gameficationcampaign/theme'))
	->addColumn('theme_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
		'unsigned' => true,
		'identity' => true,
		'nullable' => false,
		'primary' => true,
		), 'Theme id')
	->addColumn('title', Varien_Db_Ddl_Table::TYPE_VARCHAR, 255, array(
		'nullable' => false,
		), 'Title')
	->addColumn('description', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(
		'nullable' => true,
		), 'Description')
	->SetComment('theme item');

	$installer->getConnection()->createTable($table);

/**
* Creating table task_theme
*/
$table = $installer->getConnection()
	->newTable($installer->getTable('qgnerd_gameficationcampaign/task_theme'))
	->addColumn('task_theme_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
		'unsigned' => true,
		'identity' => true,
		'nullable' => false,
		'primary' => true,
		), 'Task_Theme id')
	->addColumn('task_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
		'nullable' => false,
		), 'Task id')
	->addColumn('theme_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
		'nullable' => false,
		), 'Theme id')
	->addConstraint('FK_TASK',
		$installer->getTable('qgnerd_gameficationcampaign/task_theme'),
		'task_id',
		$installer->getTable('qgnerd_gameficationcampaign/task'),
		'task_id',
		Varien_Db_Ddl_Table::ACTION_CASCADE,
		Varien_Db_Ddl_Table::ACTION_CASCADE)
	->addConstraint('FK_THEME',
		$installer->getTable('qgnerd_gameficationcampaign/task_theme'),
		'theme_id',
		$installer->getTable('qgnerd_gameficationcampaign/theme'),
		'theme_id',
		Varien_Db_Ddl_Table::ACTION_CASCADE,
		Varien_Db_Ddl_Table::ACTION_CASCADE)
	->addIndex($installer->getIdxName(
		$installer->getTable('qgnerd_gameficationcampaign/task_theme'),
		array('theme_id'),
		Varien_Db_Adapter_Interface::INDEX_TYPE_INDEX
		),
	array('theme_id'),
	array('type' => Varien_Db_Adapter_Interface::INDEX_TYPE_INDEX)
	)
	->addIndex($installer->getIdxName(
		$installer->getTable('qgnerd_gameficationcampaign/task_theme'),
		array('task_id'),
		Varien_Db_Adapter_Interface::INDEX_TYPE_INDEX
		),
	array('task_id'),
	array('type' => Varien_Db_Adapter_Interface::INDEX_TYPE_INDEX)
	)
	->SetComment('task_theme item');

	$installer->getConnection()->createTable($table);

/**
* Creating table step
*/
$table = $installer->getConnection()
	->newTable($installer->getTable('qgnerd_gameficationcampaign/step'))
	->addColumn('step_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
		'unsigned' => true,
		'identity' => true,
		'nullable' => false,
		'primary' => true,
		), 'Step id')
	->addColumn('task_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
		'nullable' => false,
		), 'Task id')
	->addColumn('status', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
		'nullable' => true,
		), 'Status')
	->addColumn('points', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
		'nullable' => true,
		), 'Points')
	->addConstraint('FK_TASK',
		$installer->getTable('qgnerd_gameficationcampaign/step'),
		'task_id',
		$installer->getTable('qgnerd_gameficationcampaign/task'),
		'task_id',
		Varien_Db_Ddl_Table::ACTION_CASCADE,
		Varien_Db_Ddl_Table::ACTION_CASCADE)
	->SetComment('step item');

	$installer->getConnection()->createTable($table);

/**
* Creating table gamer
*/
$table = $installer->getConnection()
	->newTable($installer->getTable('qgnerd_gameficationcampaign/gamer'))
	->addColumn('gamer_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
		'unsigned' => true,
		'identity' => true,
		'nullable' => false,
		'primary' => true,
		), 'Gamer id')
	->addColumn('customer_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
		'nullable' => false,
		), 'Customer id')
	->addColumn('badge', Varien_Db_Ddl_Table::TYPE_VARCHAR, null, array(
		'nullable' => true,
		), 'Badge id')
	->addColumn('facebook_status', Varien_Db_Ddl_Table::TYPE_VARCHAR, null, array(
		'nullable' => true,
		), 'Facebok status')
	->addColumn('twitter_status', Varien_Db_Ddl_Table::TYPE_VARCHAR, null, array(
		'nullable' => true,
		), 'Twitter status')
	->addColumn('instagram_status', Varien_Db_Ddl_Table::TYPE_VARCHAR, null, array(
		'nullable' => true,
		), 'Instagram status')
	->addColumn('pinterest_status', Varien_Db_Ddl_Table::TYPE_VARCHAR, null, array(
		'nullable' => true,
		), 'Pinterest status')
	->addColumn('blog_status', Varien_Db_Ddl_Table::TYPE_VARCHAR, null, array(
		'nullable' => true,
		), 'Blog status')
	->addColumn('newsletter_status', Varien_Db_Ddl_Table::TYPE_VARCHAR, null, array(
		'nullable' => true,
		), 'Newsletter status')
	->addColumn('nickname', Varien_Db_Ddl_Table::TYPE_VARCHAR, 255, array(
		'nullable' => true,
		), 'Nickname')
	->addConstraint('FK_GAMER_CUSTOMER',
		$installer->getTable('qgnerd_gameficationcampaign/gamer'),
		'customer_id',
		$installer->getTable('customer/entity'),
		'entity_id',
		Varien_Db_Ddl_Table::ACTION_CASCADE,
		Varien_Db_Ddl_Table::ACTION_CASCADE)
	->addIndex($installer->getIdxName(
		$installer->getTable('qgnerd_gameficationcampaign/gamer'),
		array('customer_id'),
		Varien_Db_Adapter_Interface::INDEX_TYPE_INDEX
		),
	array('customer_id'),
	array('type' => Varien_Db_Adapter_Interface::INDEX_TYPE_INDEX)
	)
	->SetComment('gamer item');

	$installer->getConnection()->createTable($table);

/**
* Creating table game_gamer
*/
$table = $installer->getConnection()
	->newTable($installer->getTable('qgnerd_gameficationcampaign/game_gamer'))
	->addColumn('game_gamer_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
		'unsigned' => true,
		'identity' => true,
		'nullable' => false,
		'primary' => true,
		), 'Game_Gamer id')
	->addColumn('game_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
		'nullable' => false,
		), 'Game id')
	->addColumn('gamer_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
		'nullable' => false,
		), 'Gamer id')
	->addColumn('begin_at', Varien_Db_Ddl_Table::TYPE_DATE, null, array(
		'nullable' => true,
		), 'Begin at')
	->addColumn('last_access', Varien_Db_Ddl_Table::TYPE_TIMESTAMP, null, array(
		'nullable' => true,
		), 'Last access')
	->addColumn('pontuation', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
		'nullable' => true,
		), 'Pontuation')
	->addConstraint('FK_GAMER_GAME',
		$installer->getTable('qgnerd_gameficationcampaign/game_gamer'),
		'game_id',
		$installer->getTable('qgnerd_gameficationcampaign/game'),
		'game_id',
		Varien_Db_Ddl_Table::ACTION_CASCADE,
		Varien_Db_Ddl_Table::ACTION_CASCADE)
	->addConstraint('FK_GAME_GAMER',
		$installer->getTable('qgnerd_gameficationcampaign/game_gamer'),
		'gamer_id',
		$installer->getTable('qgnerd_gameficationcampaign/gamer'),
		'gamer_id',
		Varien_Db_Ddl_Table::ACTION_CASCADE,
		Varien_Db_Ddl_Table::ACTION_CASCADE)
	->addIndex($installer->getIdxName(
		$installer->getTable('qgnerd_gameficationcampaign/game_gamer'),
		array('game_id'),
		Varien_Db_Adapter_Interface::INDEX_TYPE_INDEX
		),
	array('game_id'),
	array('type' => Varien_Db_Adapter_Interface::INDEX_TYPE_INDEX)
	)
	->addIndex($installer->getIdxName(
		$installer->getTable('qgnerd_gameficationcampaign/game_gamer'),
		array('gamer_id'),
		Varien_Db_Adapter_Interface::INDEX_TYPE_INDEX
		),
	array('gamer_id'),
	array('type' => Varien_Db_Adapter_Interface::INDEX_TYPE_INDEX)
	)
	->SetComment('game_gamer item');

	$installer->getConnection()->createTable($table);

/**
* Creating table gamer_theme
*/
$table = $installer->getConnection()
	->newTable($installer->getTable('qgnerd_gameficationcampaign/gamer_theme'))
	->addColumn('gamer_theme_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
		'unsigned' => true,
		'identity' => true,
		'nullable' => false,
		'primary' => true,
		), 'Gamer_Theme id')
	->addColumn('gamer_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
		'nullable' => false,
		), 'Gamer id')
	->addColumn('theme_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
		'nullable' => false,
		), 'Theme id')
	->addColumn('like_flag', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
		'nullable' => true,
		), 'Like flag')
	->addConstraint('FK_GAMER_THEME',
		$installer->getTable('qgnerd_gameficationcampaign/gamer_theme'),
		'game_id',
		$installer->getTable('qgnerd_gameficationcampaign/gamer'),
		'game_id',
		Varien_Db_Ddl_Table::ACTION_CASCADE,
		Varien_Db_Ddl_Table::ACTION_CASCADE)
	->addConstraint('FK_THEME_GAMER',
		$installer->getTable('qgnerd_gameficationcampaign/gamer_theme'),
		'theme_id',
		$installer->getTable('qgnerd_gameficationcampaign/theme'),
		'theme_id',
		Varien_Db_Ddl_Table::ACTION_CASCADE,
		Varien_Db_Ddl_Table::ACTION_CASCADE)
	->addIndex($installer->getIdxName(
		$installer->getTable('qgnerd_gameficationcampaign/gamer_theme'),
		array('gamer_id'),
		Varien_Db_Adapter_Interface::INDEX_TYPE_INDEX
		),
	array('gamer_id'),
	array('type' => Varien_Db_Adapter_Interface::INDEX_TYPE_INDEX)
	)
	->addIndex($installer->getIdxName(
		$installer->getTable('qgnerd_gameficationcampaign/gamer_theme'),
		array('theme_id'),
		Varien_Db_Adapter_Interface::INDEX_TYPE_INDEX
		),
	array('theme_id'),
	array('type' => Varien_Db_Adapter_Interface::INDEX_TYPE_INDEX)
	)
	->SetComment('gamer_theme item');

	$installer->getConnection()->createTable($table);