<?php

namespace App\Services;

use MailchimpMarketing\ApiClient;

class newsletter
{
    public function subscribe(string $email, string $list = null)
    {
        $list = ($list == null) ? config('services.mailchimp.lists.subscribers') : null;

        return $this->client()->lists->addListMember($list, [
            "email_address" => $email,
            "status" => "subscribed",
        ]);
    }

    protected function client()
    {
        $mailchimp = new ApiClient();

        return $mailchimp->setConfig([
            'apiKey' => config('services.mailchimp.key'),
            'server' => 'us1'
        ]);
    }
}