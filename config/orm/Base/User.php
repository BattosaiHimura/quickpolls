<?php

namespace Base;

use \DailylessonHasUser as ChildDailylessonHasUser;
use \DailylessonHasUserQuery as ChildDailylessonHasUserQuery;
use \FinalVote as ChildFinalVote;
use \FinalVoteQuery as ChildFinalVoteQuery;
use \ProfHasCourse as ChildProfHasCourse;
use \ProfHasCourseQuery as ChildProfHasCourseQuery;
use \User as ChildUser;
use \UserHasPwd as ChildUserHasPwd;
use \UserHasPwdQuery as ChildUserHasPwdQuery;
use \UserQuery as ChildUserQuery;
use \UserType as ChildUserType;
use \UserTypeQuery as ChildUserTypeQuery;
use \Exception;
use \PDO;
use Map\DailylessonHasUserTableMap;
use Map\FinalVoteTableMap;
use Map\ProfHasCourseTableMap;
use Map\UserHasPwdTableMap;
use Map\UserTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveRecord\ActiveRecordInterface;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\BadMethodCallException;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Parser\AbstractParser;

/**
 * Base class that represents a row from the 'User' table.
 *
 *
 *
* @package    propel.generator..Base
*/
abstract class User implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\UserTableMap';


    /**
     * attribute to determine if this object has previously been saved.
     * @var boolean
     */
    protected $new = true;

    /**
     * attribute to determine whether this object has been deleted.
     * @var boolean
     */
    protected $deleted = false;

    /**
     * The columns that have been modified in current object.
     * Tracking modified columns allows us to only update modified columns.
     * @var array
     */
    protected $modifiedColumns = array();

    /**
     * The (virtual) columns that are added at runtime
     * The formatters can add supplementary columns based on a resultset
     * @var array
     */
    protected $virtualColumns = array();

    /**
     * The value for the iduser field.
     *
     * @var        int
     */
    protected $iduser;

    /**
     * The value for the name field.
     *
     * @var        string
     */
    protected $name;

    /**
     * The value for the surname field.
     *
     * @var        string
     */
    protected $surname;

    /**
     * The value for the matricola field.
     *
     * @var        string
     */
    protected $matricola;

    /**
     * The value for the usertype_idusertype field.
     *
     * @var        int
     */
    protected $usertype_idusertype;

    /**
     * The value for the email field.
     *
     * @var        string
     */
    protected $email;

    /**
     * @var        ChildUserType
     */
    protected $aUserType;

    /**
     * @var        ObjectCollection|ChildDailylessonHasUser[] Collection to store aggregation of ChildDailylessonHasUser objects.
     */
    protected $collDailylessonHasUsers;
    protected $collDailylessonHasUsersPartial;

    /**
     * @var        ObjectCollection|ChildFinalVote[] Collection to store aggregation of ChildFinalVote objects.
     */
    protected $collFinalVotes;
    protected $collFinalVotesPartial;

    /**
     * @var        ObjectCollection|ChildProfHasCourse[] Collection to store aggregation of ChildProfHasCourse objects.
     */
    protected $collProfHasCourses;
    protected $collProfHasCoursesPartial;

    /**
     * @var        ObjectCollection|ChildUserHasPwd[] Collection to store aggregation of ChildUserHasPwd objects.
     */
    protected $collUserHasPwds;
    protected $collUserHasPwdsPartial;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildDailylessonHasUser[]
     */
    protected $dailylessonHasUsersScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildFinalVote[]
     */
    protected $finalVotesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildProfHasCourse[]
     */
    protected $profHasCoursesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildUserHasPwd[]
     */
    protected $userHasPwdsScheduledForDeletion = null;

    /**
     * Initializes internal state of Base\User object.
     */
    public function __construct()
    {
    }

    /**
     * Returns whether the object has been modified.
     *
     * @return boolean True if the object has been modified.
     */
    public function isModified()
    {
        return !!$this->modifiedColumns;
    }

    /**
     * Has specified column been modified?
     *
     * @param  string  $col column fully qualified name (TableMap::TYPE_COLNAME), e.g. Book::AUTHOR_ID
     * @return boolean True if $col has been modified.
     */
    public function isColumnModified($col)
    {
        return $this->modifiedColumns && isset($this->modifiedColumns[$col]);
    }

    /**
     * Get the columns that have been modified in this object.
     * @return array A unique list of the modified column names for this object.
     */
    public function getModifiedColumns()
    {
        return $this->modifiedColumns ? array_keys($this->modifiedColumns) : [];
    }

    /**
     * Returns whether the object has ever been saved.  This will
     * be false, if the object was retrieved from storage or was created
     * and then saved.
     *
     * @return boolean true, if the object has never been persisted.
     */
    public function isNew()
    {
        return $this->new;
    }

    /**
     * Setter for the isNew attribute.  This method will be called
     * by Propel-generated children and objects.
     *
     * @param boolean $b the state of the object.
     */
    public function setNew($b)
    {
        $this->new = (boolean) $b;
    }

    /**
     * Whether this object has been deleted.
     * @return boolean The deleted state of this object.
     */
    public function isDeleted()
    {
        return $this->deleted;
    }

    /**
     * Specify whether this object has been deleted.
     * @param  boolean $b The deleted state of this object.
     * @return void
     */
    public function setDeleted($b)
    {
        $this->deleted = (boolean) $b;
    }

    /**
     * Sets the modified state for the object to be false.
     * @param  string $col If supplied, only the specified column is reset.
     * @return void
     */
    public function resetModified($col = null)
    {
        if (null !== $col) {
            if (isset($this->modifiedColumns[$col])) {
                unset($this->modifiedColumns[$col]);
            }
        } else {
            $this->modifiedColumns = array();
        }
    }

    /**
     * Compares this with another <code>User</code> instance.  If
     * <code>obj</code> is an instance of <code>User</code>, delegates to
     * <code>equals(User)</code>.  Otherwise, returns <code>false</code>.
     *
     * @param  mixed   $obj The object to compare to.
     * @return boolean Whether equal to the object specified.
     */
    public function equals($obj)
    {
        if (!$obj instanceof static) {
            return false;
        }

        if ($this === $obj) {
            return true;
        }

        if (null === $this->getPrimaryKey() || null === $obj->getPrimaryKey()) {
            return false;
        }

        return $this->getPrimaryKey() === $obj->getPrimaryKey();
    }

    /**
     * Get the associative array of the virtual columns in this object
     *
     * @return array
     */
    public function getVirtualColumns()
    {
        return $this->virtualColumns;
    }

    /**
     * Checks the existence of a virtual column in this object
     *
     * @param  string  $name The virtual column name
     * @return boolean
     */
    public function hasVirtualColumn($name)
    {
        return array_key_exists($name, $this->virtualColumns);
    }

    /**
     * Get the value of a virtual column in this object
     *
     * @param  string $name The virtual column name
     * @return mixed
     *
     * @throws PropelException
     */
    public function getVirtualColumn($name)
    {
        if (!$this->hasVirtualColumn($name)) {
            throw new PropelException(sprintf('Cannot get value of inexistent virtual column %s.', $name));
        }

        return $this->virtualColumns[$name];
    }

    /**
     * Set the value of a virtual column in this object
     *
     * @param string $name  The virtual column name
     * @param mixed  $value The value to give to the virtual column
     *
     * @return $this|User The current object, for fluid interface
     */
    public function setVirtualColumn($name, $value)
    {
        $this->virtualColumns[$name] = $value;

        return $this;
    }

    /**
     * Logs a message using Propel::log().
     *
     * @param  string  $msg
     * @param  int     $priority One of the Propel::LOG_* logging levels
     * @return boolean
     */
    protected function log($msg, $priority = Propel::LOG_INFO)
    {
        return Propel::log(get_class($this) . ': ' . $msg, $priority);
    }

    /**
     * Export the current object properties to a string, using a given parser format
     * <code>
     * $book = BookQuery::create()->findPk(9012);
     * echo $book->exportTo('JSON');
     *  => {"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * @param  mixed   $parser                 A AbstractParser instance, or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param  boolean $includeLazyLoadColumns (optional) Whether to include lazy load(ed) columns. Defaults to TRUE.
     * @return string  The exported data
     */
    public function exportTo($parser, $includeLazyLoadColumns = true)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        return $parser->fromArray($this->toArray(TableMap::TYPE_PHPNAME, $includeLazyLoadColumns, array(), true));
    }

    /**
     * Clean up internal collections prior to serializing
     * Avoids recursive loops that turn into segmentation faults when serializing
     */
    public function __sleep()
    {
        $this->clearAllReferences();

        $cls = new \ReflectionClass($this);
        $propertyNames = [];
        $serializableProperties = array_diff($cls->getProperties(), $cls->getProperties(\ReflectionProperty::IS_STATIC));

        foreach($serializableProperties as $property) {
            $propertyNames[] = $property->getName();
        }

        return $propertyNames;
    }

    /**
     * Get the [iduser] column value.
     *
     * @return int
     */
    public function getIduser()
    {
        return $this->iduser;
    }

    /**
     * Get the [name] column value.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get the [surname] column value.
     *
     * @return string
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * Get the [matricola] column value.
     *
     * @return string
     */
    public function getMatricola()
    {
        return $this->matricola;
    }

    /**
     * Get the [usertype_idusertype] column value.
     *
     * @return int
     */
    public function getUsertypeIdusertype()
    {
        return $this->usertype_idusertype;
    }

    /**
     * Get the [email] column value.
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of [iduser] column.
     *
     * @param int $v new value
     * @return $this|\User The current object (for fluent API support)
     */
    public function setIduser($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->iduser !== $v) {
            $this->iduser = $v;
            $this->modifiedColumns[UserTableMap::COL_IDUSER] = true;
        }

        return $this;
    } // setIduser()

    /**
     * Set the value of [name] column.
     *
     * @param string $v new value
     * @return $this|\User The current object (for fluent API support)
     */
    public function setName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->name !== $v) {
            $this->name = $v;
            $this->modifiedColumns[UserTableMap::COL_NAME] = true;
        }

        return $this;
    } // setName()

    /**
     * Set the value of [surname] column.
     *
     * @param string $v new value
     * @return $this|\User The current object (for fluent API support)
     */
    public function setSurname($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->surname !== $v) {
            $this->surname = $v;
            $this->modifiedColumns[UserTableMap::COL_SURNAME] = true;
        }

        return $this;
    } // setSurname()

    /**
     * Set the value of [matricola] column.
     *
     * @param string $v new value
     * @return $this|\User The current object (for fluent API support)
     */
    public function setMatricola($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->matricola !== $v) {
            $this->matricola = $v;
            $this->modifiedColumns[UserTableMap::COL_MATRICOLA] = true;
        }

        return $this;
    } // setMatricola()

    /**
     * Set the value of [usertype_idusertype] column.
     *
     * @param int $v new value
     * @return $this|\User The current object (for fluent API support)
     */
    public function setUsertypeIdusertype($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->usertype_idusertype !== $v) {
            $this->usertype_idusertype = $v;
            $this->modifiedColumns[UserTableMap::COL_USERTYPE_IDUSERTYPE] = true;
        }

        if ($this->aUserType !== null && $this->aUserType->getIdusertype() !== $v) {
            $this->aUserType = null;
        }

        return $this;
    } // setUsertypeIdusertype()

    /**
     * Set the value of [email] column.
     *
     * @param string $v new value
     * @return $this|\User The current object (for fluent API support)
     */
    public function setEmail($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->email !== $v) {
            $this->email = $v;
            $this->modifiedColumns[UserTableMap::COL_EMAIL] = true;
        }

        return $this;
    } // setEmail()

    /**
     * Indicates whether the columns in this object are only set to default values.
     *
     * This method can be used in conjunction with isModified() to indicate whether an object is both
     * modified _and_ has some values set which are non-default.
     *
     * @return boolean Whether the columns in this object are only been set with default values.
     */
    public function hasOnlyDefaultValues()
    {
        // otherwise, everything was equal, so return TRUE
        return true;
    } // hasOnlyDefaultValues()

    /**
     * Hydrates (populates) the object variables with values from the database resultset.
     *
     * An offset (0-based "start column") is specified so that objects can be hydrated
     * with a subset of the columns in the resultset rows.  This is needed, for example,
     * for results of JOIN queries where the resultset row includes columns from two or
     * more tables.
     *
     * @param array   $row       The row returned by DataFetcher->fetch().
     * @param int     $startcol  0-based offset column which indicates which restultset column to start with.
     * @param boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @param string  $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                  One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                            TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false, $indexType = TableMap::TYPE_NUM)
    {
        try {

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : UserTableMap::translateFieldName('Iduser', TableMap::TYPE_PHPNAME, $indexType)];
            $this->iduser = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : UserTableMap::translateFieldName('Name', TableMap::TYPE_PHPNAME, $indexType)];
            $this->name = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : UserTableMap::translateFieldName('Surname', TableMap::TYPE_PHPNAME, $indexType)];
            $this->surname = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : UserTableMap::translateFieldName('Matricola', TableMap::TYPE_PHPNAME, $indexType)];
            $this->matricola = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : UserTableMap::translateFieldName('UsertypeIdusertype', TableMap::TYPE_PHPNAME, $indexType)];
            $this->usertype_idusertype = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : UserTableMap::translateFieldName('Email', TableMap::TYPE_PHPNAME, $indexType)];
            $this->email = (null !== $col) ? (string) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 6; // 6 = UserTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\User'), 0, $e);
        }
    }

    /**
     * Checks and repairs the internal consistency of the object.
     *
     * This method is executed after an already-instantiated object is re-hydrated
     * from the database.  It exists to check any foreign keys to make sure that
     * the objects related to the current object are correct based on foreign key.
     *
     * You can override this method in the stub class, but you should always invoke
     * the base method from the overridden method (i.e. parent::ensureConsistency()),
     * in case your model changes.
     *
     * @throws PropelException
     */
    public function ensureConsistency()
    {
        if ($this->aUserType !== null && $this->usertype_idusertype !== $this->aUserType->getIdusertype()) {
            $this->aUserType = null;
        }
    } // ensureConsistency

    /**
     * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
     *
     * This will only work if the object has been saved and has a valid primary key set.
     *
     * @param      boolean $deep (optional) Whether to also de-associated any related objects.
     * @param      ConnectionInterface $con (optional) The ConnectionInterface connection to use.
     * @return void
     * @throws PropelException - if this object is deleted, unsaved or doesn't have pk match in db
     */
    public function reload($deep = false, ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("Cannot reload a deleted object.");
        }

        if ($this->isNew()) {
            throw new PropelException("Cannot reload an unsaved object.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(UserTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildUserQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aUserType = null;
            $this->collDailylessonHasUsers = null;

            $this->collFinalVotes = null;

            $this->collProfHasCourses = null;

            $this->collUserHasPwds = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see User::setDeleted()
     * @see User::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(UserTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildUserQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
            if ($ret) {
                $deleteQuery->delete($con);
                $this->postDelete($con);
                $this->setDeleted(true);
            }
        });
    }

    /**
     * Persists this object to the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All modified related objects will also be persisted in the doSave()
     * method.  This method wraps all precipitate database operations in a
     * single transaction.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see doSave()
     */
    public function save(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("You cannot save an object that has been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(UserTableMap::DATABASE_NAME);
        }

        return $con->transaction(function () use ($con) {
            $ret = $this->preSave($con);
            $isInsert = $this->isNew();
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
            } else {
                $ret = $ret && $this->preUpdate($con);
            }
            if ($ret) {
                $affectedRows = $this->doSave($con);
                if ($isInsert) {
                    $this->postInsert($con);
                } else {
                    $this->postUpdate($con);
                }
                $this->postSave($con);
                UserTableMap::addInstanceToPool($this);
            } else {
                $affectedRows = 0;
            }

            return $affectedRows;
        });
    }

    /**
     * Performs the work of inserting or updating the row in the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All related objects are also updated in this method.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see save()
     */
    protected function doSave(ConnectionInterface $con)
    {
        $affectedRows = 0; // initialize var to track total num of affected rows
        if (!$this->alreadyInSave) {
            $this->alreadyInSave = true;

            // We call the save method on the following object(s) if they
            // were passed to this object by their corresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aUserType !== null) {
                if ($this->aUserType->isModified() || $this->aUserType->isNew()) {
                    $affectedRows += $this->aUserType->save($con);
                }
                $this->setUserType($this->aUserType);
            }

            if ($this->isNew() || $this->isModified()) {
                // persist changes
                if ($this->isNew()) {
                    $this->doInsert($con);
                    $affectedRows += 1;
                } else {
                    $affectedRows += $this->doUpdate($con);
                }
                $this->resetModified();
            }

            if ($this->dailylessonHasUsersScheduledForDeletion !== null) {
                if (!$this->dailylessonHasUsersScheduledForDeletion->isEmpty()) {
                    \DailylessonHasUserQuery::create()
                        ->filterByPrimaryKeys($this->dailylessonHasUsersScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->dailylessonHasUsersScheduledForDeletion = null;
                }
            }

            if ($this->collDailylessonHasUsers !== null) {
                foreach ($this->collDailylessonHasUsers as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->finalVotesScheduledForDeletion !== null) {
                if (!$this->finalVotesScheduledForDeletion->isEmpty()) {
                    \FinalVoteQuery::create()
                        ->filterByPrimaryKeys($this->finalVotesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->finalVotesScheduledForDeletion = null;
                }
            }

            if ($this->collFinalVotes !== null) {
                foreach ($this->collFinalVotes as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->profHasCoursesScheduledForDeletion !== null) {
                if (!$this->profHasCoursesScheduledForDeletion->isEmpty()) {
                    \ProfHasCourseQuery::create()
                        ->filterByPrimaryKeys($this->profHasCoursesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->profHasCoursesScheduledForDeletion = null;
                }
            }

            if ($this->collProfHasCourses !== null) {
                foreach ($this->collProfHasCourses as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->userHasPwdsScheduledForDeletion !== null) {
                if (!$this->userHasPwdsScheduledForDeletion->isEmpty()) {
                    \UserHasPwdQuery::create()
                        ->filterByPrimaryKeys($this->userHasPwdsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->userHasPwdsScheduledForDeletion = null;
                }
            }

            if ($this->collUserHasPwds !== null) {
                foreach ($this->collUserHasPwds as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            $this->alreadyInSave = false;

        }

        return $affectedRows;
    } // doSave()

    /**
     * Insert the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @throws PropelException
     * @see doSave()
     */
    protected function doInsert(ConnectionInterface $con)
    {
        $modifiedColumns = array();
        $index = 0;

        $this->modifiedColumns[UserTableMap::COL_IDUSER] = true;
        if (null !== $this->iduser) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . UserTableMap::COL_IDUSER . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(UserTableMap::COL_IDUSER)) {
            $modifiedColumns[':p' . $index++]  = 'idUser';
        }
        if ($this->isColumnModified(UserTableMap::COL_NAME)) {
            $modifiedColumns[':p' . $index++]  = 'name';
        }
        if ($this->isColumnModified(UserTableMap::COL_SURNAME)) {
            $modifiedColumns[':p' . $index++]  = 'surname';
        }
        if ($this->isColumnModified(UserTableMap::COL_MATRICOLA)) {
            $modifiedColumns[':p' . $index++]  = 'matricola';
        }
        if ($this->isColumnModified(UserTableMap::COL_USERTYPE_IDUSERTYPE)) {
            $modifiedColumns[':p' . $index++]  = 'UserType_idUserType';
        }
        if ($this->isColumnModified(UserTableMap::COL_EMAIL)) {
            $modifiedColumns[':p' . $index++]  = 'email';
        }

        $sql = sprintf(
            'INSERT INTO User (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'idUser':
                        $stmt->bindValue($identifier, $this->iduser, PDO::PARAM_INT);
                        break;
                    case 'name':
                        $stmt->bindValue($identifier, $this->name, PDO::PARAM_STR);
                        break;
                    case 'surname':
                        $stmt->bindValue($identifier, $this->surname, PDO::PARAM_STR);
                        break;
                    case 'matricola':
                        $stmt->bindValue($identifier, $this->matricola, PDO::PARAM_STR);
                        break;
                    case 'UserType_idUserType':
                        $stmt->bindValue($identifier, $this->usertype_idusertype, PDO::PARAM_INT);
                        break;
                    case 'email':
                        $stmt->bindValue($identifier, $this->email, PDO::PARAM_STR);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), 0, $e);
        }

        try {
            $pk = $con->lastInsertId();
        } catch (Exception $e) {
            throw new PropelException('Unable to get autoincrement id.', 0, $e);
        }
        $this->setIduser($pk);

        $this->setNew(false);
    }

    /**
     * Update the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @return Integer Number of updated rows
     * @see doSave()
     */
    protected function doUpdate(ConnectionInterface $con)
    {
        $selectCriteria = $this->buildPkeyCriteria();
        $valuesCriteria = $this->buildCriteria();

        return $selectCriteria->doUpdate($valuesCriteria, $con);
    }

    /**
     * Retrieves a field from the object by name passed in as a string.
     *
     * @param      string $name name
     * @param      string $type The type of fieldname the $name is of:
     *                     one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                     TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                     Defaults to TableMap::TYPE_PHPNAME.
     * @return mixed Value of field.
     */
    public function getByName($name, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = UserTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
        $field = $this->getByPosition($pos);

        return $field;
    }

    /**
     * Retrieves a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param      int $pos position in xml schema
     * @return mixed Value of field at $pos
     */
    public function getByPosition($pos)
    {
        switch ($pos) {
            case 0:
                return $this->getIduser();
                break;
            case 1:
                return $this->getName();
                break;
            case 2:
                return $this->getSurname();
                break;
            case 3:
                return $this->getMatricola();
                break;
            case 4:
                return $this->getUsertypeIdusertype();
                break;
            case 5:
                return $this->getEmail();
                break;
            default:
                return null;
                break;
        } // switch()
    }

    /**
     * Exports the object as an array.
     *
     * You can specify the key type of the array by passing one of the class
     * type constants.
     *
     * @param     string  $keyType (optional) One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     *                    TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                    Defaults to TableMap::TYPE_PHPNAME.
     * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to TRUE.
     * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
     * @param     boolean $includeForeignObjects (optional) Whether to include hydrated related objects. Default to FALSE.
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = TableMap::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array(), $includeForeignObjects = false)
    {

        if (isset($alreadyDumpedObjects['User'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['User'][$this->hashCode()] = true;
        $keys = UserTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIduser(),
            $keys[1] => $this->getName(),
            $keys[2] => $this->getSurname(),
            $keys[3] => $this->getMatricola(),
            $keys[4] => $this->getUsertypeIdusertype(),
            $keys[5] => $this->getEmail(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aUserType) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'userType';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'User_type';
                        break;
                    default:
                        $key = 'UserType';
                }

                $result[$key] = $this->aUserType->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collDailylessonHasUsers) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'dailylessonHasUsers';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'DailyLesson_has_Users';
                        break;
                    default:
                        $key = 'DailylessonHasUsers';
                }

                $result[$key] = $this->collDailylessonHasUsers->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collFinalVotes) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'finalVotes';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'Final_votes';
                        break;
                    default:
                        $key = 'FinalVotes';
                }

                $result[$key] = $this->collFinalVotes->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collProfHasCourses) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'profHasCourses';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'Prof_has_Courses';
                        break;
                    default:
                        $key = 'ProfHasCourses';
                }

                $result[$key] = $this->collProfHasCourses->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collUserHasPwds) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'userHasPwds';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'User_has_Pwds';
                        break;
                    default:
                        $key = 'UserHasPwds';
                }

                $result[$key] = $this->collUserHasPwds->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
        }

        return $result;
    }

    /**
     * Sets a field from the object by name passed in as a string.
     *
     * @param  string $name
     * @param  mixed  $value field value
     * @param  string $type The type of fieldname the $name is of:
     *                one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                Defaults to TableMap::TYPE_PHPNAME.
     * @return $this|\User
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = UserTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\User
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setIduser($value);
                break;
            case 1:
                $this->setName($value);
                break;
            case 2:
                $this->setSurname($value);
                break;
            case 3:
                $this->setMatricola($value);
                break;
            case 4:
                $this->setUsertypeIdusertype($value);
                break;
            case 5:
                $this->setEmail($value);
                break;
        } // switch()

        return $this;
    }

    /**
     * Populates the object using an array.
     *
     * This is particularly useful when populating an object from one of the
     * request arrays (e.g. $_POST).  This method goes through the column
     * names, checking to see whether a matching key exists in populated
     * array. If so the setByName() method is called for that column.
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param      array  $arr     An array to populate the object from.
     * @param      string $keyType The type of keys the array uses.
     * @return void
     */
    public function fromArray($arr, $keyType = TableMap::TYPE_PHPNAME)
    {
        $keys = UserTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setIduser($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setName($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setSurname($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setMatricola($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setUsertypeIdusertype($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setEmail($arr[$keys[5]]);
        }
    }

     /**
     * Populate the current object from a string, using a given parser format
     * <code>
     * $book = new Book();
     * $book->importFrom('JSON', '{"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param mixed $parser A AbstractParser instance,
     *                       or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param string $data The source data to import from
     * @param string $keyType The type of keys the array uses.
     *
     * @return $this|\User The current object, for fluid interface
     */
    public function importFrom($parser, $data, $keyType = TableMap::TYPE_PHPNAME)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        $this->fromArray($parser->toArray($data), $keyType);

        return $this;
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(UserTableMap::DATABASE_NAME);

        if ($this->isColumnModified(UserTableMap::COL_IDUSER)) {
            $criteria->add(UserTableMap::COL_IDUSER, $this->iduser);
        }
        if ($this->isColumnModified(UserTableMap::COL_NAME)) {
            $criteria->add(UserTableMap::COL_NAME, $this->name);
        }
        if ($this->isColumnModified(UserTableMap::COL_SURNAME)) {
            $criteria->add(UserTableMap::COL_SURNAME, $this->surname);
        }
        if ($this->isColumnModified(UserTableMap::COL_MATRICOLA)) {
            $criteria->add(UserTableMap::COL_MATRICOLA, $this->matricola);
        }
        if ($this->isColumnModified(UserTableMap::COL_USERTYPE_IDUSERTYPE)) {
            $criteria->add(UserTableMap::COL_USERTYPE_IDUSERTYPE, $this->usertype_idusertype);
        }
        if ($this->isColumnModified(UserTableMap::COL_EMAIL)) {
            $criteria->add(UserTableMap::COL_EMAIL, $this->email);
        }

        return $criteria;
    }

    /**
     * Builds a Criteria object containing the primary key for this object.
     *
     * Unlike buildCriteria() this method includes the primary key values regardless
     * of whether or not they have been modified.
     *
     * @throws LogicException if no primary key is defined
     *
     * @return Criteria The Criteria object containing value(s) for primary key(s).
     */
    public function buildPkeyCriteria()
    {
        $criteria = ChildUserQuery::create();
        $criteria->add(UserTableMap::COL_IDUSER, $this->iduser);

        return $criteria;
    }

    /**
     * If the primary key is not null, return the hashcode of the
     * primary key. Otherwise, return the hash code of the object.
     *
     * @return int Hashcode
     */
    public function hashCode()
    {
        $validPk = null !== $this->getIduser();

        $validPrimaryKeyFKs = 0;
        $primaryKeyFKs = [];

        if ($validPk) {
            return crc32(json_encode($this->getPrimaryKey(), JSON_UNESCAPED_UNICODE));
        } elseif ($validPrimaryKeyFKs) {
            return crc32(json_encode($primaryKeyFKs, JSON_UNESCAPED_UNICODE));
        }

        return spl_object_hash($this);
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getIduser();
    }

    /**
     * Generic method to set the primary key (iduser column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIduser($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getIduser();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \User (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setName($this->getName());
        $copyObj->setSurname($this->getSurname());
        $copyObj->setMatricola($this->getMatricola());
        $copyObj->setUsertypeIdusertype($this->getUsertypeIdusertype());
        $copyObj->setEmail($this->getEmail());

        if ($deepCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);

            foreach ($this->getDailylessonHasUsers() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addDailylessonHasUser($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getFinalVotes() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addFinalVote($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getProfHasCourses() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addProfHasCourse($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getUserHasPwds() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addUserHasPwd($relObj->copy($deepCopy));
                }
            }

        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIduser(NULL); // this is a auto-increment column, so set to default value
        }
    }

    /**
     * Makes a copy of this object that will be inserted as a new row in table when saved.
     * It creates a new object filling in the simple attributes, but skipping any primary
     * keys that are defined for the table.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param  boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @return \User Clone of current object.
     * @throws PropelException
     */
    public function copy($deepCopy = false)
    {
        // we use get_class(), because this might be a subclass
        $clazz = get_class($this);
        $copyObj = new $clazz();
        $this->copyInto($copyObj, $deepCopy);

        return $copyObj;
    }

    /**
     * Declares an association between this object and a ChildUserType object.
     *
     * @param  ChildUserType $v
     * @return $this|\User The current object (for fluent API support)
     * @throws PropelException
     */
    public function setUserType(ChildUserType $v = null)
    {
        if ($v === null) {
            $this->setUsertypeIdusertype(NULL);
        } else {
            $this->setUsertypeIdusertype($v->getIdusertype());
        }

        $this->aUserType = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildUserType object, it will not be re-added.
        if ($v !== null) {
            $v->addUser($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildUserType object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildUserType The associated ChildUserType object.
     * @throws PropelException
     */
    public function getUserType(ConnectionInterface $con = null)
    {
        if ($this->aUserType === null && ($this->usertype_idusertype !== null)) {
            $this->aUserType = ChildUserTypeQuery::create()->findPk($this->usertype_idusertype, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aUserType->addUsers($this);
             */
        }

        return $this->aUserType;
    }


    /**
     * Initializes a collection based on the name of a relation.
     * Avoids crafting an 'init[$relationName]s' method name
     * that wouldn't work when StandardEnglishPluralizer is used.
     *
     * @param      string $relationName The name of the relation to initialize
     * @return void
     */
    public function initRelation($relationName)
    {
        if ('DailylessonHasUser' == $relationName) {
            return $this->initDailylessonHasUsers();
        }
        if ('FinalVote' == $relationName) {
            return $this->initFinalVotes();
        }
        if ('ProfHasCourse' == $relationName) {
            return $this->initProfHasCourses();
        }
        if ('UserHasPwd' == $relationName) {
            return $this->initUserHasPwds();
        }
    }

    /**
     * Clears out the collDailylessonHasUsers collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addDailylessonHasUsers()
     */
    public function clearDailylessonHasUsers()
    {
        $this->collDailylessonHasUsers = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collDailylessonHasUsers collection loaded partially.
     */
    public function resetPartialDailylessonHasUsers($v = true)
    {
        $this->collDailylessonHasUsersPartial = $v;
    }

    /**
     * Initializes the collDailylessonHasUsers collection.
     *
     * By default this just sets the collDailylessonHasUsers collection to an empty array (like clearcollDailylessonHasUsers());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initDailylessonHasUsers($overrideExisting = true)
    {
        if (null !== $this->collDailylessonHasUsers && !$overrideExisting) {
            return;
        }

        $collectionClassName = DailylessonHasUserTableMap::getTableMap()->getCollectionClassName();

        $this->collDailylessonHasUsers = new $collectionClassName;
        $this->collDailylessonHasUsers->setModel('\DailylessonHasUser');
    }

    /**
     * Gets an array of ChildDailylessonHasUser objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildUser is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildDailylessonHasUser[] List of ChildDailylessonHasUser objects
     * @throws PropelException
     */
    public function getDailylessonHasUsers(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collDailylessonHasUsersPartial && !$this->isNew();
        if (null === $this->collDailylessonHasUsers || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collDailylessonHasUsers) {
                // return empty collection
                $this->initDailylessonHasUsers();
            } else {
                $collDailylessonHasUsers = ChildDailylessonHasUserQuery::create(null, $criteria)
                    ->filterByUser($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collDailylessonHasUsersPartial && count($collDailylessonHasUsers)) {
                        $this->initDailylessonHasUsers(false);

                        foreach ($collDailylessonHasUsers as $obj) {
                            if (false == $this->collDailylessonHasUsers->contains($obj)) {
                                $this->collDailylessonHasUsers->append($obj);
                            }
                        }

                        $this->collDailylessonHasUsersPartial = true;
                    }

                    return $collDailylessonHasUsers;
                }

                if ($partial && $this->collDailylessonHasUsers) {
                    foreach ($this->collDailylessonHasUsers as $obj) {
                        if ($obj->isNew()) {
                            $collDailylessonHasUsers[] = $obj;
                        }
                    }
                }

                $this->collDailylessonHasUsers = $collDailylessonHasUsers;
                $this->collDailylessonHasUsersPartial = false;
            }
        }

        return $this->collDailylessonHasUsers;
    }

    /**
     * Sets a collection of ChildDailylessonHasUser objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $dailylessonHasUsers A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildUser The current object (for fluent API support)
     */
    public function setDailylessonHasUsers(Collection $dailylessonHasUsers, ConnectionInterface $con = null)
    {
        /** @var ChildDailylessonHasUser[] $dailylessonHasUsersToDelete */
        $dailylessonHasUsersToDelete = $this->getDailylessonHasUsers(new Criteria(), $con)->diff($dailylessonHasUsers);


        //since at least one column in the foreign key is at the same time a PK
        //we can not just set a PK to NULL in the lines below. We have to store
        //a backup of all values, so we are able to manipulate these items based on the onDelete value later.
        $this->dailylessonHasUsersScheduledForDeletion = clone $dailylessonHasUsersToDelete;

        foreach ($dailylessonHasUsersToDelete as $dailylessonHasUserRemoved) {
            $dailylessonHasUserRemoved->setUser(null);
        }

        $this->collDailylessonHasUsers = null;
        foreach ($dailylessonHasUsers as $dailylessonHasUser) {
            $this->addDailylessonHasUser($dailylessonHasUser);
        }

        $this->collDailylessonHasUsers = $dailylessonHasUsers;
        $this->collDailylessonHasUsersPartial = false;

        return $this;
    }

    /**
     * Returns the number of related DailylessonHasUser objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related DailylessonHasUser objects.
     * @throws PropelException
     */
    public function countDailylessonHasUsers(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collDailylessonHasUsersPartial && !$this->isNew();
        if (null === $this->collDailylessonHasUsers || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collDailylessonHasUsers) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getDailylessonHasUsers());
            }

            $query = ChildDailylessonHasUserQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByUser($this)
                ->count($con);
        }

        return count($this->collDailylessonHasUsers);
    }

    /**
     * Method called to associate a ChildDailylessonHasUser object to this object
     * through the ChildDailylessonHasUser foreign key attribute.
     *
     * @param  ChildDailylessonHasUser $l ChildDailylessonHasUser
     * @return $this|\User The current object (for fluent API support)
     */
    public function addDailylessonHasUser(ChildDailylessonHasUser $l)
    {
        if ($this->collDailylessonHasUsers === null) {
            $this->initDailylessonHasUsers();
            $this->collDailylessonHasUsersPartial = true;
        }

        if (!$this->collDailylessonHasUsers->contains($l)) {
            $this->doAddDailylessonHasUser($l);

            if ($this->dailylessonHasUsersScheduledForDeletion and $this->dailylessonHasUsersScheduledForDeletion->contains($l)) {
                $this->dailylessonHasUsersScheduledForDeletion->remove($this->dailylessonHasUsersScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildDailylessonHasUser $dailylessonHasUser The ChildDailylessonHasUser object to add.
     */
    protected function doAddDailylessonHasUser(ChildDailylessonHasUser $dailylessonHasUser)
    {
        $this->collDailylessonHasUsers[]= $dailylessonHasUser;
        $dailylessonHasUser->setUser($this);
    }

    /**
     * @param  ChildDailylessonHasUser $dailylessonHasUser The ChildDailylessonHasUser object to remove.
     * @return $this|ChildUser The current object (for fluent API support)
     */
    public function removeDailylessonHasUser(ChildDailylessonHasUser $dailylessonHasUser)
    {
        if ($this->getDailylessonHasUsers()->contains($dailylessonHasUser)) {
            $pos = $this->collDailylessonHasUsers->search($dailylessonHasUser);
            $this->collDailylessonHasUsers->remove($pos);
            if (null === $this->dailylessonHasUsersScheduledForDeletion) {
                $this->dailylessonHasUsersScheduledForDeletion = clone $this->collDailylessonHasUsers;
                $this->dailylessonHasUsersScheduledForDeletion->clear();
            }
            $this->dailylessonHasUsersScheduledForDeletion[]= clone $dailylessonHasUser;
            $dailylessonHasUser->setUser(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this User is new, it will return
     * an empty collection; or if this User has previously
     * been saved, it will retrieve related DailylessonHasUsers from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in User.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildDailylessonHasUser[] List of ChildDailylessonHasUser objects
     */
    public function getDailylessonHasUsersJoinDailylesson(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildDailylessonHasUserQuery::create(null, $criteria);
        $query->joinWith('Dailylesson', $joinBehavior);

        return $this->getDailylessonHasUsers($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this User is new, it will return
     * an empty collection; or if this User has previously
     * been saved, it will retrieve related DailylessonHasUsers from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in User.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildDailylessonHasUser[] List of ChildDailylessonHasUser objects
     */
    public function getDailylessonHasUsersJoinQuality(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildDailylessonHasUserQuery::create(null, $criteria);
        $query->joinWith('Quality', $joinBehavior);

        return $this->getDailylessonHasUsers($query, $con);
    }

    /**
     * Clears out the collFinalVotes collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addFinalVotes()
     */
    public function clearFinalVotes()
    {
        $this->collFinalVotes = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collFinalVotes collection loaded partially.
     */
    public function resetPartialFinalVotes($v = true)
    {
        $this->collFinalVotesPartial = $v;
    }

    /**
     * Initializes the collFinalVotes collection.
     *
     * By default this just sets the collFinalVotes collection to an empty array (like clearcollFinalVotes());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initFinalVotes($overrideExisting = true)
    {
        if (null !== $this->collFinalVotes && !$overrideExisting) {
            return;
        }

        $collectionClassName = FinalVoteTableMap::getTableMap()->getCollectionClassName();

        $this->collFinalVotes = new $collectionClassName;
        $this->collFinalVotes->setModel('\FinalVote');
    }

    /**
     * Gets an array of ChildFinalVote objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildUser is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildFinalVote[] List of ChildFinalVote objects
     * @throws PropelException
     */
    public function getFinalVotes(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collFinalVotesPartial && !$this->isNew();
        if (null === $this->collFinalVotes || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collFinalVotes) {
                // return empty collection
                $this->initFinalVotes();
            } else {
                $collFinalVotes = ChildFinalVoteQuery::create(null, $criteria)
                    ->filterByUser($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collFinalVotesPartial && count($collFinalVotes)) {
                        $this->initFinalVotes(false);

                        foreach ($collFinalVotes as $obj) {
                            if (false == $this->collFinalVotes->contains($obj)) {
                                $this->collFinalVotes->append($obj);
                            }
                        }

                        $this->collFinalVotesPartial = true;
                    }

                    return $collFinalVotes;
                }

                if ($partial && $this->collFinalVotes) {
                    foreach ($this->collFinalVotes as $obj) {
                        if ($obj->isNew()) {
                            $collFinalVotes[] = $obj;
                        }
                    }
                }

                $this->collFinalVotes = $collFinalVotes;
                $this->collFinalVotesPartial = false;
            }
        }

        return $this->collFinalVotes;
    }

    /**
     * Sets a collection of ChildFinalVote objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $finalVotes A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildUser The current object (for fluent API support)
     */
    public function setFinalVotes(Collection $finalVotes, ConnectionInterface $con = null)
    {
        /** @var ChildFinalVote[] $finalVotesToDelete */
        $finalVotesToDelete = $this->getFinalVotes(new Criteria(), $con)->diff($finalVotes);


        $this->finalVotesScheduledForDeletion = $finalVotesToDelete;

        foreach ($finalVotesToDelete as $finalVoteRemoved) {
            $finalVoteRemoved->setUser(null);
        }

        $this->collFinalVotes = null;
        foreach ($finalVotes as $finalVote) {
            $this->addFinalVote($finalVote);
        }

        $this->collFinalVotes = $finalVotes;
        $this->collFinalVotesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related FinalVote objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related FinalVote objects.
     * @throws PropelException
     */
    public function countFinalVotes(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collFinalVotesPartial && !$this->isNew();
        if (null === $this->collFinalVotes || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collFinalVotes) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getFinalVotes());
            }

            $query = ChildFinalVoteQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByUser($this)
                ->count($con);
        }

        return count($this->collFinalVotes);
    }

    /**
     * Method called to associate a ChildFinalVote object to this object
     * through the ChildFinalVote foreign key attribute.
     *
     * @param  ChildFinalVote $l ChildFinalVote
     * @return $this|\User The current object (for fluent API support)
     */
    public function addFinalVote(ChildFinalVote $l)
    {
        if ($this->collFinalVotes === null) {
            $this->initFinalVotes();
            $this->collFinalVotesPartial = true;
        }

        if (!$this->collFinalVotes->contains($l)) {
            $this->doAddFinalVote($l);

            if ($this->finalVotesScheduledForDeletion and $this->finalVotesScheduledForDeletion->contains($l)) {
                $this->finalVotesScheduledForDeletion->remove($this->finalVotesScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildFinalVote $finalVote The ChildFinalVote object to add.
     */
    protected function doAddFinalVote(ChildFinalVote $finalVote)
    {
        $this->collFinalVotes[]= $finalVote;
        $finalVote->setUser($this);
    }

    /**
     * @param  ChildFinalVote $finalVote The ChildFinalVote object to remove.
     * @return $this|ChildUser The current object (for fluent API support)
     */
    public function removeFinalVote(ChildFinalVote $finalVote)
    {
        if ($this->getFinalVotes()->contains($finalVote)) {
            $pos = $this->collFinalVotes->search($finalVote);
            $this->collFinalVotes->remove($pos);
            if (null === $this->finalVotesScheduledForDeletion) {
                $this->finalVotesScheduledForDeletion = clone $this->collFinalVotes;
                $this->finalVotesScheduledForDeletion->clear();
            }
            $this->finalVotesScheduledForDeletion[]= clone $finalVote;
            $finalVote->setUser(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this User is new, it will return
     * an empty collection; or if this User has previously
     * been saved, it will retrieve related FinalVotes from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in User.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildFinalVote[] List of ChildFinalVote objects
     */
    public function getFinalVotesJoinCourse(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildFinalVoteQuery::create(null, $criteria);
        $query->joinWith('Course', $joinBehavior);

        return $this->getFinalVotes($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this User is new, it will return
     * an empty collection; or if this User has previously
     * been saved, it will retrieve related FinalVotes from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in User.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildFinalVote[] List of ChildFinalVote objects
     */
    public function getFinalVotesJoinQuality(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildFinalVoteQuery::create(null, $criteria);
        $query->joinWith('Quality', $joinBehavior);

        return $this->getFinalVotes($query, $con);
    }

    /**
     * Clears out the collProfHasCourses collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addProfHasCourses()
     */
    public function clearProfHasCourses()
    {
        $this->collProfHasCourses = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collProfHasCourses collection loaded partially.
     */
    public function resetPartialProfHasCourses($v = true)
    {
        $this->collProfHasCoursesPartial = $v;
    }

    /**
     * Initializes the collProfHasCourses collection.
     *
     * By default this just sets the collProfHasCourses collection to an empty array (like clearcollProfHasCourses());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initProfHasCourses($overrideExisting = true)
    {
        if (null !== $this->collProfHasCourses && !$overrideExisting) {
            return;
        }

        $collectionClassName = ProfHasCourseTableMap::getTableMap()->getCollectionClassName();

        $this->collProfHasCourses = new $collectionClassName;
        $this->collProfHasCourses->setModel('\ProfHasCourse');
    }

    /**
     * Gets an array of ChildProfHasCourse objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildUser is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildProfHasCourse[] List of ChildProfHasCourse objects
     * @throws PropelException
     */
    public function getProfHasCourses(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collProfHasCoursesPartial && !$this->isNew();
        if (null === $this->collProfHasCourses || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collProfHasCourses) {
                // return empty collection
                $this->initProfHasCourses();
            } else {
                $collProfHasCourses = ChildProfHasCourseQuery::create(null, $criteria)
                    ->filterByUser($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collProfHasCoursesPartial && count($collProfHasCourses)) {
                        $this->initProfHasCourses(false);

                        foreach ($collProfHasCourses as $obj) {
                            if (false == $this->collProfHasCourses->contains($obj)) {
                                $this->collProfHasCourses->append($obj);
                            }
                        }

                        $this->collProfHasCoursesPartial = true;
                    }

                    return $collProfHasCourses;
                }

                if ($partial && $this->collProfHasCourses) {
                    foreach ($this->collProfHasCourses as $obj) {
                        if ($obj->isNew()) {
                            $collProfHasCourses[] = $obj;
                        }
                    }
                }

                $this->collProfHasCourses = $collProfHasCourses;
                $this->collProfHasCoursesPartial = false;
            }
        }

        return $this->collProfHasCourses;
    }

    /**
     * Sets a collection of ChildProfHasCourse objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $profHasCourses A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildUser The current object (for fluent API support)
     */
    public function setProfHasCourses(Collection $profHasCourses, ConnectionInterface $con = null)
    {
        /** @var ChildProfHasCourse[] $profHasCoursesToDelete */
        $profHasCoursesToDelete = $this->getProfHasCourses(new Criteria(), $con)->diff($profHasCourses);


        //since at least one column in the foreign key is at the same time a PK
        //we can not just set a PK to NULL in the lines below. We have to store
        //a backup of all values, so we are able to manipulate these items based on the onDelete value later.
        $this->profHasCoursesScheduledForDeletion = clone $profHasCoursesToDelete;

        foreach ($profHasCoursesToDelete as $profHasCourseRemoved) {
            $profHasCourseRemoved->setUser(null);
        }

        $this->collProfHasCourses = null;
        foreach ($profHasCourses as $profHasCourse) {
            $this->addProfHasCourse($profHasCourse);
        }

        $this->collProfHasCourses = $profHasCourses;
        $this->collProfHasCoursesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ProfHasCourse objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related ProfHasCourse objects.
     * @throws PropelException
     */
    public function countProfHasCourses(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collProfHasCoursesPartial && !$this->isNew();
        if (null === $this->collProfHasCourses || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collProfHasCourses) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getProfHasCourses());
            }

            $query = ChildProfHasCourseQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByUser($this)
                ->count($con);
        }

        return count($this->collProfHasCourses);
    }

    /**
     * Method called to associate a ChildProfHasCourse object to this object
     * through the ChildProfHasCourse foreign key attribute.
     *
     * @param  ChildProfHasCourse $l ChildProfHasCourse
     * @return $this|\User The current object (for fluent API support)
     */
    public function addProfHasCourse(ChildProfHasCourse $l)
    {
        if ($this->collProfHasCourses === null) {
            $this->initProfHasCourses();
            $this->collProfHasCoursesPartial = true;
        }

        if (!$this->collProfHasCourses->contains($l)) {
            $this->doAddProfHasCourse($l);

            if ($this->profHasCoursesScheduledForDeletion and $this->profHasCoursesScheduledForDeletion->contains($l)) {
                $this->profHasCoursesScheduledForDeletion->remove($this->profHasCoursesScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildProfHasCourse $profHasCourse The ChildProfHasCourse object to add.
     */
    protected function doAddProfHasCourse(ChildProfHasCourse $profHasCourse)
    {
        $this->collProfHasCourses[]= $profHasCourse;
        $profHasCourse->setUser($this);
    }

    /**
     * @param  ChildProfHasCourse $profHasCourse The ChildProfHasCourse object to remove.
     * @return $this|ChildUser The current object (for fluent API support)
     */
    public function removeProfHasCourse(ChildProfHasCourse $profHasCourse)
    {
        if ($this->getProfHasCourses()->contains($profHasCourse)) {
            $pos = $this->collProfHasCourses->search($profHasCourse);
            $this->collProfHasCourses->remove($pos);
            if (null === $this->profHasCoursesScheduledForDeletion) {
                $this->profHasCoursesScheduledForDeletion = clone $this->collProfHasCourses;
                $this->profHasCoursesScheduledForDeletion->clear();
            }
            $this->profHasCoursesScheduledForDeletion[]= clone $profHasCourse;
            $profHasCourse->setUser(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this User is new, it will return
     * an empty collection; or if this User has previously
     * been saved, it will retrieve related ProfHasCourses from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in User.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildProfHasCourse[] List of ChildProfHasCourse objects
     */
    public function getProfHasCoursesJoinCourse(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildProfHasCourseQuery::create(null, $criteria);
        $query->joinWith('Course', $joinBehavior);

        return $this->getProfHasCourses($query, $con);
    }

    /**
     * Clears out the collUserHasPwds collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addUserHasPwds()
     */
    public function clearUserHasPwds()
    {
        $this->collUserHasPwds = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collUserHasPwds collection loaded partially.
     */
    public function resetPartialUserHasPwds($v = true)
    {
        $this->collUserHasPwdsPartial = $v;
    }

    /**
     * Initializes the collUserHasPwds collection.
     *
     * By default this just sets the collUserHasPwds collection to an empty array (like clearcollUserHasPwds());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initUserHasPwds($overrideExisting = true)
    {
        if (null !== $this->collUserHasPwds && !$overrideExisting) {
            return;
        }

        $collectionClassName = UserHasPwdTableMap::getTableMap()->getCollectionClassName();

        $this->collUserHasPwds = new $collectionClassName;
        $this->collUserHasPwds->setModel('\UserHasPwd');
    }

    /**
     * Gets an array of ChildUserHasPwd objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildUser is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildUserHasPwd[] List of ChildUserHasPwd objects
     * @throws PropelException
     */
    public function getUserHasPwds(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collUserHasPwdsPartial && !$this->isNew();
        if (null === $this->collUserHasPwds || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collUserHasPwds) {
                // return empty collection
                $this->initUserHasPwds();
            } else {
                $collUserHasPwds = ChildUserHasPwdQuery::create(null, $criteria)
                    ->filterByUser($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collUserHasPwdsPartial && count($collUserHasPwds)) {
                        $this->initUserHasPwds(false);

                        foreach ($collUserHasPwds as $obj) {
                            if (false == $this->collUserHasPwds->contains($obj)) {
                                $this->collUserHasPwds->append($obj);
                            }
                        }

                        $this->collUserHasPwdsPartial = true;
                    }

                    return $collUserHasPwds;
                }

                if ($partial && $this->collUserHasPwds) {
                    foreach ($this->collUserHasPwds as $obj) {
                        if ($obj->isNew()) {
                            $collUserHasPwds[] = $obj;
                        }
                    }
                }

                $this->collUserHasPwds = $collUserHasPwds;
                $this->collUserHasPwdsPartial = false;
            }
        }

        return $this->collUserHasPwds;
    }

    /**
     * Sets a collection of ChildUserHasPwd objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $userHasPwds A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildUser The current object (for fluent API support)
     */
    public function setUserHasPwds(Collection $userHasPwds, ConnectionInterface $con = null)
    {
        /** @var ChildUserHasPwd[] $userHasPwdsToDelete */
        $userHasPwdsToDelete = $this->getUserHasPwds(new Criteria(), $con)->diff($userHasPwds);


        //since at least one column in the foreign key is at the same time a PK
        //we can not just set a PK to NULL in the lines below. We have to store
        //a backup of all values, so we are able to manipulate these items based on the onDelete value later.
        $this->userHasPwdsScheduledForDeletion = clone $userHasPwdsToDelete;

        foreach ($userHasPwdsToDelete as $userHasPwdRemoved) {
            $userHasPwdRemoved->setUser(null);
        }

        $this->collUserHasPwds = null;
        foreach ($userHasPwds as $userHasPwd) {
            $this->addUserHasPwd($userHasPwd);
        }

        $this->collUserHasPwds = $userHasPwds;
        $this->collUserHasPwdsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related UserHasPwd objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related UserHasPwd objects.
     * @throws PropelException
     */
    public function countUserHasPwds(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collUserHasPwdsPartial && !$this->isNew();
        if (null === $this->collUserHasPwds || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collUserHasPwds) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getUserHasPwds());
            }

            $query = ChildUserHasPwdQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByUser($this)
                ->count($con);
        }

        return count($this->collUserHasPwds);
    }

    /**
     * Method called to associate a ChildUserHasPwd object to this object
     * through the ChildUserHasPwd foreign key attribute.
     *
     * @param  ChildUserHasPwd $l ChildUserHasPwd
     * @return $this|\User The current object (for fluent API support)
     */
    public function addUserHasPwd(ChildUserHasPwd $l)
    {
        if ($this->collUserHasPwds === null) {
            $this->initUserHasPwds();
            $this->collUserHasPwdsPartial = true;
        }

        if (!$this->collUserHasPwds->contains($l)) {
            $this->doAddUserHasPwd($l);

            if ($this->userHasPwdsScheduledForDeletion and $this->userHasPwdsScheduledForDeletion->contains($l)) {
                $this->userHasPwdsScheduledForDeletion->remove($this->userHasPwdsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildUserHasPwd $userHasPwd The ChildUserHasPwd object to add.
     */
    protected function doAddUserHasPwd(ChildUserHasPwd $userHasPwd)
    {
        $this->collUserHasPwds[]= $userHasPwd;
        $userHasPwd->setUser($this);
    }

    /**
     * @param  ChildUserHasPwd $userHasPwd The ChildUserHasPwd object to remove.
     * @return $this|ChildUser The current object (for fluent API support)
     */
    public function removeUserHasPwd(ChildUserHasPwd $userHasPwd)
    {
        if ($this->getUserHasPwds()->contains($userHasPwd)) {
            $pos = $this->collUserHasPwds->search($userHasPwd);
            $this->collUserHasPwds->remove($pos);
            if (null === $this->userHasPwdsScheduledForDeletion) {
                $this->userHasPwdsScheduledForDeletion = clone $this->collUserHasPwds;
                $this->userHasPwdsScheduledForDeletion->clear();
            }
            $this->userHasPwdsScheduledForDeletion[]= clone $userHasPwd;
            $userHasPwd->setUser(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this User is new, it will return
     * an empty collection; or if this User has previously
     * been saved, it will retrieve related UserHasPwds from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in User.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildUserHasPwd[] List of ChildUserHasPwd objects
     */
    public function getUserHasPwdsJoinPwd(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildUserHasPwdQuery::create(null, $criteria);
        $query->joinWith('Pwd', $joinBehavior);

        return $this->getUserHasPwds($query, $con);
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        if (null !== $this->aUserType) {
            $this->aUserType->removeUser($this);
        }
        $this->iduser = null;
        $this->name = null;
        $this->surname = null;
        $this->matricola = null;
        $this->usertype_idusertype = null;
        $this->email = null;
        $this->alreadyInSave = false;
        $this->clearAllReferences();
        $this->resetModified();
        $this->setNew(true);
        $this->setDeleted(false);
    }

    /**
     * Resets all references and back-references to other model objects or collections of model objects.
     *
     * This method is used to reset all php object references (not the actual reference in the database).
     * Necessary for object serialisation.
     *
     * @param      boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep) {
            if ($this->collDailylessonHasUsers) {
                foreach ($this->collDailylessonHasUsers as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collFinalVotes) {
                foreach ($this->collFinalVotes as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collProfHasCourses) {
                foreach ($this->collProfHasCourses as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collUserHasPwds) {
                foreach ($this->collUserHasPwds as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        $this->collDailylessonHasUsers = null;
        $this->collFinalVotes = null;
        $this->collProfHasCourses = null;
        $this->collUserHasPwds = null;
        $this->aUserType = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(UserTableMap::DEFAULT_STRING_FORMAT);
    }

    /**
     * Code to be run before persisting the object
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preSave(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preSave')) {
            return parent::preSave($con);
        }
        return true;
    }

    /**
     * Code to be run after persisting the object
     * @param ConnectionInterface $con
     */
    public function postSave(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postSave')) {
            parent::postSave($con);
        }
    }

    /**
     * Code to be run before inserting to database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preInsert(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preInsert')) {
            return parent::preInsert($con);
        }
        return true;
    }

    /**
     * Code to be run after inserting to database
     * @param ConnectionInterface $con
     */
    public function postInsert(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postInsert')) {
            parent::postInsert($con);
        }
    }

    /**
     * Code to be run before updating the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preUpdate(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preUpdate')) {
            return parent::preUpdate($con);
        }
        return true;
    }

    /**
     * Code to be run after updating the object in database
     * @param ConnectionInterface $con
     */
    public function postUpdate(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postUpdate')) {
            parent::postUpdate($con);
        }
    }

    /**
     * Code to be run before deleting the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preDelete(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preDelete')) {
            return parent::preDelete($con);
        }
        return true;
    }

    /**
     * Code to be run after deleting the object in database
     * @param ConnectionInterface $con
     */
    public function postDelete(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postDelete')) {
            parent::postDelete($con);
        }
    }


    /**
     * Derived method to catches calls to undefined methods.
     *
     * Provides magic import/export method support (fromXML()/toXML(), fromYAML()/toYAML(), etc.).
     * Allows to define default __call() behavior if you overwrite __call()
     *
     * @param string $name
     * @param mixed  $params
     *
     * @return array|string
     */
    public function __call($name, $params)
    {
        if (0 === strpos($name, 'get')) {
            $virtualColumn = substr($name, 3);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }

            $virtualColumn = lcfirst($virtualColumn);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }
        }

        if (0 === strpos($name, 'from')) {
            $format = substr($name, 4);

            return $this->importFrom($format, reset($params));
        }

        if (0 === strpos($name, 'to')) {
            $format = substr($name, 2);
            $includeLazyLoadColumns = isset($params[0]) ? $params[0] : true;

            return $this->exportTo($format, $includeLazyLoadColumns);
        }

        throw new BadMethodCallException(sprintf('Call to undefined method: %s.', $name));
    }

}
