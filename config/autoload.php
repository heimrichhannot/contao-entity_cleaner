<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2016 Leo Feyer
 *
 * @license LGPL-3.0+
 */


/**
 * Register the namespaces
 */
ClassLoader::addNamespaces(array
(
	'HeimrichHannot',
));


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	// Classes
	'HeimrichHannot\EntityCleaner\EntityCleaner'      => 'system/modules/entity_cleaner/classes/EntityCleaner.php',

	// Models
	'HeimrichHannot\EntityCleaner\EntityCleanerModel' => 'system/modules/entity_cleaner/models/EntityCleanerModel.php',
));
