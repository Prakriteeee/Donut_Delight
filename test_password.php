<?php
$enteredPassword = 'admin123';
$storedHash = '$2y$10$8uKBGGHQmUZh0LxBOuzwxe5H6Gl4e8zfhYvQKJ3cYyCRZz7g6G3uO';

if (password_verify($enteredPassword, $storedHash)) {
    echo "✅ Password matches!";
} else {
    echo "❌ Password does NOT match.";
}
