<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Task;
use App\Models\User;

class TaskSeeder extends Seeder
{
    public function run()
    {
        $user = User::first() ?? User::factory()->create();

        $tasks = [
            [
                'title' => 'Conduct Market Research',
                'status' => 'To Do',
                'position' => 1,
                'description' => 'Research existing transparent donation platforms and identify gaps in the market.',
                'user_id' => $user->id,
            ],
            [
                'title' => 'Define MVP Features',
                'status' => 'To Do',
                'position' => 2,
                'description' => 'List core features for the Minimum Viable Product of Transparent Change.',
                'user_id' => $user->id,
            ],
            [
                'title' => 'Design Database Schema',
                'status' => 'To Do',
                'position' => 3,
                'description' => 'Create a detailed database schema for tracking donations and their impact.',
                'user_id' => $user->id,
            ],
            [
                'title' => 'Implement User Authentication',
                'status' => 'In Progress',
                'position' => 1,
                'description' => 'Set up user registration, login, and password reset functionality.',
                'user_id' => $user->id,
            ],
            [
                'title' => 'Develop Donation Flow',
                'status' => 'In Progress',
                'position' => 2,
                'description' => 'Create the user interface and backend logic for processing donations.',
                'user_id' => $user->id,
            ],
            [
                'title' => 'Integrate Payment Gateway',
                'status' => 'To Do',
                'position' => 4,
                'description' => 'Integrate a secure payment gateway to handle financial transactions.',
                'user_id' => $user->id,
            ],
            [
                'title' => 'Design User Dashboard',
                'status' => 'To Do',
                'position' => 5,
                'description' => 'Create wireframes and mockups for the user dashboard showing donation history and impact.',
                'user_id' => $user->id,
            ],
            [
                'title' => 'Implement Charity Onboarding Process',
                'status' => 'To Do',
                'position' => 6,
                'description' => 'Develop the process for charities to register and be verified on the platform.',
                'user_id' => $user->id,
            ],
            [
                'title' => 'Create Admin Panel',
                'status' => 'To Do',
                'position' => 7,
                'description' => 'Develop an administrative interface for managing users, charities, and donations.',
                'user_id' => $user->id,
            ],
            [
                'title' => 'Implement Donation Tracking System',
                'status' => 'To Do',
                'position' => 8,
                'description' => 'Develop the core functionality to track individual donations and their impact.',
                'user_id' => $user->id,
            ],
            [
                'title' => 'Design and Implement Email Notifications',
                'status' => 'To Do',
                'position' => 9,
                'description' => 'Create email templates and set up a system for sending updates to donors.',
                'user_id' => $user->id,
            ],
            [
                'title' => 'Conduct Initial User Testing',
                'status' => 'To Do',
                'position' => 10,
                'description' => 'Organize and conduct user testing sessions to gather feedback on the MVP.',
                'user_id' => $user->id,
            ],
            [
                'title' => 'Prepare for Beta Launch',
                'status' => 'To Do',
                'position' => 11,
                'description' => 'Finalize all features, conduct thorough testing, and prepare marketing materials for beta launch.',
                'user_id' => $user->id,
            ],
            [
                'title' => 'Legal Compliance Check',
                'status' => 'Review',
                'position' => 1,
                'description' => 'Review all legal requirements for handling donations and ensure platform compliance.',
                'user_id' => $user->id,
            ],
            [
                'title' => 'Create Project Roadmap',
                'status' => 'Done',
                'position' => 1,
                'description' => 'Develop a detailed project roadmap outlining future features and milestones.',
                'user_id' => $user->id,
                'completed_at' => now(),
            ],
        ];

        foreach ($tasks as $task) {
            Task::create($task);
        }
    }
}
