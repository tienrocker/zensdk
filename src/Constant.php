<?php
namespace tienrocker\zensdk;

class Constant
{
    public $RequestTokenUrlFormat = "%soauth/authorize?client_key=%s&ur=%s&mode=%s&redirect_uri=%s";
    public $AccessTokenUrlFormat = "%soauth/accesstoken?client_key=%s&request_token=%s&request_time=%s&sign=%s";
    public $RefreshTokenUrlFormat = "%soauth/refreshtoken?client_key=%s&refresh_token=%s&request_time=%s&sign=%s";
    public $RegisterUrlFormat = "%soauth/register?client_key=%s&ur=%s&mode=%s&redirect_uri=%s";
    public $LogoutUrlFormat = "%soauth/logout?access_token=%s&ur=%s";

    public $BalanceUrlFormat = "%sbilling/getbalance/?access_token=%s";
    public $ProfileUrlFormat = "%verifyrequest/?access_token=%s";
    public $DeductUrrlFormat = "%sbilling/deduct/?access_token=%s";
    public $TopupUrrlFormat = "%sbilling/topup/?access_token=%s";

    public $UseCardUrrlFormat = "%sbilling/UseCard";
    public $GetSaltUrrlFormat = "%sbilling/GetSalt";
    public $GetBankQueryUrlFormat = "%sbilling/BankQuery/";
    public $GetCardQueryUrlFormat = "%sbilling/CardQuery/";
    public $SendBankGateUrlFormat = "%sbilling/SendBankGate/";

    //add by namts, use for payment
    public $PaySMSUrlFormat = "%s/%s/nap-game-qua-sms/%s/%s/?agency_id=%s";
    public $PayCardUrlFormat = "%s/%s/nap-xu-qua-the-cao/%s/%s/?agency_id=%s";
    public $PayBankUrlFormat = "%s/%s/nap-xu-qua-atm/%s/%s/?agency_id=%s";
    public $PayVisaUrlFormat = "%s/%s/nap-xu-qua-the-visa/%s/%s/?agency_id=%s";
    public $PayWalletUrlFormat = "%s/%s/nap-xu-qua-vi-dien-tu/%s/%s/?agency_id=%s";
    public $PayVegaCoinUrlFormat = "%s/%s/nap-xu-qua-vxu/%s/%s/?agency_id=%s";
    public $PayHistoryUrlFormat = "%s/lich-su-giao-dich/";

    public $ServerApp;
    public $ServerIdGraph;
    public $DomainBillingGraph;
    public $DomainMobileBillingGraph;
    public $DomainPaymentGraph;
    public $DomainGeneralGraph;
    public $ServerBilling;
    public $ServerProfile;
    public $Mode;
    public $ClientKey;
    public $Key;
    public $ClientSecret;
    public $AgencyId;
    public $GameCode;
    public $Gameserver;

    public function __construct($configs)
    {
        $this->ServerApp = $configs['server_app'];
        $this->ServerIdGraph = $configs['id_graph'];
        $this->DomainBillingGraph = $configs['billing_graph'];
        $this->DomainMobileBillingGraph = $configs['domain_mobile_billing_graph'];
        $this->DomainPaymentGraph = $configs['payment_graph'];
        $this->DomainGeneralGraph = $configs['general_graph'];
        $this->ServerBilling = $configs['id_billing'];
        $this->ServerProfile = $configs['server_profile'];
        $this->Mode = $configs['mode'];
        $this->ClientKey = $configs['client_key'];
        $this->Key = $configs['key'];
        $this->ClientSecret = $configs['client_secret'];
        $this->AgencyId = $configs['agency_id'];
        $this->GameCode = $configs['game_code'];
        $this->GameServer = $configs['game_server'];
    }

}