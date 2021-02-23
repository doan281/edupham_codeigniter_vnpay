<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once('VNPayConfig.php');
require_once('VNPayHelper.php');

class VNPayCreatePayment extends VNPayConfig
{
    private $ci;
    //
    private $vnpay_amount;
    private $vnpay_txnref;
    private $vnpay_orderinfo;
    private $vnpay_bankcode;
    private $product_code;

    /**
     * VNPay constructor.
     */
    public function __construct($vnpay_txnref = null, $vnpay_amount = null, $product_code = null, $vnpay_orderinfo = null, $vnpay_bankcode = null)
    {
        parent::__construct();
        //
        $this->ci = &get_instance();
        $this->ci->load->model('vnpay_model');
        //
        $this->vnpay_txnref = $vnpay_txnref;
        $this->vnpay_amount = $vnpay_amount;
        $this->product_code = $product_code;
        $this->vnpay_orderinfo = VNPayHelper::unsigned($vnpay_orderinfo);
        $this->vnpay_bankcode = $vnpay_bankcode;
    }

    /**
     * Hàm tạo link thanh toán sang VNPay
     *
     * @param false $is_debug
     * @return mixed|string|null
     */
    public function createPaymentLink($is_debug=false)
    {
        if ($this->checkParamNull()['null_number'] == 0) {
            $inputData = array(
                'vnp_Amount' => $this->vnpay_amount,
                'vnp_Command' => 'pay',
                'vnp_CreateDate' => date('YmdHis'),
                'vnp_CurrCode' => $this->vnpay_currency_code,
                'vnp_IpAddr' => $_SERVER['REMOTE_ADDR'],
                'vnp_Locale' => 'vn',
                'vnp_OrderInfo' => $this->vnpay_orderinfo,
                'vnp_OrderType' => $this->vnpay_order_type,
                'vnp_ReturnUrl' => $this->vnpay_return_url,
                'vnp_TmnCode' => $this->vnpay_code,
                'vnp_TxnRef' => $this->vnpay_txnref,
                'vnp_Version' => '2.0.0'
            );

            if (!empty($this->vnpay_bankcode)) {
                $inputData['vnp_BankCode'] = $this->vnpay_bankcode;
            }

            ksort($inputData);
            $query = '';
            $i = 0;
            $hashdata = '';
            foreach ($inputData as $key => $value) {
                if ($i == 1) {
                    $hashdata .= '&' . $key . '=' . $value;
                } else {
                    $hashdata .= $key . '=' . $value;
                    $i = 1;
                }
                $query .= urlencode($key) . '=' . urlencode($value) . '&';
            }

            $vnp_Url = $this->vnpay_url . '?' . $query;
            if (isset($this->vnpay_secret_key)) {
                $vnpSecureHash = hash('sha256', $this->vnpay_secret_key . $hashdata);
                $vnp_Url .= 'vnp_SecureHashType=SHA256&vnp_SecureHash=' . $vnpSecureHash;
            }

            // Lưu log giao dịch khởi tạo
            $save = $this->saveInitPayment();
            if ($save) {
                return $vnp_Url;
            } else {
                return null;
            }

        } else {
            if ($is_debug) {
                return $this->checkParamNull()['field_name_null'];
            } else {
                return null;
            }
        }
    }

    /**
     * Lưu khởi tạo giao dịch
     *
     * @return bool
     */
    private function saveInitPayment()
    {
        if ($this->checkParamNull()['null_number'] == 0) {
            $current_time = date('Y-m-d H:i:s');
            $amount = $this->vnpay_amount / 100;

            $payment_data = array(
                'user_id' => null,
                'transaction_code' => $this->vnpay_txnref,
                'request_at' => $current_time,
                'product_code' => $this->product_code,
                'vnp_orderinfo' => $this->vnpay_orderinfo,
                'vnp_amount' => $amount,
                'vnp_curr_code' => $this->vnpay_currency_code,
                'vnp_secure_hash_type' => $this->vnpay_secure_hash_type,
                'notes' => $this->vnpay_orderinfo,
                'request' => null,
                'number_refresh' => 0,
                'status' => 0,
                'created_at' => $current_time
            );
            $this->ci->vnpay_model->init_payment($payment_data);

            return true;

        } else {
            return false;
        }
    }

}
