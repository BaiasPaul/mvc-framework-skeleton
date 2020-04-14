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
        $aux = [];
        foreach ($queryParameters as $name => $value) {
            if ($value != '' && isset($changedParameters[$name]) && $changedParameters[$name] == ''){
                continue;
            }
            if ($value != ''){
                $aux[$name] = $value;
            }
            if ($changedParameters[$name] != '') {
                $aux[$name] = $changedParameters[$name];
            }
        }
        if (http_build_query($aux) == '')
            return '';

        return '?' . http_build_query($aux);
    }
}