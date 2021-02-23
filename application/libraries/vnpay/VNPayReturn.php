<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once('VNPayConfig.php');
require_once('VNPayHelper.php');

class VNPayReturn extends VNPayConfig
{
    private $ci;
    // Return URL
    private $vnpay_return_amount;
    private $vnpay_return_bank_code;
    private $vnpay_return_bank_tran_no;
    private $vnpay_return_card_type;
    private $vnpay_return_txn_ref;
    private $vnpay_return_tmn_code;
    private $vnpay_return_response_code;
    private $vnpay_return_secure_hash_type;
    private $vnpay_return_secure_hash;
    private $vnpay_return_transaction_no;
    private $vnpay_return_order_info;
    private $vnpay_return_pay_date;
    private $vnpay_return_uri;

    /**
     * VNPayReturn constructor.
     * @param array $params
     */
    public function __construct($params = array())
    {
        parent::__construct();
        //
        $this->ci = &get_instance();
        $this->ci->load->model('vnpay_model');
        //
        if (is_array($params) && count($params) > 0) {
            $this->vnpay_return_amount = isset($params['vnp_Amount']) ? $params['vnp_Amount'] : null;
            $this->vnpay_return_bank_code = isset($params['vnp_BankCode']) ? $params['vnp_BankCode'] : null;
            $this->vnpay_return_bank_tran_no = isset($params['vnp_BankTranNo']) ? $params['vnp_BankTranNo'] : null;
            $this->vnpay_return_card_type = isset($params['vnp_CardType']) ? $params['vnp_CardType'] : null;
            $this->vnpay_return_order_info = isset($params['vnp_OrderInfo']) ? $params['vnp_OrderInfo'] : null;
            $this->vnpay_return_pay_date = isset($params['vnp_PayDate']) ? $params['vnp_PayDate'] : null;
            $this->vnpay_return_response_code = isset($params['vnp_ResponseCode']) ? $params['vnp_ResponseCode'] : null;
            $this->vnpay_return_tmn_code = isset($params['vnp_TmnCode']) ? $params['vnp_TmnCode'] : null;
            $this->vnpay_return_transaction_no = isset($params['vnp_TransactionNo']) ? $params['vnp_TransactionNo'] : null;
            $this->vnpay_return_txn_ref = isset($params['vnp_TxnRef']) ? $params['vnp_TxnRef'] : null;
            $this->vnpay_return_secure_hash_type = isset($params['vnp_SecureHashType']) ? $params['vnp_SecureHashType'] : null;
            $this->vnpay_return_secure_hash = isset($params['vnp_SecureHash']) ? $params['vnp_SecureHash'] : null;
            $this->vnpay_return_uri = isset($params['vnp_ReturnUri']) ? $params['vnp_ReturnUri'] : null;
        }
    }

    /**
     * -----------------------------------------------------------------------------------------------------------------
     * @return mixed
     */
    public function getVnpayReturnAmount()
    {
        return $this->vnpay_return_amount;
    }

    /**
     * @param mixed $vnpay_return_amount
     */
    public function setVnpayReturnAmount($vnpay_return_amount)
    {
        $this->vnpay_return_amount = $vnpay_return_amount;
    }

    /**
     * -----------------------------------------------------------------------------------------------------------------
     * @return mixed
     */
    public function getVnpayReturnBankCode()
    {
        return $this->vnpay_return_bank_code;
    }

    /**
     * @param mixed $vnpay_return_bank_code
     */
    public function setVnpayReturnBankCode($vnpay_return_bank_code)
    {
        $this->vnpay_return_bank_code = $vnpay_return_bank_code;
    }

    /**
     * -----------------------------------------------------------------------------------------------------------------
     * @return mixed
     */
    public function getVnpayReturnBankTranNo()
    {
        return $this->vnpay_return_bank_tran_no;
    }

    /**
     * @param mixed $vnpay_return_bank_tran_no
     */
    public function setVnpayReturnBankTranNo($vnpay_return_bank_tran_no)
    {
        $this->vnpay_return_bank_tran_no = $vnpay_return_bank_tran_no;
    }

    /**
     * -----------------------------------------------------------------------------------------------------------------
     * @return mixed
     */
    public function getVnpayReturnCardType()
    {
        return $this->vnpay_return_card_type;
    }

    /**
     * @param mixed $vnpay_return_card_type
     */
    public function setVnpayReturnCardType($vnpay_return_card_type)
    {
        $this->vnpay_return_card_type = $vnpay_return_card_type;
    }

    /**
     * -----------------------------------------------------------------------------------------------------------------
     * @return mixed
     */
    public function getVnpayReturnTxnRef()
    {
        return $this->vnpay_return_txn_ref;
    }

    /**
     * @param mixed $vnpay_return_txn_ref
     */
    public function setVnpayReturnTxnRef($vnpay_return_txn_ref)
    {
        $this->vnpay_return_txn_ref = $vnpay_return_txn_ref;
    }

    /**
     * -----------------------------------------------------------------------------------------------------------------
     * @return mixed|null
     */
    public function getVnpayReturnTmnCode()
    {
        return $this->vnpay_return_tmn_code;
    }

    /**
     * @param mixed|null $vnpay_return_tmn_code
     */
    public function setVnpayReturnTmnCode($vnpay_return_tmn_code)
    {
        $this->vnpay_return_tmn_code = $vnpay_return_tmn_code;
    }

    /**
     * -----------------------------------------------------------------------------------------------------------------
     * @return mixed
     */
    public function getVnpayReturnResponseCode()
    {
        return $this->vnpay_return_response_code;
    }

    /**
     * @param mixed $vnpay_return_response_code
     */
    public function setVnpayReturnResponseCode($vnpay_return_response_code)
    {
        $this->vnpay_return_response_code = $vnpay_return_response_code;
    }

    /**
     * -----------------------------------------------------------------------------------------------------------------
     * @return mixed
     */
    public function getVnpayReturnSecureHashType()
    {
        return $this->vnpay_return_secure_hash_type;
    }

    /**
     * @param mixed $vnpay_return_secure_hash_type
     */
    public function setVnpayReturnSecureHashType($vnpay_return_secure_hash_type)
    {
        $this->vnpay_return_secure_hash_type = $vnpay_return_secure_hash_type;
    }

    /**
     * -----------------------------------------------------------------------------------------------------------------
     * @return mixed
     */
    public function getVnpayReturnSecureHash()
    {
        return $this->vnpay_return_secure_hash;
    }

    /**
     * @param mixed $vnpay_return_secure_hash
     */
    public function setVnpayReturnSecureHash($vnpay_return_secure_hash)
    {
        $this->vnpay_return_secure_hash = $vnpay_return_secure_hash;
    }

    /**
     * -----------------------------------------------------------------------------------------------------------------
     * @return mixed
     */
    public function getVnpayReturnTransactionNo()
    {
        return $this->vnpay_return_transaction_no;
    }

    /**
     * @param mixed $vnpay_return_transaction_no
     */
    public function setVnpayReturnTransactionNo($vnpay_return_transaction_no)
    {
        $this->vnpay_return_transaction_no = $vnpay_return_transaction_no;
    }

    /**
     * -----------------------------------------------------------------------------------------------------------------
     * @return mixed
     */
    public function getVnpayReturnOrderInfo()
    {
        return $this->vnpay_return_order_info;
    }

    /**
     * @param mixed $vnpay_return_order_info
     */
    public function setVnpayReturnOrderInfo($vnpay_return_order_info)
    {
        $this->vnpay_return_order_info = $vnpay_return_order_info;
    }

    /**
     * -----------------------------------------------------------------------------------------------------------------
     * @return mixed
     */
    public function getVnpayReturnPayDate()
    {
        return $this->vnpay_return_pay_date;
    }

    /**
     * @param mixed $vnpay_return_pay_date
     */
    public function setVnpayReturnPayDate($vnpay_return_pay_date)
    {
        $this->vnpay_return_pay_date = $vnpay_return_pay_date;
    }

    /**
     * -----------------------------------------------------------------------------------------------------------------
     * @return mixed
     */
    public function getVnpayReturnUri()
    {
        return $this->vnpay_return_uri;
    }

    /**
     * @param mixed $vnpay_return_uri
     */
    public function setVnpayReturnUri($vnpay_return_uri)
    {
        $this->vnpay_return_uri = $vnpay_return_uri;
    }

    /**
     * -----------------------------------------------------------------------------------------------------------------
     * Hàm xử lý kiểm tra tham số sau khi VNPAY trả về kết quả thanh toán cho client
     *
     * @return array
     */
    public function processReturnUrl()
    {
        if ($this->checkParamNull()['null_number'] == 0) {
            $current_time = date('Y-m-d H:i:s');
            $amount = intval($this->vnpay_return_amount) / 100;
            $code = $this->vnpay_code;
            $hash_type = $this->vnpay_secure_hash_type;

            if (is_numeric($amount) && $amount < 5000) {
                return [ 'status' => 400, 'message' => 'Số tiền không hợp lệ' ];
            }

            if ($this->vnpay_return_tmn_code != $code) {
                return [ 'status' => 400, 'message' => 'Mã web không hợp lệ' ];
            }

            if ($this->vnpay_return_secure_hash_type != $hash_type) {
                return [ 'status' => 400, 'message' => 'Mã Hash không hợp lệ' ];
            }

            // Lấy thông tin giao dịch theo mã giao dịch
            $transaction = $this->ci->vnpay_model->get_by_transaction_code($this->vnpay_return_txn_ref);

            if ($transaction) {
                if ($transaction['vnp_amount'] != $amount) {
                    // Test case 4/7
                    return [ 'status' => 400, 'message' => 'Số tiền không hợp lệ' ];
                }

                if ($transaction['number_refresh'] >= 1) {
                    // Test case 3/7
                    return [ 'status' => 400, 'message' => 'Giao dịch đã được xác nhận' ];
                }

                if ($transaction['transaction_code'] != $this->vnpay_return_txn_ref) {
                    // Test case 2/7
                    return [ 'status' => 400, 'message' => 'Mã giao dịch không hợp lệ' ];
                }

                // Cập nhật thông tin và số lần KH refresh trình duyệt
                $payment_data = array(
                    'return_code' => $this->vnpay_return_response_code,
                    'returned_at' => $current_time,
                    'vnp_tmn_code' => $this->vnpay_return_tmn_code,
                    'vnp_bank_code' => $this->vnpay_return_bank_code,
                    'vnp_bank_tran_no' => $this->vnpay_return_bank_tran_no,
                    'vnp_card_type' => $this->vnpay_return_card_type,
                    'vnp_pay_date' => $this->vnpay_return_pay_date,
                    'vnp_order_info' => $this->vnpay_return_order_info,
                    'vnp_transaction_no' => $this->vnpay_return_transaction_no,
                    'vnp_response_code' => $this->vnpay_return_response_code,
                    'vnp_txn_ref' => $this->vnpay_return_txn_ref,
                    'vnp_secure_hash_type' => $this->vnpay_return_secure_hash_type,
                    'vnp_secure_hash' => $this->vnpay_return_secure_hash,
                    'response_return' => $this->vnpay_return_uri
                );
                $this->ci->vnpay_model->update_return_payment($transaction['id'], $payment_data);

                // Test case 1/7
                return [ 'status' => 200, 'message' => 'Thông tin thanh toán hợp lệ', 'data' => $transaction];

            } else {
                return [ 'status' => 404, 'message' => 'Không tìm thấy thông tin giao dịch' ];
            }

        } else {
            return [ 'status' => 500, 'message' => 'Đã có lỗi xảy ra' ];
        }
    }

}
