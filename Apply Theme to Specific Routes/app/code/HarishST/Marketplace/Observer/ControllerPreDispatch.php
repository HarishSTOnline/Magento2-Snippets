<?php
declare(strict_types=1);

namespace HarishST\Marketplace\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Event\Observer;
use Magento\Framework\UrlInterface;
use Magento\Framework\View\DesignInterface;

class ControllerPreDispatch implements ObserverInterface
{

    /**
     * @var DesignInterface
     */
    private DesignInterface $design;

    /**
     * @var UrlInterface
     */
    private UrlInterface $url;

    /**
     * ControllerPreDispatch constructor.
     * @param DesignInterface $design
     * @param UrlInterface $url
     */
    public function __construct(
        DesignInterface $design,
        UrlInterface $url
    )
    {
        $this->design = $design;
        $this->url = $url;
    }

    /**
     * @inheritDoc
     */
    public function execute(Observer $observer): void
    {
        // Apply default Luma theme, if the route is marketplace or mass upload.
        $urlSegments = explode('/', parse_url($this->url->getCurrentUrl(), PHP_URL_PATH));
        if ( $urlSegments[1] == 'marketplace' || $urlSegments[1] == 'mpmassupload' ) {
            $this->design->setDesignTheme('Magento/luma', 'frontend');
        }

    }
}
