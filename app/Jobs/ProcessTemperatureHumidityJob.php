<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessTemperatureHumidityJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $data;
    /**
     * Create a new job instance.
     */
    public function __construct(array $data)
    {
        //
        $this->data = $data;

    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
       // Procesar los datos de temperatura y humedad aquí
       $temperature = $this->data['temperature'];
       $humidity = $this->data['humidity'];

       // Puedes almacenar los datos en la base de datos, enviar notificaciones, etc.
       // Por ejemplo, almacenar los datos en una tabla de registros de temperatura y humedad
       // DB::table('temperature_humidity_logs')->insert([
       //     'temperature' => $temperature,
       //     'humidity' => $humidity,
       //     'created_at' => now(),
       // ]);
    }
}
