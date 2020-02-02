<?php
namespace App\Utility;

use GuzzleHttp\Client;

class Youtube
{
	protected $client;

	public function __construct(Client $client)
	{
		$this->client = $client;
	}

    /**
     * Search Youtube API for Videos by Querying
     *
     * @return Array
     */
	public function findByTitle($title)
	{
		try {
            $response = $this->client->request('GET', '/youtube/v3/search',
            [
                'query' => [
                    'part' => 'snippet',
                    'q' => $title,
                    'type' => 'video',
                    'maxResults' => 40,
                    'key'=>getenv('YOUTUBE_API_KEY')
                ]
            ]);
		} catch (\Exception $e) {
            // return $e->getMessage();
            return [];
		}

        $responce = $this->response_handler($response->getBody()->getContents());
        return $this->parseResult($responce);
	}

    /**
     * Parse API result from Youtube to a standard Object
     *
     * @return StandardObject
     */
	public function response_handler($response)
	{
		if ($response) {
            $response = json_decode($response);
            if ($response === null && json_last_error() !== JSON_ERROR_NONE) {
                return [];
            }
			return $response;
		}
		return [];
    }
    
    /**
     * Parse API result from Youtube to a standard Format for Use
     *
     * @return Array
     */
    private function parseResult($result){
        $final = [];
        foreach ($result->items as $item) {
            $eachItem = [];
            $eachItem["id"] = $item->id->videoId;
            $eachItem["url"] = 'https://www.youtube.com/watch?v='.$item->id->videoId;
            $eachItem["title"] = $item->snippet->title;
            $eachItem["thumbnail"] = $item->snippet->thumbnails->high->url;
            $final[] = $eachItem;
        }
        return $final;
    }
}