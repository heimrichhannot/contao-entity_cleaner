<?php

$GLOBALS['TL_DCA']['tl_entity_cleaner'] = array
(
	'config'   => array
	(
		'dataContainer'     => 'Table',
		'enableVersioning'  => true,
		'onsubmit_callback' => array
		(
			array('HeimrichHannot\Haste\Dca\General', 'setDateAdded'),
		),
		'sql' => array
		(
			'keys' => array
			(
				'id' => 'primary'
			)
		)
	),
	'list'     => array
	(
		'label' => array
		(
			'fields' => array('title'),
			'format' => '%s'
		),
		'sorting'           => array
		(
			'mode'                  => 1,
			'fields'                => array('title'),
			'headerFields'          => array('title'),
			'panelLayout'           => 'filter;search,limit'
		),
		'global_operations' => array
		(
			'all'    => array
			(
				'label'      => &$GLOBALS['TL_LANG']['MSC']['all'],
				'href'       => 'act=select',
				'class'      => 'header_edit_all',
				'attributes' => 'onclick="Backend.getScrollOffset();"'
			),
		),
		'operations' => array
		(
			'edit'   => array
			(
				'label' => &$GLOBALS['TL_LANG']['tl_entity_cleaner']['edit'],
				'href'  => 'act=edit',
				'icon'  => 'edit.gif'
			),
			'copy'   => array
			(
				'label' => &$GLOBALS['TL_LANG']['tl_entity_cleaner']['copy'],
				'href'  => 'act=copy',
				'icon'  => 'copy.gif'
			),
			'delete' => array
			(
				'label'      => &$GLOBALS['TL_LANG']['tl_entity_cleaner']['delete'],
				'href'       => 'act=delete',
				'icon'       => 'delete.gif',
				'attributes' => 'onclick="if(!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\'))return false;Backend.getScrollOffset()"'
			),
			'toggle' => array
			(
				'label'           => &$GLOBALS['TL_LANG']['tl_entity_cleaner']['toggle'],
				'icon'            => 'visible.gif',
				'attributes'      => 'onclick="Backend.getScrollOffset();return AjaxRequest.toggleVisibility(this,%s)"',
				'button_callback' => array('tl_entity_cleaner', 'toggleIcon')
			),
			'show'   => array
			(
				'label' => &$GLOBALS['TL_LANG']['tl_entity_cleaner']['show'],
				'href'  => 'act=show',
				'icon'  => 'show.gif'
			),
		)
	),
	'palettes' => array(
		'__selector__' => array('addMaxAge'),
		'default' => '{general_legend},title;{config_legend},dataContainer,period,whereCondition,addMaxAge;{publish_legend},published;'
	),
	'subpalettes' => array(
		'addMaxAge' => 'maxAge,maxAgeField'
	),
	'fields'   => array
	(
		'id' => array
		(
			'sql'                     => "int(10) unsigned NOT NULL auto_increment"
		),
		'tstamp' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_entity_cleaner']['tstamp'],
			'sql'                     => "int(10) unsigned NOT NULL default '0'"
		),
		'dateAdded' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['MSC']['dateAdded'],
			'sorting'                 => true,
			'flag'                    => 6,
			'eval'                    => array('rgxp'=>'datim', 'doNotCopy' => true),
			'sql'                     => "int(10) unsigned NOT NULL default '0'"
		),
		'title' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_entity_cleaner']['title'],
			'exclude'                 => true,
			'search'                  => true,
			'sorting'                 => true,
			'flag'                    => 1,
			'inputType'               => 'text',
			'eval'                    => array('mandatory' => true, 'tl_class'=>'w50'),
			'sql'                     => "varchar(255) NOT NULL default ''"
		),
		'dataContainer'                    => array
		(
			'inputType'        => 'select',
			'label'            => &$GLOBALS['TL_LANG']['tl_entity_cleaner']['dataContainer'],
			'options_callback' => array('HeimrichHannot\Haste\Dca\General', 'getDataContainers'),
			'eval'             => array(
				'chosen'             => true,
				'includeBlankOption' => true,
				'tl_class'           => 'w50 clr',
				'mandatory'          => true
			),
			'exclude'          => true,
			'sql'              => "varchar(255) NOT NULL default ''",
		),
		'addMaxAge' => array(
			'label'                   => &$GLOBALS['TL_LANG']['tl_entity_cleaner']['addMaxAge'],
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('submitOnChange' => true, 'tl_class' => 'w50 clr'),
			'sql'                     => "char(1) NOT NULL default ''"
		),
		'maxAge' => array(
			'label'                   => &$GLOBALS['TL_LANG']['tl_entity_cleaner']['maxAge'],
			'exclude'                 => true,
			'inputType'               => 'timePeriod',
			'options'                 => array('m', 'h', 'd'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_entity_cleaner']['maxAge'],
			'eval'                    => array('mandatory'=> true, 'tl_class' => 'w50 clr'),
			'sql'                     => "blob NULL"
		),
		'maxAgeField' => array(
			'label'                   => &$GLOBALS['TL_LANG']['tl_entity_cleaner']['maxAgeField'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'default'                 => 'dateAdded',
			'eval'                    => array('maxlength' => 255, 'mandatory' => true, 'tl_class' => 'w50'),
			'sql'                     => "varchar(255) NOT NULL default ''"
		),
		'period' => array
		(
			'label'                     => &$GLOBALS['TL_LANG']['tl_entity_cleaner']['period'],
			'exclude'                   => true,
			'inputType'                 => 'select',
			'options'                   => array('minutely', 'hourly', 'daily', 'weekly', 'monthly'),
			'reference'                 => &$GLOBALS['TL_LANG']['tl_entity_cleaner']['period'],
			'eval'                      => array('mandatory' => true, 'includeBlankOption'=>true, 'tl_class'=>'w50'),
			'sql'                       => "varchar(32) NOT NULL default ''"
		),
		'whereCondition' => array(
			'label'                   => &$GLOBALS['TL_LANG']['tl_entity_cleaner']['whereCondition'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('maxlength' => 255, 'mandatory' => true, 'tl_class' => 'w50'),
			'sql'                     => "varchar(255) NOT NULL default ''"
		),
		'published' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_entity_cleaner']['published'],
			'exclude'                 => true,
			'filter'                  => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class' => 'w50', 'doNotCopy' => true),
			'sql'                     => "char(1) NOT NULL default ''"
		),
	)
);


class tl_entity_cleaner extends \Backend
{
	public function toggleIcon($row, $href, $label, $title, $icon, $attributes)
	{
		$objUser = \BackendUser::getInstance();

		if (strlen(Input::get('tid')))
		{
			$this->toggleVisibility(Input::get('tid'), (Input::get('state') == 1));
			\Controller::redirect($this->getReferer());
		}

		// Check permissions AFTER checking the tid, so hacking attempts are logged
		if (!$objUser->isAdmin && !$objUser->hasAccess('tl_entity_cleaner::published', 'alexf'))
		{
			return '';
		}

		$href .= '&amp;tid='.$row['id'].'&amp;state='.($row['published'] ? '' : 1);

		if (!$row['published'])
		{
			$icon = 'invisible.gif';
		}

		return '<a href="'.$this->addToUrl($href).'" title="'.specialchars($title).'"'.$attributes.'>'.Image::getHtml($icon, $label).'</a> ';
	}

	public function toggleVisibility($intId, $blnVisible)
	{
		$objUser = \BackendUser::getInstance();
		$objDatabase = \Database::getInstance();

		// Check permissions to publish
		if (!$objUser->isAdmin && !$objUser->hasAccess('tl_entity_cleaner::published', 'alexf'))
		{
			\Controller::log('Not enough permissions to publish/unpublish item ID "'.$intId.'"', 'tl_entity_cleaner toggleVisibility', TL_ERROR);
			\Controller::redirect('contao/main.php?act=error');
		}

		$objVersions = new Versions('tl_entity_cleaner', $intId);
		$objVersions->initialize();

		// Trigger the save_callback
		if (is_array($GLOBALS['TL_DCA']['tl_entity_cleaner']['fields']['published']['save_callback']))
		{
			foreach ($GLOBALS['TL_DCA']['tl_entity_cleaner']['fields']['published']['save_callback'] as $callback)
			{
				$this->import($callback[0]);
				$blnVisible = $this->$callback[0]->$callback[1]($blnVisible, $this);
			}
		}

		// Update the database
		$objDatabase->prepare("UPDATE tl_entity_cleaner SET tstamp=". time() .", published='" . ($blnVisible ? 1 : '') . "' WHERE id=?")
			->execute($intId);

		$objVersions->create();
		\Controller::log('A new version of record "tl_entity_cleaner.id='.$intId.'" has been created'.$this->getParentEntries('tl_entity_cleaner', $intId), 'tl_entity_cleaner toggleVisibility()', TL_GENERAL);
	}
}
