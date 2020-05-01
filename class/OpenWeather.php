<?php
class OpenWeather
{
    private $key;

    public function __construct(string $key)
    {
        $this->key = $key;
    }


    public function getForecast(string $position)
    {
        // $date = new DateTime();
        // $newDate = $date->format('d/m/Y');
        $ressource = curl_init("http://api.openweathermap.org/data/2.5/forecast/daily?q={$position}&cnt=16&appid={$this->key}&units=metric&lang=fr");
        curl_setopt_array($ressource, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 2
        ]);
        $data = curl_exec($ressource);
        if ($data === false || curl_getinfo($ressource, CURLINFO_HTTP_CODE) !== 200) {
            var_dump(curl_error($ressource));
        }
        $result = [];
        $data = json_decode($data, true);

        foreach($data['list'] as $day){
            $result[] = [
                'temp' => $day['temp']['day'],
                'description' => $day['weather'][0]['description'],
                'date' => new DateTime('@' . $day['dt'])
            ];
        }

    }


}
