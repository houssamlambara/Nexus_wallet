<?php

class API
{
    public function getdatafromapi()
    {
        $apiUrl = "https://api.coingecko.com/api/v3/coins/markets?vs_currency=usd&order=market_cap_desc&per_page=10&page=1";
        // $apiKey = "YOUR_API_KEY";

        // Headers should be a single string
        $options = [
            "http" => [
                "header" => "X-CMC_PRO_API_KEY:\r\n" .
                    "Accept: application/json\r\n" .
                    "User-Agent: MyCryptoApp/1.0\r\n",
                "method" => "GET"
            ]
        ];

        $context = stream_context_create($options);
        $result = file_get_contents($apiUrl, false, $context);

        // Handle errors properly
        if ($result === false) {
            return ["error" => "Failed to fetch data from the API."];
        }

        // Decode JSON to an associative array
        $data = json_decode($result, true);

        // Ensure valid JSON response
        if ($data === null) {
            return ["error" => "Invalid JSON response from API."];
        }

        return $data;
    }
}
