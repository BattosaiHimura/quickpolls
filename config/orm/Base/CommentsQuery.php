<?php

namespace Base;

use \Comments as ChildComments;
use \CommentsQuery as ChildCommentsQuery;
use \Exception;
use \PDO;
use Map\CommentsTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'comments' table.
 *
 *
 *
 * @method     ChildCommentsQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildCommentsQuery orderByVoteId($order = Criteria::ASC) Order by the vote_id column
 * @method     ChildCommentsQuery orderByComment($order = Criteria::ASC) Order by the comment column
 *
 * @method     ChildCommentsQuery groupById() Group by the id column
 * @method     ChildCommentsQuery groupByVoteId() Group by the vote_id column
 * @method     ChildCommentsQuery groupByComment() Group by the comment column
 *
 * @method     ChildCommentsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildCommentsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildCommentsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildCommentsQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildCommentsQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildCommentsQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildCommentsQuery leftJoinVotes($relationAlias = null) Adds a LEFT JOIN clause to the query using the Votes relation
 * @method     ChildCommentsQuery rightJoinVotes($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Votes relation
 * @method     ChildCommentsQuery innerJoinVotes($relationAlias = null) Adds a INNER JOIN clause to the query using the Votes relation
 *
 * @method     ChildCommentsQuery joinWithVotes($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Votes relation
 *
 * @method     ChildCommentsQuery leftJoinWithVotes() Adds a LEFT JOIN clause and with to the query using the Votes relation
 * @method     ChildCommentsQuery rightJoinWithVotes() Adds a RIGHT JOIN clause and with to the query using the Votes relation
 * @method     ChildCommentsQuery innerJoinWithVotes() Adds a INNER JOIN clause and with to the query using the Votes relation
 *
 * @method     \VotesQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildComments findOne(ConnectionInterface $con = null) Return the first ChildComments matching the query
 * @method     ChildComments findOneOrCreate(ConnectionInterface $con = null) Return the first ChildComments matching the query, or a new ChildComments object populated from the query conditions when no match is found
 *
 * @method     ChildComments findOneById(int $id) Return the first ChildComments filtered by the id column
 * @method     ChildComments findOneByVoteId(int $vote_id) Return the first ChildComments filtered by the vote_id column
 * @method     ChildComments findOneByComment(string $comment) Return the first ChildComments filtered by the comment column *

 * @method     ChildComments requirePk($key, ConnectionInterface $con = null) Return the ChildComments by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildComments requireOne(ConnectionInterface $con = null) Return the first ChildComments matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildComments requireOneById(int $id) Return the first ChildComments filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildComments requireOneByVoteId(int $vote_id) Return the first ChildComments filtered by the vote_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildComments requireOneByComment(string $comment) Return the first ChildComments filtered by the comment column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildComments[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildComments objects based on current ModelCriteria
 * @method     ChildComments[]|ObjectCollection findById(int $id) Return ChildComments objects filtered by the id column
 * @method     ChildComments[]|ObjectCollection findByVoteId(int $vote_id) Return ChildComments objects filtered by the vote_id column
 * @method     ChildComments[]|ObjectCollection findByComment(string $comment) Return ChildComments objects filtered by the comment column
 * @method     ChildComments[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class CommentsQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\CommentsQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Comments', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildCommentsQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildCommentsQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildCommentsQuery) {
            return $criteria;
        }
        $query = new ChildCommentsQuery();
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
     * @return ChildComments|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(CommentsTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = CommentsTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildComments A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, vote_id, comment FROM comments WHERE id = :p0';
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
            /** @var ChildComments $obj */
            $obj = new ChildComments();
            $obj->hydrate($row);
            CommentsTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildComments|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildCommentsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(CommentsTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildCommentsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(CommentsTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildCommentsQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(CommentsTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(CommentsTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CommentsTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the vote_id column
     *
     * Example usage:
     * <code>
     * $query->filterByVoteId(1234); // WHERE vote_id = 1234
     * $query->filterByVoteId(array(12, 34)); // WHERE vote_id IN (12, 34)
     * $query->filterByVoteId(array('min' => 12)); // WHERE vote_id > 12
     * </code>
     *
     * @see       filterByVotes()
     *
     * @param     mixed $voteId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCommentsQuery The current query, for fluid interface
     */
    public function filterByVoteId($voteId = null, $comparison = null)
    {
        if (is_array($voteId)) {
            $useMinMax = false;
            if (isset($voteId['min'])) {
                $this->addUsingAlias(CommentsTableMap::COL_VOTE_ID, $voteId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($voteId['max'])) {
                $this->addUsingAlias(CommentsTableMap::COL_VOTE_ID, $voteId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CommentsTableMap::COL_VOTE_ID, $voteId, $comparison);
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
     * @return $this|ChildCommentsQuery The current query, for fluid interface
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

        return $this->addUsingAlias(CommentsTableMap::COL_COMMENT, $comment, $comparison);
    }

    /**
     * Filter the query by a related \Votes object
     *
     * @param \Votes|ObjectCollection $votes The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildCommentsQuery The current query, for fluid interface
     */
    public function filterByVotes($votes, $comparison = null)
    {
        if ($votes instanceof \Votes) {
            return $this
                ->addUsingAlias(CommentsTableMap::COL_VOTE_ID, $votes->getId(), $comparison);
        } elseif ($votes instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(CommentsTableMap::COL_VOTE_ID, $votes->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByVotes() only accepts arguments of type \Votes or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Votes relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCommentsQuery The current query, for fluid interface
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
     * @param   ChildComments $comments Object to remove from the list of results
     *
     * @return $this|ChildCommentsQuery The current query, for fluid interface
     */
    public function prune($comments = null)
    {
        if ($comments) {
            $this->addUsingAlias(CommentsTableMap::COL_ID, $comments->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the comments table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CommentsTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            CommentsTableMap::clearInstancePool();
            CommentsTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(CommentsTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(CommentsTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            CommentsTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            CommentsTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // CommentsQuery
