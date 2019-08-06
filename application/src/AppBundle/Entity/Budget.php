<?php



/**
 * Budget
 */
class Budget
{
    /**
     * @var float
     */
    private $amount;

    /**
     * @var integer
     */
    private $active = '1';

    /**
     * @var integer
     */
    private $budgetId;

    /**
     * @var \TransactionName
     */
    private $transaction;

    /**
     * @var \User
     */
    private $user;


    /**
     * Set amount
     *
     * @param float $amount
     *
     * @return Budget
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get amount
     *
     * @return float
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set active
     *
     * @param integer $active
     *
     * @return Budget
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
     * Get budgetId
     *
     * @return integer
     */
    public function getBudgetId()
    {
        return $this->budgetId;
    }

    /**
     * Set transaction
     *
     * @param \TransactionName $transaction
     *
     * @return Budget
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
     * @return Budget
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


