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

namespace Iways\PayPalPlus\Controller\Checkout;

/**
 * PayPalPlus checkout controller
 *
 * @author robert
 */
class Cancel extends \Magento\Framework\App\Action\Action
{
    /**
     * Execute
     */
    public function execute()
    {
        $this->_redirect(
            'checkout',
            [
                '_query' => $this->_request->getParams(),
                '_fragment' => 'payment'
            ]
        );
    }
}
