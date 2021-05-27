<?php

/**
 * Send a Message to a Slack Channel.
 *
 * @param string $message The message to post into a channel.
 * @param string $channel The name of the channel prefixed with #, example #foobar
 * @return boolean
 */
function slack($message, $channel)
    {
        $url = getenv('https://hooks.slack.com/services/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');
        $ch = curl_init($url);
        $data = [
            'channel' => $channel,
            'text' => $message,
            'username' => 'SlackBot',
        ];
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data, JSON_THROW_ON_ERROR, 512));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);

        $result = curl_exec($ch);
        curl_close($ch);

        return $result;
    }
?>