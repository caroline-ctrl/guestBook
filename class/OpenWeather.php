<?php
/**
 * Gére l'api d'openWeather
 * 
 * @author Grafikart
 */
class OpenWeather
{
    private $key;

    public function __construct(string $key)
    {
        $this->key = $key;
    }

    
    /**
     * Récupère les informations météorologique du jour
     *
     * @param  string $position Ville (ex: "Montpellier,fr")
     * @return array
     */
    public function getToday(string $position): ?array
    {
        $data = $this->callAPI("weather?q={$position}");
        return [
            'temp' => $data['main']['temp'],
            'description' => $data['weather'][0]['description'],
            'date' => new DateTime()
        ];
    }


    
    /**
     * Récupère les prévisions sur plusieurs jours
     *
     * @param  string $position
     * @return array[]
     */
    public function getForecast(string $position): ?array
    {
        $data = $this->callAPI("forecast/daily?q={$position}");
        foreach ($data['list'] as $day) {
            $result[] = [
                'temp' => $day['temp']['day'],
                'description' => $day['weather'][0]['description'],
                'date' => new DateTime('@' . $day['dt'])
            ];
        }
        return $result;
    }

    
    /**
     * appelle l'api Open weather
     *
     * @param  string $endpoint Action a appeler (weather, forecast/day)
     * @return array
     */
    private function callAPI(string $endpoint): ?array
    {
        $ressource = curl_init("http://api.openweathermap.org/data/2.5/{$endpoint}&appid={$this->key}&units=metric&lang=fr");
        curl_setopt_array($ressource, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 2
        ]);
        $data = curl_exec($ressource);
        if ($data === false || curl_getinfo($ressource, CURLINFO_HTTP_CODE) !== 200) {
            var_dump(curl_error($ressource));
        }
        return json_decode($data, true);
    }
}
