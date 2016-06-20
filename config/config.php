<?php

/**
* Backend modules
*/
$GLOBALS['BE_MOD']['devtools']['entity_cleaner'] = array(
	'tables' => array('tl_entity_cleaner'),
	'icon'   => 'system/modules/entity_cleaner/assets/img/icon.png'
);

/**
 * Crons
 */
$GLOBALS['TL_CRON']['minutely']['runMinutelyEntityCleaner']	= array('HeimrichHannot\EntityCleaner\EntityCleaner', 'runMinutely');
$GLOBALS['TL_CRON']['hourly']['runHourlyEntityCleaner']		= array('HeimrichHannot\EntityCleaner\EntityCleaner', 'runHourly');
$GLOBALS['TL_CRON']['daily']['runDailyEntityCleaner']			= array('HeimrichHannot\EntityCleaner\EntityCleaner', 'runDaily');
$GLOBALS['TL_CRON']['weekly']['runWeeklyEntityCleaner']		= array('HeimrichHannot\EntityCleaner\EntityCleaner', 'runWeekly');
$GLOBALS['TL_CRON']['monthly']['runMonthlyEntityCleaner']		= array('HeimrichHannot\EntityCleaner\EntityCleaner', 'runMonthly');

/**
 * Models
 */
$GLOBALS['TL_MODELS']['tl_entity_cleaner'] = 'HeimrichHannot\EntityCleaner\EntityCleanerModel';