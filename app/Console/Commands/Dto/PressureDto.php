<?php 
namespace App\Commands\DTOs;
class PressureDto
{
    public function __construct(
        public readonly string $unit,
        public readonly string $device,
        public readonly string $FW_ver,
        public readonly float $Update_flag,
        public readonly float $timestamp,
        public readonly string $Frame,
        public readonly float $cur_value,
        public readonly string $BL_ver,
        public readonly string $relay_status_d,
        public readonly float $rssi,
        public readonly string $date
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            unit: $data['unit'],
            device: $data['device'],
            FW_ver: $data['FW_ver'],
            Update_flag: $data['Update_flag'],
            timestamp: $data['timestamp'],
            Frame: $data['Frame'],
            cur_value: $data['cur_value'],
            BL_ver: $data['BL_ver'],
            relay_status_d: $data['relay_status_d'],
            rssi: $data['rssi'],
            date: $data['date']
        );
    }

    public function toArray(): array
    {
        return [
            'unit' => $this->unit,
            'device' => $this->device,
            'FW_ver' => $this->FW_ver,
            'Update_flag' => $this->Update_flag,
            'timestamp' => $this->timestamp,
            'Frame' => $this->Frame,
            'cur_value' => $this->cur_value,
            'BL_ver' => $this->BL_ver,
            'relay_status_d' => $this->relay_status_d,
            'rssi' => $this->rssi,
            'date' => $this->date
        ];
    }
}