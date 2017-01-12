<?php

namespace HeimrichHannot\EntityCleaner;

class EntityCleaner extends \Controller
{
    public static function runMinutely()
    {
        static::run('minutely');
    }

    public static function runHourly()
    {
        static::run('hourly');
    }

    public static function runWeekly()
    {
        static::run('weekly');
    }

    public static function runDaily()
    {
        static::run('daily');
    }

    public static function run($strPeriod)
    {
        if (($objEntityCleaners = EntityCleanerModel::findBy(array('published=?', 'period=?'), array(true, $strPeriod))) !== null)
        {
            while ($objEntityCleaners->next())
            {
                if (!$objEntityCleaners->whereCondition)
                {
                    continue;
                }

                $strQuery = "DELETE FROM $objEntityCleaners->dataContainer WHERE ($objEntityCleaners->whereCondition)";

                if ($objEntityCleaners->addMaxAge)
                {
                    $arrMaxAge = deserialize($objEntityCleaners->maxAge, true);

                    $intFactor = 1;
                    switch ($arrMaxAge['unit'])
                    {
                        case 'm':
                            $intFactor = 60;
                            break;
                        case 'h':
                            $intFactor = 60 * 60;
                            break;
                        case 'd':
                            $intFactor = 24 * 60 * 60;
                            break;
                    }

                    $intMaxInterval = $arrMaxAge['value'] * $intFactor;

                    $strQuery .= " AND (UNIX_TIMESTAMP() > $objEntityCleaners->dataContainer.$objEntityCleaners->maxAgeField + $intMaxInterval)";
                }

                \Database::getInstance()->execute(html_entity_decode($strQuery));
            }
        }
    }
}
