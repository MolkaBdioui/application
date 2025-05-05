<?php 
namespace App\Console\Commands;

use App\Commands\DTOs\DeviceDataDTO;
use App\Commands\DTOs\PressureDto;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use Illuminate\Console\Command;
class fetchPressureData extends Command
{
    protected $signature = 'fetch:pressure-data';
    protected $description = 'Fetch pressure data from the external API';

    public function handle()
    {
        $client = new Client();

        $headers = [
            'x-api-key' => 'QE4HUo4yjG3QQKPPC7ioB7AbmvD5P0UD18sJBV2i',
            'Accept' => 'application/json',
        ];

        $url = 'https://2m543660yi.execute-api.us-east-1.amazonaws.com/prod/apis.wattnow.io/eurocast/device/indepth/pressure/d-p-00001/2025-04-02';
        
        $request = new Request('GET', $url, $headers);

        try {
            $response = $client->sendAsync($request)->wait();
            $body = $response->getBody()->getContents();
            $dataArr = json_decode($body, true);
            $pressureData = [];
            foreach($dataArr as $item)
            {
                $dto = PressureDto::fromArray($item);
                $pressureData[] = ['unit' => $dto->unit, 'currentValue' => $dto->cur_value, 'date' => $dto->date];
            }
        } catch (\Exception $e) {
            $this->error('Erreur lors de la récupération des données : ' . $e->getMessage());
        }
    }
}
