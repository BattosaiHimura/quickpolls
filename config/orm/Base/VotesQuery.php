<?php

namespace Base;

use \Votes as ChildVotes;
use \VotesQuery as ChildVotesQuery;
use \Exception;
use \PDO;
use Map\VotesTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'votes' table.
 *
 *
 *
 * @method     ChildVotesQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildVotesQuery orderByUsersId($order = Criteria::ASC) Order by the users_id column
 * @method     ChildVotesQuery orderByQualityId($order = Criteria::ASC) Order by the quality_id column
 * @method     ChildVotesQuery orderByPollId($order = Criteria::ASC) Order by the poll_id column
 * @method     ChildVotesQuery orderByArgumentId($order = Criteria::ASC) Order by the argument_id column
 *
 * @method     ChildVotesQuery groupById() Group by the id column
 * @method     ChildVotesQuery groupByUsersId() Group by the users_id column
 * @method     ChildVotesQuery groupByQualityId() Group by the quality_id column
 * @method     ChildVotesQuery groupByPollId() Group by the poll_id column
 * @method     ChildVotesQuery groupByArgumentId() Group by the argument_id column
 *
 * @method     ChildVotesQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildVotesQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildVotesQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildVotesQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildVotesQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildVotesQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildVotesQuery leftJoinUsers($relationAlias = null) Adds a LEFT JOIN clause to the query using the Users relation
 * @method     ChildVotesQuery rightJoinUsers($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Users relation
 * @method     ChildVotesQuery innerJoinUsers($relationAlias = null) Adds a INNER JOIN clause to the query using the Users relation
 *
 * @method     ChildVotesQuery joinWithUsers($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Users relation
 *
 * @method     ChildVotesQuery leftJoinWithUsers() Adds a LEFT JOIN clause and with to the query using the Users relation
 * @method     ChildVotesQuery rightJoinWithUsers() Adds a RIGHT JOIN clause and with to the query using the Users relation
 * @method     ChildVotesQuery innerJoinWithUsers() Adds a INNER JOIN clause and with to the query using the Users relation
 *
 * @method     ChildVotesQuery leftJoinQuality($relationAlias = null) Adds a LEFT JOIN clause to the query using the Quality relation
 * @method     ChildVotesQuery rightJoinQuality($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Quality relation
 * @method     ChildVotesQuery innerJoinQuality($relationAlias = null) Adds a INNER JOIN clause to the query using the Quality relation
 *
 * @method     ChildVotesQuery joinWithQuality($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Quality relation
 *
 * @method     ChildVotesQuery leftJoinWithQuality() Adds a LEFT JOIN clause and with to the query using the Quality relation
 * @method     ChildVotesQuery rightJoinWithQuality() Adds a RIGHT JOIN clause and with to the query using the Quality relation
 * @method     ChildVotesQuery innerJoinWithQuality() Adds a INNER JOIN clause and with to the query using the Quality relation
 *
 * @method     ChildVotesQuery leftJoinPollsHasArguments($relationAlias = null) Adds a LEFT JOIN clause to the query using the PollsHasArguments relation
 * @method     ChildVotesQuery rightJoinPollsHasArguments($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PollsHasArguments relation
 * @method     ChildVotesQuery innerJoinPollsHasArguments($relationAlias = null) Adds a INNER JOIN clause to the query using the PollsHasArguments relation
 *
 * @method     ChildVotesQuery joinWithPollsHasArguments($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the PollsHasArguments relation
 *
 * @method     ChildVotesQuery leftJoinWithPollsHasArguments() Adds a LEFT JOIN clause and with to the query using the PollsHasArguments relation
 * @method     ChildVotesQuery rightJoinWithPollsHasArguments() Adds a RIGHT JOIN clause and with to the query using the PollsHasArguments relation
 * @method     ChildVotesQuery innerJoinWithPollsHasArguments() Adds a INNER JOIN clause and with to the query using the PollsHasArguments relation
 *
 * @method     ChildVotesQuery leftJoinComments($relationAlias = null) Adds a LEFT JOIN clause to the query using the Comments relation
 * @method     ChildVotesQuery rightJoinComments($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Comments relation
 * @method     ChildVotesQuery innerJoinComments($relationAlias = null) Adds a INNER JOIN clause to the query using the Comments relation
 *
 * @method     ChildVotesQuery joinWithComments($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Comments relation
 *
 * @method     ChildVotesQuery leftJoinWithComments() Adds a LEFT JOIN clause and with to the query using the Comments relation
 * @method     ChildVotesQuery rightJoinWithComments() Adds a RIGHT JOIN clause and with to the query using the Comments relation
 * @method     ChildVotesQuery innerJoinWithComments() Adds a INNER JOIN clause and with to the query using the Comments relation
 *
 * @method     \UsersQuery|\QualityQuery|\PollsHasArgumentsQuery|\CommentsQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildVotes findOne(ConnectionInterface $con = null) Return the first ChildVotes matching the query
 * @method     ChildVotes findOneOrCreate(ConnectionInterface $con = null) Return the first ChildVotes matching the query, or a new ChildVotes object populated from the query conditions when no match is found
 *
 * @method     ChildVotes findOneById(int $id) Return the first ChildVotes filtered by the id column
 * @method     ChildVotes findOneByUsersId(int $users_id) Return the first ChildVotes filtered by the users_id column
 * @method     ChildVotes findOneByQualityId(int $quality_id) Return the first ChildVotes filtered by the quality_id column
 * @method     ChildVotes findOneByPollId(int $poll_id) Return the first ChildVotes filtered by the poll_id column
 * @method     ChildVotes findOneByArgumentId(int $argument_id) Return the first ChildVotes filtered by the argument_id column *

 * @method     ChildVotes requirePk($key, ConnectionInterface $con = null) Return the ChildVotes by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildVotes requireOne(ConnectionInterface $con = null) Return the first ChildVotes matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildVotes requireOneById(int $id) Return the first ChildVotes filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildVotes requireOneByUsersId(int $users_id) Return the first ChildVotes filtered by the users_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildVotes requireOneByQualityId(int $quality_id) Return the first ChildVotes filtered by the quality_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildVotes requireOneByPollId(int $poll_id) Return the first ChildVotes filtered by the poll_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildVotes requireOneByArgumentId(int $argument_id) Return the first ChildVotes filtered by the argument_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildVotes[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildVotes objects based on current ModelCriteria
 * @method     ChildVotes[]|ObjectCollection findById(int $id) Return ChildVotes objects filtered by the id column
 * @method     ChildVotes[]|ObjectCollection findByUsersId(int $users_id) Return ChildVotes objects filtered by the users_id column
 * @method     ChildVotes[]|ObjectCollection findByQualityId(int $quality_id) Return ChildVotes objects filtered by the quality_id column
 * @method     ChildVotes[]|ObjectCollection findByPollId(int $poll_id) Return ChildVotes objects filtered by the poll_id column
 * @method     ChildVotes[]|ObjectCollection findByArgumentId(int $argument_id) Return ChildVotes objects filtered by the argument_id column
 * @method     ChildVotes[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class VotesQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\VotesQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Votes', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildVotesQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildVotesQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildVotesQuery) {
            return $criteria;
        }
        $query = new ChildVotesQuery();
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
     * @return ChildVotes|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(VotesTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = VotesTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildVotes A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, users_id, quality_id, poll_id, argument_id FROM votes WHERE id = :p0';
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
            /** @var ChildVotes $obj */
            $obj = new ChildVotes();
            $obj->hydrate($row);
            VotesTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildVotes|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildVotesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(VotesTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildVotesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(VotesTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildVotesQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(VotesTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(VotesTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VotesTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildVotesQuery The current query, for fluid interface
     */
    public function filterByUsersId($usersId = null, $comparison = null)
    {
        if (is_array($usersId)) {
            $useMinMax = false;
            if (isset($usersId['min'])) {
                $this->addUsingAlias(VotesTableMap::COL_USERS_ID, $usersId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($usersId['max'])) {
                $this->addUsingAlias(VotesTableMap::COL_USERS_ID, $usersId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VotesTableMap::COL_USERS_ID, $usersId, $comparison);
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
     * @return $this|ChildVotesQuery The current query, for fluid interface
     */
    public function filterByQualityId($qualityId = null, $comparison = null)
    {
        if (is_array($qualityId)) {
            $useMinMax = false;
            if (isset($qualityId['min'])) {
                $this->addUsingAlias(VotesTableMap::COL_QUALITY_ID, $qualityId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($qualityId['max'])) {
                $this->addUsingAlias(VotesTableMap::COL_QUALITY_ID, $qualityId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VotesTableMap::COL_QUALITY_ID, $qualityId, $comparison);
    }

    /**
     * Filter the query on the poll_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPollId(1234); // WHERE poll_id = 1234
     * $query->filterByPollId(array(12, 34)); // WHERE poll_id IN (12, 34)
     * $query->filterByPollId(array('min' => 12)); // WHERE poll_id > 12
     * </code>
     *
     * @see       filterByPollsHasArguments()
     *
     * @param     mixed $pollId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildVotesQuery The current query, for fluid interface
     */
    public function filterByPollId($pollId = null, $comparison = null)
    {
        if (is_array($pollId)) {
            $useMinMax = false;
            if (isset($pollId['min'])) {
                $this->addUsingAlias(VotesTableMap::COL_POLL_ID, $pollId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pollId['max'])) {
                $this->addUsingAlias(VotesTableMap::COL_POLL_ID, $pollId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VotesTableMap::COL_POLL_ID, $pollId, $comparison);
    }

    /**
     * Filter the query on the argument_id column
     *
     * Example usage:
     * <code>
     * $query->filterByArgumentId(1234); // WHERE argument_id = 1234
     * $query->filterByArgumentId(array(12, 34)); // WHERE argument_id IN (12, 34)
     * $query->filterByArgumentId(array('min' => 12)); // WHERE argument_id > 12
     * </code>
     *
     * @see       filterByPollsHasArguments()
     *
     * @param     mixed $argumentId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildVotesQuery The current query, for fluid interface
     */
    public function filterByArgumentId($argumentId = null, $comparison = null)
    {
        if (is_array($argumentId)) {
            $useMinMax = false;
            if (isset($argumentId['min'])) {
                $this->addUsingAlias(VotesTableMap::COL_ARGUMENT_ID, $argumentId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($argumentId['max'])) {
                $this->addUsingAlias(VotesTableMap::COL_ARGUMENT_ID, $argumentId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VotesTableMap::COL_ARGUMENT_ID, $argumentId, $comparison);
    }

    /**
     * Filter the query by a related \Users object
     *
     * @param \Users|ObjectCollection $users The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildVotesQuery The current query, for fluid interface
     */
    public function filterByUsers($users, $comparison = null)
    {
        if ($users instanceof \Users) {
            return $this
                ->addUsingAlias(VotesTableMap::COL_USERS_ID, $users->getId(), $comparison);
        } elseif ($users instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(VotesTableMap::COL_USERS_ID, $users->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return $this|ChildVotesQuery The current query, for fluid interface
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
     * Filter the query by a related \Quality object
     *
     * @param \Quality|ObjectCollection $quality The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildVotesQuery The current query, for fluid interface
     */
    public function filterByQuality($quality, $comparison = null)
    {
        if ($quality instanceof \Quality) {
            return $this
                ->addUsingAlias(VotesTableMap::COL_QUALITY_ID, $quality->getId(), $comparison);
        } elseif ($quality instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(VotesTableMap::COL_QUALITY_ID, $quality->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return $this|ChildVotesQuery The current query, for fluid interface
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
     * Filter the query by a related \PollsHasArguments object
     *
     * @param \PollsHasArguments $pollsHasArguments The related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildVotesQuery The current query, for fluid interface
     */
    public function filterByPollsHasArguments($pollsHasArguments, $comparison = null)
    {
        if ($pollsHasArguments instanceof \PollsHasArguments) {
            return $this
                ->addUsingAlias(VotesTableMap::COL_POLL_ID, $pollsHasArguments->getPollsId(), $comparison)
                ->addUsingAlias(VotesTableMap::COL_ARGUMENT_ID, $pollsHasArguments->getArgumentsId(), $comparison);
        } else {
            throw new PropelException('filterByPollsHasArguments() only accepts arguments of type \PollsHasArguments');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PollsHasArguments relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildVotesQuery The current query, for fluid interface
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
     * Filter the query by a related \Comments object
     *
     * @param \Comments|ObjectCollection $comments the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildVotesQuery The current query, for fluid interface
     */
    public function filterByComments($comments, $comparison = null)
    {
        if ($comments instanceof \Comments) {
            return $this
                ->addUsingAlias(VotesTableMap::COL_ID, $comments->getVoteId(), $comparison);
        } elseif ($comments instanceof ObjectCollection) {
            return $this
                ->useCommentsQuery()
                ->filterByPrimaryKeys($comments->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByComments() only accepts arguments of type \Comments or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Comments relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildVotesQuery The current query, for fluid interface
     */
    public function joinComments($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Comments');

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
            $this->addJoinObject($join, 'Comments');
        }

        return $this;
    }

    /**
     * Use the Comments relation Comments object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \CommentsQuery A secondary query class using the current class as primary query
     */
    public function useCommentsQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinComments($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Comments', '\CommentsQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildVotes $votes Object to remove from the list of results
     *
     * @return $this|ChildVotesQuery The current query, for fluid interface
     */
    public function prune($votes = null)
    {
        if ($votes) {
            $this->addUsingAlias(VotesTableMap::COL_ID, $votes->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the votes table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(VotesTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            VotesTableMap::clearInstancePool();
            VotesTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(VotesTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(VotesTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            VotesTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            VotesTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // VotesQuery
