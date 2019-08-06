<?php



/**
 * UserTransactionName
 */
class UserTransactionName
{
    /**
     * @var integer
     */
    private $active = '1';

    /**
     * @var integer
     */
    private $userTransactionNameId;

    /**
     * @var \TransactionName
     */
    private $transaction;

    /**
     * @var \User
     */
    private $user;


    /**
     * Set active
     *
     * @param integer $active
     *
     * @return UserTransactionName
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return integer
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Get userTransactionNameId
     *
     * @return integer
     */
    public function getUserTransactionNameId()
    {
        return $this->userTransactionNameId;
    }

    /**
     * Set transaction
     *
     * @param \TransactionName $transaction
     *
     * @return UserTransactionName
     */
    public function setTransaction(\TransactionName $transaction = null)
    {
        $this->transaction = $transaction;

        return $this;
    }

    /**
     * Get transaction
     *
     * @return \TransactionName
     */
    public function getTransaction()
    {
        return $this->transaction;
    }

    /**
     * Set user
     *
     * @param \User $user
     *
     * @return UserTransactionName
     */
    public function setUser(\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \User
     */
    public function getUser()
    {
        return $this->user;
    }
}


