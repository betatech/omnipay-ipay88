<?php

namespace Omnipay\IPay88\Message;


use Omnipay\Common\Currency;

class RequeryRequest extends AbstractRequest
{
    // protected $endpoint = 'https://www.mobile88.com/epayment/enquiry.asp'; 
	protected $endpoint = 'https://payment.ipay88.com.my/epayment/enquiry.asp'; // edited

    public function getData()
    {
        $data = [
			'MerchantCode' => $this->getMerchantCode(),
			'RefNo' => $this->getParameter('RefNo'),
			'Amount' => $this->getParameter('Amount'),
		];

        return $data;
    }
	
	public function setAmount($value) {
		$this->setParameter('Amount', $value);
	}
	
	public function setRefNo($value) {
		$this->setParameter('RefNo', $value);
	}

    public function sendData($data)
    {
		if ($this->getRequeryNeeded()) {
			$endpoint = $this->getTestMode() ? $this->getSandboxRequeryUrl() : $this->endpoint;
			$endpoint .= '?'.http_build_query($data);
			$data['ReQueryStatus'] = $this->httpClient->get($endpoint)->send()->getBody(true);
		}

        return $this->response = new RequeryResponse($this, $data);
    }
}
