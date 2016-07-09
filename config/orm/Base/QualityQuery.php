<?php

namespace Base;

use \Quality as ChildQuality;
use \QualityQuery as ChildQualityQuery;
use \Exception;
use \PDO;
use Map\QualityTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'quality' table.
 *
 *
 *
 * @method     ChildQualityQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildQualityQuery orderByVote($order = Criteria::ASC) Order by the vote column
 * @method     ChildQualityQuery orderByDescription($order = Criteria::ASC) Order by the description column
 *
 * @method     ChildQualityQuery groupById() Group by the id column
 * @method     ChildQualityQuery groupByVote() Group by the vote column
 * @method     ChildQualityQuery groupByDescription() Group by the description column
 *
 * @method     ChildQualityQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildQualityQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildQualityQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildQualityQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildQualityQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildQualityQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildQualityQuery leftJoinFinalVotes($relationAlias = null) Adds a LEFT JOIN clause to the query using the FinalVotes relation
 * @method     ChildQualityQuery rightJoinFinalVotes($relationAlias = null) Adds a RIGHT JOIN clause to the query using the FinalVotes relation
 * @method     ChildQualityQuery innerJoinFinalVotes($relationAlias = null) Adds a INNER JOIN clause to the query using the FinalVotes relation
 *
 * @method     ChildQualityQuery joinWithFinalVotes($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the FinalVotes relation
 *
 * @method     ChildQualityQuery leftJoinWithFinalVotes() Adds a LEFT JOIN clause and with to the query using the FinalVotes relation
 * @method     ChildQualityQuery rightJoinWithFinalVotes() Adds a RIGHT JOIN clause and with to the query using the FinalVotes relation
 * @method     ChildQualityQuery innerJoinWithFinalVotes() Adds a INNER JOIN clause and with to the query using the FinalVotes relation
 *
 * @method     ChildQualityQuery leftJoinVotes($relationAlias = null) Adds a LEFT JOIN clause to the query using the Votes relation
 * @method     ChildQualityQuery rightJoinVotes($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Votes relation
 * @method     ChildQualityQuery innerJoinVotes($relationAlias = null) Adds a INNER JOIN clause to the query using the Votes relation
 *
 * @method     ChildQualityQuery joinWithVotes($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Votes relation
 *
 * @method     ChildQualityQuery leftJoinWithVotes() Adds a LEFT JOIN clause and with to the query using the Votes relation
 * @method     ChildQualityQuery rightJoinWithVotes() Adds a RIGHT JOIN clause and with to the query using the Votes relation
 * @method     ChildQualityQuery innerJoinWithVotes() Adds a INNER JOIN clause and with to the query using the Votes relation
 *
 * @method     \FinalVotesQuery|\VotesQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildQuality findOne(ConnectionInterface $con = null) Return the first ChildQuality matching the query
 * @method     ChildQuality findOneOrCreate(ConnectionInterface $con = null) Return the first ChildQuality matching the query, or a new ChildQuality object populated from the query conditions when no match is found
 *
 * @method     ChildQuality findOneById(int $id) Return the first ChildQuality filtered by the id column
 * @method     ChildQuality findOneByVote(int $vote) Return the first ChildQuality filtered by the vote column
 * @method     ChildQuality findOneByDescription(string $description) Return the first ChildQuality filtered by the description column *

 * @method     ChildQuality requirePk($key, ConnectionInterface $con = null) Return the ChildQuality by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuality requireOne(ConnectionInterface $con = null) Return the first ChildQuality matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildQuality requireOneById(int $id) Return the first ChildQuality filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuality requireOneByVote(int $vote) Return the first ChildQuality filtered by the vote column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuality requireOneByDescription(string $description) Return the first ChildQuality filtered by the description column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildQuality[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildQuality objects based on current ModelCriteria
 * @method     ChildQuality[]|ObjectCollection findById(int $id) Return ChildQuality objects filtered by the id column
 * @method     ChildQuality[]|ObjectCollection findByVote(int $vote) Return ChildQuality objects filtered by the vote column
 * @method     ChildQuality[]|ObjectCollection findByDescription(string $description) Return ChildQuality objects filtered by the description column
 * @method     ChildQuality[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class QualityQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\QualityQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Quality', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildQualityQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildQualityQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildQualityQuery) {
            return $criteria;
        }
        $query = new ChildQualityQuery();
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
     * @return ChildQuality|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(QualityTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = QualityTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildQuality A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, vote, description FROM quality WHERE id = :p0';
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
            /** @var ChildQuality $obj */
            $obj = new ChildQuality();
            $obj->hydrate($row);
            QualityTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildQuality|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildQualityQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(QualityTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildQualityQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(QualityTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildQualityQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(QualityTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(QualityTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QualityTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the vote column
     *
     * Example usage:
     * <code>
     * $query->filterByVote(1234); // WHERE vote = 1234
     * $query->filterByVote(array(12, 34)); // WHERE vote IN (12, 34)
     * $query->filterByVote(array('min' => 12)); // WHERE vote > 12
     * </code>
     *
     * @param     mixed $vote The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildQualityQuery The current query, for fluid interface
     */
    public function filterByVote($vote = null, $comparison = null)
    {
        if (is_array($vote)) {
            $useMinMax = false;
            if (isset($vote['min'])) {
                $this->addUsingAlias(QualityTableMap::COL_VOTE, $vote['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($vote['max'])) {
                $this->addUsingAlias(QualityTableMap::COL_VOTE, $vote['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QualityTableMap::COL_VOTE, $vote, $comparison);
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
     * @return $this|ChildQualityQuery The current query, for fluid interface
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

        return $this->addUsingAlias(QualityTableMap::COL_DESCRIPTION, $description, $comparison);
    }

    /**
     * Filter the query by a related \FinalVotes object
     *
     * @param \FinalVotes|ObjectCollection $finalVotes the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildQualityQuery The current query, for fluid interface
     */
    public function filterByFinalVotes($finalVotes, $comparison = null)
    {
        if ($finalVotes instanceof \FinalVotes) {
            return $this
                ->addUsingAlias(QualityTableMap::COL_ID, $finalVotes->getQualityId(), $comparison);
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
     * @return $this|ChildQualityQuery The current query, for fluid interface
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
     * Filter the query by a related \Votes object
     *
     * @param \Votes|ObjectCollection $votes the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildQualityQuery The current query, for fluid interface
     */
    public function filterByVotes($votes, $comparison = null)
    {
        if ($votes instanceof \Votes) {
            return $this
                ->addUsingAlias(QualityTableMap::COL_ID, $votes->getQualityId(), $comparison);
        } elseif ($votes instanceof ObjectCollection) {
            return $this
                ->useVotesQuery()
                ->filterByPrimaryKeys($votes->getPrimaryKeys())
                ->endUse();
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
     * @return $this|ChildQualityQuery The current query, for fluid interface
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
     * @param   ChildQuality $quality Object to remove from the list of results
     *
     * @return $this|ChildQualityQuery The current query, for fluid interface
     */
    public function prune($quality = null)
    {
        if ($quality) {
            $this->addUsingAlias(QualityTableMap::COL_ID, $quality->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the quality table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(QualityTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            QualityTableMap::clearInstancePool();
            QualityTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(QualityTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(QualityTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            QualityTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            QualityTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // QualityQuery
