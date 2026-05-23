<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('docs_repositories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('repository');
            $table->string('category');
            $table->string('full_name')->nullable();
            $table->text('description')->nullable();
            $table->string('demo')->nullable();
            $table->string('support')->nullable();
            $table->string('docs_path')->default('docs');
            $table->json('branches')->nullable();
            $table->timestamp('last_imported_at')->nullable();
            $table->string('last_import_status')->nullable();
            $table->text('last_import_error')->nullable();
            $table->json('last_imported_branches')->nullable();
            $table->timestamps();
        });

        foreach (config('docs.repositories', []) as $repo) {
            DB::table('docs_repositories')->updateOrInsert(
                ['name' => $repo['name']],
                [
                    'repository' => $repo['repository'],
                    'category' => $repo['category'],
                    'full_name' => $repo['full_name'] ?? null,
                    'description' => $repo['description'] ?? null,
                    'demo' => $repo['demo'] ?? null,
                    'support' => $repo['support'] ?? null,
                    'docs_path' => $repo['docs_path'] ?? 'docs',
                    'branches' => isset($repo['branches']) ? json_encode($repo['branches']) : null,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('docs_repositories');
    }
};
