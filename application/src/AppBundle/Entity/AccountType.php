<?php



/**
 * AccountType
 */
class AccountType
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
    private $accountTypeId;


    /**
     * Set name
     *
     * @param string $name
     *
     * @return AccountType
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
     * @return AccountType
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
     * Get accountTypeId
     *
     * @return integer
     */
    public function getAccountTypeId()
    {
        return $this->accountTypeId;
    }
}


