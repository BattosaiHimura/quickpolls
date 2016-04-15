<?php

namespace Map;

use \Actual_pwd;
use \Actual_pwdQuery;
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
 * This class defines the structure of the 'Actual_pwd' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class Actual_pwdTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.Actual_pwdTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'Actual_pwd';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Actual_pwd';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Actual_pwd';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 12;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 12;

    /**
     * the column name for the idUser field
     */
    const COL_IDUSER = 'Actual_pwd.idUser';

    /**
     * the column name for the name field
     */
    const COL_NAME = 'Actual_pwd.name';

    /**
     * the column name for the surname field
     */
    const COL_SURNAME = 'Actual_pwd.surname';

    /**
     * the column name for the matricola field
     */
    const COL_MATRICOLA = 'Actual_pwd.matricola';

    /**
     * the column name for the UserType_idUserType field
     */
    const COL_USERTYPE_IDUSERTYPE = 'Actual_pwd.UserType_idUserType';

    /**
     * the column name for the email field
     */
    const COL_EMAIL = 'Actual_pwd.email';

    /**
     * the column name for the User_idUser field
     */
    const COL_USER_IDUSER = 'Actual_pwd.User_idUser';

    /**
     * the column name for the Pwd_idPwd field
     */
    const COL_PWD_IDPWD = 'Actual_pwd.Pwd_idPwd';

    /**
     * the column name for the dateFrom field
     */
    const COL_DATEFROM = 'Actual_pwd.dateFrom';

    /**
     * the column name for the dateTo field
     */
    const COL_DATETO = 'Actual_pwd.dateTo';

    /**
     * the column name for the idPwd field
     */
    const COL_IDPWD = 'Actual_pwd.idPwd';

    /**
     * the column name for the pwd field
     */
    const COL_PWD = 'Actual_pwd.pwd';

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
        self::TYPE_PHPNAME       => array('Iduser', 'Name', 'Surname', 'Matricola', 'UsertypeIdusertype', 'Email', 'UserIduser', 'PwdIdpwd', 'Datefrom', 'Dateto', 'Idpwd', 'Pwd', ),
        self::TYPE_CAMELNAME     => array('iduser', 'name', 'surname', 'matricola', 'usertypeIdusertype', 'email', 'userIduser', 'pwdIdpwd', 'datefrom', 'dateto', 'idpwd', 'pwd', ),
        self::TYPE_COLNAME       => array(Actual_pwdTableMap::COL_IDUSER, Actual_pwdTableMap::COL_NAME, Actual_pwdTableMap::COL_SURNAME, Actual_pwdTableMap::COL_MATRICOLA, Actual_pwdTableMap::COL_USERTYPE_IDUSERTYPE, Actual_pwdTableMap::COL_EMAIL, Actual_pwdTableMap::COL_USER_IDUSER, Actual_pwdTableMap::COL_PWD_IDPWD, Actual_pwdTableMap::COL_DATEFROM, Actual_pwdTableMap::COL_DATETO, Actual_pwdTableMap::COL_IDPWD, Actual_pwdTableMap::COL_PWD, ),
        self::TYPE_FIELDNAME     => array('idUser', 'name', 'surname', 'matricola', 'UserType_idUserType', 'email', 'User_idUser', 'Pwd_idPwd', 'dateFrom', 'dateTo', 'idPwd', 'pwd', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Iduser' => 0, 'Name' => 1, 'Surname' => 2, 'Matricola' => 3, 'UsertypeIdusertype' => 4, 'Email' => 5, 'UserIduser' => 6, 'PwdIdpwd' => 7, 'Datefrom' => 8, 'Dateto' => 9, 'Idpwd' => 10, 'Pwd' => 11, ),
        self::TYPE_CAMELNAME     => array('iduser' => 0, 'name' => 1, 'surname' => 2, 'matricola' => 3, 'usertypeIdusertype' => 4, 'email' => 5, 'userIduser' => 6, 'pwdIdpwd' => 7, 'datefrom' => 8, 'dateto' => 9, 'idpwd' => 10, 'pwd' => 11, ),
        self::TYPE_COLNAME       => array(Actual_pwdTableMap::COL_IDUSER => 0, Actual_pwdTableMap::COL_NAME => 1, Actual_pwdTableMap::COL_SURNAME => 2, Actual_pwdTableMap::COL_MATRICOLA => 3, Actual_pwdTableMap::COL_USERTYPE_IDUSERTYPE => 4, Actual_pwdTableMap::COL_EMAIL => 5, Actual_pwdTableMap::COL_USER_IDUSER => 6, Actual_pwdTableMap::COL_PWD_IDPWD => 7, Actual_pwdTableMap::COL_DATEFROM => 8, Actual_pwdTableMap::COL_DATETO => 9, Actual_pwdTableMap::COL_IDPWD => 10, Actual_pwdTableMap::COL_PWD => 11, ),
        self::TYPE_FIELDNAME     => array('idUser' => 0, 'name' => 1, 'surname' => 2, 'matricola' => 3, 'UserType_idUserType' => 4, 'email' => 5, 'User_idUser' => 6, 'Pwd_idPwd' => 7, 'dateFrom' => 8, 'dateTo' => 9, 'idPwd' => 10, 'pwd' => 11, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
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
        $this->setName('Actual_pwd');
        $this->setPhpName('Actual_pwd');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Actual_pwd');
        $this->setPackage('');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('idUser', 'Iduser', 'INTEGER', true, null, null);
        $this->addColumn('name', 'Name', 'VARCHAR', true, 45, null);
        $this->addColumn('surname', 'Surname', 'VARCHAR', true, 45, null);
        $this->addColumn('matricola', 'Matricola', 'VARCHAR', false, 10, null);
        $this->addColumn('UserType_idUserType', 'UsertypeIdusertype', 'INTEGER', true, null, null);
        $this->addColumn('email', 'Email', 'VARCHAR', false, 100, null);
        $this->addColumn('User_idUser', 'UserIduser', 'INTEGER', true, null, null);
        $this->addColumn('Pwd_idPwd', 'PwdIdpwd', 'INTEGER', true, null, null);
        $this->addColumn('dateFrom', 'Datefrom', 'TIMESTAMP', true, null, null);
        $this->addColumn('dateTo', 'Dateto', 'TIMESTAMP', true, null, null);
        $this->addPrimaryKey('idPwd', 'Idpwd', 'INTEGER', true, null, null);
        $this->addColumn('pwd', 'Pwd', 'CHAR', true, 64, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

    /**
     * Adds an object to the instance pool.
     *
     * Propel keeps cached copies of objects in an instance pool when they are retrieved
     * from the database. In some cases you may need to explicitly add objects
     * to the cache in order to ensure that the same objects are always returned by find*()
     * and findPk*() calls.
     *
     * @param \Actual_pwd $obj A \Actual_pwd object.
     * @param string $key             (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (null === $key) {
                $key = serialize([(null === $obj->getIduser() || is_scalar($obj->getIduser()) || is_callable([$obj->getIduser(), '__toString']) ? (string) $obj->getIduser() : $obj->getIduser()), (null === $obj->getIdpwd() || is_scalar($obj->getIdpwd()) || is_callable([$obj->getIdpwd(), '__toString']) ? (string) $obj->getIdpwd() : $obj->getIdpwd())]);
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
     * @param mixed $value A \Actual_pwd object or a primary key value.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && null !== $value) {
            if (is_object($value) && $value instanceof \Actual_pwd) {
                $key = serialize([(null === $value->getIduser() || is_scalar($value->getIduser()) || is_callable([$value->getIduser(), '__toString']) ? (string) $value->getIduser() : $value->getIduser()), (null === $value->getIdpwd() || is_scalar($value->getIdpwd()) || is_callable([$value->getIdpwd(), '__toString']) ? (string) $value->getIdpwd() : $value->getIdpwd())]);

            } elseif (is_array($value) && count($value) === 2) {
                // assume we've been passed a primary key";
                $key = serialize([(null === $value[0] || is_scalar($value[0]) || is_callable([$value[0], '__toString']) ? (string) $value[0] : $value[0]), (null === $value[1] || is_scalar($value[1]) || is_callable([$value[1], '__toString']) ? (string) $value[1] : $value[1])]);
            } elseif ($value instanceof Criteria) {
                self::$instances = [];

                return;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or \Actual_pwd object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value, true)));
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Iduser', TableMap::TYPE_PHPNAME, $indexType)] === null && $row[TableMap::TYPE_NUM == $indexType ? 10 + $offset : static::translateFieldName('Idpwd', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return serialize([(null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Iduser', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Iduser', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Iduser', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Iduser', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Iduser', TableMap::TYPE_PHPNAME, $indexType)]), (null === $row[TableMap::TYPE_NUM == $indexType ? 10 + $offset : static::translateFieldName('Idpwd', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 10 + $offset : static::translateFieldName('Idpwd', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 10 + $offset : static::translateFieldName('Idpwd', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 10 + $offset : static::translateFieldName('Idpwd', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 10 + $offset : static::translateFieldName('Idpwd', TableMap::TYPE_PHPNAME, $indexType)])]);
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
                : self::translateFieldName('Iduser', TableMap::TYPE_PHPNAME, $indexType)
        ];
        $pks[] = (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 10 + $offset
                : self::translateFieldName('Idpwd', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? Actual_pwdTableMap::CLASS_DEFAULT : Actual_pwdTableMap::OM_CLASS;
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
     * @return array           (Actual_pwd object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = Actual_pwdTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = Actual_pwdTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + Actual_pwdTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = Actual_pwdTableMap::OM_CLASS;
            /** @var Actual_pwd $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            Actual_pwdTableMap::addInstanceToPool($obj, $key);
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
            $key = Actual_pwdTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = Actual_pwdTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Actual_pwd $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                Actual_pwdTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(Actual_pwdTableMap::COL_IDUSER);
            $criteria->addSelectColumn(Actual_pwdTableMap::COL_NAME);
            $criteria->addSelectColumn(Actual_pwdTableMap::COL_SURNAME);
            $criteria->addSelectColumn(Actual_pwdTableMap::COL_MATRICOLA);
            $criteria->addSelectColumn(Actual_pwdTableMap::COL_USERTYPE_IDUSERTYPE);
            $criteria->addSelectColumn(Actual_pwdTableMap::COL_EMAIL);
            $criteria->addSelectColumn(Actual_pwdTableMap::COL_USER_IDUSER);
            $criteria->addSelectColumn(Actual_pwdTableMap::COL_PWD_IDPWD);
            $criteria->addSelectColumn(Actual_pwdTableMap::COL_DATEFROM);
            $criteria->addSelectColumn(Actual_pwdTableMap::COL_DATETO);
            $criteria->addSelectColumn(Actual_pwdTableMap::COL_IDPWD);
            $criteria->addSelectColumn(Actual_pwdTableMap::COL_PWD);
        } else {
            $criteria->addSelectColumn($alias . '.idUser');
            $criteria->addSelectColumn($alias . '.name');
            $criteria->addSelectColumn($alias . '.surname');
            $criteria->addSelectColumn($alias . '.matricola');
            $criteria->addSelectColumn($alias . '.UserType_idUserType');
            $criteria->addSelectColumn($alias . '.email');
            $criteria->addSelectColumn($alias . '.User_idUser');
            $criteria->addSelectColumn($alias . '.Pwd_idPwd');
            $criteria->addSelectColumn($alias . '.dateFrom');
            $criteria->addSelectColumn($alias . '.dateTo');
            $criteria->addSelectColumn($alias . '.idPwd');
            $criteria->addSelectColumn($alias . '.pwd');
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
        return Propel::getServiceContainer()->getDatabaseMap(Actual_pwdTableMap::DATABASE_NAME)->getTable(Actual_pwdTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(Actual_pwdTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(Actual_pwdTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new Actual_pwdTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Actual_pwd or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Actual_pwd object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(Actual_pwdTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Actual_pwd) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(Actual_pwdTableMap::DATABASE_NAME);
            // primary key is composite; we therefore, expect
            // the primary key passed to be an array of pkey values
            if (count($values) == count($values, COUNT_RECURSIVE)) {
                // array is not multi-dimensional
                $values = array($values);
            }
            foreach ($values as $value) {
                $criterion = $criteria->getNewCriterion(Actual_pwdTableMap::COL_IDUSER, $value[0]);
                $criterion->addAnd($criteria->getNewCriterion(Actual_pwdTableMap::COL_IDPWD, $value[1]));
                $criteria->addOr($criterion);
            }
        }

        $query = Actual_pwdQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            Actual_pwdTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                Actual_pwdTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the Actual_pwd table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return Actual_pwdQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Actual_pwd or Criteria object.
     *
     * @param mixed               $criteria Criteria or Actual_pwd object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(Actual_pwdTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Actual_pwd object
        }


        // Set the correct dbName
        $query = Actual_pwdQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // Actual_pwdTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
Actual_pwdTableMap::buildTableMap();
