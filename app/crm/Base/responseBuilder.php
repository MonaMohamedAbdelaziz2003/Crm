<?php

namespace crm\Base;

use Illuminate\Http\JsonResponse;

class responseBuilder{
    private int $statusCode;
    private $data=null;
    private array $error=[];
    private string $status='success';
    private array $meta=[];
    const STATUS_SUCCESS='success';
    const STATUS_ERROR='error';

    public function getStatusCode()
    {
        return $this->statusCode;
    }
    public function setStatusCode($statusCode):self
    {
        $this->statusCode = $statusCode;

        return $this;
    }

    /**
     * Get the value of data
     */
    public function getData()
    {
        return $this->data;
    }
    public function setData($data):self
    {
        $this->data = $data;

        return $this;
    }

    /**
     * Get the value of error
     */
    public function getError()
    {
        return $this->error;
    }
    public function setError($error):self
    {
        $this->error = $error;

        return $this;
    }

    /**
     * Get the value of status
     */
    public function getStatus()
    {
        return $this->status;
    }
    public function setStatus($status):self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get the value of meta
     */
    public function getMeta()
    {
        return $this->meta;
    }
    public function setMeta($meta):self
    {
        $this->meta = $meta;
        return $this;
    }
    public function response(){
        $response = [];
        if($this->getStatusCode() >= 400) {
            $this->setStatus(self::STATUS_ERROR);
        }
        $response['status'] = $this->getStatus();
        if( $this->getStatus() !== JsonResponse::HTTP_OK && !empty($this->getError())) {
            $response['errors'] = $this->getError();
        }

        if($this->getStatus() === self::STATUS_SUCCESS) {
            $response['data'] = $this->getData();
        }
        return response()->json($response, $this->getStatusCode());
        // return $response;
    }
}
