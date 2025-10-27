<?php

namespace Tests\Unit;

use Tests\TestCase;

class MailConfigTest extends TestCase
{
    public function test_mail_password_whitespace_is_removed(): void
    {
        $originalEnv = env('MAIL_PASSWORD');

        putenv('MAIL_PASSWORD=dcmm eodm wucs whhh');
        $_ENV['MAIL_PASSWORD'] = 'dcmm eodm wucs whhh';
        $_SERVER['MAIL_PASSWORD'] = 'dcmm eodm wucs whhh';

        $config = include base_path('config/mail.php');

        $this->assertSame('dcmmeodmwucswhhh', $config['mailers']['smtp']['password']);

        if ($originalEnv === null) {
            putenv('MAIL_PASSWORD');
            unset($_ENV['MAIL_PASSWORD'], $_SERVER['MAIL_PASSWORD']);
        } else {
            putenv('MAIL_PASSWORD=' . $originalEnv);
            $_ENV['MAIL_PASSWORD'] = $originalEnv;
            $_SERVER['MAIL_PASSWORD'] = $originalEnv;
        }
    }
}
