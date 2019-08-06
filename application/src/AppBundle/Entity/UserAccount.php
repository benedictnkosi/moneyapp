<?php



/**
 * UserAccount
 */
class UserAccount
{
    /**
     * @var float
     */
    private $balance;

    /**
     * @var integer
     */
    private $active;

    /**
     * @var \DateTime
     */
    private $transactionDate;

    /**
     * @var float
     */
    private $goalAmount;

    /**
     * @var float
     */
    private $interest = '0';

    /**
     * @var integer
     */
    private $userAccountId;

    /**
     * @var \Account
     */
    private $account;

    /**
     * @var \User
     */
    private $user;


    /**
     * Set balance
     *
     * @param float $balance
     *
     * @return UserAccount
     */
    public function setBalance($balance)
    {
        $this->balance = $balance;

        return $this;
    }

    /**
     * Get balance
     *
     * @return float
     */
    public function getBalance()
    {
        return $this->balance;
    }

    /**
     * Set active
     *
     * @param integer $active
     *
     * @return UserAccount
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
     * Set transactionDate
     *
     * @param \DateTime $transactionDate
     *
     * @return UserAccount
     */
    public function setTransactionDate($transactionDate)
    {
        $this->transactionDate = $transactionDate;

        return $this;
    }

    /**
     * Get transactionDate
     *
     * @return \DateTime
     */
    public function getTransactionDate()
    {
        return $this->transactionDate;
    }

    /**
     * Set goalAmount
     *
     * @param float $goalAmount
     *
     * @return UserAccount
     */
    public function setGoalAmount($goalAmount)
    {
        $this->goalAmount = $goalAmount;

        return $this;
    }

    /**
     * Get goalAmount
     *
     * @return float
     */
    public function getGoalAmount()
    {
        return $this->goalAmount;
    }

    /**
     * Set interest
     *
     * @param float $interest
     *
     * @return UserAccount
     */
    public function setInterest($interest)
    {
        $this->interest = $interest;

        return $this;
    }

    /**
     * Get interest
     *
     * @return float
     */
    public function getInterest()
    {
        return $this->interest;
    }

    /**
     * Get userAccountId
     *
     * @return integer
     */
    public function getUserAccountId()
    {
        return $this->userAccountId;
    }

    /**
     * Set account
     *
     * @param \Account $account
     *
     * @return UserAccount
     */
    public function setAccount(\Account $account = null)
    {
        $this->account = $account;

        return $this;
    }

    /**
     * Get account
     *
     * @return \Account
     */
    public function getAccount()
    {
        return $this->account;
    }

    /**
     * Set user
     *
     * @param \User $user
     *
     * @return UserAccount
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


