<?php

namespace App\Console\Commands;

use App\Commands\DTOs\DeviceDataDTO;
use App\Commands\DTOs\ElectricityDTO;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use Illuminate\Console\Command;

class fetchElectricityData extends Command
{
    protected $signature = 'fetch:electricity-data';
    protected $description = 'Fetch electricity data from the external API';

    public function handle()
    {
        $client = new Client();

        $headers = [
            'x-api-key' => 'QE4HUo4yjG3QQKPPC7ioB7AbmvD5P0UD18sJBV2i',
            'Accept' => 'application/json',
        ];

        $url = 'https://2m543660yi.execute-api.us-east-1.amazonaws.com/prod/apis.wattnow.io/eurocast/device/indepth/electricity/d-e-00001/2025-04-02';
        
        $request = new Request('GET', $url, $headers);

        try {
            $response = $client->sendAsync($request)->wait();
            $body = $response->getBody()->getContents();
            $dataArr = json_decode($body, true);
            foreach($dataArr as $item)
            {
        
                $dto = ElectricityDTO::fromArray($item);
            }
        } catch (\Exception $e) {
            $this->error('Erreur lors de la récupération des données : ' . $e->getMessage());
        }
    }
}
