<?php

namespace Base;

use \PollsHasArguments as ChildPollsHasArguments;
use \PollsHasArgumentsQuery as ChildPollsHasArgumentsQuery;
use \Exception;
use \PDO;
use Map\PollsHasArgumentsTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'polls_has_arguments' table.
 *
 *
 *
 * @method     ChildPollsHasArgumentsQuery orderByPollsId($order = Criteria::ASC) Order by the polls_id column
 * @method     ChildPollsHasArgumentsQuery orderByArgumentsId($order = Criteria::ASC) Order by the arguments_id column
 *
 * @method     ChildPollsHasArgumentsQuery groupByPollsId() Group by the polls_id column
 * @method     ChildPollsHasArgumentsQuery groupByArgumentsId() Group by the arguments_id column
 *
 * @method     ChildPollsHasArgumentsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildPollsHasArgumentsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildPollsHasArgumentsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildPollsHasArgumentsQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildPollsHasArgumentsQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildPollsHasArgumentsQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildPollsHasArgumentsQuery leftJoinPolls($relationAlias = null) Adds a LEFT JOIN clause to the query using the Polls relation
 * @method     ChildPollsHasArgumentsQuery rightJoinPolls($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Polls relation
 * @method     ChildPollsHasArgumentsQuery innerJoinPolls($relationAlias = null) Adds a INNER JOIN clause to the query using the Polls relation
 *
 * @method     ChildPollsHasArgumentsQuery joinWithPolls($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Polls relation
 *
 * @method     ChildPollsHasArgumentsQuery leftJoinWithPolls() Adds a LEFT JOIN clause and with to the query using the Polls relation
 * @method     ChildPollsHasArgumentsQuery rightJoinWithPolls() Adds a RIGHT JOIN clause and with to the query using the Polls relation
 * @method     ChildPollsHasArgumentsQuery innerJoinWithPolls() Adds a INNER JOIN clause and with to the query using the Polls relation
 *
 * @method     ChildPollsHasArgumentsQuery leftJoinArguments($relationAlias = null) Adds a LEFT JOIN clause to the query using the Arguments relation
 * @method     ChildPollsHasArgumentsQuery rightJoinArguments($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Arguments relation
 * @method     ChildPollsHasArgumentsQuery innerJoinArguments($relationAlias = null) Adds a INNER JOIN clause to the query using the Arguments relation
 *
 * @method     ChildPollsHasArgumentsQuery joinWithArguments($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Arguments relation
 *
 * @method     ChildPollsHasArgumentsQuery leftJoinWithArguments() Adds a LEFT JOIN clause and with to the query using the Arguments relation
 * @method     ChildPollsHasArgumentsQuery rightJoinWithArguments() Adds a RIGHT JOIN clause and with to the query using the Arguments relation
 * @method     ChildPollsHasArgumentsQuery innerJoinWithArguments() Adds a INNER JOIN clause and with to the query using the Arguments relation
 *
 * @method     ChildPollsHasArgumentsQuery leftJoinVotes($relationAlias = null) Adds a LEFT JOIN clause to the query using the Votes relation
 * @method     ChildPollsHasArgumentsQuery rightJoinVotes($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Votes relation
 * @method     ChildPollsHasArgumentsQuery innerJoinVotes($relationAlias = null) Adds a INNER JOIN clause to the query using the Votes relation
 *
 * @method     ChildPollsHasArgumentsQuery joinWithVotes($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Votes relation
 *
 * @method     ChildPollsHasArgumentsQuery leftJoinWithVotes() Adds a LEFT JOIN clause and with to the query using the Votes relation
 * @method     ChildPollsHasArgumentsQuery rightJoinWithVotes() Adds a RIGHT JOIN clause and with to the query using the Votes relation
 * @method     ChildPollsHasArgumentsQuery innerJoinWithVotes() Adds a INNER JOIN clause and with to the query using the Votes relation
 *
 * @method     \PollsQuery|\ArgumentsQuery|\VotesQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildPollsHasArguments findOne(ConnectionInterface $con = null) Return the first ChildPollsHasArguments matching the query
 * @method     ChildPollsHasArguments findOneOrCreate(ConnectionInterface $con = null) Return the first ChildPollsHasArguments matching the query, or a new ChildPollsHasArguments object populated from the query conditions when no match is found
 *
 * @method     ChildPollsHasArguments findOneByPollsId(int $polls_id) Return the first ChildPollsHasArguments filtered by the polls_id column
 * @method     ChildPollsHasArguments findOneByArgumentsId(int $arguments_id) Return the first ChildPollsHasArguments filtered by the arguments_id column *

 * @method     ChildPollsHasArguments requirePk($key, ConnectionInterface $con = null) Return the ChildPollsHasArguments by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPollsHasArguments requireOne(ConnectionInterface $con = null) Return the first ChildPollsHasArguments matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPollsHasArguments requireOneByPollsId(int $polls_id) Return the first ChildPollsHasArguments filtered by the polls_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPollsHasArguments requireOneByArgumentsId(int $arguments_id) Return the first ChildPollsHasArguments filtered by the arguments_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPollsHasArguments[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildPollsHasArguments objects based on current ModelCriteria
 * @method     ChildPollsHasArguments[]|ObjectCollection findByPollsId(int $polls_id) Return ChildPollsHasArguments objects filtered by the polls_id column
 * @method     ChildPollsHasArguments[]|ObjectCollection findByArgumentsId(int $arguments_id) Return ChildPollsHasArguments objects filtered by the arguments_id column
 * @method     ChildPollsHasArguments[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class PollsHasArgumentsQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\PollsHasArgumentsQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\PollsHasArguments', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildPollsHasArgumentsQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildPollsHasArgumentsQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildPollsHasArgumentsQuery) {
            return $criteria;
        }
        $query = new ChildPollsHasArgumentsQuery();
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
     * @param array[$polls_id, $arguments_id] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildPollsHasArguments|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(PollsHasArgumentsTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = PollsHasArgumentsTableMap::getInstanceFromPool(serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]))))) {
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
     * @return ChildPollsHasArguments A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT polls_id, arguments_id FROM polls_has_arguments WHERE polls_id = :p0 AND arguments_id = :p1';
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
            /** @var ChildPollsHasArguments $obj */
            $obj = new ChildPollsHasArguments();
            $obj->hydrate($row);
            PollsHasArgumentsTableMap::addInstanceToPool($obj, serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]));
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
     * @return ChildPollsHasArguments|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildPollsHasArgumentsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(PollsHasArgumentsTableMap::COL_POLLS_ID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(PollsHasArgumentsTableMap::COL_ARGUMENTS_ID, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildPollsHasArgumentsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(PollsHasArgumentsTableMap::COL_POLLS_ID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(PollsHasArgumentsTableMap::COL_ARGUMENTS_ID, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the polls_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPollsId(1234); // WHERE polls_id = 1234
     * $query->filterByPollsId(array(12, 34)); // WHERE polls_id IN (12, 34)
     * $query->filterByPollsId(array('min' => 12)); // WHERE polls_id > 12
     * </code>
     *
     * @see       filterByPolls()
     *
     * @param     mixed $pollsId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPollsHasArgumentsQuery The current query, for fluid interface
     */
    public function filterByPollsId($pollsId = null, $comparison = null)
    {
        if (is_array($pollsId)) {
            $useMinMax = false;
            if (isset($pollsId['min'])) {
                $this->addUsingAlias(PollsHasArgumentsTableMap::COL_POLLS_ID, $pollsId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pollsId['max'])) {
                $this->addUsingAlias(PollsHasArgumentsTableMap::COL_POLLS_ID, $pollsId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PollsHasArgumentsTableMap::COL_POLLS_ID, $pollsId, $comparison);
    }

    /**
     * Filter the query on the arguments_id column
     *
     * Example usage:
     * <code>
     * $query->filterByArgumentsId(1234); // WHERE arguments_id = 1234
     * $query->filterByArgumentsId(array(12, 34)); // WHERE arguments_id IN (12, 34)
     * $query->filterByArgumentsId(array('min' => 12)); // WHERE arguments_id > 12
     * </code>
     *
     * @see       filterByArguments()
     *
     * @param     mixed $argumentsId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPollsHasArgumentsQuery The current query, for fluid interface
     */
    public function filterByArgumentsId($argumentsId = null, $comparison = null)
    {
        if (is_array($argumentsId)) {
            $useMinMax = false;
            if (isset($argumentsId['min'])) {
                $this->addUsingAlias(PollsHasArgumentsTableMap::COL_ARGUMENTS_ID, $argumentsId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($argumentsId['max'])) {
                $this->addUsingAlias(PollsHasArgumentsTableMap::COL_ARGUMENTS_ID, $argumentsId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PollsHasArgumentsTableMap::COL_ARGUMENTS_ID, $argumentsId, $comparison);
    }

    /**
     * Filter the query by a related \Polls object
     *
     * @param \Polls|ObjectCollection $polls The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildPollsHasArgumentsQuery The current query, for fluid interface
     */
    public function filterByPolls($polls, $comparison = null)
    {
        if ($polls instanceof \Polls) {
            return $this
                ->addUsingAlias(PollsHasArgumentsTableMap::COL_POLLS_ID, $polls->getId(), $comparison);
        } elseif ($polls instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PollsHasArgumentsTableMap::COL_POLLS_ID, $polls->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return $this|ChildPollsHasArgumentsQuery The current query, for fluid interface
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
     * Filter the query by a related \Arguments object
     *
     * @param \Arguments|ObjectCollection $arguments The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildPollsHasArgumentsQuery The current query, for fluid interface
     */
    public function filterByArguments($arguments, $comparison = null)
    {
        if ($arguments instanceof \Arguments) {
            return $this
                ->addUsingAlias(PollsHasArgumentsTableMap::COL_ARGUMENTS_ID, $arguments->getId(), $comparison);
        } elseif ($arguments instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PollsHasArgumentsTableMap::COL_ARGUMENTS_ID, $arguments->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return $this|ChildPollsHasArgumentsQuery The current query, for fluid interface
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
     * Filter the query by a related \Votes object
     *
     * @param \Votes|ObjectCollection $votes the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildPollsHasArgumentsQuery The current query, for fluid interface
     */
    public function filterByVotes($votes, $comparison = null)
    {
        if ($votes instanceof \Votes) {
            return $this
                ->addUsingAlias(PollsHasArgumentsTableMap::COL_POLLS_ID, $votes->getPollId(), $comparison)
                ->addUsingAlias(PollsHasArgumentsTableMap::COL_ARGUMENTS_ID, $votes->getArgumentId(), $comparison);
        } else {
            throw new PropelException('filterByVotes() only accepts arguments of type \Votes');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Votes relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildPollsHasArgumentsQuery The current query, for fluid interface
     */
    public function joinVotes($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Votes');

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
            $this->addJoinObject($join, 'Votes');
        }

        return $this;
    }

    /**
     * Use the Votes relation Votes object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \VotesQuery A secondary query class using the current class as primary query
     */
    public function useVotesQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinVotes($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Votes', '\VotesQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildPollsHasArguments $pollsHasArguments Object to remove from the list of results
     *
     * @return $this|ChildPollsHasArgumentsQuery The current query, for fluid interface
     */
    public function prune($pollsHasArguments = null)
    {
        if ($pollsHasArguments) {
            $this->addCond('pruneCond0', $this->getAliasedColName(PollsHasArgumentsTableMap::COL_POLLS_ID), $pollsHasArguments->getPollsId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(PollsHasArgumentsTableMap::COL_ARGUMENTS_ID), $pollsHasArguments->getArgumentsId(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the polls_has_arguments table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PollsHasArgumentsTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            PollsHasArgumentsTableMap::clearInstancePool();
            PollsHasArgumentsTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(PollsHasArgumentsTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(PollsHasArgumentsTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            PollsHasArgumentsTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            PollsHasArgumentsTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // PollsHasArgumentsQuery
