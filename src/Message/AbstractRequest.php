<?php

namespace Omnipay\IPay88\Message;

abstract class AbstractRequest extends \Omnipay\Common\Message\AbstractRequest
{
	
	public function getPaymentId() {
		return $this->getParameter('paymentId');
	}
	
	public function setPaymentId($value) {
		return $this->setParameter('paymentId', $value);
	}

    public function getBackendUrl()
    {
        return $this->getParameter('backendUrl');
    }

    public function setBackendUrl($backendUrl)
    {
        return $this->setParameter('backendUrl', $backendUrl);
    }

    public function getMerchantKey()
    {
        return $this->getParameter('merchantKey');
    }

    public function setMerchantKey($merchantKey)
    {
        return $this->setParameter('merchantKey', $merchantKey);
    }

    public function getMerchantCode()
    {
        return $this->getParameter('merchantCode');
    }

    public function setMerchantCode($merchantCode)
    {
        return $this->setParameter('merchantCode', $merchantCode);
    }
	
	public function getSandboxUrl() {
		return $this->getParameter('sandboxUrl');
    }

    public function setSandboxUrl($sandboxUrl)
    {
        return $this->setParameter('sandboxUrl', $sandboxUrl);
    }
	
	public function getSandboxRequeryUrl() {
		return $this->getParameter('sandboxRequeryUrl');
    }

    public function setSandboxRequeryUrl($sandboxUrl)
    {
        return $this->setParameter('sandboxRequeryUrl', $sandboxUrl);
    }
	
	public function getSandbox() {
		return $this->getParameter('sandbox');
    }

    public function setSandbox($sandbox)
    {
        return $this->setParameter('sandbox', $sandbox);
    }
	
	public function getRequeryNeeded() {
		return $this->getParameter('requeryNeeded');
    }

    public function setRequeryNeeded($requeryNeeded)
    {
        return $this->setParameter('requeryNeeded', $requeryNeeded);
    }

    protected function guardParameters()
    {
        $this->validate(
            'card',
            'amount',
            'currency',
            'description',
            'transactionId',
            'returnUrl'
        );
    }

    protected function createSignatureFromString($fullStringToHash)
    {
        return hash('sha256',$fullStringToHash); // edited
        // return base64_encode($this->hex2bin(sha1($fullStringToHash)));
    }

    private function hex2bin($hexSource)
    {
        $bin = '';
        for ($i = 0; $i < strlen($hexSource); $i = $i + 2) {
            $bin .= chr(hexdec(substr($hexSource, $i, 2)));
        }
        return $bin;
    }
}