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
    public function getUrl(array $queryParameters,array $changedParameters = []): string
    {
        $aux = $queryParameters;
        $resultString = '?';
        foreach ($aux as $name => $value) {
            if (!empty($changedParameters) && isset($changedParameters[$name])){
                $aux[$name] = $changedParameters[$name];
            }
            if ($aux[$name] !== '') {
                $resultString .= "$name=$aux[$name]&";
            }
        }

        return substr($resultString, 0, -1);
    }
}