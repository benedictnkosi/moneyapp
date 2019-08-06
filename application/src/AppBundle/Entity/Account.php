<?php



/**
 * Account
 */
class Account
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
    private $accountId;

    /**
     * @var \AccountType
     */
    private $type;


    /**
     * Set name
     *
     * @param string $name
     *
     * @return Account
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
     * @return Account
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
     * Get accountId
     *
     * @return integer
     */
    public function getAccountId()
    {
        return $this->accountId;
    }

    /**
     * Set type
     *
     * @param \AccountType $type
     *
     * @return Account
     */
    public function setType(\AccountType $type = null)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return \AccountType
     */
    public function getType()
    {
        return $this->type;
    }
}


