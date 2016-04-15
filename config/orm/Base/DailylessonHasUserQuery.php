<?php

namespace Base;

use \DailylessonHasUser as ChildDailylessonHasUser;
use \DailylessonHasUserQuery as ChildDailylessonHasUserQuery;
use \Exception;
use \PDO;
use Map\DailylessonHasUserTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'DailyLesson_has_User' table.
 *
 *
 *
 * @method     ChildDailylessonHasUserQuery orderByDailylessonIdpoll($order = Criteria::ASC) Order by the DailyLesson_idPoll column
 * @method     ChildDailylessonHasUserQuery orderByUserIduser($order = Criteria::ASC) Order by the User_idUser column
 * @method     ChildDailylessonHasUserQuery orderByDate($order = Criteria::ASC) Order by the date column
 * @method     ChildDailylessonHasUserQuery orderByComments($order = Criteria::ASC) Order by the comments column
 * @method     ChildDailylessonHasUserQuery orderByQualityIdquality($order = Criteria::ASC) Order by the Quality_idquality column
 *
 * @method     ChildDailylessonHasUserQuery groupByDailylessonIdpoll() Group by the DailyLesson_idPoll column
 * @method     ChildDailylessonHasUserQuery groupByUserIduser() Group by the User_idUser column
 * @method     ChildDailylessonHasUserQuery groupByDate() Group by the date column
 * @method     ChildDailylessonHasUserQuery groupByComments() Group by the comments column
 * @method     ChildDailylessonHasUserQuery groupByQualityIdquality() Group by the Quality_idquality column
 *
 * @method     ChildDailylessonHasUserQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildDailylessonHasUserQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildDailylessonHasUserQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildDailylessonHasUserQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildDailylessonHasUserQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildDailylessonHasUserQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildDailylessonHasUserQuery leftJoinDailylesson($relationAlias = null) Adds a LEFT JOIN clause to the query using the Dailylesson relation
 * @method     ChildDailylessonHasUserQuery rightJoinDailylesson($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Dailylesson relation
 * @method     ChildDailylessonHasUserQuery innerJoinDailylesson($relationAlias = null) Adds a INNER JOIN clause to the query using the Dailylesson relation
 *
 * @method     ChildDailylessonHasUserQuery joinWithDailylesson($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Dailylesson relation
 *
 * @method     ChildDailylessonHasUserQuery leftJoinWithDailylesson() Adds a LEFT JOIN clause and with to the query using the Dailylesson relation
 * @method     ChildDailylessonHasUserQuery rightJoinWithDailylesson() Adds a RIGHT JOIN clause and with to the query using the Dailylesson relation
 * @method     ChildDailylessonHasUserQuery innerJoinWithDailylesson() Adds a INNER JOIN clause and with to the query using the Dailylesson relation
 *
 * @method     ChildDailylessonHasUserQuery leftJoinQuality($relationAlias = null) Adds a LEFT JOIN clause to the query using the Quality relation
 * @method     ChildDailylessonHasUserQuery rightJoinQuality($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Quality relation
 * @method     ChildDailylessonHasUserQuery innerJoinQuality($relationAlias = null) Adds a INNER JOIN clause to the query using the Quality relation
 *
 * @method     ChildDailylessonHasUserQuery joinWithQuality($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Quality relation
 *
 * @method     ChildDailylessonHasUserQuery leftJoinWithQuality() Adds a LEFT JOIN clause and with to the query using the Quality relation
 * @method     ChildDailylessonHasUserQuery rightJoinWithQuality() Adds a RIGHT JOIN clause and with to the query using the Quality relation
 * @method     ChildDailylessonHasUserQuery innerJoinWithQuality() Adds a INNER JOIN clause and with to the query using the Quality relation
 *
 * @method     ChildDailylessonHasUserQuery leftJoinUser($relationAlias = null) Adds a LEFT JOIN clause to the query using the User relation
 * @method     ChildDailylessonHasUserQuery rightJoinUser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the User relation
 * @method     ChildDailylessonHasUserQuery innerJoinUser($relationAlias = null) Adds a INNER JOIN clause to the query using the User relation
 *
 * @method     ChildDailylessonHasUserQuery joinWithUser($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the User relation
 *
 * @method     ChildDailylessonHasUserQuery leftJoinWithUser() Adds a LEFT JOIN clause and with to the query using the User relation
 * @method     ChildDailylessonHasUserQuery rightJoinWithUser() Adds a RIGHT JOIN clause and with to the query using the User relation
 * @method     ChildDailylessonHasUserQuery innerJoinWithUser() Adds a INNER JOIN clause and with to the query using the User relation
 *
 * @method     \DailylessonQuery|\QualityQuery|\UserQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildDailylessonHasUser findOne(ConnectionInterface $con = null) Return the first ChildDailylessonHasUser matching the query
 * @method     ChildDailylessonHasUser findOneOrCreate(ConnectionInterface $con = null) Return the first ChildDailylessonHasUser matching the query, or a new ChildDailylessonHasUser object populated from the query conditions when no match is found
 *
 * @method     ChildDailylessonHasUser findOneByDailylessonIdpoll(int $DailyLesson_idPoll) Return the first ChildDailylessonHasUser filtered by the DailyLesson_idPoll column
 * @method     ChildDailylessonHasUser findOneByUserIduser(int $User_idUser) Return the first ChildDailylessonHasUser filtered by the User_idUser column
 * @method     ChildDailylessonHasUser findOneByDate(string $date) Return the first ChildDailylessonHasUser filtered by the date column
 * @method     ChildDailylessonHasUser findOneByComments(string $comments) Return the first ChildDailylessonHasUser filtered by the comments column
 * @method     ChildDailylessonHasUser findOneByQualityIdquality(int $Quality_idquality) Return the first ChildDailylessonHasUser filtered by the Quality_idquality column *

 * @method     ChildDailylessonHasUser requirePk($key, ConnectionInterface $con = null) Return the ChildDailylessonHasUser by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDailylessonHasUser requireOne(ConnectionInterface $con = null) Return the first ChildDailylessonHasUser matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildDailylessonHasUser requireOneByDailylessonIdpoll(int $DailyLesson_idPoll) Return the first ChildDailylessonHasUser filtered by the DailyLesson_idPoll column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDailylessonHasUser requireOneByUserIduser(int $User_idUser) Return the first ChildDailylessonHasUser filtered by the User_idUser column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDailylessonHasUser requireOneByDate(string $date) Return the first ChildDailylessonHasUser filtered by the date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDailylessonHasUser requireOneByComments(string $comments) Return the first ChildDailylessonHasUser filtered by the comments column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDailylessonHasUser requireOneByQualityIdquality(int $Quality_idquality) Return the first ChildDailylessonHasUser filtered by the Quality_idquality column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildDailylessonHasUser[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildDailylessonHasUser objects based on current ModelCriteria
 * @method     ChildDailylessonHasUser[]|ObjectCollection findByDailylessonIdpoll(int $DailyLesson_idPoll) Return ChildDailylessonHasUser objects filtered by the DailyLesson_idPoll column
 * @method     ChildDailylessonHasUser[]|ObjectCollection findByUserIduser(int $User_idUser) Return ChildDailylessonHasUser objects filtered by the User_idUser column
 * @method     ChildDailylessonHasUser[]|ObjectCollection findByDate(string $date) Return ChildDailylessonHasUser objects filtered by the date column
 * @method     ChildDailylessonHasUser[]|ObjectCollection findByComments(string $comments) Return ChildDailylessonHasUser objects filtered by the comments column
 * @method     ChildDailylessonHasUser[]|ObjectCollection findByQualityIdquality(int $Quality_idquality) Return ChildDailylessonHasUser objects filtered by the Quality_idquality column
 * @method     ChildDailylessonHasUser[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class DailylessonHasUserQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\DailylessonHasUserQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\DailylessonHasUser', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildDailylessonHasUserQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildDailylessonHasUserQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildDailylessonHasUserQuery) {
            return $criteria;
        }
        $query = new ChildDailylessonHasUserQuery();
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
     * $obj = $c->findPk(array(12, 34, 56), $con);
     * </code>
     *
     * @param array[$DailyLesson_idPoll, $User_idUser, $Quality_idquality] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildDailylessonHasUser|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(DailylessonHasUserTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = DailylessonHasUserTableMap::getInstanceFromPool(serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1]), (null === $key[2] || is_scalar($key[2]) || is_callable([$key[2], '__toString']) ? (string) $key[2] : $key[2])]))))) {
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
     * @return ChildDailylessonHasUser A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT DailyLesson_idPoll, User_idUser, date, comments, Quality_idquality FROM DailyLesson_has_User WHERE DailyLesson_idPoll = :p0 AND User_idUser = :p1 AND Quality_idquality = :p2';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_INT);
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_INT);
            $stmt->bindValue(':p2', $key[2], PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildDailylessonHasUser $obj */
            $obj = new ChildDailylessonHasUser();
            $obj->hydrate($row);
            DailylessonHasUserTableMap::addInstanceToPool($obj, serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1]), (null === $key[2] || is_scalar($key[2]) || is_callable([$key[2], '__toString']) ? (string) $key[2] : $key[2])]));
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
     * @return ChildDailylessonHasUser|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildDailylessonHasUserQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(DailylessonHasUserTableMap::COL_DAILYLESSON_IDPOLL, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(DailylessonHasUserTableMap::COL_USER_IDUSER, $key[1], Criteria::EQUAL);
        $this->addUsingAlias(DailylessonHasUserTableMap::COL_QUALITY_IDQUALITY, $key[2], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildDailylessonHasUserQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(DailylessonHasUserTableMap::COL_DAILYLESSON_IDPOLL, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(DailylessonHasUserTableMap::COL_USER_IDUSER, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $cton2 = $this->getNewCriterion(DailylessonHasUserTableMap::COL_QUALITY_IDQUALITY, $key[2], Criteria::EQUAL);
            $cton0->addAnd($cton2);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the DailyLesson_idPoll column
     *
     * Example usage:
     * <code>
     * $query->filterByDailylessonIdpoll(1234); // WHERE DailyLesson_idPoll = 1234
     * $query->filterByDailylessonIdpoll(array(12, 34)); // WHERE DailyLesson_idPoll IN (12, 34)
     * $query->filterByDailylessonIdpoll(array('min' => 12)); // WHERE DailyLesson_idPoll > 12
     * </code>
     *
     * @see       filterByDailylesson()
     *
     * @param     mixed $dailylessonIdpoll The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDailylessonHasUserQuery The current query, for fluid interface
     */
    public function filterByDailylessonIdpoll($dailylessonIdpoll = null, $comparison = null)
    {
        if (is_array($dailylessonIdpoll)) {
            $useMinMax = false;
            if (isset($dailylessonIdpoll['min'])) {
                $this->addUsingAlias(DailylessonHasUserTableMap::COL_DAILYLESSON_IDPOLL, $dailylessonIdpoll['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dailylessonIdpoll['max'])) {
                $this->addUsingAlias(DailylessonHasUserTableMap::COL_DAILYLESSON_IDPOLL, $dailylessonIdpoll['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DailylessonHasUserTableMap::COL_DAILYLESSON_IDPOLL, $dailylessonIdpoll, $comparison);
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
     * @return $this|ChildDailylessonHasUserQuery The current query, for fluid interface
     */
    public function filterByUserIduser($userIduser = null, $comparison = null)
    {
        if (is_array($userIduser)) {
            $useMinMax = false;
            if (isset($userIduser['min'])) {
                $this->addUsingAlias(DailylessonHasUserTableMap::COL_USER_IDUSER, $userIduser['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($userIduser['max'])) {
                $this->addUsingAlias(DailylessonHasUserTableMap::COL_USER_IDUSER, $userIduser['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DailylessonHasUserTableMap::COL_USER_IDUSER, $userIduser, $comparison);
    }

    /**
     * Filter the query on the date column
     *
     * Example usage:
     * <code>
     * $query->filterByDate('2011-03-14'); // WHERE date = '2011-03-14'
     * $query->filterByDate('now'); // WHERE date = '2011-03-14'
     * $query->filterByDate(array('max' => 'yesterday')); // WHERE date > '2011-03-13'
     * </code>
     *
     * @param     mixed $date The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDailylessonHasUserQuery The current query, for fluid interface
     */
    public function filterByDate($date = null, $comparison = null)
    {
        if (is_array($date)) {
            $useMinMax = false;
            if (isset($date['min'])) {
                $this->addUsingAlias(DailylessonHasUserTableMap::COL_DATE, $date['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($date['max'])) {
                $this->addUsingAlias(DailylessonHasUserTableMap::COL_DATE, $date['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DailylessonHasUserTableMap::COL_DATE, $date, $comparison);
    }

    /**
     * Filter the query on the comments column
     *
     * Example usage:
     * <code>
     * $query->filterByComments('fooValue');   // WHERE comments = 'fooValue'
     * $query->filterByComments('%fooValue%'); // WHERE comments LIKE '%fooValue%'
     * </code>
     *
     * @param     string $comments The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDailylessonHasUserQuery The current query, for fluid interface
     */
    public function filterByComments($comments = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($comments)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $comments)) {
                $comments = str_replace('*', '%', $comments);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(DailylessonHasUserTableMap::COL_COMMENTS, $comments, $comparison);
    }

    /**
     * Filter the query on the Quality_idquality column
     *
     * Example usage:
     * <code>
     * $query->filterByQualityIdquality(1234); // WHERE Quality_idquality = 1234
     * $query->filterByQualityIdquality(array(12, 34)); // WHERE Quality_idquality IN (12, 34)
     * $query->filterByQualityIdquality(array('min' => 12)); // WHERE Quality_idquality > 12
     * </code>
     *
     * @see       filterByQuality()
     *
     * @param     mixed $qualityIdquality The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDailylessonHasUserQuery The current query, for fluid interface
     */
    public function filterByQualityIdquality($qualityIdquality = null, $comparison = null)
    {
        if (is_array($qualityIdquality)) {
            $useMinMax = false;
            if (isset($qualityIdquality['min'])) {
                $this->addUsingAlias(DailylessonHasUserTableMap::COL_QUALITY_IDQUALITY, $qualityIdquality['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($qualityIdquality['max'])) {
                $this->addUsingAlias(DailylessonHasUserTableMap::COL_QUALITY_IDQUALITY, $qualityIdquality['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DailylessonHasUserTableMap::COL_QUALITY_IDQUALITY, $qualityIdquality, $comparison);
    }

    /**
     * Filter the query by a related \Dailylesson object
     *
     * @param \Dailylesson|ObjectCollection $dailylesson The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildDailylessonHasUserQuery The current query, for fluid interface
     */
    public function filterByDailylesson($dailylesson, $comparison = null)
    {
        if ($dailylesson instanceof \Dailylesson) {
            return $this
                ->addUsingAlias(DailylessonHasUserTableMap::COL_DAILYLESSON_IDPOLL, $dailylesson->getIdpoll(), $comparison);
        } elseif ($dailylesson instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(DailylessonHasUserTableMap::COL_DAILYLESSON_IDPOLL, $dailylesson->toKeyValue('PrimaryKey', 'Idpoll'), $comparison);
        } else {
            throw new PropelException('filterByDailylesson() only accepts arguments of type \Dailylesson or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Dailylesson relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildDailylessonHasUserQuery The current query, for fluid interface
     */
    public function joinDailylesson($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Dailylesson');

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
            $this->addJoinObject($join, 'Dailylesson');
        }

        return $this;
    }

    /**
     * Use the Dailylesson relation Dailylesson object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \DailylessonQuery A secondary query class using the current class as primary query
     */
    public function useDailylessonQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinDailylesson($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Dailylesson', '\DailylessonQuery');
    }

    /**
     * Filter the query by a related \Quality object
     *
     * @param \Quality|ObjectCollection $quality The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildDailylessonHasUserQuery The current query, for fluid interface
     */
    public function filterByQuality($quality, $comparison = null)
    {
        if ($quality instanceof \Quality) {
            return $this
                ->addUsingAlias(DailylessonHasUserTableMap::COL_QUALITY_IDQUALITY, $quality->getIdquality(), $comparison);
        } elseif ($quality instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(DailylessonHasUserTableMap::COL_QUALITY_IDQUALITY, $quality->toKeyValue('PrimaryKey', 'Idquality'), $comparison);
        } else {
            throw new PropelException('filterByQuality() only accepts arguments of type \Quality or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Quality relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildDailylessonHasUserQuery The current query, for fluid interface
     */
    public function joinQuality($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Quality');

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
            $this->addJoinObject($join, 'Quality');
        }

        return $this;
    }

    /**
     * Use the Quality relation Quality object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \QualityQuery A secondary query class using the current class as primary query
     */
    public function useQualityQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinQuality($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Quality', '\QualityQuery');
    }

    /**
     * Filter the query by a related \User object
     *
     * @param \User|ObjectCollection $user The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildDailylessonHasUserQuery The current query, for fluid interface
     */
    public function filterByUser($user, $comparison = null)
    {
        if ($user instanceof \User) {
            return $this
                ->addUsingAlias(DailylessonHasUserTableMap::COL_USER_IDUSER, $user->getIduser(), $comparison);
        } elseif ($user instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(DailylessonHasUserTableMap::COL_USER_IDUSER, $user->toKeyValue('PrimaryKey', 'Iduser'), $comparison);
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
     * @return $this|ChildDailylessonHasUserQuery The current query, for fluid interface
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
     * @param   ChildDailylessonHasUser $dailylessonHasUser Object to remove from the list of results
     *
     * @return $this|ChildDailylessonHasUserQuery The current query, for fluid interface
     */
    public function prune($dailylessonHasUser = null)
    {
        if ($dailylessonHasUser) {
            $this->addCond('pruneCond0', $this->getAliasedColName(DailylessonHasUserTableMap::COL_DAILYLESSON_IDPOLL), $dailylessonHasUser->getDailylessonIdpoll(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(DailylessonHasUserTableMap::COL_USER_IDUSER), $dailylessonHasUser->getUserIduser(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond2', $this->getAliasedColName(DailylessonHasUserTableMap::COL_QUALITY_IDQUALITY), $dailylessonHasUser->getQualityIdquality(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1', 'pruneCond2'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the DailyLesson_has_User table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(DailylessonHasUserTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            DailylessonHasUserTableMap::clearInstancePool();
            DailylessonHasUserTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(DailylessonHasUserTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(DailylessonHasUserTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            DailylessonHasUserTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            DailylessonHasUserTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // DailylessonHasUserQuery
