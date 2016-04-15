<?php

namespace Base;

use \Course as ChildCourse;
use \CourseQuery as ChildCourseQuery;
use \Exception;
use \PDO;
use Map\CourseTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'Course' table.
 *
 *
 *
 * @method     ChildCourseQuery orderByIdcourse($order = Criteria::ASC) Order by the idCourse column
 * @method     ChildCourseQuery orderByDatefrom($order = Criteria::ASC) Order by the dateFrom column
 * @method     ChildCourseQuery orderByDateto($order = Criteria::ASC) Order by the dateTo column
 * @method     ChildCourseQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ChildCourseQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method     ChildCourseQuery orderBySession($order = Criteria::ASC) Order by the session column
 *
 * @method     ChildCourseQuery groupByIdcourse() Group by the idCourse column
 * @method     ChildCourseQuery groupByDatefrom() Group by the dateFrom column
 * @method     ChildCourseQuery groupByDateto() Group by the dateTo column
 * @method     ChildCourseQuery groupByName() Group by the name column
 * @method     ChildCourseQuery groupByDescription() Group by the description column
 * @method     ChildCourseQuery groupBySession() Group by the session column
 *
 * @method     ChildCourseQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildCourseQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildCourseQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildCourseQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildCourseQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildCourseQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildCourseQuery leftJoinArgument($relationAlias = null) Adds a LEFT JOIN clause to the query using the Argument relation
 * @method     ChildCourseQuery rightJoinArgument($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Argument relation
 * @method     ChildCourseQuery innerJoinArgument($relationAlias = null) Adds a INNER JOIN clause to the query using the Argument relation
 *
 * @method     ChildCourseQuery joinWithArgument($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Argument relation
 *
 * @method     ChildCourseQuery leftJoinWithArgument() Adds a LEFT JOIN clause and with to the query using the Argument relation
 * @method     ChildCourseQuery rightJoinWithArgument() Adds a RIGHT JOIN clause and with to the query using the Argument relation
 * @method     ChildCourseQuery innerJoinWithArgument() Adds a INNER JOIN clause and with to the query using the Argument relation
 *
 * @method     ChildCourseQuery leftJoinFinalVote($relationAlias = null) Adds a LEFT JOIN clause to the query using the FinalVote relation
 * @method     ChildCourseQuery rightJoinFinalVote($relationAlias = null) Adds a RIGHT JOIN clause to the query using the FinalVote relation
 * @method     ChildCourseQuery innerJoinFinalVote($relationAlias = null) Adds a INNER JOIN clause to the query using the FinalVote relation
 *
 * @method     ChildCourseQuery joinWithFinalVote($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the FinalVote relation
 *
 * @method     ChildCourseQuery leftJoinWithFinalVote() Adds a LEFT JOIN clause and with to the query using the FinalVote relation
 * @method     ChildCourseQuery rightJoinWithFinalVote() Adds a RIGHT JOIN clause and with to the query using the FinalVote relation
 * @method     ChildCourseQuery innerJoinWithFinalVote() Adds a INNER JOIN clause and with to the query using the FinalVote relation
 *
 * @method     ChildCourseQuery leftJoinProfHasCourse($relationAlias = null) Adds a LEFT JOIN clause to the query using the ProfHasCourse relation
 * @method     ChildCourseQuery rightJoinProfHasCourse($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ProfHasCourse relation
 * @method     ChildCourseQuery innerJoinProfHasCourse($relationAlias = null) Adds a INNER JOIN clause to the query using the ProfHasCourse relation
 *
 * @method     ChildCourseQuery joinWithProfHasCourse($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the ProfHasCourse relation
 *
 * @method     ChildCourseQuery leftJoinWithProfHasCourse() Adds a LEFT JOIN clause and with to the query using the ProfHasCourse relation
 * @method     ChildCourseQuery rightJoinWithProfHasCourse() Adds a RIGHT JOIN clause and with to the query using the ProfHasCourse relation
 * @method     ChildCourseQuery innerJoinWithProfHasCourse() Adds a INNER JOIN clause and with to the query using the ProfHasCourse relation
 *
 * @method     \ArgumentQuery|\FinalVoteQuery|\ProfHasCourseQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildCourse findOne(ConnectionInterface $con = null) Return the first ChildCourse matching the query
 * @method     ChildCourse findOneOrCreate(ConnectionInterface $con = null) Return the first ChildCourse matching the query, or a new ChildCourse object populated from the query conditions when no match is found
 *
 * @method     ChildCourse findOneByIdcourse(int $idCourse) Return the first ChildCourse filtered by the idCourse column
 * @method     ChildCourse findOneByDatefrom(string $dateFrom) Return the first ChildCourse filtered by the dateFrom column
 * @method     ChildCourse findOneByDateto(string $dateTo) Return the first ChildCourse filtered by the dateTo column
 * @method     ChildCourse findOneByName(string $name) Return the first ChildCourse filtered by the name column
 * @method     ChildCourse findOneByDescription(string $description) Return the first ChildCourse filtered by the description column
 * @method     ChildCourse findOneBySession(string $session) Return the first ChildCourse filtered by the session column *

 * @method     ChildCourse requirePk($key, ConnectionInterface $con = null) Return the ChildCourse by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCourse requireOne(ConnectionInterface $con = null) Return the first ChildCourse matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCourse requireOneByIdcourse(int $idCourse) Return the first ChildCourse filtered by the idCourse column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCourse requireOneByDatefrom(string $dateFrom) Return the first ChildCourse filtered by the dateFrom column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCourse requireOneByDateto(string $dateTo) Return the first ChildCourse filtered by the dateTo column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCourse requireOneByName(string $name) Return the first ChildCourse filtered by the name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCourse requireOneByDescription(string $description) Return the first ChildCourse filtered by the description column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCourse requireOneBySession(string $session) Return the first ChildCourse filtered by the session column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCourse[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildCourse objects based on current ModelCriteria
 * @method     ChildCourse[]|ObjectCollection findByIdcourse(int $idCourse) Return ChildCourse objects filtered by the idCourse column
 * @method     ChildCourse[]|ObjectCollection findByDatefrom(string $dateFrom) Return ChildCourse objects filtered by the dateFrom column
 * @method     ChildCourse[]|ObjectCollection findByDateto(string $dateTo) Return ChildCourse objects filtered by the dateTo column
 * @method     ChildCourse[]|ObjectCollection findByName(string $name) Return ChildCourse objects filtered by the name column
 * @method     ChildCourse[]|ObjectCollection findByDescription(string $description) Return ChildCourse objects filtered by the description column
 * @method     ChildCourse[]|ObjectCollection findBySession(string $session) Return ChildCourse objects filtered by the session column
 * @method     ChildCourse[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class CourseQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\CourseQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Course', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildCourseQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildCourseQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildCourseQuery) {
            return $criteria;
        }
        $query = new ChildCourseQuery();
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
     * @return ChildCourse|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(CourseTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = CourseTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildCourse A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT idCourse, dateFrom, dateTo, name, description, session FROM Course WHERE idCourse = :p0';
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
            /** @var ChildCourse $obj */
            $obj = new ChildCourse();
            $obj->hydrate($row);
            CourseTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildCourse|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildCourseQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(CourseTableMap::COL_IDCOURSE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildCourseQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(CourseTableMap::COL_IDCOURSE, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the idCourse column
     *
     * Example usage:
     * <code>
     * $query->filterByIdcourse(1234); // WHERE idCourse = 1234
     * $query->filterByIdcourse(array(12, 34)); // WHERE idCourse IN (12, 34)
     * $query->filterByIdcourse(array('min' => 12)); // WHERE idCourse > 12
     * </code>
     *
     * @param     mixed $idcourse The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCourseQuery The current query, for fluid interface
     */
    public function filterByIdcourse($idcourse = null, $comparison = null)
    {
        if (is_array($idcourse)) {
            $useMinMax = false;
            if (isset($idcourse['min'])) {
                $this->addUsingAlias(CourseTableMap::COL_IDCOURSE, $idcourse['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idcourse['max'])) {
                $this->addUsingAlias(CourseTableMap::COL_IDCOURSE, $idcourse['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CourseTableMap::COL_IDCOURSE, $idcourse, $comparison);
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
     * @return $this|ChildCourseQuery The current query, for fluid interface
     */
    public function filterByDatefrom($datefrom = null, $comparison = null)
    {
        if (is_array($datefrom)) {
            $useMinMax = false;
            if (isset($datefrom['min'])) {
                $this->addUsingAlias(CourseTableMap::COL_DATEFROM, $datefrom['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($datefrom['max'])) {
                $this->addUsingAlias(CourseTableMap::COL_DATEFROM, $datefrom['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CourseTableMap::COL_DATEFROM, $datefrom, $comparison);
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
     * @return $this|ChildCourseQuery The current query, for fluid interface
     */
    public function filterByDateto($dateto = null, $comparison = null)
    {
        if (is_array($dateto)) {
            $useMinMax = false;
            if (isset($dateto['min'])) {
                $this->addUsingAlias(CourseTableMap::COL_DATETO, $dateto['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateto['max'])) {
                $this->addUsingAlias(CourseTableMap::COL_DATETO, $dateto['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CourseTableMap::COL_DATETO, $dateto, $comparison);
    }

    /**
     * Filter the query on the name column
     *
     * Example usage:
     * <code>
     * $query->filterByName('fooValue');   // WHERE name = 'fooValue'
     * $query->filterByName('%fooValue%'); // WHERE name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $name The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCourseQuery The current query, for fluid interface
     */
    public function filterByName($name = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $name)) {
                $name = str_replace('*', '%', $name);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CourseTableMap::COL_NAME, $name, $comparison);
    }

    /**
     * Filter the query on the description column
     *
     * Example usage:
     * <code>
     * $query->filterByDescription('fooValue');   // WHERE description = 'fooValue'
     * $query->filterByDescription('%fooValue%'); // WHERE description LIKE '%fooValue%'
     * </code>
     *
     * @param     string $description The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCourseQuery The current query, for fluid interface
     */
    public function filterByDescription($description = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($description)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $description)) {
                $description = str_replace('*', '%', $description);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CourseTableMap::COL_DESCRIPTION, $description, $comparison);
    }

    /**
     * Filter the query on the session column
     *
     * Example usage:
     * <code>
     * $query->filterBySession('fooValue');   // WHERE session = 'fooValue'
     * $query->filterBySession('%fooValue%'); // WHERE session LIKE '%fooValue%'
     * </code>
     *
     * @param     string $session The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCourseQuery The current query, for fluid interface
     */
    public function filterBySession($session = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($session)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $session)) {
                $session = str_replace('*', '%', $session);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CourseTableMap::COL_SESSION, $session, $comparison);
    }

    /**
     * Filter the query by a related \Argument object
     *
     * @param \Argument|ObjectCollection $argument the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCourseQuery The current query, for fluid interface
     */
    public function filterByArgument($argument, $comparison = null)
    {
        if ($argument instanceof \Argument) {
            return $this
                ->addUsingAlias(CourseTableMap::COL_IDCOURSE, $argument->getCourseIdcourse(), $comparison);
        } elseif ($argument instanceof ObjectCollection) {
            return $this
                ->useArgumentQuery()
                ->filterByPrimaryKeys($argument->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByArgument() only accepts arguments of type \Argument or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Argument relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCourseQuery The current query, for fluid interface
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
     * Filter the query by a related \FinalVote object
     *
     * @param \FinalVote|ObjectCollection $finalVote the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCourseQuery The current query, for fluid interface
     */
    public function filterByFinalVote($finalVote, $comparison = null)
    {
        if ($finalVote instanceof \FinalVote) {
            return $this
                ->addUsingAlias(CourseTableMap::COL_IDCOURSE, $finalVote->getCourseIdcourse(), $comparison);
        } elseif ($finalVote instanceof ObjectCollection) {
            return $this
                ->useFinalVoteQuery()
                ->filterByPrimaryKeys($finalVote->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByFinalVote() only accepts arguments of type \FinalVote or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the FinalVote relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCourseQuery The current query, for fluid interface
     */
    public function joinFinalVote($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('FinalVote');

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
            $this->addJoinObject($join, 'FinalVote');
        }

        return $this;
    }

    /**
     * Use the FinalVote relation FinalVote object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \FinalVoteQuery A secondary query class using the current class as primary query
     */
    public function useFinalVoteQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinFinalVote($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'FinalVote', '\FinalVoteQuery');
    }

    /**
     * Filter the query by a related \ProfHasCourse object
     *
     * @param \ProfHasCourse|ObjectCollection $profHasCourse the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCourseQuery The current query, for fluid interface
     */
    public function filterByProfHasCourse($profHasCourse, $comparison = null)
    {
        if ($profHasCourse instanceof \ProfHasCourse) {
            return $this
                ->addUsingAlias(CourseTableMap::COL_IDCOURSE, $profHasCourse->getCourseIdcourse(), $comparison);
        } elseif ($profHasCourse instanceof ObjectCollection) {
            return $this
                ->useProfHasCourseQuery()
                ->filterByPrimaryKeys($profHasCourse->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByProfHasCourse() only accepts arguments of type \ProfHasCourse or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ProfHasCourse relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCourseQuery The current query, for fluid interface
     */
    public function joinProfHasCourse($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ProfHasCourse');

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
            $this->addJoinObject($join, 'ProfHasCourse');
        }

        return $this;
    }

    /**
     * Use the ProfHasCourse relation ProfHasCourse object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \ProfHasCourseQuery A secondary query class using the current class as primary query
     */
    public function useProfHasCourseQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinProfHasCourse($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ProfHasCourse', '\ProfHasCourseQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildCourse $course Object to remove from the list of results
     *
     * @return $this|ChildCourseQuery The current query, for fluid interface
     */
    public function prune($course = null)
    {
        if ($course) {
            $this->addUsingAlias(CourseTableMap::COL_IDCOURSE, $course->getIdcourse(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the Course table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CourseTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            CourseTableMap::clearInstancePool();
            CourseTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(CourseTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(CourseTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            CourseTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            CourseTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // CourseQuery
