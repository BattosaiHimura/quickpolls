<?php

namespace Base;

use \Arguments as ChildArguments;
use \ArgumentsQuery as ChildArgumentsQuery;
use \Exception;
use \PDO;
use Map\ArgumentsTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'arguments' table.
 *
 *
 *
 * @method     ChildArgumentsQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildArgumentsQuery orderByCourseId($order = Criteria::ASC) Order by the course_id column
 * @method     ChildArgumentsQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method     ChildArgumentsQuery orderByDate($order = Criteria::ASC) Order by the date column
 *
 * @method     ChildArgumentsQuery groupById() Group by the id column
 * @method     ChildArgumentsQuery groupByCourseId() Group by the course_id column
 * @method     ChildArgumentsQuery groupByDescription() Group by the description column
 * @method     ChildArgumentsQuery groupByDate() Group by the date column
 *
 * @method     ChildArgumentsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildArgumentsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildArgumentsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildArgumentsQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildArgumentsQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildArgumentsQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildArgumentsQuery leftJoinCourses($relationAlias = null) Adds a LEFT JOIN clause to the query using the Courses relation
 * @method     ChildArgumentsQuery rightJoinCourses($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Courses relation
 * @method     ChildArgumentsQuery innerJoinCourses($relationAlias = null) Adds a INNER JOIN clause to the query using the Courses relation
 *
 * @method     ChildArgumentsQuery joinWithCourses($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Courses relation
 *
 * @method     ChildArgumentsQuery leftJoinWithCourses() Adds a LEFT JOIN clause and with to the query using the Courses relation
 * @method     ChildArgumentsQuery rightJoinWithCourses() Adds a RIGHT JOIN clause and with to the query using the Courses relation
 * @method     ChildArgumentsQuery innerJoinWithCourses() Adds a INNER JOIN clause and with to the query using the Courses relation
 *
 * @method     ChildArgumentsQuery leftJoinPollsHasArguments($relationAlias = null) Adds a LEFT JOIN clause to the query using the PollsHasArguments relation
 * @method     ChildArgumentsQuery rightJoinPollsHasArguments($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PollsHasArguments relation
 * @method     ChildArgumentsQuery innerJoinPollsHasArguments($relationAlias = null) Adds a INNER JOIN clause to the query using the PollsHasArguments relation
 *
 * @method     ChildArgumentsQuery joinWithPollsHasArguments($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the PollsHasArguments relation
 *
 * @method     ChildArgumentsQuery leftJoinWithPollsHasArguments() Adds a LEFT JOIN clause and with to the query using the PollsHasArguments relation
 * @method     ChildArgumentsQuery rightJoinWithPollsHasArguments() Adds a RIGHT JOIN clause and with to the query using the PollsHasArguments relation
 * @method     ChildArgumentsQuery innerJoinWithPollsHasArguments() Adds a INNER JOIN clause and with to the query using the PollsHasArguments relation
 *
 * @method     \CoursesQuery|\PollsHasArgumentsQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildArguments findOne(ConnectionInterface $con = null) Return the first ChildArguments matching the query
 * @method     ChildArguments findOneOrCreate(ConnectionInterface $con = null) Return the first ChildArguments matching the query, or a new ChildArguments object populated from the query conditions when no match is found
 *
 * @method     ChildArguments findOneById(int $id) Return the first ChildArguments filtered by the id column
 * @method     ChildArguments findOneByCourseId(int $course_id) Return the first ChildArguments filtered by the course_id column
 * @method     ChildArguments findOneByDescription(string $description) Return the first ChildArguments filtered by the description column
 * @method     ChildArguments findOneByDate(string $date) Return the first ChildArguments filtered by the date column *

 * @method     ChildArguments requirePk($key, ConnectionInterface $con = null) Return the ChildArguments by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildArguments requireOne(ConnectionInterface $con = null) Return the first ChildArguments matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildArguments requireOneById(int $id) Return the first ChildArguments filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildArguments requireOneByCourseId(int $course_id) Return the first ChildArguments filtered by the course_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildArguments requireOneByDescription(string $description) Return the first ChildArguments filtered by the description column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildArguments requireOneByDate(string $date) Return the first ChildArguments filtered by the date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildArguments[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildArguments objects based on current ModelCriteria
 * @method     ChildArguments[]|ObjectCollection findById(int $id) Return ChildArguments objects filtered by the id column
 * @method     ChildArguments[]|ObjectCollection findByCourseId(int $course_id) Return ChildArguments objects filtered by the course_id column
 * @method     ChildArguments[]|ObjectCollection findByDescription(string $description) Return ChildArguments objects filtered by the description column
 * @method     ChildArguments[]|ObjectCollection findByDate(string $date) Return ChildArguments objects filtered by the date column
 * @method     ChildArguments[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ArgumentsQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\ArgumentsQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Arguments', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildArgumentsQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildArgumentsQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildArgumentsQuery) {
            return $criteria;
        }
        $query = new ChildArgumentsQuery();
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
     * @return ChildArguments|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(ArgumentsTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = ArgumentsTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildArguments A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, course_id, description, date FROM arguments WHERE id = :p0';
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
            /** @var ChildArguments $obj */
            $obj = new ChildArguments();
            $obj->hydrate($row);
            ArgumentsTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildArguments|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildArgumentsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ArgumentsTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildArgumentsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ArgumentsTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildArgumentsQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(ArgumentsTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(ArgumentsTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ArgumentsTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the course_id column
     *
     * Example usage:
     * <code>
     * $query->filterByCourseId(1234); // WHERE course_id = 1234
     * $query->filterByCourseId(array(12, 34)); // WHERE course_id IN (12, 34)
     * $query->filterByCourseId(array('min' => 12)); // WHERE course_id > 12
     * </code>
     *
     * @see       filterByCourses()
     *
     * @param     mixed $courseId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildArgumentsQuery The current query, for fluid interface
     */
    public function filterByCourseId($courseId = null, $comparison = null)
    {
        if (is_array($courseId)) {
            $useMinMax = false;
            if (isset($courseId['min'])) {
                $this->addUsingAlias(ArgumentsTableMap::COL_COURSE_ID, $courseId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($courseId['max'])) {
                $this->addUsingAlias(ArgumentsTableMap::COL_COURSE_ID, $courseId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ArgumentsTableMap::COL_COURSE_ID, $courseId, $comparison);
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
     * @return $this|ChildArgumentsQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ArgumentsTableMap::COL_DESCRIPTION, $description, $comparison);
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
     * @return $this|ChildArgumentsQuery The current query, for fluid interface
     */
    public function filterByDate($date = null, $comparison = null)
    {
        if (is_array($date)) {
            $useMinMax = false;
            if (isset($date['min'])) {
                $this->addUsingAlias(ArgumentsTableMap::COL_DATE, $date['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($date['max'])) {
                $this->addUsingAlias(ArgumentsTableMap::COL_DATE, $date['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ArgumentsTableMap::COL_DATE, $date, $comparison);
    }

    /**
     * Filter the query by a related \Courses object
     *
     * @param \Courses|ObjectCollection $courses The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildArgumentsQuery The current query, for fluid interface
     */
    public function filterByCourses($courses, $comparison = null)
    {
        if ($courses instanceof \Courses) {
            return $this
                ->addUsingAlias(ArgumentsTableMap::COL_COURSE_ID, $courses->getId(), $comparison);
        } elseif ($courses instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ArgumentsTableMap::COL_COURSE_ID, $courses->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByCourses() only accepts arguments of type \Courses or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Courses relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildArgumentsQuery The current query, for fluid interface
     */
    public function joinCourses($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Courses');

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
            $this->addJoinObject($join, 'Courses');
        }

        return $this;
    }

    /**
     * Use the Courses relation Courses object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \CoursesQuery A secondary query class using the current class as primary query
     */
    public function useCoursesQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCourses($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Courses', '\CoursesQuery');
    }

    /**
     * Filter the query by a related \PollsHasArguments object
     *
     * @param \PollsHasArguments|ObjectCollection $pollsHasArguments the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildArgumentsQuery The current query, for fluid interface
     */
    public function filterByPollsHasArguments($pollsHasArguments, $comparison = null)
    {
        if ($pollsHasArguments instanceof \PollsHasArguments) {
            return $this
                ->addUsingAlias(ArgumentsTableMap::COL_ID, $pollsHasArguments->getArgumentsId(), $comparison);
        } elseif ($pollsHasArguments instanceof ObjectCollection) {
            return $this
                ->usePollsHasArgumentsQuery()
                ->filterByPrimaryKeys($pollsHasArguments->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPollsHasArguments() only accepts arguments of type \PollsHasArguments or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PollsHasArguments relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildArgumentsQuery The current query, for fluid interface
     */
    public function joinPollsHasArguments($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PollsHasArguments');

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
            $this->addJoinObject($join, 'PollsHasArguments');
        }

        return $this;
    }

    /**
     * Use the PollsHasArguments relation PollsHasArguments object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \PollsHasArgumentsQuery A secondary query class using the current class as primary query
     */
    public function usePollsHasArgumentsQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPollsHasArguments($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PollsHasArguments', '\PollsHasArgumentsQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildArguments $arguments Object to remove from the list of results
     *
     * @return $this|ChildArgumentsQuery The current query, for fluid interface
     */
    public function prune($arguments = null)
    {
        if ($arguments) {
            $this->addUsingAlias(ArgumentsTableMap::COL_ID, $arguments->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the arguments table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ArgumentsTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ArgumentsTableMap::clearInstancePool();
            ArgumentsTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(ArgumentsTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ArgumentsTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            ArgumentsTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            ArgumentsTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // ArgumentsQuery
