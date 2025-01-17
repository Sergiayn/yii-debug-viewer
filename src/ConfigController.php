<?php

declare(strict_types=1);

namespace Yiisoft\Yii\Debug\Viewer;

use Psr\Http\Message\ResponseInterface;
use Yiisoft\DataResponse\DataResponseFactoryInterface;

final class ConfigController
{
    private DataResponseFactoryInterface $responseFactory;
    private PanelCollection $panelCollection;

    /**
     * ConfigController constructor.
     */
    public function __construct(
        DataResponseFactoryInterface $responseFactory,
        PanelCollection $panelCollection
    ) {
        $this->responseFactory = $responseFactory;
        $this->panelCollection = $panelCollection;
    }

    /**
     * @return ResponseInterface
     */
    public function index(): ResponseInterface
    {
        $res = [];
        foreach ($this->panelCollection->getPanels() as $id => $panel) {
            $res[$id] = $panel->getName();
        }
        return $this->responseFactory->createResponse($res);
    }
}
