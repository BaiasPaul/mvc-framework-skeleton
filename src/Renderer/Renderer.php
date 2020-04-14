<?php

namespace Framework\Renderer;

use Framework\Contracts\RendererInterface;
use Framework\Http\Response;
use Framework\Http\Stream;
use Framework\Service\UrlBuilder;

class Renderer implements RendererInterface
{

    const CONFIG_KEY_BASE_VIEW_PATH = "base_view_path";

    /**
     * @var string
     */
    private $baseViewsPath;

    /**
     * @var UrlBuilder
     */
    private $urlBuilder;

    /**
     * Renderer constructor.
     * @param string $baseViewsPath
     * @param UrlBuilder $urlBuilder
     */
    public function __construct(
        string $baseViewsPath,
        UrlBuilder $urlBuilder
    ) {
        $this->baseViewsPath = $baseViewsPath;
        $this->urlBuilder = $urlBuilder;
    }

    /**
     * @param string $viewFile
     * @param array $arguments
     * @return Response
     */
    public function renderView(string $viewFile, array $arguments): Response
    {
        $fullPath = $this->baseViewsPath . $viewFile;

        ob_start();

        $arguments['url'] = $this->urlBuilder;

        extract($arguments);

        require $fullPath;

        $content = ob_get_contents();

        ob_end_clean();

        $stream = Stream::createFromString($content);
        $response = new Response($stream);

        return $response;
    }

    /**
     * @param array $data
     * @return Response
     */
    public function renderJson(array $data): Response
    {
        $json = json_encode($data);
        $stream = Stream::createFromString($json);
        $response = new Response($stream);

        return $response;
    }
}
