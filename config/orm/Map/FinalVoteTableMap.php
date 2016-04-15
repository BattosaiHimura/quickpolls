<?php

namespace Map;

use \FinalVote;
use \FinalVoteQuery;
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
 * This class defines the structure of the 'Final_vote' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class FinalVoteTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.FinalVoteTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'Final_vote';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\FinalVote';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'FinalVote';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 7;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 7;

    /**
     * the column name for the idFinal_vote field
     */
    const COL_IDFINAL_VOTE = 'Final_vote.idFinal_vote';

    /**
     * the column name for the comment field
     */
    const COL_COMMENT = 'Final_vote.comment';

    /**
     * the column name for the tips field
     */
    const COL_TIPS = 'Final_vote.tips';

    /**
     * the column name for the slidesPresent field
     */
    const COL_SLIDESPRESENT = 'Final_vote.slidesPresent';

    /**
     * the column name for the Quality_idquality field
     */
    const COL_QUALITY_IDQUALITY = 'Final_vote.Quality_idquality';

    /**
     * the column name for the Course_idCourse field
     */
    const COL_COURSE_IDCOURSE = 'Final_vote.Course_idCourse';

    /**
     * the column name for the User_idUser field
     */
    const COL_USER_IDUSER = 'Final_vote.User_idUser';

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
        self::TYPE_PHPNAME       => array('IdfinalVote', 'Comment', 'Tips', 'Slidespresent', 'QualityIdquality', 'CourseIdcourse', 'UserIduser', ),
        self::TYPE_CAMELNAME     => array('idfinalVote', 'comment', 'tips', 'slidespresent', 'qualityIdquality', 'courseIdcourse', 'userIduser', ),
        self::TYPE_COLNAME       => array(FinalVoteTableMap::COL_IDFINAL_VOTE, FinalVoteTableMap::COL_COMMENT, FinalVoteTableMap::COL_TIPS, FinalVoteTableMap::COL_SLIDESPRESENT, FinalVoteTableMap::COL_QUALITY_IDQUALITY, FinalVoteTableMap::COL_COURSE_IDCOURSE, FinalVoteTableMap::COL_USER_IDUSER, ),
        self::TYPE_FIELDNAME     => array('idFinal_vote', 'comment', 'tips', 'slidesPresent', 'Quality_idquality', 'Course_idCourse', 'User_idUser', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('IdfinalVote' => 0, 'Comment' => 1, 'Tips' => 2, 'Slidespresent' => 3, 'QualityIdquality' => 4, 'CourseIdcourse' => 5, 'UserIduser' => 6, ),
        self::TYPE_CAMELNAME     => array('idfinalVote' => 0, 'comment' => 1, 'tips' => 2, 'slidespresent' => 3, 'qualityIdquality' => 4, 'courseIdcourse' => 5, 'userIduser' => 6, ),
        self::TYPE_COLNAME       => array(FinalVoteTableMap::COL_IDFINAL_VOTE => 0, FinalVoteTableMap::COL_COMMENT => 1, FinalVoteTableMap::COL_TIPS => 2, FinalVoteTableMap::COL_SLIDESPRESENT => 3, FinalVoteTableMap::COL_QUALITY_IDQUALITY => 4, FinalVoteTableMap::COL_COURSE_IDCOURSE => 5, FinalVoteTableMap::COL_USER_IDUSER => 6, ),
        self::TYPE_FIELDNAME     => array('idFinal_vote' => 0, 'comment' => 1, 'tips' => 2, 'slidesPresent' => 3, 'Quality_idquality' => 4, 'Course_idCourse' => 5, 'User_idUser' => 6, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, )
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
        $this->setName('Final_vote');
        $this->setPhpName('FinalVote');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\FinalVote');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('idFinal_vote', 'IdfinalVote', 'INTEGER', true, null, null);
        $this->addColumn('comment', 'Comment', 'VARCHAR', false, 300, null);
        $this->addColumn('tips', 'Tips', 'VARCHAR', false, 300, null);
        $this->addColumn('slidesPresent', 'Slidespresent', 'BOOLEAN', false, 1, null);
        $this->addForeignKey('Quality_idquality', 'QualityIdquality', 'INTEGER', 'Quality', 'idquality', true, null, null);
        $this->addForeignKey('Course_idCourse', 'CourseIdcourse', 'INTEGER', 'Course', 'idCourse', true, null, null);
        $this->addForeignKey('User_idUser', 'UserIduser', 'INTEGER', 'User', 'idUser', true, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Course', '\\Course', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':Course_idCourse',
    1 => ':idCourse',
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdfinalVote', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdfinalVote', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdfinalVote', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdfinalVote', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdfinalVote', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdfinalVote', TableMap::TYPE_PHPNAME, $indexType)];
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
        return (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('IdfinalVote', TableMap::TYPE_PHPNAME, $indexType)
        ];
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
        return $withPrefix ? FinalVoteTableMap::CLASS_DEFAULT : FinalVoteTableMap::OM_CLASS;
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
     * @return array           (FinalVote object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = FinalVoteTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = FinalVoteTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + FinalVoteTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = FinalVoteTableMap::OM_CLASS;
            /** @var FinalVote $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            FinalVoteTableMap::addInstanceToPool($obj, $key);
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
            $key = FinalVoteTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = FinalVoteTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var FinalVote $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                FinalVoteTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(FinalVoteTableMap::COL_IDFINAL_VOTE);
            $criteria->addSelectColumn(FinalVoteTableMap::COL_COMMENT);
            $criteria->addSelectColumn(FinalVoteTableMap::COL_TIPS);
            $criteria->addSelectColumn(FinalVoteTableMap::COL_SLIDESPRESENT);
            $criteria->addSelectColumn(FinalVoteTableMap::COL_QUALITY_IDQUALITY);
            $criteria->addSelectColumn(FinalVoteTableMap::COL_COURSE_IDCOURSE);
            $criteria->addSelectColumn(FinalVoteTableMap::COL_USER_IDUSER);
        } else {
            $criteria->addSelectColumn($alias . '.idFinal_vote');
            $criteria->addSelectColumn($alias . '.comment');
            $criteria->addSelectColumn($alias . '.tips');
            $criteria->addSelectColumn($alias . '.slidesPresent');
            $criteria->addSelectColumn($alias . '.Quality_idquality');
            $criteria->addSelectColumn($alias . '.Course_idCourse');
            $criteria->addSelectColumn($alias . '.User_idUser');
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
        return Propel::getServiceContainer()->getDatabaseMap(FinalVoteTableMap::DATABASE_NAME)->getTable(FinalVoteTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(FinalVoteTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(FinalVoteTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new FinalVoteTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a FinalVote or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or FinalVote object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(FinalVoteTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \FinalVote) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(FinalVoteTableMap::DATABASE_NAME);
            $criteria->add(FinalVoteTableMap::COL_IDFINAL_VOTE, (array) $values, Criteria::IN);
        }

        $query = FinalVoteQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            FinalVoteTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                FinalVoteTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the Final_vote table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return FinalVoteQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a FinalVote or Criteria object.
     *
     * @param mixed               $criteria Criteria or FinalVote object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(FinalVoteTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from FinalVote object
        }

        if ($criteria->containsKey(FinalVoteTableMap::COL_IDFINAL_VOTE) && $criteria->keyContainsValue(FinalVoteTableMap::COL_IDFINAL_VOTE) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.FinalVoteTableMap::COL_IDFINAL_VOTE.')');
        }


        // Set the correct dbName
        $query = FinalVoteQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // FinalVoteTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
FinalVoteTableMap::buildTableMap();
