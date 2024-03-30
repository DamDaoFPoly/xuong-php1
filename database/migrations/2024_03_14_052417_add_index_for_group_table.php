<?php

use App\Models\Author;
use App\Models\Category;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->index('category_id');
            $table->index('author_id');

            $table->string('title',100)->change();
        });

        Schema::table('post_tag', function (Blueprint $table) {
            $table->primary(['post_id', 'tag_id']);

        }); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
         Schema::table('posts', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
            $table->dropForeign(['author_id']);

            $table->dropIndex(['category_id']);
            $table->dropIndex(['author_id']);

            $table->string('title')->change();
        });
         Schema::table('posts', function (Blueprint $table) {
            $table->foreign('category_id')->references('id')->on('users');
            $table->foreign('author_id')->references('id')->on('users');
        });

        Schema::table('post_tag', function (Blueprint $table) {
            $table->dropForeign(['post_id']);
            $table->dropForeign(['tag_id']);
            
            $table->dropPrimary(['post_id', 'tag_id']);
            
        });

        Schema::table('post_tag', function (Blueprint $table) {
            $table->foreign('post_id')->references('id')->on('posts');
            $table->foreign('tag_id')->references('id')->on('tags');
           
            $table->primary(['post_id', 'tag_id']);
            
        });
    }
};
