<?php

namespace Icube\DisplayAttributes\Plugin;

use Magento\Checkout\Model\Session as CheckoutSession;
use Magento\Quote\Api\CartItemRepositoryInterface as QuoteItemRepository;


class ConfigProviderPlugin extends \Magento\Framework\Model\AbstractModel
{
    private $checkoutSession;
    private $quoteItemRepository;
    protected $scopeConfig;

    public function __construct(
        CheckoutSession $checkoutSession,
        QuoteItemRepository $quoteItemRepository,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
    ) {
        $this->_scopeConfig = $scopeConfig;
        $this->checkoutSession = $checkoutSession;
        $this->quoteItemRepository = $quoteItemRepository;
    }


    public function afterGetConfig(\Magento\Checkout\Model\DefaultConfigProvider $subject, array $result)
    {
        $quoteId = $this->checkoutSession->getQuote()->getId();            
        if ($quoteId) {            
            $itemOptionCount = count($result['totalsData']['items']);                

            for ($i=0; $i < $itemOptionCount; $i++) {
                $quoteParentId = $result['totalsData']['items'][$i]['item_id'];
                $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
                $productId = $result['quoteItemData'][$i]['product']['entity_id'];

                $product = $objectManager->create('\Magento\Catalog\Model\Product')->load($productId);
                $displayPN = $product->getDisplayPn();
                
                $result['quoteItemData'][$i]['display_pn'] = $displayPN;
                json_encode($result);
            }
        }
        return $result;
    }

}