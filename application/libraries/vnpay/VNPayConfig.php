<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class VNPayConfig
{
    private $ci;
    // Config
    protected $vnpay_url;
    protected $vnpay_code;
    protected $vnpay_secret_key;
    protected $vnpay_secure_hash_type;
    protected $vnpay_order_type;
    protected $vnpay_currency_code;
    protected $vnpay_return_url;

    /**
     * VNPay constructor.
     */
    public function __construct()
    {
        $this->ci = &get_instance();
        //
        $vnpay_config = $this->ci->config->item('vnpay');
        //
        $this->vnpay_url = isset($vnpay_config['vnpay_url']) ? $vnpay_config['vnpay_url'] : null;
        $this->vnpay_code = isset($vnpay_config['vnpay_code']) ? $vnpay_config['vnpay_code'] : null;
        $this->vnpay_secret_key = isset($vnpay_config['vnpay_secret_key']) ? $vnpay_config['vnpay_secret_key'] : null;
        $this->vnpay_secure_hash_type = isset($vnpay_config['vnpay_secure_hash_type']) ? $vnpay_config['vnpay_secure_hash_type'] : null;
        $this->vnpay_order_type = isset($vnpay_config['vnpay_order_type']) ? $vnpay_config['vnpay_order_type'] : null;
        $this->vnpay_return_url = isset($vnpay_config['vnpay_return_url']) ? $vnpay_config['vnpay_return_url'] : null;
        $this->vnpay_currency_code = isset($vnpay_config['vnpay_currency_code']) ? $vnpay_config['vnpay_currency_code'] : null;
        //
    }

    /**
     * Hàm kiểm tra các giá trị không được null trước khi thực hiện
     *
     * @return bool
     */
    protected function checkParamNull()
    {
        $null_number = 0;
        $field_name_null = [];

        if (empty($this->vnpay_url)) {
            $null_number += 1;
            $field_name_null[] = 'vnpay_url';
        }

        if (empty($this->vnpay_code)) {
            $null_number += 1;
            $field_name_null[] = 'vnpay_code';
        }

        if (empty($this->vnpay_secret_key)) {
            $null_number += 1;
            $field_name_null[] = 'vnpay_secret_key';
        }

        if (empty($this->vnpay_secure_hash_type)) {
            $null_number += 1;
            $field_name_null[] = 'vnpay_secure_hash_type';
        }

        if (empty($this->vnpay_order_type)) {
            $null_number += 1;
            $field_name_null[] = 'vnpay_order_type';
        }

        if (empty($this->vnpay_currency_code)) {
            $null_number += 1;
            $field_name_null[] = 'vnpay_currency_code';
        }

        if (empty($this->vnpay_return_url)) {
            $null_number += 1;
            $field_name_null[] = 'vnpay_return_url';
        }

        // Kiểm tra xem có giá trị nào null không
        return array(
            'null_number' => $null_number,
            'field_name_null' => $field_name_null
        );
    }



}
