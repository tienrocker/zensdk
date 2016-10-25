<?php
namespace tienrocker\zensdk;

use tienrocker\zensdk\Exception\AccessTokenException;
use tienrocker\zensdk\Request\HttpRequest;
use tienrocker\zensdk\Response\ApiResponse;
use tienrocker\zensdk\Session\Account;

class SdkClient
{
    /**
     * @var Constant
     */
    public $constant;

    public function __construct(array $configs = null)
    {
        @session_start();
        if (empty($configs)) $configs = new Config();
        $this->constant = new Constant((array)$configs);
    }

    /**
     * Build url gọi Graph để authen
     * @param string $callback_url
     * @return mixed
     */
    public function GetRequestTokenUrl($callback_url = '')
    {
        $callback_url = empty($callback_url) ? 'callback.php?task=login' : $callback_url;
        $callback_url = $this->constant->ServerApp . $callback_url;
        return sprintf($this->constant->RequestTokenUrlFormat, $this->constant->ServerIdGraph, $this->constant->ClientKey, $callback_url, $this->constant->Mode, $callback_url);
    }

    /**
     * @param string $callback_url
     * @return mixed
     */
    public function GetRegisterUrl($callback_url = '')
    {
        $callback_url = empty($callback_url) ? 'callback.php?task=register' : $callback_url;
        $callback_url = $this->constant->ServerApp . $callback_url;
        return sprintf($this->constant->RegisterUrlFormat, $this->constant->ServerIdGraph, $this->constant->ClientKey, $callback_url, $this->constant->Mode, $callback_url);
    }

    /**
     * @param $access_token
     * @param $callback_url
     * @return mixed
     */
    public function GetLogoutUrl($access_token, $callback_url = '')
    {
        $callback_url = empty($callback_url) ? 'callback.php?task=logout' : $callback_url;
        $callback_url = $this->constant->ServerApp . $callback_url;
        return sprintf($this->constant->LogoutUrlFormat, $this->constant->ServerIdGraph, $access_token, $callback_url);
    }

    /**
     * @return mixed
     */
    public function GetGamePayVega()
    {
        return sprintf($this->constant->PayVegaCoinUrlFormat, $this->constant->ServerBilling, "nap-vao-game", $this->constant->GameCode, $this->constant->Gameserver, $this->constant->AgencyId);
    }

    /**
     * @return null|Account
     */
    public function GetLoggedUser()
    {
        return Session\Account::getAccount();
    }

    /**
     * @param $request_token
     * @return Account
     * @throws AccessTokenException
     */
    public function GetAccessToken($request_token)
    {
        if (!empty($request_token)) {
            $request_time = gmdate('YmdHis');
            $sign = sprintf('%s|%s|%s|%s', $this->constant->ClientKey, $request_token, $request_time, $this->constant->ClientSecret);
            $url = sprintf($this->constant->AccessTokenUrlFormat, $this->constant->ServerIdGraph, $this->constant->ClientKey, $request_token, $request_time, md5($sign));
            $data = HttpRequest::instance()->getRequest($url)->getContents();
            $response = new ApiResponse(json_decode($data, true));
            if ($response->code == 0) {
                $user_data = json_decode($response->data, true);
                $user = new Account($user_data);
                Account::setAccount($user); // save vao sessson
                return $user;
            } else {
                throw new AccessTokenException($response->message, $response->code);
            }
        }
        throw new AccessTokenException('Invalid Request Token', -210);
    }
}