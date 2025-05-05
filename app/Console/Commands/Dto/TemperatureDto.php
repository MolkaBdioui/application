<?php

namespace App\Commands\DTOs;

class TemperatureDTO
{
    public function __construct(
        public readonly string $device,
        public readonly string $FW_ver,
        public readonly float $Update_flag,
        public readonly float $timestamp,
        public readonly string $Frame,
        public readonly string $value_t, // Note: kept as string since input is "23.3"
        public readonly string $BL_ver,
        public readonly string $unit_t,
        public readonly string $relay_status_d,
        public readonly float $rssi,
        public readonly string $date
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            device: $data['device'],
            FW_ver: $data['FW_ver'],
            Update_flag: $data['Update_flag'],
            timestamp: $data['timestamp'],
            Frame: $data['Frame'],
            value_t: $data['value_t'],
            BL_ver: $data['BL_ver'],
            unit_t: $data['unit_t'],
            relay_status_d: $data['relay_status_d'],
            rssi: $data['rssi'],
            date: $data['date']
        );
    }

    public function toArray(): array
    {
        return [
            'device' => $this->device,
            'FW_ver' => $this->FW_ver,
            'Update_flag' => $this->Update_flag,
            'timestamp' => $this->timestamp,
            'Frame' => $this->Frame,
            'value_t' => $this->value_t,
            'BL_ver' => $this->BL_ver,
            'unit_t' => $this->unit_t,
            'relay_status_d' => $this->relay_status_d,
            'rssi' => $this->rssi,
            'date' => $this->date
        ];
    }

    // Optional: Get the temperature as float
    public function getTemperatureValue(): float
    {
        return (float)$this->value_t;
    }
}
