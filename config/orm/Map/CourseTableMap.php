<?php

namespace Map;

use \Course;
use \CourseQuery;
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
 * This class defines the structure of the 'Course' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class CourseTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.CourseTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'Course';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Course';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Course';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 6;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 6;

    /**
     * the column name for the idCourse field
     */
    const COL_IDCOURSE = 'Course.idCourse';

    /**
     * the column name for the dateFrom field
     */
    const COL_DATEFROM = 'Course.dateFrom';

    /**
     * the column name for the dateTo field
     */
    const COL_DATETO = 'Course.dateTo';

    /**
     * the column name for the name field
     */
    const COL_NAME = 'Course.name';

    /**
     * the column name for the description field
     */
    const COL_DESCRIPTION = 'Course.description';

    /**
     * the column name for the session field
     */
    const COL_SESSION = 'Course.session';

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
        self::TYPE_PHPNAME       => array('Idcourse', 'Datefrom', 'Dateto', 'Name', 'Description', 'Session', ),
        self::TYPE_CAMELNAME     => array('idcourse', 'datefrom', 'dateto', 'name', 'description', 'session', ),
        self::TYPE_COLNAME       => array(CourseTableMap::COL_IDCOURSE, CourseTableMap::COL_DATEFROM, CourseTableMap::COL_DATETO, CourseTableMap::COL_NAME, CourseTableMap::COL_DESCRIPTION, CourseTableMap::COL_SESSION, ),
        self::TYPE_FIELDNAME     => array('idCourse', 'dateFrom', 'dateTo', 'name', 'description', 'session', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Idcourse' => 0, 'Datefrom' => 1, 'Dateto' => 2, 'Name' => 3, 'Description' => 4, 'Session' => 5, ),
        self::TYPE_CAMELNAME     => array('idcourse' => 0, 'datefrom' => 1, 'dateto' => 2, 'name' => 3, 'description' => 4, 'session' => 5, ),
        self::TYPE_COLNAME       => array(CourseTableMap::COL_IDCOURSE => 0, CourseTableMap::COL_DATEFROM => 1, CourseTableMap::COL_DATETO => 2, CourseTableMap::COL_NAME => 3, CourseTableMap::COL_DESCRIPTION => 4, CourseTableMap::COL_SESSION => 5, ),
        self::TYPE_FIELDNAME     => array('idCourse' => 0, 'dateFrom' => 1, 'dateTo' => 2, 'name' => 3, 'description' => 4, 'session' => 5, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, )
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
        $this->setName('Course');
        $this->setPhpName('Course');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Course');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('idCourse', 'Idcourse', 'INTEGER', true, null, null);
        $this->addColumn('dateFrom', 'Datefrom', 'TIMESTAMP', true, null, null);
        $this->addColumn('dateTo', 'Dateto', 'TIMESTAMP', true, null, null);
        $this->addColumn('name', 'Name', 'VARCHAR', true, 45, null);
        $this->addColumn('description', 'Description', 'VARCHAR', true, 300, null);
        $this->addColumn('session', 'Session', 'VARCHAR', true, 45, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Argument', '\\Argument', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':Course_idCourse',
    1 => ':idCourse',
  ),
), null, null, 'Arguments', false);
        $this->addRelation('FinalVote', '\\FinalVote', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':Course_idCourse',
    1 => ':idCourse',
  ),
), null, null, 'FinalVotes', false);
        $this->addRelation('ProfHasCourse', '\\ProfHasCourse', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':Course_idCourse',
    1 => ':idCourse',
  ),
), null, null, 'ProfHasCourses', false);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Idcourse', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Idcourse', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Idcourse', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Idcourse', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Idcourse', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Idcourse', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('Idcourse', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? CourseTableMap::CLASS_DEFAULT : CourseTableMap::OM_CLASS;
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
     * @return array           (Course object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = CourseTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = CourseTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + CourseTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = CourseTableMap::OM_CLASS;
            /** @var Course $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            CourseTableMap::addInstanceToPool($obj, $key);
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
            $key = CourseTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = CourseTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Course $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                CourseTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(CourseTableMap::COL_IDCOURSE);
            $criteria->addSelectColumn(CourseTableMap::COL_DATEFROM);
            $criteria->addSelectColumn(CourseTableMap::COL_DATETO);
            $criteria->addSelectColumn(CourseTableMap::COL_NAME);
            $criteria->addSelectColumn(CourseTableMap::COL_DESCRIPTION);
            $criteria->addSelectColumn(CourseTableMap::COL_SESSION);
        } else {
            $criteria->addSelectColumn($alias . '.idCourse');
            $criteria->addSelectColumn($alias . '.dateFrom');
            $criteria->addSelectColumn($alias . '.dateTo');
            $criteria->addSelectColumn($alias . '.name');
            $criteria->addSelectColumn($alias . '.description');
            $criteria->addSelectColumn($alias . '.session');
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
        return Propel::getServiceContainer()->getDatabaseMap(CourseTableMap::DATABASE_NAME)->getTable(CourseTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(CourseTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(CourseTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new CourseTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Course or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Course object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(CourseTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Course) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(CourseTableMap::DATABASE_NAME);
            $criteria->add(CourseTableMap::COL_IDCOURSE, (array) $values, Criteria::IN);
        }

        $query = CourseQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            CourseTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                CourseTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the Course table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return CourseQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Course or Criteria object.
     *
     * @param mixed               $criteria Criteria or Course object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CourseTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Course object
        }

        if ($criteria->containsKey(CourseTableMap::COL_IDCOURSE) && $criteria->keyContainsValue(CourseTableMap::COL_IDCOURSE) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.CourseTableMap::COL_IDCOURSE.')');
        }


        // Set the correct dbName
        $query = CourseQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // CourseTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
CourseTableMap::buildTableMap();
