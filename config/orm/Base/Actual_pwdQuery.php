<?php

namespace Base;

use \Actual_pwd as ChildActual_pwd;
use \Actual_pwdQuery as ChildActual_pwdQuery;
use \Exception;
use \PDO;
use Map\Actual_pwdTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'Actual_pwd' table.
 *
 *
 *
 * @method     ChildActual_pwdQuery orderByIduser($order = Criteria::ASC) Order by the idUser column
 * @method     ChildActual_pwdQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ChildActual_pwdQuery orderBySurname($order = Criteria::ASC) Order by the surname column
 * @method     ChildActual_pwdQuery orderByMatricola($order = Criteria::ASC) Order by the matricola column
 * @method     ChildActual_pwdQuery orderByUsertypeIdusertype($order = Criteria::ASC) Order by the UserType_idUserType column
 * @method     ChildActual_pwdQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method     ChildActual_pwdQuery orderByUserIduser($order = Criteria::ASC) Order by the User_idUser column
 * @method     ChildActual_pwdQuery orderByPwdIdpwd($order = Criteria::ASC) Order by the Pwd_idPwd column
 * @method     ChildActual_pwdQuery orderByDatefrom($order = Criteria::ASC) Order by the dateFrom column
 * @method     ChildActual_pwdQuery orderByDateto($order = Criteria::ASC) Order by the dateTo column
 * @method     ChildActual_pwdQuery orderByIdpwd($order = Criteria::ASC) Order by the idPwd column
 * @method     ChildActual_pwdQuery orderByPwd($order = Criteria::ASC) Order by the pwd column
 *
 * @method     ChildActual_pwdQuery groupByIduser() Group by the idUser column
 * @method     ChildActual_pwdQuery groupByName() Group by the name column
 * @method     ChildActual_pwdQuery groupBySurname() Group by the surname column
 * @method     ChildActual_pwdQuery groupByMatricola() Group by the matricola column
 * @method     ChildActual_pwdQuery groupByUsertypeIdusertype() Group by the UserType_idUserType column
 * @method     ChildActual_pwdQuery groupByEmail() Group by the email column
 * @method     ChildActual_pwdQuery groupByUserIduser() Group by the User_idUser column
 * @method     ChildActual_pwdQuery groupByPwdIdpwd() Group by the Pwd_idPwd column
 * @method     ChildActual_pwdQuery groupByDatefrom() Group by the dateFrom column
 * @method     ChildActual_pwdQuery groupByDateto() Group by the dateTo column
 * @method     ChildActual_pwdQuery groupByIdpwd() Group by the idPwd column
 * @method     ChildActual_pwdQuery groupByPwd() Group by the pwd column
 *
 * @method     ChildActual_pwdQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildActual_pwdQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildActual_pwdQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildActual_pwdQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildActual_pwdQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildActual_pwdQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildActual_pwd findOne(ConnectionInterface $con = null) Return the first ChildActual_pwd matching the query
 * @method     ChildActual_pwd findOneOrCreate(ConnectionInterface $con = null) Return the first ChildActual_pwd matching the query, or a new ChildActual_pwd object populated from the query conditions when no match is found
 *
 * @method     ChildActual_pwd findOneByIduser(int $idUser) Return the first ChildActual_pwd filtered by the idUser column
 * @method     ChildActual_pwd findOneByName(string $name) Return the first ChildActual_pwd filtered by the name column
 * @method     ChildActual_pwd findOneBySurname(string $surname) Return the first ChildActual_pwd filtered by the surname column
 * @method     ChildActual_pwd findOneByMatricola(string $matricola) Return the first ChildActual_pwd filtered by the matricola column
 * @method     ChildActual_pwd findOneByUsertypeIdusertype(int $UserType_idUserType) Return the first ChildActual_pwd filtered by the UserType_idUserType column
 * @method     ChildActual_pwd findOneByEmail(string $email) Return the first ChildActual_pwd filtered by the email column
 * @method     ChildActual_pwd findOneByUserIduser(int $User_idUser) Return the first ChildActual_pwd filtered by the User_idUser column
 * @method     ChildActual_pwd findOneByPwdIdpwd(int $Pwd_idPwd) Return the first ChildActual_pwd filtered by the Pwd_idPwd column
 * @method     ChildActual_pwd findOneByDatefrom(string $dateFrom) Return the first ChildActual_pwd filtered by the dateFrom column
 * @method     ChildActual_pwd findOneByDateto(string $dateTo) Return the first ChildActual_pwd filtered by the dateTo column
 * @method     ChildActual_pwd findOneByIdpwd(int $idPwd) Return the first ChildActual_pwd filtered by the idPwd column
 * @method     ChildActual_pwd findOneByPwd(string $pwd) Return the first ChildActual_pwd filtered by the pwd column *

 * @method     ChildActual_pwd requirePk($key, ConnectionInterface $con = null) Return the ChildActual_pwd by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildActual_pwd requireOne(ConnectionInterface $con = null) Return the first ChildActual_pwd matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildActual_pwd requireOneByIduser(int $idUser) Return the first ChildActual_pwd filtered by the idUser column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildActual_pwd requireOneByName(string $name) Return the first ChildActual_pwd filtered by the name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildActual_pwd requireOneBySurname(string $surname) Return the first ChildActual_pwd filtered by the surname column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildActual_pwd requireOneByMatricola(string $matricola) Return the first ChildActual_pwd filtered by the matricola column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildActual_pwd requireOneByUsertypeIdusertype(int $UserType_idUserType) Return the first ChildActual_pwd filtered by the UserType_idUserType column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildActual_pwd requireOneByEmail(string $email) Return the first ChildActual_pwd filtered by the email column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildActual_pwd requireOneByUserIduser(int $User_idUser) Return the first ChildActual_pwd filtered by the User_idUser column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildActual_pwd requireOneByPwdIdpwd(int $Pwd_idPwd) Return the first ChildActual_pwd filtered by the Pwd_idPwd column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildActual_pwd requireOneByDatefrom(string $dateFrom) Return the first ChildActual_pwd filtered by the dateFrom column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildActual_pwd requireOneByDateto(string $dateTo) Return the first ChildActual_pwd filtered by the dateTo column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildActual_pwd requireOneByIdpwd(int $idPwd) Return the first ChildActual_pwd filtered by the idPwd column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildActual_pwd requireOneByPwd(string $pwd) Return the first ChildActual_pwd filtered by the pwd column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildActual_pwd[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildActual_pwd objects based on current ModelCriteria
 * @method     ChildActual_pwd[]|ObjectCollection findByIduser(int $idUser) Return ChildActual_pwd objects filtered by the idUser column
 * @method     ChildActual_pwd[]|ObjectCollection findByName(string $name) Return ChildActual_pwd objects filtered by the name column
 * @method     ChildActual_pwd[]|ObjectCollection findBySurname(string $surname) Return ChildActual_pwd objects filtered by the surname column
 * @method     ChildActual_pwd[]|ObjectCollection findByMatricola(string $matricola) Return ChildActual_pwd objects filtered by the matricola column
 * @method     ChildActual_pwd[]|ObjectCollection findByUsertypeIdusertype(int $UserType_idUserType) Return ChildActual_pwd objects filtered by the UserType_idUserType column
 * @method     ChildActual_pwd[]|ObjectCollection findByEmail(string $email) Return ChildActual_pwd objects filtered by the email column
 * @method     ChildActual_pwd[]|ObjectCollection findByUserIduser(int $User_idUser) Return ChildActual_pwd objects filtered by the User_idUser column
 * @method     ChildActual_pwd[]|ObjectCollection findByPwdIdpwd(int $Pwd_idPwd) Return ChildActual_pwd objects filtered by the Pwd_idPwd column
 * @method     ChildActual_pwd[]|ObjectCollection findByDatefrom(string $dateFrom) Return ChildActual_pwd objects filtered by the dateFrom column
 * @method     ChildActual_pwd[]|ObjectCollection findByDateto(string $dateTo) Return ChildActual_pwd objects filtered by the dateTo column
 * @method     ChildActual_pwd[]|ObjectCollection findByIdpwd(int $idPwd) Return ChildActual_pwd objects filtered by the idPwd column
 * @method     ChildActual_pwd[]|ObjectCollection findByPwd(string $pwd) Return ChildActual_pwd objects filtered by the pwd column
 * @method     ChildActual_pwd[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class Actual_pwdQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\Actual_pwdQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Actual_pwd', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildActual_pwdQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildActual_pwdQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildActual_pwdQuery) {
            return $criteria;
        }
        $query = new ChildActual_pwdQuery();
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
     * @param array[$idUser, $idPwd] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildActual_pwd|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(Actual_pwdTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = Actual_pwdTableMap::getInstanceFromPool(serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]))))) {
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
     * @return ChildActual_pwd A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT idUser, name, surname, matricola, UserType_idUserType, email, User_idUser, Pwd_idPwd, dateFrom, dateTo, idPwd, pwd FROM Actual_pwd WHERE idUser = :p0 AND idPwd = :p1';
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
            /** @var ChildActual_pwd $obj */
            $obj = new ChildActual_pwd();
            $obj->hydrate($row);
            Actual_pwdTableMap::addInstanceToPool($obj, serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]));
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
     * @return ChildActual_pwd|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildActual_pwdQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(Actual_pwdTableMap::COL_IDUSER, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(Actual_pwdTableMap::COL_IDPWD, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildActual_pwdQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(Actual_pwdTableMap::COL_IDUSER, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(Actual_pwdTableMap::COL_IDPWD, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the idUser column
     *
     * Example usage:
     * <code>
     * $query->filterByIduser(1234); // WHERE idUser = 1234
     * $query->filterByIduser(array(12, 34)); // WHERE idUser IN (12, 34)
     * $query->filterByIduser(array('min' => 12)); // WHERE idUser > 12
     * </code>
     *
     * @param     mixed $iduser The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildActual_pwdQuery The current query, for fluid interface
     */
    public function filterByIduser($iduser = null, $comparison = null)
    {
        if (is_array($iduser)) {
            $useMinMax = false;
            if (isset($iduser['min'])) {
                $this->addUsingAlias(Actual_pwdTableMap::COL_IDUSER, $iduser['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($iduser['max'])) {
                $this->addUsingAlias(Actual_pwdTableMap::COL_IDUSER, $iduser['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Actual_pwdTableMap::COL_IDUSER, $iduser, $comparison);
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
     * @return $this|ChildActual_pwdQuery The current query, for fluid interface
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

        return $this->addUsingAlias(Actual_pwdTableMap::COL_NAME, $name, $comparison);
    }

    /**
     * Filter the query on the surname column
     *
     * Example usage:
     * <code>
     * $query->filterBySurname('fooValue');   // WHERE surname = 'fooValue'
     * $query->filterBySurname('%fooValue%'); // WHERE surname LIKE '%fooValue%'
     * </code>
     *
     * @param     string $surname The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildActual_pwdQuery The current query, for fluid interface
     */
    public function filterBySurname($surname = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($surname)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $surname)) {
                $surname = str_replace('*', '%', $surname);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(Actual_pwdTableMap::COL_SURNAME, $surname, $comparison);
    }

    /**
     * Filter the query on the matricola column
     *
     * Example usage:
     * <code>
     * $query->filterByMatricola('fooValue');   // WHERE matricola = 'fooValue'
     * $query->filterByMatricola('%fooValue%'); // WHERE matricola LIKE '%fooValue%'
     * </code>
     *
     * @param     string $matricola The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildActual_pwdQuery The current query, for fluid interface
     */
    public function filterByMatricola($matricola = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($matricola)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $matricola)) {
                $matricola = str_replace('*', '%', $matricola);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(Actual_pwdTableMap::COL_MATRICOLA, $matricola, $comparison);
    }

    /**
     * Filter the query on the UserType_idUserType column
     *
     * Example usage:
     * <code>
     * $query->filterByUsertypeIdusertype(1234); // WHERE UserType_idUserType = 1234
     * $query->filterByUsertypeIdusertype(array(12, 34)); // WHERE UserType_idUserType IN (12, 34)
     * $query->filterByUsertypeIdusertype(array('min' => 12)); // WHERE UserType_idUserType > 12
     * </code>
     *
     * @param     mixed $usertypeIdusertype The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildActual_pwdQuery The current query, for fluid interface
     */
    public function filterByUsertypeIdusertype($usertypeIdusertype = null, $comparison = null)
    {
        if (is_array($usertypeIdusertype)) {
            $useMinMax = false;
            if (isset($usertypeIdusertype['min'])) {
                $this->addUsingAlias(Actual_pwdTableMap::COL_USERTYPE_IDUSERTYPE, $usertypeIdusertype['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($usertypeIdusertype['max'])) {
                $this->addUsingAlias(Actual_pwdTableMap::COL_USERTYPE_IDUSERTYPE, $usertypeIdusertype['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Actual_pwdTableMap::COL_USERTYPE_IDUSERTYPE, $usertypeIdusertype, $comparison);
    }

    /**
     * Filter the query on the email column
     *
     * Example usage:
     * <code>
     * $query->filterByEmail('fooValue');   // WHERE email = 'fooValue'
     * $query->filterByEmail('%fooValue%'); // WHERE email LIKE '%fooValue%'
     * </code>
     *
     * @param     string $email The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildActual_pwdQuery The current query, for fluid interface
     */
    public function filterByEmail($email = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($email)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $email)) {
                $email = str_replace('*', '%', $email);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(Actual_pwdTableMap::COL_EMAIL, $email, $comparison);
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
     * @param     mixed $userIduser The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildActual_pwdQuery The current query, for fluid interface
     */
    public function filterByUserIduser($userIduser = null, $comparison = null)
    {
        if (is_array($userIduser)) {
            $useMinMax = false;
            if (isset($userIduser['min'])) {
                $this->addUsingAlias(Actual_pwdTableMap::COL_USER_IDUSER, $userIduser['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($userIduser['max'])) {
                $this->addUsingAlias(Actual_pwdTableMap::COL_USER_IDUSER, $userIduser['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Actual_pwdTableMap::COL_USER_IDUSER, $userIduser, $comparison);
    }

    /**
     * Filter the query on the Pwd_idPwd column
     *
     * Example usage:
     * <code>
     * $query->filterByPwdIdpwd(1234); // WHERE Pwd_idPwd = 1234
     * $query->filterByPwdIdpwd(array(12, 34)); // WHERE Pwd_idPwd IN (12, 34)
     * $query->filterByPwdIdpwd(array('min' => 12)); // WHERE Pwd_idPwd > 12
     * </code>
     *
     * @param     mixed $pwdIdpwd The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildActual_pwdQuery The current query, for fluid interface
     */
    public function filterByPwdIdpwd($pwdIdpwd = null, $comparison = null)
    {
        if (is_array($pwdIdpwd)) {
            $useMinMax = false;
            if (isset($pwdIdpwd['min'])) {
                $this->addUsingAlias(Actual_pwdTableMap::COL_PWD_IDPWD, $pwdIdpwd['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pwdIdpwd['max'])) {
                $this->addUsingAlias(Actual_pwdTableMap::COL_PWD_IDPWD, $pwdIdpwd['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Actual_pwdTableMap::COL_PWD_IDPWD, $pwdIdpwd, $comparison);
    }

    /**
     * Filter the query on the dateFrom column
     *
     * Example usage:
     * <code>
     * $query->filterByDatefrom('2011-03-14'); // WHERE dateFrom = '2011-03-14'
     * $query->filterByDatefrom('now'); // WHERE dateFrom = '2011-03-14'
     * $query->filterByDatefrom(array('max' => 'yesterday')); // WHERE dateFrom > '2011-03-13'
     * </code>
     *
     * @param     mixed $datefrom The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildActual_pwdQuery The current query, for fluid interface
     */
    public function filterByDatefrom($datefrom = null, $comparison = null)
    {
        if (is_array($datefrom)) {
            $useMinMax = false;
            if (isset($datefrom['min'])) {
                $this->addUsingAlias(Actual_pwdTableMap::COL_DATEFROM, $datefrom['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($datefrom['max'])) {
                $this->addUsingAlias(Actual_pwdTableMap::COL_DATEFROM, $datefrom['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Actual_pwdTableMap::COL_DATEFROM, $datefrom, $comparison);
    }

    /**
     * Filter the query on the dateTo column
     *
     * Example usage:
     * <code>
     * $query->filterByDateto('2011-03-14'); // WHERE dateTo = '2011-03-14'
     * $query->filterByDateto('now'); // WHERE dateTo = '2011-03-14'
     * $query->filterByDateto(array('max' => 'yesterday')); // WHERE dateTo > '2011-03-13'
     * </code>
     *
     * @param     mixed $dateto The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildActual_pwdQuery The current query, for fluid interface
     */
    public function filterByDateto($dateto = null, $comparison = null)
    {
        if (is_array($dateto)) {
            $useMinMax = false;
            if (isset($dateto['min'])) {
                $this->addUsingAlias(Actual_pwdTableMap::COL_DATETO, $dateto['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateto['max'])) {
                $this->addUsingAlias(Actual_pwdTableMap::COL_DATETO, $dateto['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Actual_pwdTableMap::COL_DATETO, $dateto, $comparison);
    }

    /**
     * Filter the query on the idPwd column
     *
     * Example usage:
     * <code>
     * $query->filterByIdpwd(1234); // WHERE idPwd = 1234
     * $query->filterByIdpwd(array(12, 34)); // WHERE idPwd IN (12, 34)
     * $query->filterByIdpwd(array('min' => 12)); // WHERE idPwd > 12
     * </code>
     *
     * @param     mixed $idpwd The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildActual_pwdQuery The current query, for fluid interface
     */
    public function filterByIdpwd($idpwd = null, $comparison = null)
    {
        if (is_array($idpwd)) {
            $useMinMax = false;
            if (isset($idpwd['min'])) {
                $this->addUsingAlias(Actual_pwdTableMap::COL_IDPWD, $idpwd['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idpwd['max'])) {
                $this->addUsingAlias(Actual_pwdTableMap::COL_IDPWD, $idpwd['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Actual_pwdTableMap::COL_IDPWD, $idpwd, $comparison);
    }

    /**
     * Filter the query on the pwd column
     *
     * Example usage:
     * <code>
     * $query->filterByPwd('fooValue');   // WHERE pwd = 'fooValue'
     * $query->filterByPwd('%fooValue%'); // WHERE pwd LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pwd The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildActual_pwdQuery The current query, for fluid interface
     */
    public function filterByPwd($pwd = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pwd)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $pwd)) {
                $pwd = str_replace('*', '%', $pwd);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(Actual_pwdTableMap::COL_PWD, $pwd, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildActual_pwd $actual_pwd Object to remove from the list of results
     *
     * @return $this|ChildActual_pwdQuery The current query, for fluid interface
     */
    public function prune($actual_pwd = null)
    {
        if ($actual_pwd) {
            $this->addCond('pruneCond0', $this->getAliasedColName(Actual_pwdTableMap::COL_IDUSER), $actual_pwd->getIduser(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(Actual_pwdTableMap::COL_IDPWD), $actual_pwd->getIdpwd(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the Actual_pwd table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(Actual_pwdTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            Actual_pwdTableMap::clearInstancePool();
            Actual_pwdTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(Actual_pwdTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(Actual_pwdTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            Actual_pwdTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            Actual_pwdTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // Actual_pwdQuery
