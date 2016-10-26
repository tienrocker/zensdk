<?php
namespace tienrocker\zensdk\Response;

class ApiResponse
{
    /**
     * @var int
     */
    public $code;

    /**
     * @var string
     */
    public $message;

    /**
     * @var string
     */
    public $data;

    /**
     * @var string
     */
    public $response_time;

    /**
     * @var string
     */
    public $sign;


    /**
     * @var string
     */
    public $requestNo;

    /**
     * @param $data
     */
    public function __construct($data)
    {
        if (is_array($data)) foreach ($data AS $key => $value) $this->{$key} = $value;
    }
}