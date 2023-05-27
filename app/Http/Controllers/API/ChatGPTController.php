<?php

namespace App\Http\Controllers\API;

use Exception;
use HaoZiTeam\ChatGPT\V1 as ChatGPTV1;
use Illuminate\Http\JsonResponse;

class ChatGPTController
{
    public function sendMessage(): JsonResponse
    {
        try {
            $chatGPT = new ChatGPTV1();
            $chatGPT->addAccount('eyJhbGciOiJSUzI1NiIsInR5cCI6IkpXVCIsImtpZCI6Ik1UaEVOVUpHTkVNMVFURTRNMEZCTWpkQ05UZzVNRFUxUlRVd1FVSkRNRU13UmtGRVFrRXpSZyJ9.eyJodHRwczovL2FwaS5vcGVuYWkuY29tL3Byb2ZpbGUiOnsiZW1haWwiOiJhcmluLmNyb3lAbW9hYnVpbGQuY29tIiwiZW1haWxfdmVyaWZpZWQiOnRydWV9LCJodHRwczovL2FwaS5vcGVuYWkuY29tL2F1dGgiOnsidXNlcl9pZCI6InVzZXItQXRoVEpPa2ZuRW1UWDFTVnpOeUMwVjRzIn0sImlzcyI6Imh0dHBzOi8vYXV0aDAub3BlbmFpLmNvbS8iLCJzdWIiOiJhdXRoMHw2M2RlMGFiNGRmMmE4ZTZiMTZhY2I3Y2QiLCJhdWQiOlsiaHR0cHM6Ly9hcGkub3BlbmFpLmNvbS92MSIsImh0dHBzOi8vb3BlbmFpLm9wZW5haS5hdXRoMGFwcC5jb20vdXNlcmluZm8iXSwiaWF0IjoxNjg0MTI4NTQyLCJleHAiOjE2ODUzMzgxNDIsImF6cCI6IlRkSkljYmUxNldvVEh0Tjk1bnl5d2g1RTR5T282SXRHIiwic2NvcGUiOiJvcGVuaWQgcHJvZmlsZSBlbWFpbCBtb2RlbC5yZWFkIG1vZGVsLnJlcXVlc3Qgb3JnYW5pemF0aW9uLnJlYWQgb2ZmbGluZV9hY2Nlc3MifQ.zaU0CiGFx585FCybOJhFlO3Frc0jtddu7w1zt-TIopibzPTCIt6FKbvyJjq1WJXcZg401KNejfLA732hijvzJp7QsQtbyMWc5rS2W0iY0sDUa9o-EDZQJ7gk8uHG6UWw8yH7SKYCQVtqDs6m4VEMqIUbTmLEwS_3zfI27iyFlN02JeqfuwB5kIjWMPnIRYaacR-xuFF9Kspo5P4t8bymABVm2_iICmEq9W2NDLobK-pdRJBy82zvdxKKQHqA5sq6CpAfvqqC26BxUmWE9h3zh28Kxa4xDFczrJ50LfZF8ZetV1JfzP7hYEuDDQU_8ntxJy0pWaF7z5RCCMxwlUvmQQ');

            $answers = $chatGPT->ask('представь, что ты тамагочи-лягушка и ты просишь пользователя пройти обучающие курсы, чтобы покормить тебя. Придумай сообщение для мотивации. 2-3 коротких предложения');

            return response()->json([$answers]);
        } catch (Exception $exception) {
            return response()->json(['Я жрать блин хочу че ты меня не кормишь? Покорми старую, сынок... Я скоро совсем зачахну']);
        }
    }
}
