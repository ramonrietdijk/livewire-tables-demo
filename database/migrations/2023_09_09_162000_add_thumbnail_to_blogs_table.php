<?php

use App\Models\Blog;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('blogs', function (Blueprint $table): void {
            $table->string('thumbnail')->after('title')->nullable();
        });

        Blog::query()->update([
            'thumbnail' => DB::raw("CONCAT('https://picsum.photos/id/', id, '/32/32')"),
        ]);
    }

    public function down(): void
    {
        Schema::table('blogs', function (Blueprint $table): void {
            $table->dropColumn('thumbnail');
        });
    }
};
