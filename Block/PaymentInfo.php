<?php
/**
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 *
 * PHP version 7.3.17
 *
 * @category Modules
 * @package  Magento
 * @author   Robert Hillebrand <hillebrand@i-ways.net>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License 3.0
 * @link     https://www.i-ways.net
 */
namespace Iways\PayPalPlus\Block;

use Iways\PayPalPlus\Model\Payment;

/**
 * Class Info
 */
class PaymentInfo extends \Magento\Payment\Block\Info
{
    /**
     * Default template file
     *
     * @var string
     */
    protected $_template = 'paypalplus/info/default.phtml'; // phpcs:ignore PSR2.Classes.PropertyDeclaration

    /**
     * Render as PDF
     *
     * @return string
     */
    public function toPdf()
    {
        $this->setTemplate('paypalplus/info/pdf/default.phtml');
        return $this->toHtml();
    }

    /**
     * Prepare information specific to current payment method
     *
     * @param null $transport
     *
     * @return \Magento\Framework\DataObject
     *
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    protected function _prepareSpecificInformation($transport = null) // phpcs:ignore PSR2.Methods.MethodDeclaration
    {
        $transport = parent::_prepareSpecificInformation($transport);
        $payment = $this->getInfo();
        $info = [];

        if (!$this->getIsSecureMode()) {
            $info[(string)__('Transaction ID')] = $this->getInfo()->getLastTransId();
        }
        if ($this->isPUI()) {
            $info[(string)__('Account holder')] = $payment->getData('ppp_account_holder_name');
            $info[(string)__('Bank')] = $payment->getData('ppp_bank_name');
            $info[(string)__('IBAN')] = $payment->getData('ppp_international_bank_account_number');
            $info[(string)__('BIC')] = $payment->getData('ppp_bank_identifier_code');
            $info[(string)__('Reference number')] = $payment->getData('ppp_reference_number');
            $info[(string)__('Payment due date')] = $payment->getData('ppp_payment_due_date');
        }

        return $transport->addData($info);
    }

    /**
     * Checks if PayPal PLUS payment is PUI
     *
     * @return bool
     *
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function isPUI()
    {
        return (
            $this->getInfo()->getData('ppp_instruction_type') == Payment::PPP_INSTRUCTION_TYPE
        ) ? true : false;
    }
}
