<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once('VNPayConfig.php');
require_once('VNPayHelper.php');

class VNPayIPN extends VNPayConfig
{
    private $ci;
    // Return URL
    private $vnpay_ipn_amount;
    private $vnpay_ipn_bank_code;
    private $vnpay_ipn_bank_tran_no;
    private $vnpay_ipn_card_type;
    private $vnpay_ipn_txn_ref;
    private $vnpay_ipn_tmn_code;
    private $vnpay_ipn_response_code;
    private $vnpay_ipn_secure_hash_type;
    private $vnpay_ipn_secure_hash;
    private $vnpay_ipn_transaction_no;
    private $vnpay_ipn_order_info;
    private $vnpay_ipn_pay_date;
    private $vnpay_ipn_uri;
    //
    private $vnpay_ipn_params;
    private $vnpay_ipn_request;

    /**
     * VNPayIPN constructor.
     * @param array $params
     */
    public function __construct($params = array(), $request=array())
    {
        parent::__construct();
        //
        $this->ci = &get_instance();
        $this->ci->load->model('vnpay_model');
        //
        $this->vnpay_ipn_params = $params;
        $this->vnpay_ipn_request = $request;
        //
        if (is_array($params) && count($params) > 0) {
            $this->vnpay_ipn_amount = isset($params['vnp_Amount']) ? $params['vnp_Amount'] : null;
            $this->vnpay_ipn_bank_code = isset($params['vnp_BankCode']) ? $params['vnp_BankCode'] : null;
            $this->vnpay_ipn_bank_tran_no = isset($params['vnp_BankTranNo']) ? $params['vnp_BankTranNo'] : null;
            $this->vnpay_ipn_card_type = isset($params['vnp_CardType']) ? $params['vnp_CardType'] : null;
            $this->vnpay_ipn_order_info = isset($params['vnp_OrderInfo']) ? $params['vnp_OrderInfo'] : null;
            $this->vnpay_ipn_pay_date = isset($params['vnp_PayDate']) ? $params['vnp_PayDate'] : null;
            $this->vnpay_ipn_response_code = isset($params['vnp_ResponseCode']) ? $params['vnp_ResponseCode'] : null;
            $this->vnpay_ipn_tmn_code = isset($params['vnp_TmnCode']) ? $params['vnp_TmnCode'] : null;
            $this->vnpay_ipn_transaction_no = isset($params['vnp_TransactionNo']) ? $params['vnp_TransactionNo'] : null;
            $this->vnpay_ipn_txn_ref = isset($params['vnp_TxnRef']) ? $params['vnp_TxnRef'] : null;
            $this->vnpay_ipn_secure_hash_type = isset($params['vnp_SecureHashType']) ? $params['vnp_SecureHashType'] : null;
            $this->vnpay_ipn_secure_hash = isset($params['vnp_SecureHash']) ? $params['vnp_SecureHash'] : null;
            $this->vnpay_ipn_uri = isset($params['vnp_ipnUri']) ? $params['vnp_ReturnUri'] : null;
        }
    }

    /**
     * -----------------------------------------------------------------------------------------------------------------
     * @return mixed|null
     */
    public function getVnpayIpnAmount()
    {
        return $this->vnpay_ipn_amount;
    }

    /**
     * @param mixed|null $vnpay_ipn_amount
     */
    public function setVnpayIpnAmount($vnpay_ipn_amount)
    {
        $this->vnpay_ipn_amount = $vnpay_ipn_amount;
    }

    /**
     * -----------------------------------------------------------------------------------------------------------------
     * @return mixed|null
     */
    public function getVnpayIpnBankCode()
    {
        return $this->vnpay_ipn_bank_code;
    }

    /**
     * @param mixed|null $vnpay_ipn_bank_code
     */
    public function setVnpayIpnBankCode($vnpay_ipn_bank_code)
    {
        $this->vnpay_ipn_bank_code = $vnpay_ipn_bank_code;
    }

    /**
     * -----------------------------------------------------------------------------------------------------------------
     * @return mixed|null
     */
    public function getVnpayIpnBankTranNo()
    {
        return $this->vnpay_ipn_bank_tran_no;
    }

    /**
     * @param mixed|null $vnpay_ipn_bank_tran_no
     */
    public function setVnpayIpnBankTranNo($vnpay_ipn_bank_tran_no)
    {
        $this->vnpay_ipn_bank_tran_no = $vnpay_ipn_bank_tran_no;
    }

    /**
     * -----------------------------------------------------------------------------------------------------------------
     * @return mixed|null
     */
    public function getVnpayIpnCardType()
    {
        return $this->vnpay_ipn_card_type;
    }

    /**
     * @param mixed|null $vnpay_ipn_card_type
     */
    public function setVnpayIpnCardType($vnpay_ipn_card_type)
    {
        $this->vnpay_ipn_card_type = $vnpay_ipn_card_type;
    }

    /**
     * -----------------------------------------------------------------------------------------------------------------
     * @return mixed|null
     */
    public function getVnpayIpnTxnRef()
    {
        return $this->vnpay_ipn_txn_ref;
    }

    /**
     * @param mixed|null $vnpay_ipn_txn_ref
     */
    public function setVnpayIpnTxnRef($vnpay_ipn_txn_ref)
    {
        $this->vnpay_ipn_txn_ref = $vnpay_ipn_txn_ref;
    }

    /**
     * -----------------------------------------------------------------------------------------------------------------
     * @return mixed|null
     */
    public function getVnpayIpnTmnCode()
    {
        return $this->vnpay_ipn_tmn_code;
    }

    /**
     * @param mixed|null $vnpay_ipn_tmn_code
     */
    public function setVnpayIpnTmnCode($vnpay_ipn_tmn_code)
    {
        $this->vnpay_ipn_tmn_code = $vnpay_ipn_tmn_code;
    }

    /**
     * -----------------------------------------------------------------------------------------------------------------
     * @return mixed|null
     */
    public function getVnpayIpnResponseCode()
    {
        return $this->vnpay_ipn_response_code;
    }

    /**
     * @param mixed|null $vnpay_ipn_response_code
     */
    public function setVnpayIpnResponseCode($vnpay_ipn_response_code)
    {
        $this->vnpay_ipn_response_code = $vnpay_ipn_response_code;
    }

    /**
     * -----------------------------------------------------------------------------------------------------------------
     * @return mixed|null
     */
    public function getVnpayIpnSecureHashType()
    {
        return $this->vnpay_ipn_secure_hash_type;
    }

    /**
     * @param mixed|null $vnpay_ipn_secure_hash_type
     */
    public function setVnpayIpnSecureHashType($vnpay_ipn_secure_hash_type)
    {
        $this->vnpay_ipn_secure_hash_type = $vnpay_ipn_secure_hash_type;
    }

    /**
     * -----------------------------------------------------------------------------------------------------------------
     * @return mixed|null
     */
    public function getVnpayIpnSecureHash()
    {
        return $this->vnpay_ipn_secure_hash;
    }

    /**
     * @param mixed|null $vnpay_ipn_secure_hash
     */
    public function setVnpayIpnSecureHash($vnpay_ipn_secure_hash)
    {
        $this->vnpay_ipn_secure_hash = $vnpay_ipn_secure_hash;
    }

    /**
     * -----------------------------------------------------------------------------------------------------------------
     * @return mixed|null
     */
    public function getVnpayIpnTransactionNo()
    {
        return $this->vnpay_ipn_transaction_no;
    }

    /**
     * @param mixed|null $vnpay_ipn_transaction_no
     */
    public function setVnpayIpnTransactionNo($vnpay_ipn_transaction_no)
    {
        $this->vnpay_ipn_transaction_no = $vnpay_ipn_transaction_no;
    }

    /**
     * -----------------------------------------------------------------------------------------------------------------
     * @return mixed|null
     */
    public function getVnpayIpnOrderInfo()
    {
        return $this->vnpay_ipn_order_info;
    }

    /**
     * @param mixed|null $vnpay_ipn_order_info
     */
    public function setVnpayIpnOrderInfo($vnpay_ipn_order_info)
    {
        $this->vnpay_ipn_order_info = $vnpay_ipn_order_info;
    }

    /**
     * -----------------------------------------------------------------------------------------------------------------
     * @return mixed|null
     */
    public function getVnpayIpnPayDate()
    {
        return $this->vnpay_ipn_pay_date;
    }

    /**
     * @param mixed|null $vnpay_ipn_pay_date
     */
    public function setVnpayIpnPayDate($vnpay_ipn_pay_date)
    {
        $this->vnpay_ipn_pay_date = $vnpay_ipn_pay_date;
    }

    /**
     * -----------------------------------------------------------------------------------------------------------------
     * @return mixed|null
     */
    public function getVnpayIpnUri()
    {
        return $this->vnpay_ipn_uri;
    }

    /**
     * @param mixed|null $vnpay_ipn_uri
     */
    public function setVnpayIpnUri($vnpay_ipn_uri)
    {
        $this->vnpay_ipn_uri = $vnpay_ipn_uri;
    }

    public function processIPNUrlResult()
    {
        $inputData = array();
        $data = $this->vnpay_ipn_request;

        foreach ($data as $key => $value) {
            if (substr($key, 0, 4) == "vnp_") {
                $inputData[$key] = $value;
            }
        }

        $vnp_SecureHash = $inputData['vnp_SecureHash'];
        unset($inputData['vnp_SecureHashType']);
        unset($inputData['vnp_SecureHash']);
        ksort($inputData);

        $i = 0;
        $hashData = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashData = $hashData . '&' . $key . "=" . $value;
            } else {
                $hashData = $hashData . $key . "=" . $value;
                $i = 1;
            }
        }
        $vnpTranId = $inputData['vnp_TransactionNo']; //Mã giao dịch tại VNPAY
        $vnp_HashSecret = $this->vnpay_secret_key;
        $secureHash = hash('sha256',$vnp_HashSecret . $hashData);
        //
        $vnp_TmnCode = $inputData['vnp_TmnCode'];
        $vnp_Amount = intval($inputData['vnp_Amount'])/100;
        $vnp_BankCode = $inputData['vnp_BankCode'];
        $vnp_BankTranNo = $inputData['vnp_BankTranNo'];
        $vnp_CardType = $inputData['vnp_CardType'];
        $vnp_PayDate = $inputData['vnp_PayDate'];
        $vnp_ResponseCode = $inputData['vnp_ResponseCode'];
        $vnp_TxnRef = $inputData['vnp_TxnRef'];
        //
        $status = 0;
        //
        try {
            // Kiểm tra số tiền hợp lệ
            if (is_numeric($vnp_Amount) && $vnp_Amount < 5000) {
                $returnData['RspCode'] = '04';
                $returnData['Message'] = 'Invalid amount';
            } else {
                //Kiểm tra checksum của dữ liệu
                if ($secureHash == $vnp_SecureHash) {
                    //Lấy thông tin đơn hàng lưu trong Database và kiểm tra trạng thái của đơn hàng, mã đơn hàng là: $vnp_TxnRef
                    //Việc kiểm tra trạng thái của đơn hàng giúp hệ thống không xử lý trùng lặp, xử lý nhiều lần một giao dịch

                    $result = $this->vnpay_model->get_by_transaction_code($vnp_TxnRef);
                    //
                    if ($result != null) {
                        if ($result['vnp_amount'] != $vnp_Amount) {
                            $returnData['RspCode'] = '04';
                            $returnData['Message'] = 'Invalid amount';
                        } else {
                            if ($result['status'] != null && $result['status'] == 0) {
                                $payment_his_id = $result['id'];
                                if ($inputData['vnp_ResponseCode'] == '00') {
                                    $status = 1;
                                } else {
                                    $status = 2;
                                }

                                // Cập nhật kết quả thanh toán, tình trạng đơn hàng vào DB ở bảng wo_payment_histories
                                $updated_at = date('Y-m-d H:i:s');

                                $his_set_update = " `status` = $status";
                                $his_set_update .= ", `vnp_tmn_code`= '$vnp_TmnCode' ";
                                $his_set_update .= ", `vnp_bank_code`= '$vnp_BankCode' ";
                                $his_set_update .= ", `vnp_bank_tran_no`= '$vnp_BankTranNo' ";
                                $his_set_update .= ", `vnp_card_type`= '$vnp_CardType' ";
                                $his_set_update .= ", `vnp_pay_date`= '$vnp_PayDate' ";
                                $his_set_update .= ", `vnp_response_code`= '$vnp_ResponseCode' ";
                                $his_set_update .= ", `vnp_txn_ref`= '$vnp_TxnRef' ";
                                $his_set_update .= ", `vnp_secure_hash`= '$secureHash' ";
                                $his_set_update .= ", `response_ipn`= '$hashData' ";
                                $his_set_update .= ", `updated_at`= '$updated_at' ";

                                $his_where = " `id`= $payment_his_id ";

                                $his_sql = "UPDATE " . T_PAYMENT_HISTORIES . " SET $his_set_update WHERE $his_where";

                                $his_query = @mysqli_query($sqlConnect, $his_sql);
                                $his_result = @mysqli_fetch_assoc($his_query);

                                // Cập nhật kết quả thanh toán cho KH ở bảng wo_payment_transactions
                                $trans_set_update = " `status` = $status";
                                $trans_set_update .= ", `vnp_transaction_code` = '$vnpTranId' ";
                                $trans_set_update .= ", `payment_history_id` = $payment_his_id ";

                                $trans_where = " `transaction_code`= '$vnp_TxnRef' ";

                                $trans_sql = "UPDATE " . T_PAYMENT_TRANSACTIONS . " SET $trans_set_update WHERE $trans_where";

                                $trans_query = @mysqli_query($sqlConnect, $trans_sql);
                                $trans_result = @mysqli_fetch_assoc($trans_query);

                                // Tạo báo cáo doanh thu cho admin, insert vào bảng wo_payments
                                $user_id = $result['user_id'];
                                $type = $result['type'];
                                $date = date("n/Y");

                                $pay_fields = "`payment_history_id`, `user_id`, `amount`, `type`, `date`, `status`, `paid_at`";
                                $pay_values = "$payment_his_id, $user_id, $vnp_Amount, '$type', '$date', $status, '$updated_at'";
                                $pay_sql_insert = "INSERT INTO " . T_PAYMENTS . " ($pay_fields) VALUES ($pay_values)";
                                $pay_result = @mysqli_query($sqlConnect, $pay_sql_insert);

                                //Trả kết quả về cho VNPAY: Website TMĐT ghi nhận yêu cầu thành công
                                $returnData['RspCode'] = '00';
                                $returnData['Message'] = 'Confirm Success';
                            } else {
                                $returnData['RspCode'] = '02';
                                $returnData['Message'] = 'Order already confirmed';
                            }
                        }
                    } else {
                        $returnData['RspCode'] = '01';
                        $returnData['Message'] = 'Order not found';
                    }
                } else {
                    $returnData['RspCode'] = '97';
                    $returnData['Message'] = 'Chu ky khong hop le';
                }
            }
        } catch (Exception $e) {
            $returnData['RspCode'] = '99';
            $returnData['Message'] = 'Unknow error';
        }

        $vnpay_ipn = [
            'vnp_Amount' => $_GET['vnp_Amount'],
            'vnp_BankCode' => $_GET['vnp_BankCode'],
            'vnp_BankTranNo' => $_GET['vnp_BankTranNo'],
            'vnp_CardType' => $_GET['vnp_CardType'],
            'vnp_OrderInfo' => $_GET['vnp_OrderInfo'],
            'vnp_PayDate' => $_GET['vnp_PayDate'],
            'vnp_ResponseCode' => $_GET['vnp_ResponseCode'],
            'vnp_TmnCode' => $_GET['vnp_TmnCode'],
            'vnp_TransactionNo' => $_GET['vnp_TransactionNo'],
            'vnp_TxnRef' => $_GET['vnp_TxnRef'],
            'vnp_SecureHashType' => $_GET['vnp_SecureHashType'],
            'vnp_SecureHash' => $_GET['vnp_SecureHash'],
            'vnp_ReturnUri' => $_SERVER['REQUEST_URI']
        ];

        $this->vnpay_model->save_ipn_log([
            'transaction_code' => $vnpay_ipn['vnp_TxnRef'],
            'rsp_code' => '00',
            'message' => 'Thành công',
            'ipn_data' => $vnpay_ipn['vnp_ReturnUri'],
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }

}
