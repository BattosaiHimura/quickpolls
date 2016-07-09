<?php

namespace Base;

use \FinalVotes as ChildFinalVotes;
use \FinalVotesQuery as ChildFinalVotesQuery;
use \Exception;
use \PDO;
use Map\FinalVotesTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'final_votes' table.
 *
 *
 *
 * @method     ChildFinalVotesQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildFinalVotesQuery orderByQualityId($order = Criteria::ASC) Order by the quality_id column
 * @method     ChildFinalVotesQuery orderByCoursesId($order = Criteria::ASC) Order by the courses_id column
 * @method     ChildFinalVotesQuery orderByUsersId($order = Criteria::ASC) Order by the users_id column
 * @method     ChildFinalVotesQuery orderByComment($order = Criteria::ASC) Order by the comment column
 *
 * @method     ChildFinalVotesQuery groupById() Group by the id column
 * @method     ChildFinalVotesQuery groupByQualityId() Group by the quality_id column
 * @method     ChildFinalVotesQuery groupByCoursesId() Group by the courses_id column
 * @method     ChildFinalVotesQuery groupByUsersId() Group by the users_id column
 * @method     ChildFinalVotesQuery groupByComment() Group by the comment column
 *
 * @method     ChildFinalVotesQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildFinalVotesQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildFinalVotesQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildFinalVotesQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildFinalVotesQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildFinalVotesQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildFinalVotesQuery leftJoinQuality($relationAlias = null) Adds a LEFT JOIN clause to the query using the Quality relation
 * @method     ChildFinalVotesQuery rightJoinQuality($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Quality relation
 * @method     ChildFinalVotesQuery innerJoinQuality($relationAlias = null) Adds a INNER JOIN clause to the query using the Quality relation
 *
 * @method     ChildFinalVotesQuery joinWithQuality($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Quality relation
 *
 * @method     ChildFinalVotesQuery leftJoinWithQuality() Adds a LEFT JOIN clause and with to the query using the Quality relation
 * @method     ChildFinalVotesQuery rightJoinWithQuality() Adds a RIGHT JOIN clause and with to the query using the Quality relation
 * @method     ChildFinalVotesQuery innerJoinWithQuality() Adds a INNER JOIN clause and with to the query using the Quality relation
 *
 * @method     ChildFinalVotesQuery leftJoinCourses($relationAlias = null) Adds a LEFT JOIN clause to the query using the Courses relation
 * @method     ChildFinalVotesQuery rightJoinCourses($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Courses relation
 * @method     ChildFinalVotesQuery innerJoinCourses($relationAlias = null) Adds a INNER JOIN clause to the query using the Courses relation
 *
 * @method     ChildFinalVotesQuery joinWithCourses($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Courses relation
 *
 * @method     ChildFinalVotesQuery leftJoinWithCourses() Adds a LEFT JOIN clause and with to the query using the Courses relation
 * @method     ChildFinalVotesQuery rightJoinWithCourses() Adds a RIGHT JOIN clause and with to the query using the Courses relation
 * @method     ChildFinalVotesQuery innerJoinWithCourses() Adds a INNER JOIN clause and with to the query using the Courses relation
 *
 * @method     ChildFinalVotesQuery leftJoinUsers($relationAlias = null) Adds a LEFT JOIN clause to the query using the Users relation
 * @method     ChildFinalVotesQuery rightJoinUsers($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Users relation
 * @method     ChildFinalVotesQuery innerJoinUsers($relationAlias = null) Adds a INNER JOIN clause to the query using the Users relation
 *
 * @method     ChildFinalVotesQuery joinWithUsers($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Users relation
 *
 * @method     ChildFinalVotesQuery leftJoinWithUsers() Adds a LEFT JOIN clause and with to the query using the Users relation
 * @method     ChildFinalVotesQuery rightJoinWithUsers() Adds a RIGHT JOIN clause and with to the query using the Users relation
 * @method     ChildFinalVotesQuery innerJoinWithUsers() Adds a INNER JOIN clause and with to the query using the Users relation
 *
 * @method     \QualityQuery|\CoursesQuery|\UsersQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildFinalVotes findOne(ConnectionInterface $con = null) Return the first ChildFinalVotes matching the query
 * @method     ChildFinalVotes findOneOrCreate(ConnectionInterface $con = null) Return the first ChildFinalVotes matching the query, or a new ChildFinalVotes object populated from the query conditions when no match is found
 *
 * @method     ChildFinalVotes findOneById(int $id) Return the first ChildFinalVotes filtered by the id column
 * @method     ChildFinalVotes findOneByQualityId(int $quality_id) Return the first ChildFinalVotes filtered by the quality_id column
 * @method     ChildFinalVotes findOneByCoursesId(int $courses_id) Return the first ChildFinalVotes filtered by the courses_id column
 * @method     ChildFinalVotes findOneByUsersId(int $users_id) Return the first ChildFinalVotes filtered by the users_id column
 * @method     ChildFinalVotes findOneByComment(string $comment) Return the first ChildFinalVotes filtered by the comment column *

 * @method     ChildFinalVotes requirePk($key, ConnectionInterface $con = null) Return the ChildFinalVotes by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFinalVotes requireOne(ConnectionInterface $con = null) Return the first ChildFinalVotes matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildFinalVotes requireOneById(int $id) Return the first ChildFinalVotes filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFinalVotes requireOneByQualityId(int $quality_id) Return the first ChildFinalVotes filtered by the quality_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFinalVotes requireOneByCoursesId(int $courses_id) Return the first ChildFinalVotes filtered by the courses_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFinalVotes requireOneByUsersId(int $users_id) Return the first ChildFinalVotes filtered by the users_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFinalVotes requireOneByComment(string $comment) Return the first ChildFinalVotes filtered by the comment column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildFinalVotes[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildFinalVotes objects based on current ModelCriteria
 * @method     ChildFinalVotes[]|ObjectCollection findById(int $id) Return ChildFinalVotes objects filtered by the id column
 * @method     ChildFinalVotes[]|ObjectCollection findByQualityId(int $quality_id) Return ChildFinalVotes objects filtered by the quality_id column
 * @method     ChildFinalVotes[]|ObjectCollection findByCoursesId(int $courses_id) Return ChildFinalVotes objects filtered by the courses_id column
 * @method     ChildFinalVotes[]|ObjectCollection findByUsersId(int $users_id) Return ChildFinalVotes objects filtered by the users_id column
 * @method     ChildFinalVotes[]|ObjectCollection findByComment(string $comment) Return ChildFinalVotes objects filtered by the comment column
 * @method     ChildFinalVotes[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class FinalVotesQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\FinalVotesQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\FinalVotes', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildFinalVotesQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildFinalVotesQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildFinalVotesQuery) {
            return $criteria;
        }
        $query = new ChildFinalVotesQuery();
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
     * @return ChildFinalVotes|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(FinalVotesTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = FinalVotesTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildFinalVotes A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, quality_id, courses_id, users_id, comment FROM final_votes WHERE id = :p0';
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
            /** @var ChildFinalVotes $obj */
            $obj = new ChildFinalVotes();
            $obj->hydrate($row);
            FinalVotesTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildFinalVotes|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildFinalVotesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(FinalVotesTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildFinalVotesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(FinalVotesTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildFinalVotesQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(FinalVotesTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(FinalVotesTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FinalVotesTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the quality_id column
     *
     * Example usage:
     * <code>
     * $query->filterByQualityId(1234); // WHERE quality_id = 1234
     * $query->filterByQualityId(array(12, 34)); // WHERE quality_id IN (12, 34)
     * $query->filterByQualityId(array('min' => 12)); // WHERE quality_id > 12
     * </code>
     *
     * @see       filterByQuality()
     *
     * @param     mixed $qualityId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFinalVotesQuery The current query, for fluid interface
     */
    public function filterByQualityId($qualityId = null, $comparison = null)
    {
        if (is_array($qualityId)) {
            $useMinMax = false;
            if (isset($qualityId['min'])) {
                $this->addUsingAlias(FinalVotesTableMap::COL_QUALITY_ID, $qualityId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($qualityId['max'])) {
                $this->addUsingAlias(FinalVotesTableMap::COL_QUALITY_ID, $qualityId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FinalVotesTableMap::COL_QUALITY_ID, $qualityId, $comparison);
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
     * @return $this|ChildFinalVotesQuery The current query, for fluid interface
     */
    public function filterByCoursesId($coursesId = null, $comparison = null)
    {
        if (is_array($coursesId)) {
            $useMinMax = false;
            if (isset($coursesId['min'])) {
                $this->addUsingAlias(FinalVotesTableMap::COL_COURSES_ID, $coursesId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($coursesId['max'])) {
                $this->addUsingAlias(FinalVotesTableMap::COL_COURSES_ID, $coursesId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FinalVotesTableMap::COL_COURSES_ID, $coursesId, $comparison);
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
     * @return $this|ChildFinalVotesQuery The current query, for fluid interface
     */
    public function filterByUsersId($usersId = null, $comparison = null)
    {
        if (is_array($usersId)) {
            $useMinMax = false;
            if (isset($usersId['min'])) {
                $this->addUsingAlias(FinalVotesTableMap::COL_USERS_ID, $usersId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($usersId['max'])) {
                $this->addUsingAlias(FinalVotesTableMap::COL_USERS_ID, $usersId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FinalVotesTableMap::COL_USERS_ID, $usersId, $comparison);
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
     * @return $this|ChildFinalVotesQuery The current query, for fluid interface
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

        return $this->addUsingAlias(FinalVotesTableMap::COL_COMMENT, $comment, $comparison);
    }

    /**
     * Filter the query by a related \Quality object
     *
     * @param \Quality|ObjectCollection $quality The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildFinalVotesQuery The current query, for fluid interface
     */
    public function filterByQuality($quality, $comparison = null)
    {
        if ($quality instanceof \Quality) {
            return $this
                ->addUsingAlias(FinalVotesTableMap::COL_QUALITY_ID, $quality->getId(), $comparison);
        } elseif ($quality instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(FinalVotesTableMap::COL_QUALITY_ID, $quality->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return $this|ChildFinalVotesQuery The current query, for fluid interface
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
     * Filter the query by a related \Courses object
     *
     * @param \Courses|ObjectCollection $courses The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildFinalVotesQuery The current query, for fluid interface
     */
    public function filterByCourses($courses, $comparison = null)
    {
        if ($courses instanceof \Courses) {
            return $this
                ->addUsingAlias(FinalVotesTableMap::COL_COURSES_ID, $courses->getId(), $comparison);
        } elseif ($courses instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(FinalVotesTableMap::COL_COURSES_ID, $courses->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return $this|ChildFinalVotesQuery The current query, for fluid interface
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
     * Filter the query by a related \Users object
     *
     * @param \Users|ObjectCollection $users The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildFinalVotesQuery The current query, for fluid interface
     */
    public function filterByUsers($users, $comparison = null)
    {
        if ($users instanceof \Users) {
            return $this
                ->addUsingAlias(FinalVotesTableMap::COL_USERS_ID, $users->getId(), $comparison);
        } elseif ($users instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(FinalVotesTableMap::COL_USERS_ID, $users->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return $this|ChildFinalVotesQuery The current query, for fluid interface
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
     * Exclude object from result
     *
     * @param   ChildFinalVotes $finalVotes Object to remove from the list of results
     *
     * @return $this|ChildFinalVotesQuery The current query, for fluid interface
     */
    public function prune($finalVotes = null)
    {
        if ($finalVotes) {
            $this->addUsingAlias(FinalVotesTableMap::COL_ID, $finalVotes->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the final_votes table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(FinalVotesTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            FinalVotesTableMap::clearInstancePool();
            FinalVotesTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(FinalVotesTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(FinalVotesTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            FinalVotesTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            FinalVotesTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // FinalVotesQuery
