<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // About Seeder
        DB::table('about')->insert([
            'name' => 'John Doe',
            'bio' => 'Full-stack developer with 5+ years of experience building web applications. Passionate about clean code, user experience, and solving complex problems through technology.',
            'position' => 'Senior Full Stack Developer',
            'photo' => 'profile.jpg',
            'social_links' => json_encode([
                'github' => 'https://github.com/johndoe',
                'linkedin' => 'https://linkedin.com/in/johndoe',
                'twitter' => 'https://twitter.com/johndoe'
            ]),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Tech Stacks Seeder
        $techStacks = [
            [
                'name' => 'Laravel',
                'icon' => 'laravel.svg',
                'proficiency' => 90,
                'category' => 'Backend',
            ],
            [
                'name' => 'React',
                'icon' => 'react.svg',
                'proficiency' => 85,
                'category' => 'Frontend',
            ],
            [
                'name' => 'Vue.js',
                'icon' => 'vue.svg',
                'proficiency' => 80,
                'category' => 'Frontend',
            ],
            [
                'name' => 'MySQL',
                'icon' => 'mysql.svg',
                'proficiency' => 85,
                'category' => 'Database',
            ],
            [
                'name' => 'Docker',
                'icon' => 'docker.svg',
                'proficiency' => 75,
                'category' => 'DevOps',
            ]
        ];

        foreach ($techStacks as $tech) {
            DB::table('tech_stacks')->insert(array_merge($tech, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }

        // Projects Seeder
        $projects = [
            [
                'title' => 'E-commerce Platform',
                'description' => 'Built a full-featured e-commerce platform with product management, cart functionality, and payment integration.',
                'thumbnail' => 'ecommerce.jpg',
                'github_link' => 'https://github.com/johndoe/ecommerce',
                'live_link' => 'https://ecommerce-demo.com',
                'technologies_used' => json_encode(['Laravel', 'Vue.js', 'MySQL', 'Docker']),
            ],
            [
                'title' => 'Task Management System',
                'description' => 'Developed a real-time task management system with team collaboration features.',
                'thumbnail' => 'taskmanager.jpg',
                'github_link' => 'https://github.com/johndoe/taskmanager',
                'live_link' => 'https://taskmanager-demo.com',
                'technologies_used' => json_encode(['Laravel', 'React', 'MySQL']),
            ]
        ];

        foreach ($projects as $project) {
            DB::table('projects')->insert(array_merge($project, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }

        // Education Seeder
        $education = [
            [
                'institution' => 'University of Technology',
                'degree' => 'Bachelor of Science',
                'field_of_study' => 'Computer Science',
                'start_date' => '2015-09-01',
                'end_date' => '2019-06-30',
                'description' => 'Focused on software engineering and web development. Graduated with honors.',
                'location' => 'San Francisco, CA',
            ],
            [
                'institution' => 'Tech Academy',
                'degree' => 'Professional Certificate',
                'field_of_study' => 'Full Stack Development',
                'start_date' => '2019-07-01',
                'end_date' => '2019-12-31',
                'description' => 'Intensive coding bootcamp covering modern web development technologies.',
                'location' => 'San Francisco, CA',
            ]
        ];

        foreach ($education as $edu) {
            DB::table('education')->insert(array_merge($edu, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }

        // Work Experience Seeder
        $workExperiences = [
            [
                'company' => 'Tech Solutions Inc.',
                'position' => 'Senior Full Stack Developer',
                'start_date' => '2022-01-01',
                'end_date' => null,
                'description' => 'Leading development of enterprise web applications, mentoring junior developers, and implementing CI/CD practices.',
                'location' => 'San Francisco, CA',
                'is_current' => true,
            ],
            [
                'company' => 'Web Innovators',
                'position' => 'Full Stack Developer',
                'start_date' => '2019-01-01',
                'end_date' => '2021-12-31',
                'description' => 'Developed and maintained multiple client projects using Laravel and React. Implemented automated testing and deployment workflows.',
                'location' => 'San Jose, CA',
                'is_current' => false,
            ]
        ];

        foreach ($workExperiences as $work) {
            DB::table('work_experience')->insert(array_merge($work, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }

        // Project Tech Stacks Seeder
        $projectTechStacks = [
            [
                'project_id' => 1,
                'tech_stack_id' => 1,
            ],
            [
                'project_id' => 1,
                'tech_stack_id' => 3,
            ],
            [
                'project_id' => 2,
                'tech_stack_id' => 1,
            ],
            [
                'project_id' => 2,
                'tech_stack_id' => 2,
            ]
        ];

        foreach ($projectTechStacks as $relation) {
            DB::table('project_tech_stacks')->insert(array_merge($relation, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }
}