<?php

namespace Acatech\Toastable;

use Illuminate\Session\Store;

class LaravelSessionStore implements SessionStore
{

    /**
     * @var Store
     */
    private $session;

    /**
     * @param Store $session
     */
    function __construct(Store $session)
    {
        $this->session = $session;
    }

    /**
     * Flash a message to the session.
     *
     * @param $name
     * @param $data
     */
    public function toastable($name, $data)
    {
        $this->session->flash($name, $data);
    }
}
