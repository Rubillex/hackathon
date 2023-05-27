<?php

namespace App\Models\Api;

use App\Models\Lesson;

class Stepik
{
    protected string $url = 'https://stepik.org/';

    public const GET_USER = 'get-user';

    protected $actions = [
        self::GET_USER => 'api/users/'
    ];

    /**
     * @param int $id
     * @return mixed
     * @throws \Exception
     */
    public function getUserById(int $id)
    {
        $result = $this->request(self::GET_USER, [], $id);

        if (empty($result->users) || count($result->users) !== 1) {
            throw new \Exception('Пользователь не найден');
        }

        return $result->users[0];
    }

    public function request(string $action, $data = [], $additionalUrl = '')
    {
        $client = new \GuzzleHttp\Client();
        $res = $client->get($this->url . $this->actions[$action] . $additionalUrl, $data);

        return json_decode($res->getBody()->getContents()); // todo обработку ошибок
    }
}
