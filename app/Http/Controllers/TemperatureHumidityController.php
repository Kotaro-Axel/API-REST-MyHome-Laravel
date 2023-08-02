<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;
use App\Events\MqttDataReceived;

class TemperatureHumidityController extends Controller
{
    public function consumeData()
    {
        $connection = new AMQPStreamConnection('fly.rmq.cloudamqp.com', 1883, 'wyymaeak', 'fDasodKlvvMTnipPrmFcbfHeHJaX07HM');
        $channel = $connection->channel();
        $queue = 'sensor_data_queue'; // Nombre de la cola configurada para recibir los datos

        $channel->queue_declare($queue, false, true, false, false);

        echo ' [*] Esperando mensajes. Para salir presione CTRL+C', PHP_EOL;

        $callback = function ($msg) {
            $data = json_decode($msg->body, true);

            // Emitir el evento personalizado con los datos recibidos
            event(new MqttDataReceived($data));

            echo ' [x] Mensaje recibido: ' . $msg->body . PHP_EOL;
        };

        $channel->basic_consume($queue, '', false, true, false, false, $callback);

        while ($channel->is_consuming()) {
            $channel->wait();
        }
    }
}