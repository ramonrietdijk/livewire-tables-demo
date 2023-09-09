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
            $table->integer('order')->after('published')->default(0);
        });

        Blog::query()->update([
            'order' => DB::raw('id'),
        ]);
    }

    public function down(): void
    {
        Schema::table('blogs', function (Blueprint $table): void {
            $table->dropColumn('order');
        });
    }
};
