<?php

namespace App\Services;

use Kreait\Firebase\Factory;
use Kreait\Firebase\Messaging\CloudMessage;
use Kreait\Firebase\Messaging\Notification;

require '../vendor/autoload.php';


class FirebaseMessaging
{
    public $firebase;

    public $messaging;

    public function __construct(Factory $firebase)
    {
        $this->messaging = $firebase->createMessaging();

        $message = CloudMessage::withTarget('Token', 'dTGSupNwQiu1C1s8Yc7AGc:APA91bHa5Sc0LyC4jY3-kQbJxjasieDQKni4vGpxl4Df8-fk7O73Kb3li1_lwCp9SFUtgo9tF2iMTuUykeUQU-H1a_iVCyt6tnyBK4KGucZ_dhNO4_ITskZ2WIIStj3CSG6oglHJjd3W')
            ->withNotification(Notification::create('Title', 'Body'))
            ->withData(['salut' => 'hola']);

        $this->messaging->send($message);
    }
}
