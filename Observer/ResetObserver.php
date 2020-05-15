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
namespace Iways\PayPalPlus\Observer;

use Iways\PayPalPlus\Helper\Data;
use Magento\Framework\Event\ObserverInterface;

class ResetObserver implements ObserverInterface
{
    /**
     * Protected $payPalPlusHelper
     *
     * @var Data
     */
    protected $payPalPlusHelper;

    /**
     * ValidateObserver constructor
     *
     * @param Data $payPalPlusHelper
     */
    public function __construct(
        Data $payPalPlusHelper
    ) {
        $this->payPalPlusHelper = $payPalPlusHelper;
    }

    /**
     * Log out user and redirect to new admin custom url
     *
     * @param \Magento\Framework\Event\Observer $observer
     *
     * @return void
     *
     * @SuppressWarnings(PHPMD.ExitExpression)
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $this->payPalPlusHelper->resetWebProfileId();
    }
}
