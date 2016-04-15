<?php

namespace Map;

use \DailylessonHasUser;
use \DailylessonHasUserQuery;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;


/**
 * This class defines the structure of the 'DailyLesson_has_User' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class DailylessonHasUserTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.DailylessonHasUserTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'DailyLesson_has_User';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\DailylessonHasUser';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'DailylessonHasUser';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 5;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 5;

    /**
     * the column name for the DailyLesson_idPoll field
     */
    const COL_DAILYLESSON_IDPOLL = 'DailyLesson_has_User.DailyLesson_idPoll';

    /**
     * the column name for the User_idUser field
     */
    const COL_USER_IDUSER = 'DailyLesson_has_User.User_idUser';

    /**
     * the column name for the date field
     */
    const COL_DATE = 'DailyLesson_has_User.date';

    /**
     * the column name for the comments field
     */
    const COL_COMMENTS = 'DailyLesson_has_User.comments';

    /**
     * the column name for the Quality_idquality field
     */
    const COL_QUALITY_IDQUALITY = 'DailyLesson_has_User.Quality_idquality';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('DailylessonIdpoll', 'UserIduser', 'Date', 'Comments', 'QualityIdquality', ),
        self::TYPE_CAMELNAME     => array('dailylessonIdpoll', 'userIduser', 'date', 'comments', 'qualityIdquality', ),
        self::TYPE_COLNAME       => array(DailylessonHasUserTableMap::COL_DAILYLESSON_IDPOLL, DailylessonHasUserTableMap::COL_USER_IDUSER, DailylessonHasUserTableMap::COL_DATE, DailylessonHasUserTableMap::COL_COMMENTS, DailylessonHasUserTableMap::COL_QUALITY_IDQUALITY, ),
        self::TYPE_FIELDNAME     => array('DailyLesson_idPoll', 'User_idUser', 'date', 'comments', 'Quality_idquality', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('DailylessonIdpoll' => 0, 'UserIduser' => 1, 'Date' => 2, 'Comments' => 3, 'QualityIdquality' => 4, ),
        self::TYPE_CAMELNAME     => array('dailylessonIdpoll' => 0, 'userIduser' => 1, 'date' => 2, 'comments' => 3, 'qualityIdquality' => 4, ),
        self::TYPE_COLNAME       => array(DailylessonHasUserTableMap::COL_DAILYLESSON_IDPOLL => 0, DailylessonHasUserTableMap::COL_USER_IDUSER => 1, DailylessonHasUserTableMap::COL_DATE => 2, DailylessonHasUserTableMap::COL_COMMENTS => 3, DailylessonHasUserTableMap::COL_QUALITY_IDQUALITY => 4, ),
        self::TYPE_FIELDNAME     => array('DailyLesson_idPoll' => 0, 'User_idUser' => 1, 'date' => 2, 'comments' => 3, 'Quality_idquality' => 4, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, )
    );

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('DailyLesson_has_User');
        $this->setPhpName('DailylessonHasUser');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\DailylessonHasUser');
        $this->setPackage('');
        $this->setUseIdGenerator(false);
        // columns
        $this->addForeignPrimaryKey('DailyLesson_idPoll', 'DailylessonIdpoll', 'INTEGER' , 'DailyLesson', 'idPoll', true, null, null);
        $this->addForeignPrimaryKey('User_idUser', 'UserIduser', 'INTEGER' , 'User', 'idUser', true, null, null);
        $this->addColumn('date', 'Date', 'TIMESTAMP', true, null, null);
        $this->addColumn('comments', 'Comments', 'VARCHAR', false, 300, null);
        $this->addForeignPrimaryKey('Quality_idquality', 'QualityIdquality', 'INTEGER' , 'Quality', 'idquality', true, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Dailylesson', '\\Dailylesson', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':DailyLesson_idPoll',
    1 => ':idPoll',
  ),
), null, null, null, false);
        $this->addRelation('Quality', '\\Quality', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':Quality_idquality',
    1 => ':idquality',
  ),
), null, null, null, false);
        $this->addRelation('User', '\\User', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':User_idUser',
    1 => ':idUser',
  ),
), null, null, null, false);
    } // buildRelations()

    /**
     * Adds an object to the instance pool.
     *
     * Propel keeps cached copies of objects in an instance pool when they are retrieved
     * from the database. In some cases you may need to explicitly add objects
     * to the cache in order to ensure that the same objects are always returned by find*()
     * and findPk*() calls.
     *
     * @param \DailylessonHasUser $obj A \DailylessonHasUser object.
     * @param string $key             (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (null === $key) {
                $key = serialize([(null === $obj->getDailylessonIdpoll() || is_scalar($obj->getDailylessonIdpoll()) || is_callable([$obj->getDailylessonIdpoll(), '__toString']) ? (string) $obj->getDailylessonIdpoll() : $obj->getDailylessonIdpoll()), (null === $obj->getUserIduser() || is_scalar($obj->getUserIduser()) || is_callable([$obj->getUserIduser(), '__toString']) ? (string) $obj->getUserIduser() : $obj->getUserIduser()), (null === $obj->getQualityIdquality() || is_scalar($obj->getQualityIdquality()) || is_callable([$obj->getQualityIdquality(), '__toString']) ? (string) $obj->getQualityIdquality() : $obj->getQualityIdquality())]);
            } // if key === null
            self::$instances[$key] = $obj;
        }
    }

    /**
     * Removes an object from the instance pool.
     *
     * Propel keeps cached copies of objects in an instance pool when they are retrieved
     * from the database.  In some cases -- especially when you override doDelete
     * methods in your stub classes -- you may need to explicitly remove objects
     * from the cache in order to prevent returning objects that no longer exist.
     *
     * @param mixed $value A \DailylessonHasUser object or a primary key value.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && null !== $value) {
            if (is_object($value) && $value instanceof \DailylessonHasUser) {
                $key = serialize([(null === $value->getDailylessonIdpoll() || is_scalar($value->getDailylessonIdpoll()) || is_callable([$value->getDailylessonIdpoll(), '__toString']) ? (string) $value->getDailylessonIdpoll() : $value->getDailylessonIdpoll()), (null === $value->getUserIduser() || is_scalar($value->getUserIduser()) || is_callable([$value->getUserIduser(), '__toString']) ? (string) $value->getUserIduser() : $value->getUserIduser()), (null === $value->getQualityIdquality() || is_scalar($value->getQualityIdquality()) || is_callable([$value->getQualityIdquality(), '__toString']) ? (string) $value->getQualityIdquality() : $value->getQualityIdquality())]);

            } elseif (is_array($value) && count($value) === 3) {
                // assume we've been passed a primary key";
                $key = serialize([(null === $value[0] || is_scalar($value[0]) || is_callable([$value[0], '__toString']) ? (string) $value[0] : $value[0]), (null === $value[1] || is_scalar($value[1]) || is_callable([$value[1], '__toString']) ? (string) $value[1] : $value[1]), (null === $value[2] || is_scalar($value[2]) || is_callable([$value[2], '__toString']) ? (string) $value[2] : $value[2])]);
            } elseif ($value instanceof Criteria) {
                self::$instances = [];

                return;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or \DailylessonHasUser object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value, true)));
                throw $e;
            }

            unset(self::$instances[$key]);
        }
    }

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return string The primary key hash of the row
     */
    public static function getPrimaryKeyHashFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('DailylessonIdpoll', TableMap::TYPE_PHPNAME, $indexType)] === null && $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('UserIduser', TableMap::TYPE_PHPNAME, $indexType)] === null && $row[TableMap::TYPE_NUM == $indexType ? 4 + $offset : static::translateFieldName('QualityIdquality', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return serialize([(null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('DailylessonIdpoll', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('DailylessonIdpoll', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('DailylessonIdpoll', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('DailylessonIdpoll', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('DailylessonIdpoll', TableMap::TYPE_PHPNAME, $indexType)]), (null === $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('UserIduser', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('UserIduser', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('UserIduser', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('UserIduser', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('UserIduser', TableMap::TYPE_PHPNAME, $indexType)]), (null === $row[TableMap::TYPE_NUM == $indexType ? 4 + $offset : static::translateFieldName('QualityIdquality', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 4 + $offset : static::translateFieldName('QualityIdquality', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 4 + $offset : static::translateFieldName('QualityIdquality', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 4 + $offset : static::translateFieldName('QualityIdquality', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 4 + $offset : static::translateFieldName('QualityIdquality', TableMap::TYPE_PHPNAME, $indexType)])]);
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
            $pks = [];

        $pks[] = (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('DailylessonIdpoll', TableMap::TYPE_PHPNAME, $indexType)
        ];
        $pks[] = (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 1 + $offset
                : self::translateFieldName('UserIduser', TableMap::TYPE_PHPNAME, $indexType)
        ];
        $pks[] = (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 4 + $offset
                : self::translateFieldName('QualityIdquality', TableMap::TYPE_PHPNAME, $indexType)
        ];

        return $pks;
    }

    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param boolean $withPrefix Whether or not to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass($withPrefix = true)
    {
        return $withPrefix ? DailylessonHasUserTableMap::CLASS_DEFAULT : DailylessonHasUserTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array  $row       row returned by DataFetcher->fetch().
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return array           (DailylessonHasUser object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = DailylessonHasUserTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = DailylessonHasUserTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + DailylessonHasUserTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = DailylessonHasUserTableMap::OM_CLASS;
            /** @var DailylessonHasUser $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            DailylessonHasUserTableMap::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = DailylessonHasUserTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = DailylessonHasUserTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var DailylessonHasUser $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                DailylessonHasUserTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param Criteria $criteria object containing the columns to add.
     * @param string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(DailylessonHasUserTableMap::COL_DAILYLESSON_IDPOLL);
            $criteria->addSelectColumn(DailylessonHasUserTableMap::COL_USER_IDUSER);
            $criteria->addSelectColumn(DailylessonHasUserTableMap::COL_DATE);
            $criteria->addSelectColumn(DailylessonHasUserTableMap::COL_COMMENTS);
            $criteria->addSelectColumn(DailylessonHasUserTableMap::COL_QUALITY_IDQUALITY);
        } else {
            $criteria->addSelectColumn($alias . '.DailyLesson_idPoll');
            $criteria->addSelectColumn($alias . '.User_idUser');
            $criteria->addSelectColumn($alias . '.date');
            $criteria->addSelectColumn($alias . '.comments');
            $criteria->addSelectColumn($alias . '.Quality_idquality');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getServiceContainer()->getDatabaseMap(DailylessonHasUserTableMap::DATABASE_NAME)->getTable(DailylessonHasUserTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(DailylessonHasUserTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(DailylessonHasUserTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new DailylessonHasUserTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a DailylessonHasUser or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or DailylessonHasUser object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param  ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(DailylessonHasUserTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \DailylessonHasUser) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(DailylessonHasUserTableMap::DATABASE_NAME);
            // primary key is composite; we therefore, expect
            // the primary key passed to be an array of pkey values
            if (count($values) == count($values, COUNT_RECURSIVE)) {
                // array is not multi-dimensional
                $values = array($values);
            }
            foreach ($values as $value) {
                $criterion = $criteria->getNewCriterion(DailylessonHasUserTableMap::COL_DAILYLESSON_IDPOLL, $value[0]);
                $criterion->addAnd($criteria->getNewCriterion(DailylessonHasUserTableMap::COL_USER_IDUSER, $value[1]));
                $criterion->addAnd($criteria->getNewCriterion(DailylessonHasUserTableMap::COL_QUALITY_IDQUALITY, $value[2]));
                $criteria->addOr($criterion);
            }
        }

        $query = DailylessonHasUserQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            DailylessonHasUserTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                DailylessonHasUserTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the DailyLesson_has_User table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return DailylessonHasUserQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a DailylessonHasUser or Criteria object.
     *
     * @param mixed               $criteria Criteria or DailylessonHasUser object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(DailylessonHasUserTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from DailylessonHasUser object
        }


        // Set the correct dbName
        $query = DailylessonHasUserQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // DailylessonHasUserTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
DailylessonHasUserTableMap::buildTableMap();
