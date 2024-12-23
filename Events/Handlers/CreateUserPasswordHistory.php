<?php

namespace Modules\Iprofile\Events\Handlers;

use Modules\Iprofile\Entities\UserPasswordHistory;

class CreateUserPasswordHistory
{
    public function handle($event = null)
    {
        //\Log::info('Iprofile|Handler|CreateUserPasswordHistory');

        $user = $event->user;
        $data = $event->bindings;

        // Is not from Admin
      $notifyNewUsersOfExport = setting("iprofile::notifyNewUsersOfExport", null, 0);
        if (!isset($data['fromAdmin']) && !$notifyNewUsersOfExport) {
            $historyCreated = UserPasswordHistory::create([
                'user_id' => $user->id,
                'password' => $user->password,
            ]);
        }
    }
}
