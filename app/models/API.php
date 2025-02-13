<?php
class API
{
    private $cacheFile = "cache/crypto_data.json"; // Store cached data
    private $cacheTime = 300; // 5 minutes cache

    public function getDataFromApi()
    {
        // Check if cached data exists and is still valid
        if (file_exists($this->cacheFile) && (time() - filemtime($this->cacheFile) < $this->cacheTime)) {
            return json_decode(file_get_contents($this->cacheFile), true);
        }

        $apiUrl = "https://api.coingecko.com/api/v3/coins/markets?vs_currency=usd&order=market_cap_desc&per_page=10&page=1";
        $options = [
            "http" => [
                "header" => "Accept: application/json\r\n" .
                    "User-Agent: MyCryptoApp/1.0\r\n",
                "method" => "GET"
            ]
        ];

        $context = stream_context_create($options);
        $result = file_get_contents($apiUrl, false, $context);

        if ($result === false) {
            return ["error" => "Failed to fetch data from the API."];
        }

        $data = json_decode($result, true);
        if ($data === null) {
            return ["error" => "Invalid JSON response from API."];
        }

        // Cache the data to reduce API calls
        if (!is_dir("cache")) {
            mkdir("cache", 0777, true);
        }
        file_put_contents($this->cacheFile, json_encode($data));

        return $data;
    }
}
