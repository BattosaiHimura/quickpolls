<?php

namespace Base;

use \Courses as ChildCourses;
use \CoursesQuery as ChildCoursesQuery;
use \Exception;
use \PDO;
use Map\CoursesTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'courses' table.
 *
 *
 *
 * @method     ChildCoursesQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildCoursesQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ChildCoursesQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method     ChildCoursesQuery orderBySemester($order = Criteria::ASC) Order by the semester column
 * @method     ChildCoursesQuery orderByDateFrom($order = Criteria::ASC) Order by the date_from column
 * @method     ChildCoursesQuery orderByDateTo($order = Criteria::ASC) Order by the date_to column
 *
 * @method     ChildCoursesQuery groupById() Group by the id column
 * @method     ChildCoursesQuery groupByName() Group by the name column
 * @method     ChildCoursesQuery groupByDescription() Group by the description column
 * @method     ChildCoursesQuery groupBySemester() Group by the semester column
 * @method     ChildCoursesQuery groupByDateFrom() Group by the date_from column
 * @method     ChildCoursesQuery groupByDateTo() Group by the date_to column
 *
 * @method     ChildCoursesQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildCoursesQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildCoursesQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildCoursesQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildCoursesQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildCoursesQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildCoursesQuery leftJoinArguments($relationAlias = null) Adds a LEFT JOIN clause to the query using the Arguments relation
 * @method     ChildCoursesQuery rightJoinArguments($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Arguments relation
 * @method     ChildCoursesQuery innerJoinArguments($relationAlias = null) Adds a INNER JOIN clause to the query using the Arguments relation
 *
 * @method     ChildCoursesQuery joinWithArguments($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Arguments relation
 *
 * @method     ChildCoursesQuery leftJoinWithArguments() Adds a LEFT JOIN clause and with to the query using the Arguments relation
 * @method     ChildCoursesQuery rightJoinWithArguments() Adds a RIGHT JOIN clause and with to the query using the Arguments relation
 * @method     ChildCoursesQuery innerJoinWithArguments() Adds a INNER JOIN clause and with to the query using the Arguments relation
 *
 * @method     ChildCoursesQuery leftJoinFinalVotes($relationAlias = null) Adds a LEFT JOIN clause to the query using the FinalVotes relation
 * @method     ChildCoursesQuery rightJoinFinalVotes($relationAlias = null) Adds a RIGHT JOIN clause to the query using the FinalVotes relation
 * @method     ChildCoursesQuery innerJoinFinalVotes($relationAlias = null) Adds a INNER JOIN clause to the query using the FinalVotes relation
 *
 * @method     ChildCoursesQuery joinWithFinalVotes($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the FinalVotes relation
 *
 * @method     ChildCoursesQuery leftJoinWithFinalVotes() Adds a LEFT JOIN clause and with to the query using the FinalVotes relation
 * @method     ChildCoursesQuery rightJoinWithFinalVotes() Adds a RIGHT JOIN clause and with to the query using the FinalVotes relation
 * @method     ChildCoursesQuery innerJoinWithFinalVotes() Adds a INNER JOIN clause and with to the query using the FinalVotes relation
 *
 * @method     ChildCoursesQuery leftJoinPolls($relationAlias = null) Adds a LEFT JOIN clause to the query using the Polls relation
 * @method     ChildCoursesQuery rightJoinPolls($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Polls relation
 * @method     ChildCoursesQuery innerJoinPolls($relationAlias = null) Adds a INNER JOIN clause to the query using the Polls relation
 *
 * @method     ChildCoursesQuery joinWithPolls($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Polls relation
 *
 * @method     ChildCoursesQuery leftJoinWithPolls() Adds a LEFT JOIN clause and with to the query using the Polls relation
 * @method     ChildCoursesQuery rightJoinWithPolls() Adds a RIGHT JOIN clause and with to the query using the Polls relation
 * @method     ChildCoursesQuery innerJoinWithPolls() Adds a INNER JOIN clause and with to the query using the Polls relation
 *
 * @method     ChildCoursesQuery leftJoinProfHasCourse($relationAlias = null) Adds a LEFT JOIN clause to the query using the ProfHasCourse relation
 * @method     ChildCoursesQuery rightJoinProfHasCourse($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ProfHasCourse relation
 * @method     ChildCoursesQuery innerJoinProfHasCourse($relationAlias = null) Adds a INNER JOIN clause to the query using the ProfHasCourse relation
 *
 * @method     ChildCoursesQuery joinWithProfHasCourse($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the ProfHasCourse relation
 *
 * @method     ChildCoursesQuery leftJoinWithProfHasCourse() Adds a LEFT JOIN clause and with to the query using the ProfHasCourse relation
 * @method     ChildCoursesQuery rightJoinWithProfHasCourse() Adds a RIGHT JOIN clause and with to the query using the ProfHasCourse relation
 * @method     ChildCoursesQuery innerJoinWithProfHasCourse() Adds a INNER JOIN clause and with to the query using the ProfHasCourse relation
 *
 * @method     \ArgumentsQuery|\FinalVotesQuery|\PollsQuery|\ProfHasCourseQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildCourses findOne(ConnectionInterface $con = null) Return the first ChildCourses matching the query
 * @method     ChildCourses findOneOrCreate(ConnectionInterface $con = null) Return the first ChildCourses matching the query, or a new ChildCourses object populated from the query conditions when no match is found
 *
 * @method     ChildCourses findOneById(int $id) Return the first ChildCourses filtered by the id column
 * @method     ChildCourses findOneByName(string $name) Return the first ChildCourses filtered by the name column
 * @method     ChildCourses findOneByDescription(string $description) Return the first ChildCourses filtered by the description column
 * @method     ChildCourses findOneBySemester(string $semester) Return the first ChildCourses filtered by the semester column
 * @method     ChildCourses findOneByDateFrom(string $date_from) Return the first ChildCourses filtered by the date_from column
 * @method     ChildCourses findOneByDateTo(string $date_to) Return the first ChildCourses filtered by the date_to column *

 * @method     ChildCourses requirePk($key, ConnectionInterface $con = null) Return the ChildCourses by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCourses requireOne(ConnectionInterface $con = null) Return the first ChildCourses matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCourses requireOneById(int $id) Return the first ChildCourses filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCourses requireOneByName(string $name) Return the first ChildCourses filtered by the name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCourses requireOneByDescription(string $description) Return the first ChildCourses filtered by the description column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCourses requireOneBySemester(string $semester) Return the first ChildCourses filtered by the semester column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCourses requireOneByDateFrom(string $date_from) Return the first ChildCourses filtered by the date_from column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCourses requireOneByDateTo(string $date_to) Return the first ChildCourses filtered by the date_to column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCourses[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildCourses objects based on current ModelCriteria
 * @method     ChildCourses[]|ObjectCollection findById(int $id) Return ChildCourses objects filtered by the id column
 * @method     ChildCourses[]|ObjectCollection findByName(string $name) Return ChildCourses objects filtered by the name column
 * @method     ChildCourses[]|ObjectCollection findByDescription(string $description) Return ChildCourses objects filtered by the description column
 * @method     ChildCourses[]|ObjectCollection findBySemester(string $semester) Return ChildCourses objects filtered by the semester column
 * @method     ChildCourses[]|ObjectCollection findByDateFrom(string $date_from) Return ChildCourses objects filtered by the date_from column
 * @method     ChildCourses[]|ObjectCollection findByDateTo(string $date_to) Return ChildCourses objects filtered by the date_to column
 * @method     ChildCourses[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class CoursesQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\CoursesQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Courses', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildCoursesQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildCoursesQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildCoursesQuery) {
            return $criteria;
        }
        $query = new ChildCoursesQuery();
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
     * @return ChildCourses|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(CoursesTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = CoursesTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildCourses A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, name, description, semester, date_from, date_to FROM courses WHERE id = :p0';
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
            /** @var ChildCourses $obj */
            $obj = new ChildCourses();
            $obj->hydrate($row);
            CoursesTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildCourses|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildCoursesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(CoursesTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildCoursesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(CoursesTableMap::COL_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCoursesQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(CoursesTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(CoursesTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CoursesTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildCoursesQuery The current query, for fluid interface
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

        return $this->addUsingAlias(CoursesTableMap::COL_NAME, $name, $comparison);
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
     * @return $this|ChildCoursesQuery The current query, for fluid interface
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

        return $this->addUsingAlias(CoursesTableMap::COL_DESCRIPTION, $description, $comparison);
    }

    /**
     * Filter the query on the semester column
     *
     * Example usage:
     * <code>
     * $query->filterBySemester('fooValue');   // WHERE semester = 'fooValue'
     * $query->filterBySemester('%fooValue%'); // WHERE semester LIKE '%fooValue%'
     * </code>
     *
     * @param     string $semester The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCoursesQuery The current query, for fluid interface
     */
    public function filterBySemester($semester = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($semester)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $semester)) {
                $semester = str_replace('*', '%', $semester);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CoursesTableMap::COL_SEMESTER, $semester, $comparison);
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
     * @return $this|ChildCoursesQuery The current query, for fluid interface
     */
    public function filterByDateFrom($dateFrom = null, $comparison = null)
    {
        if (is_array($dateFrom)) {
            $useMinMax = false;
            if (isset($dateFrom['min'])) {
                $this->addUsingAlias(CoursesTableMap::COL_DATE_FROM, $dateFrom['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateFrom['max'])) {
                $this->addUsingAlias(CoursesTableMap::COL_DATE_FROM, $dateFrom['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CoursesTableMap::COL_DATE_FROM, $dateFrom, $comparison);
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
     * @return $this|ChildCoursesQuery The current query, for fluid interface
     */
    public function filterByDateTo($dateTo = null, $comparison = null)
    {
        if (is_array($dateTo)) {
            $useMinMax = false;
            if (isset($dateTo['min'])) {
                $this->addUsingAlias(CoursesTableMap::COL_DATE_TO, $dateTo['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateTo['max'])) {
                $this->addUsingAlias(CoursesTableMap::COL_DATE_TO, $dateTo['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CoursesTableMap::COL_DATE_TO, $dateTo, $comparison);
    }

    /**
     * Filter the query by a related \Arguments object
     *
     * @param \Arguments|ObjectCollection $arguments the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCoursesQuery The current query, for fluid interface
     */
    public function filterByArguments($arguments, $comparison = null)
    {
        if ($arguments instanceof \Arguments) {
            return $this
                ->addUsingAlias(CoursesTableMap::COL_ID, $arguments->getCourseId(), $comparison);
        } elseif ($arguments instanceof ObjectCollection) {
            return $this
                ->useArgumentsQuery()
                ->filterByPrimaryKeys($arguments->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByArguments() only accepts arguments of type \Arguments or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Arguments relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCoursesQuery The current query, for fluid interface
     */
    public function joinArguments($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Arguments');

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
            $this->addJoinObject($join, 'Arguments');
        }

        return $this;
    }

    /**
     * Use the Arguments relation Arguments object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \ArgumentsQuery A secondary query class using the current class as primary query
     */
    public function useArgumentsQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinArguments($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Arguments', '\ArgumentsQuery');
    }

    /**
     * Filter the query by a related \FinalVotes object
     *
     * @param \FinalVotes|ObjectCollection $finalVotes the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCoursesQuery The current query, for fluid interface
     */
    public function filterByFinalVotes($finalVotes, $comparison = null)
    {
        if ($finalVotes instanceof \FinalVotes) {
            return $this
                ->addUsingAlias(CoursesTableMap::COL_ID, $finalVotes->getCoursesId(), $comparison);
        } elseif ($finalVotes instanceof ObjectCollection) {
            return $this
                ->useFinalVotesQuery()
                ->filterByPrimaryKeys($finalVotes->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByFinalVotes() only accepts arguments of type \FinalVotes or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the FinalVotes relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCoursesQuery The current query, for fluid interface
     */
    public function joinFinalVotes($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('FinalVotes');

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
            $this->addJoinObject($join, 'FinalVotes');
        }

        return $this;
    }

    /**
     * Use the FinalVotes relation FinalVotes object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \FinalVotesQuery A secondary query class using the current class as primary query
     */
    public function useFinalVotesQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinFinalVotes($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'FinalVotes', '\FinalVotesQuery');
    }

    /**
     * Filter the query by a related \Polls object
     *
     * @param \Polls|ObjectCollection $polls the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCoursesQuery The current query, for fluid interface
     */
    public function filterByPolls($polls, $comparison = null)
    {
        if ($polls instanceof \Polls) {
            return $this
                ->addUsingAlias(CoursesTableMap::COL_ID, $polls->getCourseId(), $comparison);
        } elseif ($polls instanceof ObjectCollection) {
            return $this
                ->usePollsQuery()
                ->filterByPrimaryKeys($polls->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPolls() only accepts arguments of type \Polls or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Polls relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCoursesQuery The current query, for fluid interface
     */
    public function joinPolls($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Polls');

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
            $this->addJoinObject($join, 'Polls');
        }

        return $this;
    }

    /**
     * Use the Polls relation Polls object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \PollsQuery A secondary query class using the current class as primary query
     */
    public function usePollsQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPolls($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Polls', '\PollsQuery');
    }

    /**
     * Filter the query by a related \ProfHasCourse object
     *
     * @param \ProfHasCourse|ObjectCollection $profHasCourse the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCoursesQuery The current query, for fluid interface
     */
    public function filterByProfHasCourse($profHasCourse, $comparison = null)
    {
        if ($profHasCourse instanceof \ProfHasCourse) {
            return $this
                ->addUsingAlias(CoursesTableMap::COL_ID, $profHasCourse->getCoursesId(), $comparison);
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
     * @return $this|ChildCoursesQuery The current query, for fluid interface
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
     * @param   ChildCourses $courses Object to remove from the list of results
     *
     * @return $this|ChildCoursesQuery The current query, for fluid interface
     */
    public function prune($courses = null)
    {
        if ($courses) {
            $this->addUsingAlias(CoursesTableMap::COL_ID, $courses->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the courses table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CoursesTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            CoursesTableMap::clearInstancePool();
            CoursesTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(CoursesTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(CoursesTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            CoursesTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            CoursesTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // CoursesQuery
