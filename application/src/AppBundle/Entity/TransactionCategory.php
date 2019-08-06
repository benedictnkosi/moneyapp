<?php



/**
 * TransactionCategory
 */
class TransactionCategory
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var integer
     */
    private $active = '1';

    /**
     * @var integer
     */
    private $transactionCategoryId;


    /**
     * Set name
     *
     * @param string $name
     *
     * @return TransactionCategory
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set active
     *
     * @param integer $active
     *
     * @return TransactionCategory
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
     * Get transactionCategoryId
     *
     * @return integer
     */
    public function getTransactionCategoryId()
    {
        return $this->transactionCategoryId;
    }
}


