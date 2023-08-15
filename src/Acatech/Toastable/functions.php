<?php

if (! function_exists('toastable')) {

    /**
     * Arrange for a flash message.
     *
     * @param  string|null $message
     * @return \Acatech\Toastable\ToastNotifier
     */
    function toastable($message = null, $link = '#')
    {
        $notifier = app('toastable');

        if (! is_null($message)) {
            return $notifier->success($message, $link);
        }

        return $notifier;
    }
}
