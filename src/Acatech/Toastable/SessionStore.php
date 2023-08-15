<?php

namespace Acatech\Toastable;

interface SessionStore
{
    /**
     * Flash a message to the session.
     *
     * @param $name
     * @param $data
     */
    public function toastable($name, $data);
}
