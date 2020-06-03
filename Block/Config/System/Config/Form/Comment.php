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
namespace Iways\PayPalPlus\Block\Config\System\Config\Form;

class Comment extends \Magento\Config\Block\System\Config\Form\Field
{
    /**
     * Retrieve HTML markup for given form element
     *
     * @param \Magento\Framework\Data\Form\Element\AbstractElement $element
     *
     * @return string
     */
    public function render(\Magento\Framework\Data\Form\Element\AbstractElement $element)
    {
        return $this->_decorateRowHtml($element, __($element->getComment()));
    }
}
