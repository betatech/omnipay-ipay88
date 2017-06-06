<?php

namespace Omnipay\IPay88\Message;


use Omnipay\Common\Message\AbstractResponse;
use Omnipay\Common\Message\RedirectResponseInterface;

class PurchaseResponse extends AbstractResponse implements RedirectResponseInterface
{
    //protected $endpoint = 'https://www.mobile88.com/ePayment/entry.asp';
    protected $endpoint = 'http://www.antwebstudio.com/sandbox/ipay88/?merchant=abc&key=123';

    public function getTransactionId()
    {
        return $this->data['RefNo'];
    }

    public function isTransparentRedirect()
    {
        return true;
    }

    public function isRedirect()
    {
        return true;
    }

    public function isSuccessful()
    {
        return false;
    }

    public function getRedirectUrl()
    {
        return $this->endpoint;
    }

    public function getRedirectMethod()
    {
        return 'POST';
    }

    public function getRedirectData()
    {
        return $this->data;
    }

}
