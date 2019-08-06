<?php



/**
 * Transaction
 */
class Transaction
{
    /**
     * @var \DateTime
     */
    private $transactionDate = 'CURRENT_TIMESTAMP';

    /**
     * @var float
     */
    private $amount;

    /**
     * @var integer
     */
    private $active = '1';

    /**
     * @var string
     */
    private $description;

    /**
     * @var integer
     */
    private $transactionId;

    /**
     * @var \TransactionCategory
     */
    private $category;

    /**
     * @var \TransactionName
     */
    private $name;

    /**
     * @var \User
     */
    private $user;


    /**
     * Set transactionDate
     *
     * @param \DateTime $transactionDate
     *
     * @return Transaction
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
     * Set amount
     *
     * @param float $amount
     *
     * @return Transaction
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
     * @return Transaction
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
     * Set description
     *
     * @param string $description
     *
     * @return Transaction
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Get transactionId
     *
     * @return integer
     */
    public function getTransactionId()
    {
        return $this->transactionId;
    }

    /**
     * Set category
     *
     * @param \TransactionCategory $category
     *
     * @return Transaction
     */
    public function setCategory(\TransactionCategory $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \TransactionCategory
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set name
     *
     * @param \TransactionName $name
     *
     * @return Transaction
     */
    public function setName(\TransactionName $name = null)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return \TransactionName
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set user
     *
     * @param \User $user
     *
     * @return Transaction
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


