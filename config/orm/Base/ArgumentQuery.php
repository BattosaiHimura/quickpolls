<?php

namespace Base;

use \Argument as ChildArgument;
use \ArgumentQuery as ChildArgumentQuery;
use \Exception;
use \PDO;
use Map\ArgumentTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'Argument' table.
 *
 *
 *
 * @method     ChildArgumentQuery orderByIdargument($order = Criteria::ASC) Order by the idArgument column
 * @method     ChildArgumentQuery orderByCourseIdcourse($order = Criteria::ASC) Order by the Course_idCourse column
 * @method     ChildArgumentQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method     ChildArgumentQuery orderByDate($order = Criteria::ASC) Order by the date column
 *
 * @method     ChildArgumentQuery groupByIdargument() Group by the idArgument column
 * @method     ChildArgumentQuery groupByCourseIdcourse() Group by the Course_idCourse column
 * @method     ChildArgumentQuery groupByDescription() Group by the description column
 * @method     ChildArgumentQuery groupByDate() Group by the date column
 *
 * @method     ChildArgumentQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildArgumentQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildArgumentQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildArgumentQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildArgumentQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildArgumentQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildArgumentQuery leftJoinCourse($relationAlias = null) Adds a LEFT JOIN clause to the query using the Course relation
 * @method     ChildArgumentQuery rightJoinCourse($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Course relation
 * @method     ChildArgumentQuery innerJoinCourse($relationAlias = null) Adds a INNER JOIN clause to the query using the Course relation
 *
 * @method     ChildArgumentQuery joinWithCourse($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Course relation
 *
 * @method     ChildArgumentQuery leftJoinWithCourse() Adds a LEFT JOIN clause and with to the query using the Course relation
 * @method     ChildArgumentQuery rightJoinWithCourse() Adds a RIGHT JOIN clause and with to the query using the Course relation
 * @method     ChildArgumentQuery innerJoinWithCourse() Adds a INNER JOIN clause and with to the query using the Course relation
 *
 * @method     ChildArgumentQuery leftJoinDailylesson($relationAlias = null) Adds a LEFT JOIN clause to the query using the Dailylesson relation
 * @method     ChildArgumentQuery rightJoinDailylesson($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Dailylesson relation
 * @method     ChildArgumentQuery innerJoinDailylesson($relationAlias = null) Adds a INNER JOIN clause to the query using the Dailylesson relation
 *
 * @method     ChildArgumentQuery joinWithDailylesson($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Dailylesson relation
 *
 * @method     ChildArgumentQuery leftJoinWithDailylesson() Adds a LEFT JOIN clause and with to the query using the Dailylesson relation
 * @method     ChildArgumentQuery rightJoinWithDailylesson() Adds a RIGHT JOIN clause and with to the query using the Dailylesson relation
 * @method     ChildArgumentQuery innerJoinWithDailylesson() Adds a INNER JOIN clause and with to the query using the Dailylesson relation
 *
 * @method     \CourseQuery|\DailylessonQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildArgument findOne(ConnectionInterface $con = null) Return the first ChildArgument matching the query
 * @method     ChildArgument findOneOrCreate(ConnectionInterface $con = null) Return the first ChildArgument matching the query, or a new ChildArgument object populated from the query conditions when no match is found
 *
 * @method     ChildArgument findOneByIdargument(int $idArgument) Return the first ChildArgument filtered by the idArgument column
 * @method     ChildArgument findOneByCourseIdcourse(int $Course_idCourse) Return the first ChildArgument filtered by the Course_idCourse column
 * @method     ChildArgument findOneByDescription(string $description) Return the first ChildArgument filtered by the description column
 * @method     ChildArgument findOneByDate(string $date) Return the first ChildArgument filtered by the date column *

 * @method     ChildArgument requirePk($key, ConnectionInterface $con = null) Return the ChildArgument by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildArgument requireOne(ConnectionInterface $con = null) Return the first ChildArgument matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildArgument requireOneByIdargument(int $idArgument) Return the first ChildArgument filtered by the idArgument column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildArgument requireOneByCourseIdcourse(int $Course_idCourse) Return the first ChildArgument filtered by the Course_idCourse column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildArgument requireOneByDescription(string $description) Return the first ChildArgument filtered by the description column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildArgument requireOneByDate(string $date) Return the first ChildArgument filtered by the date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildArgument[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildArgument objects based on current ModelCriteria
 * @method     ChildArgument[]|ObjectCollection findByIdargument(int $idArgument) Return ChildArgument objects filtered by the idArgument column
 * @method     ChildArgument[]|ObjectCollection findByCourseIdcourse(int $Course_idCourse) Return ChildArgument objects filtered by the Course_idCourse column
 * @method     ChildArgument[]|ObjectCollection findByDescription(string $description) Return ChildArgument objects filtered by the description column
 * @method     ChildArgument[]|ObjectCollection findByDate(string $date) Return ChildArgument objects filtered by the date column
 * @method     ChildArgument[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ArgumentQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\ArgumentQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Argument', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildArgumentQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildArgumentQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildArgumentQuery) {
            return $criteria;
        }
        $query = new ChildArgumentQuery();
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
     * @param array[$idArgument, $Course_idCourse] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildArgument|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(ArgumentTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = ArgumentTableMap::getInstanceFromPool(serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]))))) {
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
     * @return ChildArgument A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT idArgument, Course_idCourse, description, date FROM Argument WHERE idArgument = :p0 AND Course_idCourse = :p1';
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
            /** @var ChildArgument $obj */
            $obj = new ChildArgument();
            $obj->hydrate($row);
            ArgumentTableMap::addInstanceToPool($obj, serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]));
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
     * @return ChildArgument|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildArgumentQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(ArgumentTableMap::COL_IDARGUMENT, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(ArgumentTableMap::COL_COURSE_IDCOURSE, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildArgumentQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(ArgumentTableMap::COL_IDARGUMENT, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(ArgumentTableMap::COL_COURSE_IDCOURSE, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the idArgument column
     *
     * Example usage:
     * <code>
     * $query->filterByIdargument(1234); // WHERE idArgument = 1234
     * $query->filterByIdargument(array(12, 34)); // WHERE idArgument IN (12, 34)
     * $query->filterByIdargument(array('min' => 12)); // WHERE idArgument > 12
     * </code>
     *
     * @param     mixed $idargument The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildArgumentQuery The current query, for fluid interface
     */
    public function filterByIdargument($idargument = null, $comparison = null)
    {
        if (is_array($idargument)) {
            $useMinMax = false;
            if (isset($idargument['min'])) {
                $this->addUsingAlias(ArgumentTableMap::COL_IDARGUMENT, $idargument['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idargument['max'])) {
                $this->addUsingAlias(ArgumentTableMap::COL_IDARGUMENT, $idargument['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ArgumentTableMap::COL_IDARGUMENT, $idargument, $comparison);
    }

    /**
     * Filter the query on the Course_idCourse column
     *
     * Example usage:
     * <code>
     * $query->filterByCourseIdcourse(1234); // WHERE Course_idCourse = 1234
     * $query->filterByCourseIdcourse(array(12, 34)); // WHERE Course_idCourse IN (12, 34)
     * $query->filterByCourseIdcourse(array('min' => 12)); // WHERE Course_idCourse > 12
     * </code>
     *
     * @see       filterByCourse()
     *
     * @param     mixed $courseIdcourse The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildArgumentQuery The current query, for fluid interface
     */
    public function filterByCourseIdcourse($courseIdcourse = null, $comparison = null)
    {
        if (is_array($courseIdcourse)) {
            $useMinMax = false;
            if (isset($courseIdcourse['min'])) {
                $this->addUsingAlias(ArgumentTableMap::COL_COURSE_IDCOURSE, $courseIdcourse['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($courseIdcourse['max'])) {
                $this->addUsingAlias(ArgumentTableMap::COL_COURSE_IDCOURSE, $courseIdcourse['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ArgumentTableMap::COL_COURSE_IDCOURSE, $courseIdcourse, $comparison);
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
     * @return $this|ChildArgumentQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ArgumentTableMap::COL_DESCRIPTION, $description, $comparison);
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
     * @return $this|ChildArgumentQuery The current query, for fluid interface
     */
    public function filterByDate($date = null, $comparison = null)
    {
        if (is_array($date)) {
            $useMinMax = false;
            if (isset($date['min'])) {
                $this->addUsingAlias(ArgumentTableMap::COL_DATE, $date['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($date['max'])) {
                $this->addUsingAlias(ArgumentTableMap::COL_DATE, $date['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ArgumentTableMap::COL_DATE, $date, $comparison);
    }

    /**
     * Filter the query by a related \Course object
     *
     * @param \Course|ObjectCollection $course The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildArgumentQuery The current query, for fluid interface
     */
    public function filterByCourse($course, $comparison = null)
    {
        if ($course instanceof \Course) {
            return $this
                ->addUsingAlias(ArgumentTableMap::COL_COURSE_IDCOURSE, $course->getIdcourse(), $comparison);
        } elseif ($course instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ArgumentTableMap::COL_COURSE_IDCOURSE, $course->toKeyValue('PrimaryKey', 'Idcourse'), $comparison);
        } else {
            throw new PropelException('filterByCourse() only accepts arguments of type \Course or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Course relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildArgumentQuery The current query, for fluid interface
     */
    public function joinCourse($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Course');

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
            $this->addJoinObject($join, 'Course');
        }

        return $this;
    }

    /**
     * Use the Course relation Course object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \CourseQuery A secondary query class using the current class as primary query
     */
    public function useCourseQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCourse($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Course', '\CourseQuery');
    }

    /**
     * Filter the query by a related \Dailylesson object
     *
     * @param \Dailylesson|ObjectCollection $dailylesson the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildArgumentQuery The current query, for fluid interface
     */
    public function filterByDailylesson($dailylesson, $comparison = null)
    {
        if ($dailylesson instanceof \Dailylesson) {
            return $this
                ->addUsingAlias(ArgumentTableMap::COL_IDARGUMENT, $dailylesson->getArgumentIdargument(), $comparison)
                ->addUsingAlias(ArgumentTableMap::COL_COURSE_IDCOURSE, $dailylesson->getArgumentCourseIdcourse(), $comparison);
        } else {
            throw new PropelException('filterByDailylesson() only accepts arguments of type \Dailylesson');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Dailylesson relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildArgumentQuery The current query, for fluid interface
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
     * Exclude object from result
     *
     * @param   ChildArgument $argument Object to remove from the list of results
     *
     * @return $this|ChildArgumentQuery The current query, for fluid interface
     */
    public function prune($argument = null)
    {
        if ($argument) {
            $this->addCond('pruneCond0', $this->getAliasedColName(ArgumentTableMap::COL_IDARGUMENT), $argument->getIdargument(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(ArgumentTableMap::COL_COURSE_IDCOURSE), $argument->getCourseIdcourse(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the Argument table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ArgumentTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ArgumentTableMap::clearInstancePool();
            ArgumentTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(ArgumentTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ArgumentTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            ArgumentTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            ArgumentTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // ArgumentQuery
