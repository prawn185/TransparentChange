<?php

use App\Livewire\Actions\Logout;
use Livewire\Volt\Component;

new class extends Component
{
    /**
     * Log the current user out of the application.
     */
    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/', navigate: true);
    }
}; ?>

<nav>
    <ul class="flex space-x-4">
        <li><a href="/" class="nav-link group">Home</a></li>
        <li><a href="/learn-more" class="nav-link group">How It Works</a></li>
        <li><a href="/causes" class="nav-link group">Causes</a></li>
        <li><a href="/impact" class="nav-link group">Impact</a></li>
        <li><a href="/roadmap" class="nav-link group">Roadmap</a></li>
        
        @guest
            <li><a href="{{ route('login') }}" class="nav-link group-primary">Get Involved</a></li>
        @else
            <li><a href="{{ route('dashboard') }}" class="nav-link group">Dashboard</a></li>
            <li><a href="{{ route('profile') }}" class="nav-link group">My Profile</a></li>
            <li>
                <button wire:click="logout" class="nav-link group text-red-600 hover:text-red-800">
                    Logout
                </button>
            </li>
        @endguest
    </ul>
</nav>
