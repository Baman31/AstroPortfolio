<?php

require __DIR__ . '/../vendor/autoload.php';

$pdo = db();

try {
    $pdo->exec("ALTER TABLE services ADD COLUMN icon TEXT DEFAULT '✨'");
    echo "✓ Added icon column to services table\n";
} catch (PDOException $e) {
    if (strpos($e->getMessage(), 'duplicate column name') !== false) {
        echo "• icon column already exists\n";
    } else {
        echo "Error adding icon column: " . $e->getMessage() . "\n";
    }
}

try {
    $pdo->exec("ALTER TABLE services ADD COLUMN created_at TEXT");
    echo "✓ Added created_at column to services table\n";
} catch (PDOException $e) {
    if (strpos($e->getMessage(), 'duplicate column name') !== false) {
        echo "• created_at column already exists\n";
    } else {
        echo "Error adding created_at column: " . $e->getMessage() . "\n";
    }
}

try {
    $pdo->exec("ALTER TABLE services ADD COLUMN updated_at TEXT");
    echo "✓ Added updated_at column to services table\n";
} catch (PDOException $e) {
    if (strpos($e->getMessage(), 'duplicate column name') !== false) {
        echo "• updated_at column already exists\n";
    } else {
        echo "Error adding updated_at column: " . $e->getMessage() . "\n";
    }
}

echo "\n✓ Migration completed successfully\n";
