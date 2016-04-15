<?php

namespace Base;

use \Dailylesson as ChildDailylesson;
use \DailylessonQuery as ChildDailylessonQuery;
use \Exception;
use \PDO;
use Map\DailylessonTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'DailyLesson' table.
 *
 *
 *
 * @method     ChildDailylessonQuery orderByIdpoll($order = Criteria::ASC) Order by the idPoll column
 * @method     ChildDailylessonQuery orderByComment($order = Criteria::ASC) Order by the comment column
 * @method     ChildDailylessonQuery orderByArgumentIdargument($order = Criteria::ASC) Order by the Argument_idArgument column
 * @method     ChildDailylessonQuery orderByArgumentCourseIdcourse($order = Criteria::ASC) Order by the Argument_Course_idCourse column
 * @method     ChildDailylessonQuery orderByDate($order = Criteria::ASC) Order by the date column
 *
 * @method     ChildDailylessonQuery groupByIdpoll() Group by the idPoll column
 * @method     ChildDailylessonQuery groupByComment() Group by the comment column
 * @method     ChildDailylessonQuery groupByArgumentIdargument() Group by the Argument_idArgument column
 * @method     ChildDailylessonQuery groupByArgumentCourseIdcourse() Group by the Argument_Course_idCourse column
 * @method     ChildDailylessonQuery groupByDate() Group by the date column
 *
 * @method     ChildDailylessonQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildDailylessonQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildDailylessonQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildDailylessonQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildDailylessonQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildDailylessonQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildDailylessonQuery leftJoinArgument($relationAlias = null) Adds a LEFT JOIN clause to the query using the Argument relation
 * @method     ChildDailylessonQuery rightJoinArgument($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Argument relation
 * @method     ChildDailylessonQuery innerJoinArgument($relationAlias = null) Adds a INNER JOIN clause to the query using the Argument relation
 *
 * @method     ChildDailylessonQuery joinWithArgument($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Argument relation
 *
 * @method     ChildDailylessonQuery leftJoinWithArgument() Adds a LEFT JOIN clause and with to the query using the Argument relation
 * @method     ChildDailylessonQuery rightJoinWithArgument() Adds a RIGHT JOIN clause and with to the query using the Argument relation
 * @method     ChildDailylessonQuery innerJoinWithArgument() Adds a INNER JOIN clause and with to the query using the Argument relation
 *
 * @method     ChildDailylessonQuery leftJoinDailylessonHasUser($relationAlias = null) Adds a LEFT JOIN clause to the query using the DailylessonHasUser relation
 * @method     ChildDailylessonQuery rightJoinDailylessonHasUser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the DailylessonHasUser relation
 * @method     ChildDailylessonQuery innerJoinDailylessonHasUser($relationAlias = null) Adds a INNER JOIN clause to the query using the DailylessonHasUser relation
 *
 * @method     ChildDailylessonQuery joinWithDailylessonHasUser($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the DailylessonHasUser relation
 *
 * @method     ChildDailylessonQuery leftJoinWithDailylessonHasUser() Adds a LEFT JOIN clause and with to the query using the DailylessonHasUser relation
 * @method     ChildDailylessonQuery rightJoinWithDailylessonHasUser() Adds a RIGHT JOIN clause and with to the query using the DailylessonHasUser relation
 * @method     ChildDailylessonQuery innerJoinWithDailylessonHasUser() Adds a INNER JOIN clause and with to the query using the DailylessonHasUser relation
 *
 * @method     \ArgumentQuery|\DailylessonHasUserQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildDailylesson findOne(ConnectionInterface $con = null) Return the first ChildDailylesson matching the query
 * @method     ChildDailylesson findOneOrCreate(ConnectionInterface $con = null) Return the first ChildDailylesson matching the query, or a new ChildDailylesson object populated from the query conditions when no match is found
 *
 * @method     ChildDailylesson findOneByIdpoll(int $idPoll) Return the first ChildDailylesson filtered by the idPoll column
 * @method     ChildDailylesson findOneByComment(string $comment) Return the first ChildDailylesson filtered by the comment column
 * @method     ChildDailylesson findOneByArgumentIdargument(int $Argument_idArgument) Return the first ChildDailylesson filtered by the Argument_idArgument column
 * @method     ChildDailylesson findOneByArgumentCourseIdcourse(int $Argument_Course_idCourse) Return the first ChildDailylesson filtered by the Argument_Course_idCourse column
 * @method     ChildDailylesson findOneByDate(string $date) Return the first ChildDailylesson filtered by the date column *

 * @method     ChildDailylesson requirePk($key, ConnectionInterface $con = null) Return the ChildDailylesson by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDailylesson requireOne(ConnectionInterface $con = null) Return the first ChildDailylesson matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildDailylesson requireOneByIdpoll(int $idPoll) Return the first ChildDailylesson filtered by the idPoll column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDailylesson requireOneByComment(string $comment) Return the first ChildDailylesson filtered by the comment column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDailylesson requireOneByArgumentIdargument(int $Argument_idArgument) Return the first ChildDailylesson filtered by the Argument_idArgument column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDailylesson requireOneByArgumentCourseIdcourse(int $Argument_Course_idCourse) Return the first ChildDailylesson filtered by the Argument_Course_idCourse column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDailylesson requireOneByDate(string $date) Return the first ChildDailylesson filtered by the date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildDailylesson[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildDailylesson objects based on current ModelCriteria
 * @method     ChildDailylesson[]|ObjectCollection findByIdpoll(int $idPoll) Return ChildDailylesson objects filtered by the idPoll column
 * @method     ChildDailylesson[]|ObjectCollection findByComment(string $comment) Return ChildDailylesson objects filtered by the comment column
 * @method     ChildDailylesson[]|ObjectCollection findByArgumentIdargument(int $Argument_idArgument) Return ChildDailylesson objects filtered by the Argument_idArgument column
 * @method     ChildDailylesson[]|ObjectCollection findByArgumentCourseIdcourse(int $Argument_Course_idCourse) Return ChildDailylesson objects filtered by the Argument_Course_idCourse column
 * @method     ChildDailylesson[]|ObjectCollection findByDate(string $date) Return ChildDailylesson objects filtered by the date column
 * @method     ChildDailylesson[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class DailylessonQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\DailylessonQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Dailylesson', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildDailylessonQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildDailylessonQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildDailylessonQuery) {
            return $criteria;
        }
        $query = new ChildDailylessonQuery();
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
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildDailylesson|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(DailylessonTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = DailylessonTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildDailylesson A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT idPoll, comment, Argument_idArgument, Argument_Course_idCourse, date FROM DailyLesson WHERE idPoll = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildDailylesson $obj */
            $obj = new ChildDailylesson();
            $obj->hydrate($row);
            DailylessonTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildDailylesson|array|mixed the result, formatted by the current formatter
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
     * $objs = $c->findPks(array(12, 56, 832), $con);
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
     * @return $this|ChildDailylessonQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(DailylessonTableMap::COL_IDPOLL, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildDailylessonQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(DailylessonTableMap::COL_IDPOLL, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the idPoll column
     *
     * Example usage:
     * <code>
     * $query->filterByIdpoll(1234); // WHERE idPoll = 1234
     * $query->filterByIdpoll(array(12, 34)); // WHERE idPoll IN (12, 34)
     * $query->filterByIdpoll(array('min' => 12)); // WHERE idPoll > 12
     * </code>
     *
     * @param     mixed $idpoll The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDailylessonQuery The current query, for fluid interface
     */
    public function filterByIdpoll($idpoll = null, $comparison = null)
    {
        if (is_array($idpoll)) {
            $useMinMax = false;
            if (isset($idpoll['min'])) {
                $this->addUsingAlias(DailylessonTableMap::COL_IDPOLL, $idpoll['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idpoll['max'])) {
                $this->addUsingAlias(DailylessonTableMap::COL_IDPOLL, $idpoll['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DailylessonTableMap::COL_IDPOLL, $idpoll, $comparison);
    }

    /**
     * Filter the query on the comment column
     *
     * Example usage:
     * <code>
     * $query->filterByComment('fooValue');   // WHERE comment = 'fooValue'
     * $query->filterByComment('%fooValue%'); // WHERE comment LIKE '%fooValue%'
     * </code>
     *
     * @param     string $comment The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDailylessonQuery The current query, for fluid interface
     */
    public function filterByComment($comment = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($comment)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $comment)) {
                $comment = str_replace('*', '%', $comment);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(DailylessonTableMap::COL_COMMENT, $comment, $comparison);
    }

    /**
     * Filter the query on the Argument_idArgument column
     *
     * Example usage:
     * <code>
     * $query->filterByArgumentIdargument(1234); // WHERE Argument_idArgument = 1234
     * $query->filterByArgumentIdargument(array(12, 34)); // WHERE Argument_idArgument IN (12, 34)
     * $query->filterByArgumentIdargument(array('min' => 12)); // WHERE Argument_idArgument > 12
     * </code>
     *
     * @see       filterByArgument()
     *
     * @param     mixed $argumentIdargument The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDailylessonQuery The current query, for fluid interface
     */
    public function filterByArgumentIdargument($argumentIdargument = null, $comparison = null)
    {
        if (is_array($argumentIdargument)) {
            $useMinMax = false;
            if (isset($argumentIdargument['min'])) {
                $this->addUsingAlias(DailylessonTableMap::COL_ARGUMENT_IDARGUMENT, $argumentIdargument['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($argumentIdargument['max'])) {
                $this->addUsingAlias(DailylessonTableMap::COL_ARGUMENT_IDARGUMENT, $argumentIdargument['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DailylessonTableMap::COL_ARGUMENT_IDARGUMENT, $argumentIdargument, $comparison);
    }

    /**
     * Filter the query on the Argument_Course_idCourse column
     *
     * Example usage:
     * <code>
     * $query->filterByArgumentCourseIdcourse(1234); // WHERE Argument_Course_idCourse = 1234
     * $query->filterByArgumentCourseIdcourse(array(12, 34)); // WHERE Argument_Course_idCourse IN (12, 34)
     * $query->filterByArgumentCourseIdcourse(array('min' => 12)); // WHERE Argument_Course_idCourse > 12
     * </code>
     *
     * @see       filterByArgument()
     *
     * @param     mixed $argumentCourseIdcourse The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDailylessonQuery The current query, for fluid interface
     */
    public function filterByArgumentCourseIdcourse($argumentCourseIdcourse = null, $comparison = null)
    {
        if (is_array($argumentCourseIdcourse)) {
            $useMinMax = false;
            if (isset($argumentCourseIdcourse['min'])) {
                $this->addUsingAlias(DailylessonTableMap::COL_ARGUMENT_COURSE_IDCOURSE, $argumentCourseIdcourse['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($argumentCourseIdcourse['max'])) {
                $this->addUsingAlias(DailylessonTableMap::COL_ARGUMENT_COURSE_IDCOURSE, $argumentCourseIdcourse['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DailylessonTableMap::COL_ARGUMENT_COURSE_IDCOURSE, $argumentCourseIdcourse, $comparison);
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
     * @return $this|ChildDailylessonQuery The current query, for fluid interface
     */
    public function filterByDate($date = null, $comparison = null)
    {
        if (is_array($date)) {
            $useMinMax = false;
            if (isset($date['min'])) {
                $this->addUsingAlias(DailylessonTableMap::COL_DATE, $date['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($date['max'])) {
                $this->addUsingAlias(DailylessonTableMap::COL_DATE, $date['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DailylessonTableMap::COL_DATE, $date, $comparison);
    }

    /**
     * Filter the query by a related \Argument object
     *
     * @param \Argument $argument The related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildDailylessonQuery The current query, for fluid interface
     */
    public function filterByArgument($argument, $comparison = null)
    {
        if ($argument instanceof \Argument) {
            return $this
                ->addUsingAlias(DailylessonTableMap::COL_ARGUMENT_IDARGUMENT, $argument->getIdargument(), $comparison)
                ->addUsingAlias(DailylessonTableMap::COL_ARGUMENT_COURSE_IDCOURSE, $argument->getCourseIdcourse(), $comparison);
        } else {
            throw new PropelException('filterByArgument() only accepts arguments of type \Argument');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Argument relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildDailylessonQuery The current query, for fluid interface
     */
    public function joinArgument($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Argument');

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
            $this->addJoinObject($join, 'Argument');
        }

        return $this;
    }

    /**
     * Use the Argument relation Argument object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \ArgumentQuery A secondary query class using the current class as primary query
     */
    public function useArgumentQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinArgument($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Argument', '\ArgumentQuery');
    }

    /**
     * Filter the query by a related \DailylessonHasUser object
     *
     * @param \DailylessonHasUser|ObjectCollection $dailylessonHasUser the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildDailylessonQuery The current query, for fluid interface
     */
    public function filterByDailylessonHasUser($dailylessonHasUser, $comparison = null)
    {
        if ($dailylessonHasUser instanceof \DailylessonHasUser) {
            return $this
                ->addUsingAlias(DailylessonTableMap::COL_IDPOLL, $dailylessonHasUser->getDailylessonIdpoll(), $comparison);
        } elseif ($dailylessonHasUser instanceof ObjectCollection) {
            return $this
                ->useDailylessonHasUserQuery()
                ->filterByPrimaryKeys($dailylessonHasUser->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByDailylessonHasUser() only accepts arguments of type \DailylessonHasUser or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the DailylessonHasUser relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildDailylessonQuery The current query, for fluid interface
     */
    public function joinDailylessonHasUser($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('DailylessonHasUser');

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
            $this->addJoinObject($join, 'DailylessonHasUser');
        }

        return $this;
    }

    /**
     * Use the DailylessonHasUser relation DailylessonHasUser object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \DailylessonHasUserQuery A secondary query class using the current class as primary query
     */
    public function useDailylessonHasUserQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinDailylessonHasUser($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'DailylessonHasUser', '\DailylessonHasUserQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildDailylesson $dailylesson Object to remove from the list of results
     *
     * @return $this|ChildDailylessonQuery The current query, for fluid interface
     */
    public function prune($dailylesson = null)
    {
        if ($dailylesson) {
            $this->addUsingAlias(DailylessonTableMap::COL_IDPOLL, $dailylesson->getIdpoll(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the DailyLesson table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(DailylessonTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            DailylessonTableMap::clearInstancePool();
            DailylessonTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(DailylessonTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(DailylessonTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            DailylessonTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            DailylessonTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // DailylessonQuery
