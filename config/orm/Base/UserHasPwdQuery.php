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
 * Base class that represents a query for the 'User_has_Pwd' table.
 *
 *
 *
 * @method     ChildUserHasPwdQuery orderByUserIduser($order = Criteria::ASC) Order by the User_idUser column
 * @method     ChildUserHasPwdQuery orderByPwdIdpwd($order = Criteria::ASC) Order by the Pwd_idPwd column
 * @method     ChildUserHasPwdQuery orderByDatefrom($order = Criteria::ASC) Order by the dateFrom column
 * @method     ChildUserHasPwdQuery orderByDateto($order = Criteria::ASC) Order by the dateTo column
 *
 * @method     ChildUserHasPwdQuery groupByUserIduser() Group by the User_idUser column
 * @method     ChildUserHasPwdQuery groupByPwdIdpwd() Group by the Pwd_idPwd column
 * @method     ChildUserHasPwdQuery groupByDatefrom() Group by the dateFrom column
 * @method     ChildUserHasPwdQuery groupByDateto() Group by the dateTo column
 *
 * @method     ChildUserHasPwdQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildUserHasPwdQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildUserHasPwdQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildUserHasPwdQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildUserHasPwdQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildUserHasPwdQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildUserHasPwdQuery leftJoinPwd($relationAlias = null) Adds a LEFT JOIN clause to the query using the Pwd relation
 * @method     ChildUserHasPwdQuery rightJoinPwd($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Pwd relation
 * @method     ChildUserHasPwdQuery innerJoinPwd($relationAlias = null) Adds a INNER JOIN clause to the query using the Pwd relation
 *
 * @method     ChildUserHasPwdQuery joinWithPwd($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Pwd relation
 *
 * @method     ChildUserHasPwdQuery leftJoinWithPwd() Adds a LEFT JOIN clause and with to the query using the Pwd relation
 * @method     ChildUserHasPwdQuery rightJoinWithPwd() Adds a RIGHT JOIN clause and with to the query using the Pwd relation
 * @method     ChildUserHasPwdQuery innerJoinWithPwd() Adds a INNER JOIN clause and with to the query using the Pwd relation
 *
 * @method     ChildUserHasPwdQuery leftJoinUser($relationAlias = null) Adds a LEFT JOIN clause to the query using the User relation
 * @method     ChildUserHasPwdQuery rightJoinUser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the User relation
 * @method     ChildUserHasPwdQuery innerJoinUser($relationAlias = null) Adds a INNER JOIN clause to the query using the User relation
 *
 * @method     ChildUserHasPwdQuery joinWithUser($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the User relation
 *
 * @method     ChildUserHasPwdQuery leftJoinWithUser() Adds a LEFT JOIN clause and with to the query using the User relation
 * @method     ChildUserHasPwdQuery rightJoinWithUser() Adds a RIGHT JOIN clause and with to the query using the User relation
 * @method     ChildUserHasPwdQuery innerJoinWithUser() Adds a INNER JOIN clause and with to the query using the User relation
 *
 * @method     \PwdQuery|\UserQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildUserHasPwd findOne(ConnectionInterface $con = null) Return the first ChildUserHasPwd matching the query
 * @method     ChildUserHasPwd findOneOrCreate(ConnectionInterface $con = null) Return the first ChildUserHasPwd matching the query, or a new ChildUserHasPwd object populated from the query conditions when no match is found
 *
 * @method     ChildUserHasPwd findOneByUserIduser(int $User_idUser) Return the first ChildUserHasPwd filtered by the User_idUser column
 * @method     ChildUserHasPwd findOneByPwdIdpwd(int $Pwd_idPwd) Return the first ChildUserHasPwd filtered by the Pwd_idPwd column
 * @method     ChildUserHasPwd findOneByDatefrom(string $dateFrom) Return the first ChildUserHasPwd filtered by the dateFrom column
 * @method     ChildUserHasPwd findOneByDateto(string $dateTo) Return the first ChildUserHasPwd filtered by the dateTo column *

 * @method     ChildUserHasPwd requirePk($key, ConnectionInterface $con = null) Return the ChildUserHasPwd by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUserHasPwd requireOne(ConnectionInterface $con = null) Return the first ChildUserHasPwd matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildUserHasPwd requireOneByUserIduser(int $User_idUser) Return the first ChildUserHasPwd filtered by the User_idUser column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUserHasPwd requireOneByPwdIdpwd(int $Pwd_idPwd) Return the first ChildUserHasPwd filtered by the Pwd_idPwd column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUserHasPwd requireOneByDatefrom(string $dateFrom) Return the first ChildUserHasPwd filtered by the dateFrom column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUserHasPwd requireOneByDateto(string $dateTo) Return the first ChildUserHasPwd filtered by the dateTo column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildUserHasPwd[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildUserHasPwd objects based on current ModelCriteria
 * @method     ChildUserHasPwd[]|ObjectCollection findByUserIduser(int $User_idUser) Return ChildUserHasPwd objects filtered by the User_idUser column
 * @method     ChildUserHasPwd[]|ObjectCollection findByPwdIdpwd(int $Pwd_idPwd) Return ChildUserHasPwd objects filtered by the Pwd_idPwd column
 * @method     ChildUserHasPwd[]|ObjectCollection findByDatefrom(string $dateFrom) Return ChildUserHasPwd objects filtered by the dateFrom column
 * @method     ChildUserHasPwd[]|ObjectCollection findByDateto(string $dateTo) Return ChildUserHasPwd objects filtered by the dateTo column
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
     * @param array[$User_idUser, $Pwd_idPwd] $key Primary key to use for the query
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
        $sql = 'SELECT User_idUser, Pwd_idPwd, dateFrom, dateTo FROM User_has_Pwd WHERE User_idUser = :p0 AND Pwd_idPwd = :p1';
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
        $this->addUsingAlias(UserHasPwdTableMap::COL_USER_IDUSER, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(UserHasPwdTableMap::COL_PWD_IDPWD, $key[1], Criteria::EQUAL);

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
            $cton0 = $this->getNewCriterion(UserHasPwdTableMap::COL_USER_IDUSER, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(UserHasPwdTableMap::COL_PWD_IDPWD, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the User_idUser column
     *
     * Example usage:
     * <code>
     * $query->filterByUserIduser(1234); // WHERE User_idUser = 1234
     * $query->filterByUserIduser(array(12, 34)); // WHERE User_idUser IN (12, 34)
     * $query->filterByUserIduser(array('min' => 12)); // WHERE User_idUser > 12
     * </code>
     *
     * @see       filterByUser()
     *
     * @param     mixed $userIduser The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUserHasPwdQuery The current query, for fluid interface
     */
    public function filterByUserIduser($userIduser = null, $comparison = null)
    {
        if (is_array($userIduser)) {
            $useMinMax = false;
            if (isset($userIduser['min'])) {
                $this->addUsingAlias(UserHasPwdTableMap::COL_USER_IDUSER, $userIduser['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($userIduser['max'])) {
                $this->addUsingAlias(UserHasPwdTableMap::COL_USER_IDUSER, $userIduser['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UserHasPwdTableMap::COL_USER_IDUSER, $userIduser, $comparison);
    }

    /**
     * Filter the query on the Pwd_idPwd column
     *
     * Example usage:
     * <code>
     * $query->filterByPwdIdpwd(1234); // WHERE Pwd_idPwd = 1234
     * $query->filterByPwdIdpwd(array(12, 34)); // WHERE Pwd_idPwd IN (12, 34)
     * $query->filterByPwdIdpwd(array('min' => 12)); // WHERE Pwd_idPwd > 12
     * </code>
     *
     * @see       filterByPwd()
     *
     * @param     mixed $pwdIdpwd The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUserHasPwdQuery The current query, for fluid interface
     */
    public function filterByPwdIdpwd($pwdIdpwd = null, $comparison = null)
    {
        if (is_array($pwdIdpwd)) {
            $useMinMax = false;
            if (isset($pwdIdpwd['min'])) {
                $this->addUsingAlias(UserHasPwdTableMap::COL_PWD_IDPWD, $pwdIdpwd['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pwdIdpwd['max'])) {
                $this->addUsingAlias(UserHasPwdTableMap::COL_PWD_IDPWD, $pwdIdpwd['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UserHasPwdTableMap::COL_PWD_IDPWD, $pwdIdpwd, $comparison);
    }

    /**
     * Filter the query on the dateFrom column
     *
     * Example usage:
     * <code>
     * $query->filterByDatefrom('2011-03-14'); // WHERE dateFrom = '2011-03-14'
     * $query->filterByDatefrom('now'); // WHERE dateFrom = '2011-03-14'
     * $query->filterByDatefrom(array('max' => 'yesterday')); // WHERE dateFrom > '2011-03-13'
     * </code>
     *
     * @param     mixed $datefrom The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUserHasPwdQuery The current query, for fluid interface
     */
    public function filterByDatefrom($datefrom = null, $comparison = null)
    {
        if (is_array($datefrom)) {
            $useMinMax = false;
            if (isset($datefrom['min'])) {
                $this->addUsingAlias(UserHasPwdTableMap::COL_DATEFROM, $datefrom['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($datefrom['max'])) {
                $this->addUsingAlias(UserHasPwdTableMap::COL_DATEFROM, $datefrom['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UserHasPwdTableMap::COL_DATEFROM, $datefrom, $comparison);
    }

    /**
     * Filter the query on the dateTo column
     *
     * Example usage:
     * <code>
     * $query->filterByDateto('2011-03-14'); // WHERE dateTo = '2011-03-14'
     * $query->filterByDateto('now'); // WHERE dateTo = '2011-03-14'
     * $query->filterByDateto(array('max' => 'yesterday')); // WHERE dateTo > '2011-03-13'
     * </code>
     *
     * @param     mixed $dateto The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUserHasPwdQuery The current query, for fluid interface
     */
    public function filterByDateto($dateto = null, $comparison = null)
    {
        if (is_array($dateto)) {
            $useMinMax = false;
            if (isset($dateto['min'])) {
                $this->addUsingAlias(UserHasPwdTableMap::COL_DATETO, $dateto['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateto['max'])) {
                $this->addUsingAlias(UserHasPwdTableMap::COL_DATETO, $dateto['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UserHasPwdTableMap::COL_DATETO, $dateto, $comparison);
    }

    /**
     * Filter the query by a related \Pwd object
     *
     * @param \Pwd|ObjectCollection $pwd The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildUserHasPwdQuery The current query, for fluid interface
     */
    public function filterByPwd($pwd, $comparison = null)
    {
        if ($pwd instanceof \Pwd) {
            return $this
                ->addUsingAlias(UserHasPwdTableMap::COL_PWD_IDPWD, $pwd->getIdpwd(), $comparison);
        } elseif ($pwd instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(UserHasPwdTableMap::COL_PWD_IDPWD, $pwd->toKeyValue('PrimaryKey', 'Idpwd'), $comparison);
        } else {
            throw new PropelException('filterByPwd() only accepts arguments of type \Pwd or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Pwd relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildUserHasPwdQuery The current query, for fluid interface
     */
    public function joinPwd($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Pwd');

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
            $this->addJoinObject($join, 'Pwd');
        }

        return $this;
    }

    /**
     * Use the Pwd relation Pwd object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \PwdQuery A secondary query class using the current class as primary query
     */
    public function usePwdQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPwd($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Pwd', '\PwdQuery');
    }

    /**
     * Filter the query by a related \User object
     *
     * @param \User|ObjectCollection $user The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildUserHasPwdQuery The current query, for fluid interface
     */
    public function filterByUser($user, $comparison = null)
    {
        if ($user instanceof \User) {
            return $this
                ->addUsingAlias(UserHasPwdTableMap::COL_USER_IDUSER, $user->getIduser(), $comparison);
        } elseif ($user instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(UserHasPwdTableMap::COL_USER_IDUSER, $user->toKeyValue('PrimaryKey', 'Iduser'), $comparison);
        } else {
            throw new PropelException('filterByUser() only accepts arguments of type \User or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the User relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildUserHasPwdQuery The current query, for fluid interface
     */
    public function joinUser($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('User');

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
            $this->addJoinObject($join, 'User');
        }

        return $this;
    }

    /**
     * Use the User relation User object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \UserQuery A secondary query class using the current class as primary query
     */
    public function useUserQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinUser($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'User', '\UserQuery');
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
            $this->addCond('pruneCond0', $this->getAliasedColName(UserHasPwdTableMap::COL_USER_IDUSER), $userHasPwd->getUserIduser(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(UserHasPwdTableMap::COL_PWD_IDPWD), $userHasPwd->getPwdIdpwd(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the User_has_Pwd table.
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
