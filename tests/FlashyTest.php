<?php

use Acatech\Acatech\ToastableNotifier;
use Mockery as m;

class ToastableTest extends PHPUnit_Framework_TestCase
{
    protected $session;

    protected $toast;

    public function setUp()
    {
        $this->session = m::mock('Toastable\Toastable\SessionStore');
        $this->toast = new ToastableNotifier($this->session);
    }

    /** @test */
    public function it_displays_default_toastable_notifications()
    {
        $this->session->shouldReceive('toastable')->with('toastable_notification.message', 'Welcome Aboard');
        $this->session->shouldReceive('toastable')->with('toastable_notification.link', '#');
        $this->session->shouldReceive('toastable')->with('toastable_notification.type', 'success');

        $this->toast->message('Welcome Aboard');
    }

    /** @test */
    public function it_displays_info_toastable_notifications()
    {
        $this->session->shouldReceive('toastable')->with('toastable_notification.message', 'Welcome Aboard');
        $this->session->shouldReceive('toastable')->with('toastable_notification.link', '#');
        $this->session->shouldReceive('toastable')->with('toastable_notification.type', 'info');

        $this->toast->info('Welcome Aboard');
    }

    /** @test */
    public function it_displays_success_toastable_notifications()
    {
        $this->session->shouldReceive('toastable')->with('toastable_notification.message', 'Welcome Aboard');
        $this->session->shouldReceive('toastable')->with('toastable_notification.link', '#');
        $this->session->shouldReceive('toastable')->with('toastable_notification.type', 'success');

        $this->toast->success('Welcome Aboard');
    }

    /** @test */
    public function it_displays_error_toastable_notifications()
    {
        $this->session->shouldReceive('toastable')->with('toastable_notification.message', 'Uh Oh');
        $this->session->shouldReceive('toastable')->with('toastable_notification.link', '#');
        $this->session->shouldReceive('toastable')->with('toastable_notification.type', 'error');

        $this->toast->error('Uh Oh');
    }

    /** @test */
    public function it_displays_warning_toastable_notifications()
    {
        $this->session->shouldReceive('toastable')->with('toastable_notification.message', 'Be careful!');
        $this->session->shouldReceive('toastable')->with('toastable_notification.link', '#');
        $this->session->shouldReceive('toastable')->with('toastable_notification.type', 'warning');

        $this->toast->warning('Be careful!');
    }

    /** @test */
    public function it_displays_primary_toastable_notifications()
    {
        $this->session->shouldReceive('toastable')->with('toastable_notification.message', 'Thanks for signing up!');
        $this->session->shouldReceive('toastable')->with('toastable_notification.link', '#');
        $this->session->shouldReceive('toastable')->with('toastable_notification.type', 'primary');

        $this->toast->primary('Thanks for signing up!');
    }

    /** @test */
    public function it_displays_primary_dark_toastable_notifications()
    {
        $this->session->shouldReceive('toastable')->with('toastable_notification.message', 'Thanks for signing up!');
        $this->session->shouldReceive('toastable')->with('toastable_notification.link', '#');
        $this->session->shouldReceive('toastable')->with('toastable_notification.type', 'primary-dark');

        $this->toast->primaryDark('Thanks for signing up!');
    }

    /** @test */
    public function it_displays_muted_toastable_notifications()
    {
        $this->session->shouldReceive('toastable')->with('toastable_notification.message', 'Can you see me?');
        $this->session->shouldReceive('toastable')->with('toastable_notification.link', '#');
        $this->session->shouldReceive('toastable')->with('toastable_notification.type', 'muted');

        $this->toast->muted('Can you see me?');
    }

    /** @test */
    public function it_displays_muted_dark_toastable_notifications()
    {
        $this->session->shouldReceive('toastable')->with('toastable_notification.message', 'Can you see me?');
        $this->session->shouldReceive('toastable')->with('toastable_notification.link', '#');
        $this->session->shouldReceive('toastable')->with('toastable_notification.type', 'muted-dark');

        $this->toast->mutedDark('Can you see me?');
    }
}
