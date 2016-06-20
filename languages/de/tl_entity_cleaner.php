<?php

$arrLang = &$GLOBALS['TL_LANG']['tl_entity_cleaner'];

/**
 * Fields
 */
$arrLang['title'] = array('Titel', 'Geben Sie hier bitte den Titel ein.');
$arrLang['tstamp'] = array('Änderungsdatum', '');
$arrLang['dataContainer'] = array('Entität', 'Wählen Sie hier die Datenbanktabelle der gewünschten Entität aus.');
$arrLang['whereCondition'] = array('Bedingung für das Löschen (!)', 'Geben Sie hier die Bedingung ein, die erfüllt sein muss, damit eine Entität gelöscht wird. Aus Sicherheitsgründen ist dieses Feld ein Pflichtfeld. Wenn Sie keine Bedingung vergeben möchten, geben Sie einfach 1=1 ein.');
$arrLang['addMaxAge'] = array('Maximales Alter hinzufügen', 'Wählen Sie diese Option, wenn ptoentiell zu löschende Entitäten ein bestimmtes Maximalalter haben dürfen, das sie vor dem Löschen schützt.');
$arrLang['maxAge'] = array('Maximales Alter inaktiver Einsendungen', 'Wählen Sie hier aus, wie alt eine inaktive Einsendung höchstens sein darf, bevor sie gelöscht wird.');
$arrLang['maxAge']['m'] = 'Minute(n)';
$arrLang['maxAge']['h'] = 'Stunde(n)';
$arrLang['maxAge']['d'] = 'Tag(e)';
$arrLang['maxAgeField'] = array('Feld für das Datensatzalter', 'Geben Sie hier den Namen des Feldes ein, welches für die Berechnung des maximalen Alters herangezogen werden soll.');
$arrLang['period'] = array('Zeitintervall', 'Wählen Sie hier, wie oft die Säuberung ausgeführt werden soll. Dabei wird Contaos Poor Man\'s Cron (TL_CRON) verwendet.');
$arrLang['period']['minutely'] = 'Jede Minute';
$arrLang['period']['hourly'] = 'Jede Stunde';
$arrLang['period']['daily'] = 'Jeden Tag';
$arrLang['period']['weekly'] = 'Jede Woche';
$arrLang['period']['monthly'] = 'Jeden Monat';
$arrLang['published'] = array('Aktiviert', 'Wählen Sie diese Option, um den Cleaner zu aktivieren.');

/**
 * Legends
 */
$arrLang['general_legend'] = 'Allgemeine Einstellungen';
$arrLang['config_legend'] = 'Konfiguration';
$arrLang['publish_legend'] = 'Aktivierung';

/**
 * Buttons
 */
$arrLang['new'] = array('Neuer Entity Cleaner', 'Entity Cleaner erstellen');
$arrLang['edit'] = array('Entity Cleaner bearbeiten', 'Entity Cleaner ID %s bearbeiten');
$arrLang['copy'] = array('Entity Cleaner duplizieren', 'Entity Cleaner ID %s duplizieren');
$arrLang['delete'] = array('Entity Cleaner löschen', 'Entity Cleaner ID %s löschen');
$arrLang['show'] = array('Entity Cleaner Details', 'Entity Cleaner-Details ID %s anzeigen');
