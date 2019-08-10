<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Informatika extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('message', function (Blueprint $table) {
            $table->char('sender_id', 10);
            $table->char('receiver_id', 10);
            $table->string('message', 255);
            $table->timestamp('time')->useCurrent();
            $table->engine = 'InnoDB';
        });

        DB::statement('ALTER TABLE message ADD CONSTRAINT fk_message_sender_id FOREIGN KEY (sender_id) REFERENCES users(id);');
        DB::statement('ALTER TABLE message ADD CONSTRAINT fk_message_receiver_id FOREIGN KEY (receiver_id) REFERENCES users(id);');

        Schema::create('content', function (Blueprint $table) {
            $table->char('content_id', 10)->primary();
            $table->char('id', 10);;
            $table->string('content', 255);
            //$table->string('cphoto', 255);
            $table->timestamp('time')->useCurrent();
            $table->engine = 'InnoDB';
        });

        DB::statement('ALTER TABLE content ADD CONSTRAINT fk_content_id FOREIGN KEY (id) REFERENCES users(id);');

        Schema::create('love', function (Blueprint $table) {
            $table->char('love_id', 10);;
            $table->char('id', 10);;
            $table->engine = 'InnoDB';
        });

        DB::statement('ALTER TABLE love ADD CONSTRAINT fk_love_id FOREIGN KEY (id) REFERENCES users(id);');

        Schema::create('comment', function (Blueprint $table) {
            $table->char('content_id', 10);;
            $table->char('id', 10);;
            $table->string('comment', 255);
            $table->engine = 'InnoDB';
        });

        DB::statement('ALTER TABLE comment ADD CONSTRAINT fk_comment_content_id FOREIGN KEY (content_id) REFERENCES content(content_id);');
        DB::statement('ALTER TABLE comment ADD CONSTRAINT fk_comment_id FOREIGN KEY (id) REFERENCES users(id);');

        Schema::create('friend', function (Blueprint $table) {
            $table->char('users_id', 10);;
            $table->char('friend_id', 10);;
            $table->engine = 'InnoDB';
        });

        DB::statement('ALTER TABLE friend ADD CONSTRAINT fk_friend_users_id FOREIGN KEY (users_id) REFERENCES users(id);');
        DB::statement('ALTER TABLE friend ADD CONSTRAINT fk_friend_friend_id FOREIGN KEY (friend_id) REFERENCES users(id);');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('message');
        Schema::dropIfExists('content');
        Schema::dropIfExists('love');
        Schema::dropIfExists('comment');
        Schema::dropIfExists('friend');
    }
}
