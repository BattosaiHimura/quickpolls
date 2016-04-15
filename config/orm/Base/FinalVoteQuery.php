<?php

namespace Base;

use \FinalVote as ChildFinalVote;
use \FinalVoteQuery as ChildFinalVoteQuery;
use \Exception;
use \PDO;
use Map\FinalVoteTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'Final_vote' table.
 *
 *
 *
 * @method     ChildFinalVoteQuery orderByIdfinalVote($order = Criteria::ASC) Order by the idFinal_vote column
 * @method     ChildFinalVoteQuery orderByComment($order = Criteria::ASC) Order by the comment column
 * @method     ChildFinalVoteQuery orderByTips($order = Criteria::ASC) Order by the tips column
 * @method     ChildFinalVoteQuery orderBySlidespresent($order = Criteria::ASC) Order by the slidesPresent column
 * @method     ChildFinalVoteQuery orderByQualityIdquality($order = Criteria::ASC) Order by the Quality_idquality column
 * @method     ChildFinalVoteQuery orderByCourseIdcourse($order = Criteria::ASC) Order by the Course_idCourse column
 * @method     ChildFinalVoteQuery orderByUserIduser($order = Criteria::ASC) Order by the User_idUser column
 *
 * @method     ChildFinalVoteQuery groupByIdfinalVote() Group by the idFinal_vote column
 * @method     ChildFinalVoteQuery groupByComment() Group by the comment column
 * @method     ChildFinalVoteQuery groupByTips() Group by the tips column
 * @method     ChildFinalVoteQuery groupBySlidespresent() Group by the slidesPresent column
 * @method     ChildFinalVoteQuery groupByQualityIdquality() Group by the Quality_idquality column
 * @method     ChildFinalVoteQuery groupByCourseIdcourse() Group by the Course_idCourse column
 * @method     ChildFinalVoteQuery groupByUserIduser() Group by the User_idUser column
 *
 * @method     ChildFinalVoteQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildFinalVoteQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildFinalVoteQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildFinalVoteQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildFinalVoteQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildFinalVoteQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildFinalVoteQuery leftJoinCourse($relationAlias = null) Adds a LEFT JOIN clause to the query using the Course relation
 * @method     ChildFinalVoteQuery rightJoinCourse($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Course relation
 * @method     ChildFinalVoteQuery innerJoinCourse($relationAlias = null) Adds a INNER JOIN clause to the query using the Course relation
 *
 * @method     ChildFinalVoteQuery joinWithCourse($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Course relation
 *
 * @method     ChildFinalVoteQuery leftJoinWithCourse() Adds a LEFT JOIN clause and with to the query using the Course relation
 * @method     ChildFinalVoteQuery rightJoinWithCourse() Adds a RIGHT JOIN clause and with to the query using the Course relation
 * @method     ChildFinalVoteQuery innerJoinWithCourse() Adds a INNER JOIN clause and with to the query using the Course relation
 *
 * @method     ChildFinalVoteQuery leftJoinQuality($relationAlias = null) Adds a LEFT JOIN clause to the query using the Quality relation
 * @method     ChildFinalVoteQuery rightJoinQuality($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Quality relation
 * @method     ChildFinalVoteQuery innerJoinQuality($relationAlias = null) Adds a INNER JOIN clause to the query using the Quality relation
 *
 * @method     ChildFinalVoteQuery joinWithQuality($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Quality relation
 *
 * @method     ChildFinalVoteQuery leftJoinWithQuality() Adds a LEFT JOIN clause and with to the query using the Quality relation
 * @method     ChildFinalVoteQuery rightJoinWithQuality() Adds a RIGHT JOIN clause and with to the query using the Quality relation
 * @method     ChildFinalVoteQuery innerJoinWithQuality() Adds a INNER JOIN clause and with to the query using the Quality relation
 *
 * @method     ChildFinalVoteQuery leftJoinUser($relationAlias = null) Adds a LEFT JOIN clause to the query using the User relation
 * @method     ChildFinalVoteQuery rightJoinUser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the User relation
 * @method     ChildFinalVoteQuery innerJoinUser($relationAlias = null) Adds a INNER JOIN clause to the query using the User relation
 *
 * @method     ChildFinalVoteQuery joinWithUser($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the User relation
 *
 * @method     ChildFinalVoteQuery leftJoinWithUser() Adds a LEFT JOIN clause and with to the query using the User relation
 * @method     ChildFinalVoteQuery rightJoinWithUser() Adds a RIGHT JOIN clause and with to the query using the User relation
 * @method     ChildFinalVoteQuery innerJoinWithUser() Adds a INNER JOIN clause and with to the query using the User relation
 *
 * @method     \CourseQuery|\QualityQuery|\UserQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildFinalVote findOne(ConnectionInterface $con = null) Return the first ChildFinalVote matching the query
 * @method     ChildFinalVote findOneOrCreate(ConnectionInterface $con = null) Return the first ChildFinalVote matching the query, or a new ChildFinalVote object populated from the query conditions when no match is found
 *
 * @method     ChildFinalVote findOneByIdfinalVote(int $idFinal_vote) Return the first ChildFinalVote filtered by the idFinal_vote column
 * @method     ChildFinalVote findOneByComment(string $comment) Return the first ChildFinalVote filtered by the comment column
 * @method     ChildFinalVote findOneByTips(string $tips) Return the first ChildFinalVote filtered by the tips column
 * @method     ChildFinalVote findOneBySlidespresent(boolean $slidesPresent) Return the first ChildFinalVote filtered by the slidesPresent column
 * @method     ChildFinalVote findOneByQualityIdquality(int $Quality_idquality) Return the first ChildFinalVote filtered by the Quality_idquality column
 * @method     ChildFinalVote findOneByCourseIdcourse(int $Course_idCourse) Return the first ChildFinalVote filtered by the Course_idCourse column
 * @method     ChildFinalVote findOneByUserIduser(int $User_idUser) Return the first ChildFinalVote filtered by the User_idUser column *

 * @method     ChildFinalVote requirePk($key, ConnectionInterface $con = null) Return the ChildFinalVote by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFinalVote requireOne(ConnectionInterface $con = null) Return the first ChildFinalVote matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildFinalVote requireOneByIdfinalVote(int $idFinal_vote) Return the first ChildFinalVote filtered by the idFinal_vote column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFinalVote requireOneByComment(string $comment) Return the first ChildFinalVote filtered by the comment column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFinalVote requireOneByTips(string $tips) Return the first ChildFinalVote filtered by the tips column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFinalVote requireOneBySlidespresent(boolean $slidesPresent) Return the first ChildFinalVote filtered by the slidesPresent column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFinalVote requireOneByQualityIdquality(int $Quality_idquality) Return the first ChildFinalVote filtered by the Quality_idquality column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFinalVote requireOneByCourseIdcourse(int $Course_idCourse) Return the first ChildFinalVote filtered by the Course_idCourse column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFinalVote requireOneByUserIduser(int $User_idUser) Return the first ChildFinalVote filtered by the User_idUser column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildFinalVote[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildFinalVote objects based on current ModelCriteria
 * @method     ChildFinalVote[]|ObjectCollection findByIdfinalVote(int $idFinal_vote) Return ChildFinalVote objects filtered by the idFinal_vote column
 * @method     ChildFinalVote[]|ObjectCollection findByComment(string $comment) Return ChildFinalVote objects filtered by the comment column
 * @method     ChildFinalVote[]|ObjectCollection findByTips(string $tips) Return ChildFinalVote objects filtered by the tips column
 * @method     ChildFinalVote[]|ObjectCollection findBySlidespresent(boolean $slidesPresent) Return ChildFinalVote objects filtered by the slidesPresent column
 * @method     ChildFinalVote[]|ObjectCollection findByQualityIdquality(int $Quality_idquality) Return ChildFinalVote objects filtered by the Quality_idquality column
 * @method     ChildFinalVote[]|ObjectCollection findByCourseIdcourse(int $Course_idCourse) Return ChildFinalVote objects filtered by the Course_idCourse column
 * @method     ChildFinalVote[]|ObjectCollection findByUserIduser(int $User_idUser) Return ChildFinalVote objects filtered by the User_idUser column
 * @method     ChildFinalVote[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class FinalVoteQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\FinalVoteQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\FinalVote', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildFinalVoteQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildFinalVoteQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildFinalVoteQuery) {
            return $criteria;
        }
        $query = new ChildFinalVoteQuery();
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
     * @return ChildFinalVote|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(FinalVoteTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = FinalVoteTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildFinalVote A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT idFinal_vote, comment, tips, slidesPresent, Quality_idquality, Course_idCourse, User_idUser FROM Final_vote WHERE idFinal_vote = :p0';
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
            /** @var ChildFinalVote $obj */
            $obj = new ChildFinalVote();
            $obj->hydrate($row);
            FinalVoteTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildFinalVote|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildFinalVoteQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(FinalVoteTableMap::COL_IDFINAL_VOTE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildFinalVoteQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(FinalVoteTableMap::COL_IDFINAL_VOTE, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the idFinal_vote column
     *
     * Example usage:
     * <code>
     * $query->filterByIdfinalVote(1234); // WHERE idFinal_vote = 1234
     * $query->filterByIdfinalVote(array(12, 34)); // WHERE idFinal_vote IN (12, 34)
     * $query->filterByIdfinalVote(array('min' => 12)); // WHERE idFinal_vote > 12
     * </code>
     *
     * @param     mixed $idfinalVote The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFinalVoteQuery The current query, for fluid interface
     */
    public function filterByIdfinalVote($idfinalVote = null, $comparison = null)
    {
        if (is_array($idfinalVote)) {
            $useMinMax = false;
            if (isset($idfinalVote['min'])) {
                $this->addUsingAlias(FinalVoteTableMap::COL_IDFINAL_VOTE, $idfinalVote['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idfinalVote['max'])) {
                $this->addUsingAlias(FinalVoteTableMap::COL_IDFINAL_VOTE, $idfinalVote['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FinalVoteTableMap::COL_IDFINAL_VOTE, $idfinalVote, $comparison);
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
     * @return $this|ChildFinalVoteQuery The current query, for fluid interface
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

        return $this->addUsingAlias(FinalVoteTableMap::COL_COMMENT, $comment, $comparison);
    }

    /**
     * Filter the query on the tips column
     *
     * Example usage:
     * <code>
     * $query->filterByTips('fooValue');   // WHERE tips = 'fooValue'
     * $query->filterByTips('%fooValue%'); // WHERE tips LIKE '%fooValue%'
     * </code>
     *
     * @param     string $tips The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFinalVoteQuery The current query, for fluid interface
     */
    public function filterByTips($tips = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($tips)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $tips)) {
                $tips = str_replace('*', '%', $tips);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(FinalVoteTableMap::COL_TIPS, $tips, $comparison);
    }

    /**
     * Filter the query on the slidesPresent column
     *
     * Example usage:
     * <code>
     * $query->filterBySlidespresent(true); // WHERE slidesPresent = true
     * $query->filterBySlidespresent('yes'); // WHERE slidesPresent = true
     * </code>
     *
     * @param     boolean|string $slidespresent The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFinalVoteQuery The current query, for fluid interface
     */
    public function filterBySlidespresent($slidespresent = null, $comparison = null)
    {
        if (is_string($slidespresent)) {
            $slidespresent = in_array(strtolower($slidespresent), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(FinalVoteTableMap::COL_SLIDESPRESENT, $slidespresent, $comparison);
    }

    /**
     * Filter the query on the Quality_idquality column
     *
     * Example usage:
     * <code>
     * $query->filterByQualityIdquality(1234); // WHERE Quality_idquality = 1234
     * $query->filterByQualityIdquality(array(12, 34)); // WHERE Quality_idquality IN (12, 34)
     * $query->filterByQualityIdquality(array('min' => 12)); // WHERE Quality_idquality > 12
     * </code>
     *
     * @see       filterByQuality()
     *
     * @param     mixed $qualityIdquality The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFinalVoteQuery The current query, for fluid interface
     */
    public function filterByQualityIdquality($qualityIdquality = null, $comparison = null)
    {
        if (is_array($qualityIdquality)) {
            $useMinMax = false;
            if (isset($qualityIdquality['min'])) {
                $this->addUsingAlias(FinalVoteTableMap::COL_QUALITY_IDQUALITY, $qualityIdquality['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($qualityIdquality['max'])) {
                $this->addUsingAlias(FinalVoteTableMap::COL_QUALITY_IDQUALITY, $qualityIdquality['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FinalVoteTableMap::COL_QUALITY_IDQUALITY, $qualityIdquality, $comparison);
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
     * @return $this|ChildFinalVoteQuery The current query, for fluid interface
     */
    public function filterByCourseIdcourse($courseIdcourse = null, $comparison = null)
    {
        if (is_array($courseIdcourse)) {
            $useMinMax = false;
            if (isset($courseIdcourse['min'])) {
                $this->addUsingAlias(FinalVoteTableMap::COL_COURSE_IDCOURSE, $courseIdcourse['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($courseIdcourse['max'])) {
                $this->addUsingAlias(FinalVoteTableMap::COL_COURSE_IDCOURSE, $courseIdcourse['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FinalVoteTableMap::COL_COURSE_IDCOURSE, $courseIdcourse, $comparison);
    }

    /**
     * Filter the query on the User_idUser column
     *
     * Example usage:
     * <code>
     * $query->filterByUserIduser(1234); // WHERE User_idUser = 1234
     * $query->filterByUserIduser(array(12, 34)); // WHERE User_idUser IN (12, 34)
     * $query->filterByUserIduser(array('min' => 12)); // WHERE User_idUser > 12
     * </code>
     *
     * @see       filterByUser()
     *
     * @param     mixed $userIduser The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFinalVoteQuery The current query, for fluid interface
     */
    public function filterByUserIduser($userIduser = null, $comparison = null)
    {
        if (is_array($userIduser)) {
            $useMinMax = false;
            if (isset($userIduser['min'])) {
                $this->addUsingAlias(FinalVoteTableMap::COL_USER_IDUSER, $userIduser['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($userIduser['max'])) {
                $this->addUsingAlias(FinalVoteTableMap::COL_USER_IDUSER, $userIduser['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FinalVoteTableMap::COL_USER_IDUSER, $userIduser, $comparison);
    }

    /**
     * Filter the query by a related \Course object
     *
     * @param \Course|ObjectCollection $course The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildFinalVoteQuery The current query, for fluid interface
     */
    public function filterByCourse($course, $comparison = null)
    {
        if ($course instanceof \Course) {
            return $this
                ->addUsingAlias(FinalVoteTableMap::COL_COURSE_IDCOURSE, $course->getIdcourse(), $comparison);
        } elseif ($course instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(FinalVoteTableMap::COL_COURSE_IDCOURSE, $course->toKeyValue('PrimaryKey', 'Idcourse'), $comparison);
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
     * @return $this|ChildFinalVoteQuery The current query, for fluid interface
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
     * Filter the query by a related \Quality object
     *
     * @param \Quality|ObjectCollection $quality The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildFinalVoteQuery The current query, for fluid interface
     */
    public function filterByQuality($quality, $comparison = null)
    {
        if ($quality instanceof \Quality) {
            return $this
                ->addUsingAlias(FinalVoteTableMap::COL_QUALITY_IDQUALITY, $quality->getIdquality(), $comparison);
        } elseif ($quality instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(FinalVoteTableMap::COL_QUALITY_IDQUALITY, $quality->toKeyValue('PrimaryKey', 'Idquality'), $comparison);
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
     * @return $this|ChildFinalVoteQuery The current query, for fluid interface
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
     * Filter the query by a related \User object
     *
     * @param \User|ObjectCollection $user The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildFinalVoteQuery The current query, for fluid interface
     */
    public function filterByUser($user, $comparison = null)
    {
        if ($user instanceof \User) {
            return $this
                ->addUsingAlias(FinalVoteTableMap::COL_USER_IDUSER, $user->getIduser(), $comparison);
        } elseif ($user instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(FinalVoteTableMap::COL_USER_IDUSER, $user->toKeyValue('PrimaryKey', 'Iduser'), $comparison);
        } else {
            throw new PropelException('filterByUser() only accepts arguments of type \User or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the User relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildFinalVoteQuery The current query, for fluid interface
     */
    public function joinUser($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('User');

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
            $this->addJoinObject($join, 'User');
        }

        return $this;
    }

    /**
     * Use the User relation User object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \UserQuery A secondary query class using the current class as primary query
     */
    public function useUserQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinUser($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'User', '\UserQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildFinalVote $finalVote Object to remove from the list of results
     *
     * @return $this|ChildFinalVoteQuery The current query, for fluid interface
     */
    public function prune($finalVote = null)
    {
        if ($finalVote) {
            $this->addUsingAlias(FinalVoteTableMap::COL_IDFINAL_VOTE, $finalVote->getIdfinalVote(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the Final_vote table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(FinalVoteTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            FinalVoteTableMap::clearInstancePool();
            FinalVoteTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(FinalVoteTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(FinalVoteTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            FinalVoteTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            FinalVoteTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // FinalVoteQuery
