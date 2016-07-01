<?php

namespace Base;

use \UserHasPwd as ChildUserHasPwd;
use \UserHasPwdQuery as ChildUserHasPwdQuery;
use \Exception;
use \PDO;
use Map\UserHasPwdTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'user_has_pwd' table.
 *
 *
 *
 * @method     ChildUserHasPwdQuery orderByUserId($order = Criteria::ASC) Order by the user_id column
 * @method     ChildUserHasPwdQuery orderByPwdId($order = Criteria::ASC) Order by the pwd_id column
 * @method     ChildUserHasPwdQuery orderByDateFrom($order = Criteria::ASC) Order by the date_from column
 * @method     ChildUserHasPwdQuery orderByDateTo($order = Criteria::ASC) Order by the date_to column
 *
 * @method     ChildUserHasPwdQuery groupByUserId() Group by the user_id column
 * @method     ChildUserHasPwdQuery groupByPwdId() Group by the pwd_id column
 * @method     ChildUserHasPwdQuery groupByDateFrom() Group by the date_from column
 * @method     ChildUserHasPwdQuery groupByDateTo() Group by the date_to column
 *
 * @method     ChildUserHasPwdQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildUserHasPwdQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildUserHasPwdQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildUserHasPwdQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildUserHasPwdQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildUserHasPwdQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildUserHasPwdQuery leftJoinUsers($relationAlias = null) Adds a LEFT JOIN clause to the query using the Users relation
 * @method     ChildUserHasPwdQuery rightJoinUsers($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Users relation
 * @method     ChildUserHasPwdQuery innerJoinUsers($relationAlias = null) Adds a INNER JOIN clause to the query using the Users relation
 *
 * @method     ChildUserHasPwdQuery joinWithUsers($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Users relation
 *
 * @method     ChildUserHasPwdQuery leftJoinWithUsers() Adds a LEFT JOIN clause and with to the query using the Users relation
 * @method     ChildUserHasPwdQuery rightJoinWithUsers() Adds a RIGHT JOIN clause and with to the query using the Users relation
 * @method     ChildUserHasPwdQuery innerJoinWithUsers() Adds a INNER JOIN clause and with to the query using the Users relation
 *
 * @method     ChildUserHasPwdQuery leftJoinPwds($relationAlias = null) Adds a LEFT JOIN clause to the query using the Pwds relation
 * @method     ChildUserHasPwdQuery rightJoinPwds($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Pwds relation
 * @method     ChildUserHasPwdQuery innerJoinPwds($relationAlias = null) Adds a INNER JOIN clause to the query using the Pwds relation
 *
 * @method     ChildUserHasPwdQuery joinWithPwds($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Pwds relation
 *
 * @method     ChildUserHasPwdQuery leftJoinWithPwds() Adds a LEFT JOIN clause and with to the query using the Pwds relation
 * @method     ChildUserHasPwdQuery rightJoinWithPwds() Adds a RIGHT JOIN clause and with to the query using the Pwds relation
 * @method     ChildUserHasPwdQuery innerJoinWithPwds() Adds a INNER JOIN clause and with to the query using the Pwds relation
 *
 * @method     \UsersQuery|\PwdsQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildUserHasPwd findOne(ConnectionInterface $con = null) Return the first ChildUserHasPwd matching the query
 * @method     ChildUserHasPwd findOneOrCreate(ConnectionInterface $con = null) Return the first ChildUserHasPwd matching the query, or a new ChildUserHasPwd object populated from the query conditions when no match is found
 *
 * @method     ChildUserHasPwd findOneByUserId(int $user_id) Return the first ChildUserHasPwd filtered by the user_id column
 * @method     ChildUserHasPwd findOneByPwdId(int $pwd_id) Return the first ChildUserHasPwd filtered by the pwd_id column
 * @method     ChildUserHasPwd findOneByDateFrom(string $date_from) Return the first ChildUserHasPwd filtered by the date_from column
 * @method     ChildUserHasPwd findOneByDateTo(string $date_to) Return the first ChildUserHasPwd filtered by the date_to column *

 * @method     ChildUserHasPwd requirePk($key, ConnectionInterface $con = null) Return the ChildUserHasPwd by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUserHasPwd requireOne(ConnectionInterface $con = null) Return the first ChildUserHasPwd matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildUserHasPwd requireOneByUserId(int $user_id) Return the first ChildUserHasPwd filtered by the user_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUserHasPwd requireOneByPwdId(int $pwd_id) Return the first ChildUserHasPwd filtered by the pwd_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUserHasPwd requireOneByDateFrom(string $date_from) Return the first ChildUserHasPwd filtered by the date_from column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUserHasPwd requireOneByDateTo(string $date_to) Return the first ChildUserHasPwd filtered by the date_to column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildUserHasPwd[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildUserHasPwd objects based on current ModelCriteria
 * @method     ChildUserHasPwd[]|ObjectCollection findByUserId(int $user_id) Return ChildUserHasPwd objects filtered by the user_id column
 * @method     ChildUserHasPwd[]|ObjectCollection findByPwdId(int $pwd_id) Return ChildUserHasPwd objects filtered by the pwd_id column
 * @method     ChildUserHasPwd[]|ObjectCollection findByDateFrom(string $date_from) Return ChildUserHasPwd objects filtered by the date_from column
 * @method     ChildUserHasPwd[]|ObjectCollection findByDateTo(string $date_to) Return ChildUserHasPwd objects filtered by the date_to column
 * @method     ChildUserHasPwd[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class UserHasPwdQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\UserHasPwdQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\UserHasPwd', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildUserHasPwdQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildUserHasPwdQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildUserHasPwdQuery) {
            return $criteria;
        }
        $query = new ChildUserHasPwdQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj = $c->findPk(array(12, 34), $con);
     * </code>
     *
     * @param array[$user_id, $pwd_id] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildUserHasPwd|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(UserHasPwdTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = UserHasPwdTableMap::getInstanceFromPool(serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]))))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildUserHasPwd A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT user_id, pwd_id, date_from, date_to FROM user_has_pwd WHERE user_id = :p0 AND pwd_id = :p1';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_INT);
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildUserHasPwd $obj */
            $obj = new ChildUserHasPwd();
            $obj->hydrate($row);
            UserHasPwdTableMap::addInstanceToPool($obj, serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]));
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildUserHasPwd|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildUserHasPwdQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(UserHasPwdTableMap::COL_USER_ID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(UserHasPwdTableMap::COL_PWD_ID, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildUserHasPwdQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(UserHasPwdTableMap::COL_USER_ID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(UserHasPwdTableMap::COL_PWD_ID, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the user_id column
     *
     * Example usage:
     * <code>
     * $query->filterByUserId(1234); // WHERE user_id = 1234
     * $query->filterByUserId(array(12, 34)); // WHERE user_id IN (12, 34)
     * $query->filterByUserId(array('min' => 12)); // WHERE user_id > 12
     * </code>
     *
     * @see       filterByUsers()
     *
     * @param     mixed $userId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUserHasPwdQuery The current query, for fluid interface
     */
    public function filterByUserId($userId = null, $comparison = null)
    {
        if (is_array($userId)) {
            $useMinMax = false;
            if (isset($userId['min'])) {
                $this->addUsingAlias(UserHasPwdTableMap::COL_USER_ID, $userId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($userId['max'])) {
                $this->addUsingAlias(UserHasPwdTableMap::COL_USER_ID, $userId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UserHasPwdTableMap::COL_USER_ID, $userId, $comparison);
    }

    /**
     * Filter the query on the pwd_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPwdId(1234); // WHERE pwd_id = 1234
     * $query->filterByPwdId(array(12, 34)); // WHERE pwd_id IN (12, 34)
     * $query->filterByPwdId(array('min' => 12)); // WHERE pwd_id > 12
     * </code>
     *
     * @see       filterByPwds()
     *
     * @param     mixed $pwdId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUserHasPwdQuery The current query, for fluid interface
     */
    public function filterByPwdId($pwdId = null, $comparison = null)
    {
        if (is_array($pwdId)) {
            $useMinMax = false;
            if (isset($pwdId['min'])) {
                $this->addUsingAlias(UserHasPwdTableMap::COL_PWD_ID, $pwdId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pwdId['max'])) {
                $this->addUsingAlias(UserHasPwdTableMap::COL_PWD_ID, $pwdId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UserHasPwdTableMap::COL_PWD_ID, $pwdId, $comparison);
    }

    /**
     * Filter the query on the date_from column
     *
     * Example usage:
     * <code>
     * $query->filterByDateFrom('2011-03-14'); // WHERE date_from = '2011-03-14'
     * $query->filterByDateFrom('now'); // WHERE date_from = '2011-03-14'
     * $query->filterByDateFrom(array('max' => 'yesterday')); // WHERE date_from > '2011-03-13'
     * </code>
     *
     * @param     mixed $dateFrom The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUserHasPwdQuery The current query, for fluid interface
     */
    public function filterByDateFrom($dateFrom = null, $comparison = null)
    {
        if (is_array($dateFrom)) {
            $useMinMax = false;
            if (isset($dateFrom['min'])) {
                $this->addUsingAlias(UserHasPwdTableMap::COL_DATE_FROM, $dateFrom['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateFrom['max'])) {
                $this->addUsingAlias(UserHasPwdTableMap::COL_DATE_FROM, $dateFrom['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UserHasPwdTableMap::COL_DATE_FROM, $dateFrom, $comparison);
    }

    /**
     * Filter the query on the date_to column
     *
     * Example usage:
     * <code>
     * $query->filterByDateTo('2011-03-14'); // WHERE date_to = '2011-03-14'
     * $query->filterByDateTo('now'); // WHERE date_to = '2011-03-14'
     * $query->filterByDateTo(array('max' => 'yesterday')); // WHERE date_to > '2011-03-13'
     * </code>
     *
     * @param     mixed $dateTo The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUserHasPwdQuery The current query, for fluid interface
     */
    public function filterByDateTo($dateTo = null, $comparison = null)
    {
        if (is_array($dateTo)) {
            $useMinMax = false;
            if (isset($dateTo['min'])) {
                $this->addUsingAlias(UserHasPwdTableMap::COL_DATE_TO, $dateTo['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateTo['max'])) {
                $this->addUsingAlias(UserHasPwdTableMap::COL_DATE_TO, $dateTo['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UserHasPwdTableMap::COL_DATE_TO, $dateTo, $comparison);
    }

    /**
     * Filter the query by a related \Users object
     *
     * @param \Users|ObjectCollection $users The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildUserHasPwdQuery The current query, for fluid interface
     */
    public function filterByUsers($users, $comparison = null)
    {
        if ($users instanceof \Users) {
            return $this
                ->addUsingAlias(UserHasPwdTableMap::COL_USER_ID, $users->getId(), $comparison);
        } elseif ($users instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(UserHasPwdTableMap::COL_USER_ID, $users->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByUsers() only accepts arguments of type \Users or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Users relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildUserHasPwdQuery The current query, for fluid interface
     */
    public function joinUsers($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Users');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Users');
        }

        return $this;
    }

    /**
     * Use the Users relation Users object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \UsersQuery A secondary query class using the current class as primary query
     */
    public function useUsersQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinUsers($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Users', '\UsersQuery');
    }

    /**
     * Filter the query by a related \Pwds object
     *
     * @param \Pwds|ObjectCollection $pwds The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildUserHasPwdQuery The current query, for fluid interface
     */
    public function filterByPwds($pwds, $comparison = null)
    {
        if ($pwds instanceof \Pwds) {
            return $this
                ->addUsingAlias(UserHasPwdTableMap::COL_PWD_ID, $pwds->getId(), $comparison);
        } elseif ($pwds instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(UserHasPwdTableMap::COL_PWD_ID, $pwds->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByPwds() only accepts arguments of type \Pwds or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Pwds relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildUserHasPwdQuery The current query, for fluid interface
     */
    public function joinPwds($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Pwds');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Pwds');
        }

        return $this;
    }

    /**
     * Use the Pwds relation Pwds object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \PwdsQuery A secondary query class using the current class as primary query
     */
    public function usePwdsQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPwds($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Pwds', '\PwdsQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildUserHasPwd $userHasPwd Object to remove from the list of results
     *
     * @return $this|ChildUserHasPwdQuery The current query, for fluid interface
     */
    public function prune($userHasPwd = null)
    {
        if ($userHasPwd) {
            $this->addCond('pruneCond0', $this->getAliasedColName(UserHasPwdTableMap::COL_USER_ID), $userHasPwd->getUserId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(UserHasPwdTableMap::COL_PWD_ID), $userHasPwd->getPwdId(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the user_has_pwd table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(UserHasPwdTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            UserHasPwdTableMap::clearInstancePool();
            UserHasPwdTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(UserHasPwdTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(UserHasPwdTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            UserHasPwdTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            UserHasPwdTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // UserHasPwdQuery
