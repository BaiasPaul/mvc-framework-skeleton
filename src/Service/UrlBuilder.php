<?php

namespace Framework\Service;

/**
 * Class UrlBuilder
 * @package Framework\Service
 */
class UrlBuilder
{

    /**
     * Build a query parameter string
     *
     * @param array $queryParameters
     * @param array $changedParameters
     * @return string
     */
    public function getUrl(array $queryParameters, array $changedParameters = []): string
    {
        $aux = $queryParameters;
        foreach ($aux as $name => $value) {
            if (isset($changedParameters[$name])) {
                $aux[$name] = $changedParameters[$name];
            }
        }

        return '?' . http_build_query($aux);
    }
}
