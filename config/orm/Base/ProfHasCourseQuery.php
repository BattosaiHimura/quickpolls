<?php

namespace Base;

use \ProfHasCourse as ChildProfHasCourse;
use \ProfHasCourseQuery as ChildProfHasCourseQuery;
use \Exception;
use \PDO;
use Map\ProfHasCourseTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'prof_has_course' table.
 *
 *
 *
 * @method     ChildProfHasCourseQuery orderByUsersId($order = Criteria::ASC) Order by the users_id column
 * @method     ChildProfHasCourseQuery orderByCoursesId($order = Criteria::ASC) Order by the courses_id column
 * @method     ChildProfHasCourseQuery orderByIsLab($order = Criteria::ASC) Order by the is_lab column
 * @method     ChildProfHasCourseQuery orderByPresence($order = Criteria::ASC) Order by the presence column
 *
 * @method     ChildProfHasCourseQuery groupByUsersId() Group by the users_id column
 * @method     ChildProfHasCourseQuery groupByCoursesId() Group by the courses_id column
 * @method     ChildProfHasCourseQuery groupByIsLab() Group by the is_lab column
 * @method     ChildProfHasCourseQuery groupByPresence() Group by the presence column
 *
 * @method     ChildProfHasCourseQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildProfHasCourseQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildProfHasCourseQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildProfHasCourseQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildProfHasCourseQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildProfHasCourseQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildProfHasCourseQuery leftJoinUsers($relationAlias = null) Adds a LEFT JOIN clause to the query using the Users relation
 * @method     ChildProfHasCourseQuery rightJoinUsers($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Users relation
 * @method     ChildProfHasCourseQuery innerJoinUsers($relationAlias = null) Adds a INNER JOIN clause to the query using the Users relation
 *
 * @method     ChildProfHasCourseQuery joinWithUsers($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Users relation
 *
 * @method     ChildProfHasCourseQuery leftJoinWithUsers() Adds a LEFT JOIN clause and with to the query using the Users relation
 * @method     ChildProfHasCourseQuery rightJoinWithUsers() Adds a RIGHT JOIN clause and with to the query using the Users relation
 * @method     ChildProfHasCourseQuery innerJoinWithUsers() Adds a INNER JOIN clause and with to the query using the Users relation
 *
 * @method     ChildProfHasCourseQuery leftJoinCourses($relationAlias = null) Adds a LEFT JOIN clause to the query using the Courses relation
 * @method     ChildProfHasCourseQuery rightJoinCourses($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Courses relation
 * @method     ChildProfHasCourseQuery innerJoinCourses($relationAlias = null) Adds a INNER JOIN clause to the query using the Courses relation
 *
 * @method     ChildProfHasCourseQuery joinWithCourses($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Courses relation
 *
 * @method     ChildProfHasCourseQuery leftJoinWithCourses() Adds a LEFT JOIN clause and with to the query using the Courses relation
 * @method     ChildProfHasCourseQuery rightJoinWithCourses() Adds a RIGHT JOIN clause and with to the query using the Courses relation
 * @method     ChildProfHasCourseQuery innerJoinWithCourses() Adds a INNER JOIN clause and with to the query using the Courses relation
 *
 * @method     \UsersQuery|\CoursesQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildProfHasCourse findOne(ConnectionInterface $con = null) Return the first ChildProfHasCourse matching the query
 * @method     ChildProfHasCourse findOneOrCreate(ConnectionInterface $con = null) Return the first ChildProfHasCourse matching the query, or a new ChildProfHasCourse object populated from the query conditions when no match is found
 *
 * @method     ChildProfHasCourse findOneByUsersId(int $users_id) Return the first ChildProfHasCourse filtered by the users_id column
 * @method     ChildProfHasCourse findOneByCoursesId(int $courses_id) Return the first ChildProfHasCourse filtered by the courses_id column
 * @method     ChildProfHasCourse findOneByIsLab(boolean $is_lab) Return the first ChildProfHasCourse filtered by the is_lab column
 * @method     ChildProfHasCourse findOneByPresence(int $presence) Return the first ChildProfHasCourse filtered by the presence column *

 * @method     ChildProfHasCourse requirePk($key, ConnectionInterface $con = null) Return the ChildProfHasCourse by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProfHasCourse requireOne(ConnectionInterface $con = null) Return the first ChildProfHasCourse matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildProfHasCourse requireOneByUsersId(int $users_id) Return the first ChildProfHasCourse filtered by the users_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProfHasCourse requireOneByCoursesId(int $courses_id) Return the first ChildProfHasCourse filtered by the courses_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProfHasCourse requireOneByIsLab(boolean $is_lab) Return the first ChildProfHasCourse filtered by the is_lab column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProfHasCourse requireOneByPresence(int $presence) Return the first ChildProfHasCourse filtered by the presence column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildProfHasCourse[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildProfHasCourse objects based on current ModelCriteria
 * @method     ChildProfHasCourse[]|ObjectCollection findByUsersId(int $users_id) Return ChildProfHasCourse objects filtered by the users_id column
 * @method     ChildProfHasCourse[]|ObjectCollection findByCoursesId(int $courses_id) Return ChildProfHasCourse objects filtered by the courses_id column
 * @method     ChildProfHasCourse[]|ObjectCollection findByIsLab(boolean $is_lab) Return ChildProfHasCourse objects filtered by the is_lab column
 * @method     ChildProfHasCourse[]|ObjectCollection findByPresence(int $presence) Return ChildProfHasCourse objects filtered by the presence column
 * @method     ChildProfHasCourse[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ProfHasCourseQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\ProfHasCourseQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\ProfHasCourse', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildProfHasCourseQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildProfHasCourseQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildProfHasCourseQuery) {
            return $criteria;
        }
        $query = new ChildProfHasCourseQuery();
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
     * @param array[$users_id, $courses_id] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildProfHasCourse|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(ProfHasCourseTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = ProfHasCourseTableMap::getInstanceFromPool(serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]))))) {
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
     * @return ChildProfHasCourse A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT users_id, courses_id, is_lab, presence FROM prof_has_course WHERE users_id = :p0 AND courses_id = :p1';
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
            /** @var ChildProfHasCourse $obj */
            $obj = new ChildProfHasCourse();
            $obj->hydrate($row);
            ProfHasCourseTableMap::addInstanceToPool($obj, serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]));
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
     * @return ChildProfHasCourse|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildProfHasCourseQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(ProfHasCourseTableMap::COL_USERS_ID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(ProfHasCourseTableMap::COL_COURSES_ID, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildProfHasCourseQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(ProfHasCourseTableMap::COL_USERS_ID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(ProfHasCourseTableMap::COL_COURSES_ID, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the users_id column
     *
     * Example usage:
     * <code>
     * $query->filterByUsersId(1234); // WHERE users_id = 1234
     * $query->filterByUsersId(array(12, 34)); // WHERE users_id IN (12, 34)
     * $query->filterByUsersId(array('min' => 12)); // WHERE users_id > 12
     * </code>
     *
     * @see       filterByUsers()
     *
     * @param     mixed $usersId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildProfHasCourseQuery The current query, for fluid interface
     */
    public function filterByUsersId($usersId = null, $comparison = null)
    {
        if (is_array($usersId)) {
            $useMinMax = false;
            if (isset($usersId['min'])) {
                $this->addUsingAlias(ProfHasCourseTableMap::COL_USERS_ID, $usersId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($usersId['max'])) {
                $this->addUsingAlias(ProfHasCourseTableMap::COL_USERS_ID, $usersId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProfHasCourseTableMap::COL_USERS_ID, $usersId, $comparison);
    }

    /**
     * Filter the query on the courses_id column
     *
     * Example usage:
     * <code>
     * $query->filterByCoursesId(1234); // WHERE courses_id = 1234
     * $query->filterByCoursesId(array(12, 34)); // WHERE courses_id IN (12, 34)
     * $query->filterByCoursesId(array('min' => 12)); // WHERE courses_id > 12
     * </code>
     *
     * @see       filterByCourses()
     *
     * @param     mixed $coursesId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildProfHasCourseQuery The current query, for fluid interface
     */
    public function filterByCoursesId($coursesId = null, $comparison = null)
    {
        if (is_array($coursesId)) {
            $useMinMax = false;
            if (isset($coursesId['min'])) {
                $this->addUsingAlias(ProfHasCourseTableMap::COL_COURSES_ID, $coursesId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($coursesId['max'])) {
                $this->addUsingAlias(ProfHasCourseTableMap::COL_COURSES_ID, $coursesId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProfHasCourseTableMap::COL_COURSES_ID, $coursesId, $comparison);
    }

    /**
     * Filter the query on the is_lab column
     *
     * Example usage:
     * <code>
     * $query->filterByIsLab(true); // WHERE is_lab = true
     * $query->filterByIsLab('yes'); // WHERE is_lab = true
     * </code>
     *
     * @param     boolean|string $isLab The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildProfHasCourseQuery The current query, for fluid interface
     */
    public function filterByIsLab($isLab = null, $comparison = null)
    {
        if (is_string($isLab)) {
            $isLab = in_array(strtolower($isLab), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ProfHasCourseTableMap::COL_IS_LAB, $isLab, $comparison);
    }

    /**
     * Filter the query on the presence column
     *
     * Example usage:
     * <code>
     * $query->filterByPresence(1234); // WHERE presence = 1234
     * $query->filterByPresence(array(12, 34)); // WHERE presence IN (12, 34)
     * $query->filterByPresence(array('min' => 12)); // WHERE presence > 12
     * </code>
     *
     * @param     mixed $presence The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildProfHasCourseQuery The current query, for fluid interface
     */
    public function filterByPresence($presence = null, $comparison = null)
    {
        if (is_array($presence)) {
            $useMinMax = false;
            if (isset($presence['min'])) {
                $this->addUsingAlias(ProfHasCourseTableMap::COL_PRESENCE, $presence['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($presence['max'])) {
                $this->addUsingAlias(ProfHasCourseTableMap::COL_PRESENCE, $presence['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProfHasCourseTableMap::COL_PRESENCE, $presence, $comparison);
    }

    /**
     * Filter the query by a related \Users object
     *
     * @param \Users|ObjectCollection $users The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildProfHasCourseQuery The current query, for fluid interface
     */
    public function filterByUsers($users, $comparison = null)
    {
        if ($users instanceof \Users) {
            return $this
                ->addUsingAlias(ProfHasCourseTableMap::COL_USERS_ID, $users->getId(), $comparison);
        } elseif ($users instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProfHasCourseTableMap::COL_USERS_ID, $users->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return $this|ChildProfHasCourseQuery The current query, for fluid interface
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
     * Filter the query by a related \Courses object
     *
     * @param \Courses|ObjectCollection $courses The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildProfHasCourseQuery The current query, for fluid interface
     */
    public function filterByCourses($courses, $comparison = null)
    {
        if ($courses instanceof \Courses) {
            return $this
                ->addUsingAlias(ProfHasCourseTableMap::COL_COURSES_ID, $courses->getId(), $comparison);
        } elseif ($courses instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProfHasCourseTableMap::COL_COURSES_ID, $courses->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return $this|ChildProfHasCourseQuery The current query, for fluid interface
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
     * Exclude object from result
     *
     * @param   ChildProfHasCourse $profHasCourse Object to remove from the list of results
     *
     * @return $this|ChildProfHasCourseQuery The current query, for fluid interface
     */
    public function prune($profHasCourse = null)
    {
        if ($profHasCourse) {
            $this->addCond('pruneCond0', $this->getAliasedColName(ProfHasCourseTableMap::COL_USERS_ID), $profHasCourse->getUsersId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(ProfHasCourseTableMap::COL_COURSES_ID), $profHasCourse->getCoursesId(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the prof_has_course table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ProfHasCourseTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ProfHasCourseTableMap::clearInstancePool();
            ProfHasCourseTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(ProfHasCourseTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ProfHasCourseTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            ProfHasCourseTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            ProfHasCourseTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // ProfHasCourseQuery
