<?php
namespace tienrocker\zensdk\Session;

class Account
{
    /**
     * @var string
     */
    private static $prefix = 'zensdk';

    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $token;

    /**
     * @var string
     */
    private $refresh_token;

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getRefreshToken()
    {
        return $this->refresh_token;
    }

    /**
     * @param string $refresh_token
     */
    public function setRefreshToken($refresh_token)
    {
        $this->refresh_token = $refresh_token;
    }

    /**
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @param string $token
     */
    public function setToken($token)
    {
        $this->token = $token;
    }

    /**
     * Account constructor.
     * @param array|null $parameters
     */
    public function __construct(array $parameters = null)
    {
        if (!empty($parameters)) {
            $this->setId($parameters['account_id']);
            $this->setName($parameters['account_name']);
            $this->setToken($parameters['access_token']);
            $this->setRefreshToken($parameters['refresh_token']);
        }
    }

    public function toArray()
    {
        return array(
            'account_id' => $this->getId(),
            'account_name' => $this->getName(),
            'access_token' => $this->getToken(),
            'refresh_token' => $this->getRefreshToken(),
        );
    }

    /**
     * @var Account
     */
    private static $_account;

    /**
     * @param Account $account
     */
    public static function setAccount($account)
    {
        static::setSession($account);
        static::$_account = $account;
    }

    /**
     * @return null|Account
     */
    public static function getAccount()
    {
        if (empty(static::$_account)) {
            $data = static::getSession();
            if (empty($data)) return null;
            static::$_account = new Account($data);
        }
        return static::$_account;
    }

    /**
     * @param Account $account
     */
    public static function setSession($account)
    { 
        $_SESSION[static::$prefix . 'account'] = json_encode($account->toArray());
    }

    /**
     * @return mixed
     */
    public static function getSession()
    {
        return json_decode(@$_SESSION[static::$prefix . 'account'], true);
    }
}