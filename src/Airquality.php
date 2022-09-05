<?php
namespace Airquality;

use Symfony\Component\HttpClient\HttpClient;

class Airquality
{

    const API_KEY = '4a28fd8e-1d3d-4aec-a0b4-8b98d416e532';

    public function __construct()
    {
        $data = $this->getData();
    }

    public function getData()
    {
        $data = $this->request();
        if (!$data) {
            return [];
        }
        $id = $this->save($data);
        var_dump($id);die;
    }

    public function save($data)
    {
        global $wpdb;
        $row = $data->data;
        $wpdb->insert( 
            'airquality_cities',
            [
                'name' => $row->city, 
                #'point' => 123, 
                'lat' => $row->location->coordinates[0],
                'lng' => $row->location->coordinates[1],
                'ts' => $row->current->pollution->ts,
                'aqius' => $row->current->pollution->aqius,
                'mainus' => $row->current->pollution->mainus,
                'aqicn' => $row->current->pollution->aqicn,
                'maincn' => $row->current->pollution->maincn,
                'tp' => $row->current->weather->tp,
                'pr' => $row->current->weather->pr,
                'hu' => $row->current->weather->hu,
                'ws' => $row->current->weather->ws,
                'wd' => $row->current->weather->wd,
                'ic' => $row->current->weather->ic,
                'created_at' => date('Y-m-d H:i:s')
            ]
        );
        return $wpdb->insert_id;
    }

    public function request()
    {
        return json_decode(file_get_contents(__DIR__ . '/data.json')); // test
        
        $raw_data = file_get_contents(sprintf('http://api.airvisual.com/v2/nearest_city?key=%s', self::API_KEY));
        return $raw_data ? json_decode($raw_data) : [];
    }
    
    
}