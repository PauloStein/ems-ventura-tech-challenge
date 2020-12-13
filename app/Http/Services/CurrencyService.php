<?php

namespace App\Http\Services;

use Exception;

use App\Http\Adapters\Cache\IlluminateCacheAdapter;
use App\Http\Adapters\Request\GuzzleRequestAdapter;

class CurrencyService {
    private const CURRENCY_API = 'https://economia.awesomeapi.com.br/json';

    public function __construct(IlluminateCacheAdapter $cacheAdapter, GuzzleRequestAdapter $requestAdapter)
    {
        $this->cacheAdapter = $cacheAdapter;
        $this->requestAdapter = $requestAdapter;
    }

    public function getCurrencies() {
        try {
            $url = $this->getCurrencyApiUrl('/all');
            $cacheKey = 'allCurrencies';
            
            return $this->getData($url, $cacheKey);
        } catch (Exception $e) {
            throw $e;
        }

    }

    public function getCurrencyChartData(string $currencyCode, string $days) {
        try {
            $url = $this->getCurrencyApiUrl('/daily', [$currencyCode, $days]);
            $cacheKey = $currencyCode . $days;
    
            return $this->getData($url, $cacheKey);
        } catch (Exception $e) {
            throw $e;
        }
    }

    private function getCurrencyApiUrl(string $endpoint, array $options = []) {
        $implodedOptions = implode('/', $options);
        $url = CurrencyService::CURRENCY_API . $endpoint . '/' . $implodedOptions;

        return $url;
    }

    private function getData(string $url, string $cacheKey) {
        try {
            if (!$this->cacheAdapter->exists($cacheKey)) {
                $data = $this->requestAdapter->get($url);

                $this->cacheAdapter->save($cacheKey, json_decode($data->getBody()));
            }
    
            return $this->cacheAdapter->get($cacheKey);
        } catch (Exception $e) {
            throw $e;
        }        
    }
}