<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class CommentTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    /**
     * A test of creating a comment.
     */
    public function testCreateComment(){
        $response = $this->post('/api/comments/');
    }
}
