<?php



/**
 * TransactionName
 */
class TransactionName
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var integer
     */
    private $active;

    /**
     * @var integer
     */
    private $custom = '1';

    /**
     * @var integer
     */
    private $transactionNameId;

    /**
     * @var \TransactionCategory
     */
    private $category;


    /**
     * Set name
     *
     * @param string $name
     *
     * @return TransactionName
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
     * @return TransactionName
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
     * Set custom
     *
     * @param integer $custom
     *
     * @return TransactionName
     */
    public function setCustom($custom)
    {
        $this->custom = $custom;

        return $this;
    }

    /**
     * Get custom
     *
     * @return integer
     */
    public function getCustom()
    {
        return $this->custom;
    }

    /**
     * Get transactionNameId
     *
     * @return integer
     */
    public function getTransactionNameId()
    {
        return $this->transactionNameId;
    }

    /**
     * Set category
     *
     * @param \TransactionCategory $category
     *
     * @return TransactionName
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
}


