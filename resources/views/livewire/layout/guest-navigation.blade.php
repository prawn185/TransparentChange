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
        <li><a href="/"
               class="group inline-flex h-9 w-max items-center justify-center rounded-md bg-background px-4
                            py-2 text-sm font-medium transition-colors hover:bg-accent hover:text-accent-foreground
                             focus:bg-accent focus:text-accent-foreground focus:outline-none">Home</a>
        </li>
        <li><a href="/learn-more"
               class="group inline-flex h-9 w-max items-center justify-center rounded-md bg-background px-4
                            py-2 text-sm font-medium transition-colors hover:bg-accent hover:text-accent-foreground
                             focus:bg-accent focus:text-accent-foreground focus:outline-none">How
                It Works</a></li>
        <li><a href="/causes"
               class="group inline-flex h-9 w-max items-center justify-center rounded-md bg-background px-4
                            py-2 text-sm font-medium transition-colors hover:bg-accent hover:text-accent-foreground
                             focus:bg-accent focus:text-accent-foreground focus:outline-none">Causes</a>
        </li>
        <li><a href="/impact"
               class="group inline-flex h-9 w-max items-center justify-center rounded-md bg-background px-4
                            py-2 text-sm font-medium transition-colors hover:bg-accent hover:text-accent-foreground
                             focus:bg-accent focus:text-accent-foreground focus:outline-none">Impact</a>
        </li>
        <li><a href="/roadmap"
               class="group inline-flex h-9 w-max items-center justify-center rounded-md bg-background px-4
                            py-2 text-sm font-medium transition-colors hover:bg-accent hover:text-accent-foreground
                             focus:bg-accent focus:text-accent-foreground focus:outline-none">Roadmap</a>
        </li>
        <li><a href="/login"
               class="group inline-flex h-9 w-max items-center justify-center rounded-md bg-primary px-4
                            py-2 text-sm font-medium text-primary-foreground transition-colors hover:bg-primary/90
                             focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2">
                Get Involved</a></li>
    </ul>
</nav>
